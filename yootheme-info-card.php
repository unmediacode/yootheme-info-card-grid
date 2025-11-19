<?php
/**
 * Plugin Name: Unmedia Info Card Grid
 * Plugin URI: https://github.com/unmediacode/yootheme-info-card-grid
 * Description: Añade un elemento grid responsive "Info Card Grid" al constructor de YOOtheme Pro con múltiples campos de información personalizables. ✨ Actualizaciones automáticas desde GitHub.
 * Version: 2.0.3
 * Author: unmediacode
 * Author URI: https://github.com/unmediacode
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: yootheme-info-card
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes
define('YOOTHEME_INFO_CARD_VERSION', '2.0.3');
define('YOOTHEME_INFO_CARD_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('YOOTHEME_INFO_CARD_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Registrar el elemento personalizado en YOOtheme Pro
 */
add_action('after_setup_theme', function () {
    // Verificar si YOOtheme Pro está activo
    if (!class_exists('YOOtheme\\Application')) {
        return;
    }

    try {
        // Obtener la instancia de la aplicación
        $app = \YOOtheme\Application::getInstance();

        // Verificar que Builder existe
        if (!class_exists('\YOOtheme\Builder')) {
            return;
        }

        // Registrar el directorio de elementos
        $app->extend(\YOOtheme\Builder::class, function ($builder) {
            $builder->addTypePath(YOOTHEME_INFO_CARD_PLUGIN_DIR . 'elements/*/element.json');
        });
    } catch (\Exception $e) {
        // Silently fail if there's any error
        error_log('YOOtheme Info Card Error: ' . $e->getMessage());
    }
}, 20);

/**
 * Mostrar aviso si YOOtheme Pro no está activo
 */
add_action('admin_notices', function () {
    if (!class_exists('YOOtheme\Application', false)) {
        ?>
        <div class="notice notice-error">
            <p>
                <strong>YOOtheme Info Card Grid</strong> requiere que
                <strong>YOOtheme Pro</strong> esté instalado y activado.
            </p>
        </div>
        <?php
    }
});

/**
 * Sistema de actualización automática desde GitHub (Repositorio Público)
 */
if (!class_exists('YTICG_GitHub_Updater')) {
    class YTICG_GitHub_Updater {
        private $slug;
        private $plugin_data;
        private $username;
        private $repo;
        private $plugin_file;
        private $github_api_result;

        public function __construct($plugin_file) {
            add_filter('pre_set_site_transient_update_plugins', array($this, 'check_update'));
            add_filter('plugins_api', array($this, 'plugin_popup'), 10, 3);
            add_filter('upgrader_post_install', array($this, 'after_install'), 10, 3);
            
            $this->plugin_file = $plugin_file;
            $this->username = 'unmediacode';
            $this->repo = 'yootheme-info-card-grid';
            $this->slug = plugin_basename($plugin_file);
        }

        public function check_update($transient) {
            if (empty($transient->checked)) {
                return $transient;
            }

            $this->get_repository_info();
            $this->plugin_data = get_plugin_data($this->plugin_file);
            
            if (!empty($this->github_api_result)) {
                $github_version = ltrim($this->github_api_result->tag_name, 'v');
                
                if (version_compare($github_version, $this->plugin_data['Version'], '>')) {
                    $obj = new stdClass();
                    $obj->slug = $this->slug;
                    $obj->new_version = $github_version;
                    $obj->url = $this->plugin_data['PluginURI'];
                    $obj->package = $this->github_api_result->zipball_url;
                    $obj->tested = '6.4';
                    $obj->requires_php = '7.4';
                    $obj->plugin = $this->slug;
                    
                    $transient->response[$this->slug] = $obj;
                }
            }

            return $transient;
        }

        public function plugin_popup($result, $action, $args) {
            if ($action !== 'plugin_information') {
                return $result;
            }

            if ($args->slug !== $this->slug) {
                return $result;
            }

            $this->get_repository_info();
            $this->plugin_data = get_plugin_data($this->plugin_file);

            if (empty($this->github_api_result)) {
                return $result;
            }

            $github_version = ltrim($this->github_api_result->tag_name, 'v');

            $obj = new stdClass();
            $obj->name = $this->plugin_data['Name'];
            $obj->slug = $this->slug;
            $obj->version = $github_version;
            $obj->author = $this->plugin_data['Author'];
            $obj->author_profile = $this->plugin_data['AuthorURI'];
            $obj->requires = $this->plugin_data['RequiresWP'];
            $obj->tested = '6.4';
            $obj->requires_php = '7.4';
            $obj->homepage = $this->plugin_data['PluginURI'];
            $obj->download_link = $this->github_api_result->zipball_url;
            $obj->sections = array(
                'description' => $this->plugin_data['Description'],
                'changelog' => 'Ver CHANGELOG.md en el repositorio para cambios recientes.'
            );
            $obj->downloaded = 0;
            $obj->last_updated = $this->github_api_result->published_at;

            return $obj;
        }

        public function after_install($response, $hook_extra, $result) {
            global $wp_filesystem;
            
            $install_directory = WP_PLUGIN_DIR . '/' . dirname($this->slug);
            $wp_filesystem->move($result['destination'], $install_directory);
            $result['destination'] = $install_directory;
            
            if ($this->slug == 'yootheme-info-card/yootheme-info-card.php') {
                $result['destination_name'] = 'yootheme-info-card';
            }
            
            return $result;
        }

        private function get_repository_info() {
            if (!empty($this->github_api_result)) {
                return;
            }

            $url = "https://api.github.com/repos/{$this->username}/{$this->repo}/releases";
            
            $response = wp_remote_get($url, array(
                'headers' => array(
                    'Accept' => 'application/vnd.github.v3+json',
                    'User-Agent' => 'WordPress-' . get_bloginfo('url')
                ),
                'timeout' => 15
            ));

            if (is_wp_error($response)) {
                return false;
            }

            $response_code = wp_remote_retrieve_response_code($response);
            if ($response_code !== 200) {
                return false;
            }

            $releases = json_decode(wp_remote_retrieve_body($response));
            if (empty($releases)) {
                return false;
            }

            $this->github_api_result = $releases[0];
        }
    }
}

// Inicializar el actualizador
new YTICG_GitHub_Updater(__FILE__);
