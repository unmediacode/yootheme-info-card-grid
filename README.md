# YOOtheme Info Card Grid

[![Version](https://img.shields.io/badge/version-2.0.0-blue.svg)](https://github.com/unmediacode/yootheme-info-card-grid/releases)
[![WordPress](https://img.shields.io/badge/WordPress-5.8%2B-blue.svg)](https://wordpress.org/)
[![YOOtheme](https://img.shields.io/badge/YOOtheme-Pro-orange.svg)](https://yootheme.com/)
[![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)](LICENSE)

Plugin independiente que añade un elemento grid responsive "Info Card Grid" al constructor de YOOtheme Pro con soporte completo para contenido dinámico.

## ✨ Características

- 🎯 **Grid Responsive** - Configurable por breakpoint (móvil, tablet, desktop)
- 📊 **4 Campos de Información** - Con iconos personalizables
- 🎨 **Opciones de Estilo Completas** - Para cada sección
- ⚡ **Dynamic Content** - Soporte completo para cualquier fuente de datos
- 🔧 **Altamente Configurable** - Basado en YOOtheme Panel Slider
- 📱 **Mobile First** - Optimizado para todos los dispositivos

## 📦 Instalación

### Desde GitHub (Recomendado)

```bash
cd wp-content/plugins/
git clone https://github.com/unmediacode/yootheme-info-card-grid.git yootheme-info-card
```

### Manual

1. Descarga el [último release](https://github.com/unmediacode/yootheme-info-card-grid/releases)
2. Sube la carpeta a `/wp-content/plugins/`
3. Activa el plugin desde el panel de WordPress
4. El elemento "Info Card Grid" estará disponible en YOOtheme Builder

## 🚀 Uso Rápido

1. Abre **YOOtheme Builder**
2. Busca **"Info Card Grid"** en la sección **"Multiple Items"**
3. Arrastra el elemento a tu layout
4. Añade items y configura los campos
5. Ajusta el grid desde **Settings → Layout**

## 🎨 Campos Disponibles

### Por Item (todos con soporte dinámico):

- **Content**
  - Title
  - Meta
  - Content (editor)
  - **Info Line 1-4** (con iconos)
  - Image / Video
  - Icon
  - Link

- **Settings**
  - Panel style (card, tile)
  - Title style, alignment, decorations
  - Meta style, alignment
  - Content style, columns
  - **Info Lines style, margin, icon size/color**
  - Image dimensions, border, transitions
  - Link style

### Contenedor:

- **Layout**
  - Columnas por breakpoint (1-6)
  - Column gap / Row gap
  - Vertical alignment
  
- **Content**
  - Show/hide cada sección

## 📱 Grid Responsive

Por defecto:
- **Móvil (Portrait)**: 1 columna
- **Móvil (Landscape)**: 2 columnas
- **Tablet+**: 3 columnas

Totalmente configurable desde **Settings → Layout**.

## ⚡ Dynamic Content

### Ejemplo con Google Sheets

**Estructura de la hoja:**
```
| title | meta | content | info_1 | info_1_icon | info_2 | info_2_icon | image_url | link |
```

**En YOOtheme:**
1. Añade "Info Card Grid"
2. Añade items
3. En cada campo, clic en ⚡ "Dynamic"
4. Selecciona "Google Sheets"
5. Mapea cada campo a su columna

### Ejemplo con Custom Post Types

```php
// En functions.php o plugin
register_post_type('servicios', [
    'public' => true,
    'label' => 'Servicios',
    'supports' => ['title', 'editor', 'thumbnail', 'custom-fields']
]);
```

En YOOtheme Builder:
1. Usa el campo dinámico "Post"
2. Selecciona el post type "Servicios"
3. Mapea los campos

## 🎯 Ejemplo Visual

```
┌──────────────┬──────────────┬──────────────┐
│  [IMAGEN]    │  [IMAGEN]    │  [IMAGEN]    │
├──────────────┼──────────────┼──────────────┤
│ Meta Text    │ Meta Text    │ Meta Text    │
│ TÍTULO       │ TÍTULO       │ TÍTULO       │
│ Contenido... │ Contenido... │ Contenido... │
│              │              │              │
│ 📍 Info 1    │ 📍 Info 1    │ 📍 Info 1    │
│ 📅 Info 2    │ 📅 Info 2    │ 📅 Info 2    │
│ 💳 Info 3    │ 💳 Info 3    │ 💳 Info 3    │
│ 📄 Info 4    │ 📄 Info 4    │ 📄 Info 4    │
│              │              │              │
│ [Ver más →]  │ [Ver más →]  │ [Ver más →]  │
└──────────────┴──────────────┴──────────────┘
```

## 🔧 Requisitos

- WordPress 5.8+
- PHP 7.4+
- YOOtheme Pro (cualquier versión reciente)

## 📂 Estructura del Proyecto

```
yootheme-info-card/
├── elements/
│   ├── info_card/              # Contenedor
│   │   ├── element.json
│   │   ├── images/
│   │   │   ├── icon.svg
│   │   │   └── iconSmall.svg
│   │   └── templates/
│   │       ├── template.php
│   │       └── content.php
│   └── info_card_item/         # Item individual
│       ├── element.json
│       ├── element.php
│       └── templates/
│           ├── template.php
│           ├── template-content.php
│           ├── template-media.php
│           ├── template-link.php
│           └── ...
├── yootheme-info-card.php      # Plugin principal
├── README.md
├── CHANGELOG.md
└── .gitignore
```

## 🔄 Actualizaciones

### Método 1: Git Pull (Recomendado)

```bash
cd wp-content/plugins/yootheme-info-card
git pull origin master
```

### Método 2: Manual

1. Descarga el nuevo release
2. Desactiva el plugin
3. Reemplaza la carpeta
4. Reactiva el plugin

## 🐛 Solución de Problemas

### Los campos dinámicos no aparecen

1. Desactiva y reactiva el plugin
2. Limpia la caché de YOOtheme (Settings → Advanced → Clear Cache)
3. Verifica que YOOtheme Pro esté actualizado

### El grid no se muestra correctamente

1. Verifica la configuración en Settings → Layout
2. Revisa que no haya CSS personalizado conflictivo
3. Prueba con un tema limpio de YOOtheme

### Los iconos no se muestran

1. Verifica que uses nombres válidos de UIkit icons
2. Ejemplos: `home`, `user`, `mail`, `phone`, `location`, `calendar`
3. Lista completa: https://getuikit.com/docs/icon

## 🤝 Contribuir

Las contribuciones son bienvenidas! Por favor:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Changelog

Ver [CHANGELOG.md](CHANGELOG.md) para el historial completo de cambios.

## 📄 Licencia

GPL v2 or later - Ver [LICENSE](LICENSE) para más detalles.

## 👤 Autor

**unmediacode**
- GitHub: [@unmediacode](https://github.com/unmediacode)
- Repo: [yootheme-info-card-grid](https://github.com/unmediacode/yootheme-info-card-grid)

## 🙏 Agradecimientos

- Basado en el elemento Panel Slider de YOOtheme Pro
- Construido con [YOOtheme Pro](https://yootheme.com/)
- Iconos por [UIkit](https://getuikit.com/)

---

⭐ Si este plugin te resulta útil, considera darle una estrella en GitHub!
