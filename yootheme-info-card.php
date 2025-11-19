<?php
/**
 * Plugin Name: YOOtheme Info Card Grid
 * Plugin URI: https://example.com
 * Description: Añade un elemento grid responsive "Info Card Grid" al constructor de YOOtheme Pro con múltiples campos de información personalizables
 * Version: 2.0.0
 * Author: Tu Nombre
 * Author URI: https://example.com
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
define('YOOTHEME_INFO_CARD_VERSION', '1.0.0');
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
                <strong>YOOtheme Info Card Element</strong> requiere que
                <strong>YOOtheme Pro</strong> esté instalado y activado.
            </p>
        </div>
        <?php
    }
});
