# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.2] - 2024-11-19

### Fixed
- Test de actualización automática funcionando correctamente
- Verificación del sistema de notificaciones de WordPress

## [2.0.1] - 2024-11-19

### Added
- Sistema de actualización automática desde GitHub
- WordPress ahora detecta nuevas versiones automáticamente
- Actualización con un clic desde el panel de administración

### Fixed
- URLs actualizadas con usuario real de GitHub (unmediacode)

## [2.0.0] - 2024-11-19

### Changed
- **BREAKING**: Convertido de Panel Slider a Grid responsive
- Renombrado de "Info Card" a "Info Card Grid"
- Grid responsive configurable por breakpoint (móvil, tablet, desktop)

### Added
- 4 campos de información personalizables (info_line_1 a info_line_4)
- Iconos personalizables para cada campo de información
- Opciones de estilo para info lines:
  - Style (text-meta, text-lead, heading, etc.)
  - Margin top configurable
  - Icon width personalizable
  - Icon color (muted, primary, secondary, etc.)
- Configuración de grid:
  - Columnas por breakpoint
  - Column gap y row gap
  - Alineación vertical
- Soporte completo para Dynamic Content en todos los campos
- Sistema de versiones y changelog

### Fixed
- Warnings de "Undefined array key" en templates
- Compatibilidad con YOOtheme Builder standards

## [1.0.0] - 2024-11-18

### Added
- Versión inicial basada en Panel Slider
- Campos básicos: title, meta, content, image, link
- Soporte para dynamic fields
