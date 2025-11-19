# YOOtheme Info Card Element

Plugin independiente que añade un elemento personalizado "Info Card" al constructor de YOOtheme Pro.

## 📦 Características

- **Plugin independiente** - No requiere otros plugins (solo YOOtheme Pro)
- **Elemento personalizado** - Aparece en el constructor de YOOtheme Pro
- **Totalmente compatible** con contenido dinámico de cualquier fuente (Google Sheets, Custom Post Types, etc.)

## 🎨 Campos del Elemento

Todos los siguientes campos soportan contenido dinámico:

- `image` - Imagen principal
- `image_alt` - Texto alternativo de la imagen
- `subtitle` - Subtítulo
- `title` - Título principal
- `content` - Contenido con editor
- `info_line_1` a `info_line_8` - Líneas de información
- `info_line_1_icon` a `info_line_8_icon` - Iconos para cada línea
- `button_text` - Texto del botón
- `button_link` - Enlace del botón

## Instalación

1. Sube la carpeta del plugin a `/wp-content/plugins/`
2. Activa el plugin desde el panel de WordPress
3. El elemento "Info Card" estará disponible en YOOtheme Builder bajo "Custom"

## Uso

### Uso Básico

1. Abre YOOtheme Builder
2. Busca "Info Card" en la sección "Custom"
3. Arrastra el elemento a tu layout
4. Configura los campos según necesites

### Uso con Campos Dinámicos

1. Haz clic en el icono de "Dynamic Content" (⚡) junto a cualquier campo
2. Selecciona una fuente de datos (Post, Custom Field, etc.)
3. Mapea el campo dinámico al campo del elemento
4. El contenido se actualizará automáticamente

## Estructura de Archivos

```
yootheme-info-card/
├── element/
│   ├── element.json          # Configuración del elemento
│   ├── element.php           # Lógica del elemento (namespace YOOtheme)
│   ├── images/
│   │   ├── icon.svg         # Icono del elemento
│   │   └── iconSmall.svg    # Icono pequeño
│   └── templates/
│       ├── template.php     # Template de renderizado
│       └── content.php      # Template de vista previa
├── yootheme-info-card.php   # Archivo principal del plugin
└── README.md
```

### Ejemplo con Google Sheets

Si tienes el plugin "Google Sheets YOOtheme Connector" instalado:

**Estructura de tu hoja:**
```
| image_url | subtitle | title | description | info1 | info2 | info3 | button_text | button_link |
```

**En YOOtheme:**
1. Añade el elemento "Info Card"
2. En cada campo, haz clic en "Dynamic"
3. Selecciona "Google Sheet" o "Google Sheets"
4. Mapea cada campo a su columna correspondiente

## 🎯 Ejemplo Visual

El elemento está diseñado para crear tarjetas como:

```
┌─────────────────────────┐
│      [IMAGEN]           │
├─────────────────────────┤
│ 2025-26 details coming  │
│                         │
│ PAY AND PLAY SWIMMING   │
│ - PAID (£7,5 VIA PAYPAL)│
│                         │
│ Lorem ipsum dolor...    │
│                         │
│ 📍 All GLL Centres      │
│ 📅 Ongoing access       │
│ 💳 Pay & Play - £7,5    │
│ 📄 Promotional leaflet  │
│ 👤 Any Greater London   │
│ 📞 Claudine Boothe      │
│                         │
│   [Registration +]      │
└─────────────────────────┘
```

## 🎨 Personalización

El elemento usa clases de UIkit:
- `uk-card` - Contenedor
- `uk-card-default` - Estilo
- `uk-card-body` - Padding
- `uk-list` - Lista de información
- `uk-button` - Botón

Puedes añadir CSS personalizado en:
- YOOtheme Pro → Customizer → Custom CSS
- O en la pestaña "Advanced" del elemento

## 🔧 Requisitos

- WordPress 5.8+
- PHP 7.4+
- YOOtheme Pro (cualquier versión reciente)

## 📝 Notas

- El elemento es completamente independiente
- Funciona con cualquier fuente de datos de YOOtheme Pro
- No requiere configuración adicional
- Los iconos usan la librería de iconos de UIkit

## 🔄 Cambios Técnicos (v1.1.0)

### Correcciones para Campos Dinámicos

Los siguientes cambios se realizaron para habilitar completamente el soporte de campos dinámicos:

1. **element.php**
   - ✅ Agregado `namespace YOOtheme` (requerido por YOOtheme Pro)
   - ✅ Simplificado el transform `render` para seguir el patrón de YOOtheme
   - ✅ Eliminadas las manipulaciones de clases (movidas al template)

2. **template.php**
   - ✅ Implementado sistema de helpers de YOOtheme (`$this->el()`)
   - ✅ Actualizadas todas las referencias a usar `$props` directamente
   - ✅ Mejoradas las comparaciones de campos vacíos (`!= ''` en lugar de truthy checks)
   - ✅ Agregado soporte para `image_alt` dinámico

3. **element.json**
   - ✅ Agregado campo `image_alt` con `altRef: "%name%_alt"`
   - ✅ Todos los campos ya tenían `"source": true` ✓
   - ✅ Agregado `image_alt` al fieldset

4. **content.php**
   - ✅ Actualizadas las comparaciones para usar `!= ''` y `!empty()`
   - ✅ Agregado soporte para `image_alt`

### Por qué estos cambios son importantes

- **Namespace YOOtheme**: Permite que el elemento acceda a las clases y helpers de YOOtheme Pro
- **Sistema $this->el()**: Renderiza correctamente los atributos y clases dinámicas
- **Comparaciones != ''**: Evita problemas con valores falsy que no son cadenas vacías
- **image_alt con altRef**: Permite que el alt text se mapee automáticamente desde fuentes dinámicas

## 🧪 Cómo Probar

1. Desactiva y reactiva el plugin para limpiar la caché
2. Abre YOOtheme Builder
3. Añade el elemento "Info Card"
4. Haz clic en el icono ⚡ junto a cualquier campo
5. Deberías ver las opciones de "Dynamic Content"
6. Selecciona una fuente (Post, Custom Field, Google Sheets, etc.)
7. Mapea el campo y verifica que el contenido se muestre correctamente
