# 🚀 Guía para Subir a GitHub

## Paso 1: Crear el Repositorio en GitHub

1. Ve a https://github.com/new
2. **Repository name**: `yootheme-info-card-grid`
3. **Description**: `Grid responsive element for YOOtheme Pro with dynamic content support`
4. **Public** o **Private** (tu elección)
5. ❌ **NO** marques "Initialize this repository with a README"
6. Clic en **"Create repository"**

## Paso 2: Conectar tu Repositorio Local

Copia la URL de tu repo (ej: `https://github.com/tu-usuario/yootheme-info-card-grid.git`)

Luego ejecuta en terminal:

```bash
cd "/Users/miguel/Local Sites/test/app/public/wp-content/plugins/yootheme-info-card"

# Agregar el remote
git remote add origin https://github.com/TU-USUARIO/yootheme-info-card-grid.git

# Cambiar rama a main (opcional pero recomendado)
git branch -M main

# Subir el código
git push -u origin main

# Subir el tag v2.0.0
git push origin v2.0.0
```

## Paso 3: Crear el Release en GitHub

### Opción A: Automático (con GitHub Actions)

El release se creará automáticamente cuando hagas push del tag:

```bash
git push origin v2.0.0
```

Ve a tu repo → **Actions** para ver el progreso.

### Opción B: Manual

1. Ve a tu repo en GitHub
2. Clic en **"Releases"** (lado derecho)
3. Clic en **"Create a new release"**
4. **Choose a tag**: Selecciona `v2.0.0`
5. **Release title**: `v2.0.0 - Info Card Grid`
6. **Description**: Copia el contenido de CHANGELOG.md para v2.0.0
7. Clic en **"Publish release"**

## Paso 4: Configurar para Futuras Actualizaciones

### Para crear una nueva versión:

```bash
# 1. Hacer cambios en el código
# 2. Actualizar CHANGELOG.md
# 3. Actualizar versión en yootheme-info-card.php

# 4. Commit
git add .
git commit -m "v2.1.0 - Descripción de cambios"

# 5. Crear tag
git tag -a v2.1.0 -m "Release v2.1.0"

# 6. Push
git push origin main
git push origin v2.1.0
```

El release se creará automáticamente con GitHub Actions! 🎉

## Paso 5: Instalar en Otros WordPress

### Método 1: Git Clone (Recomendado para desarrollo)

```bash
cd /ruta/otro-wordpress/wp-content/plugins/
git clone https://github.com/TU-USUARIO/yootheme-info-card-grid.git yootheme-info-card
```

Para actualizar:
```bash
cd yootheme-info-card
git pull origin main
```

### Método 2: Descargar Release (Recomendado para producción)

1. Ve a https://github.com/TU-USUARIO/yootheme-info-card-grid/releases
2. Descarga el ZIP de la última versión
3. Sube a WordPress vía Plugins → Add New → Upload Plugin

## 📋 Checklist

- [ ] Repositorio creado en GitHub
- [ ] Remote agregado (`git remote add origin ...`)
- [ ] Código subido (`git push -u origin main`)
- [ ] Tag subido (`git push origin v2.0.0`)
- [ ] Release creado (automático o manual)
- [ ] README.md visible en GitHub
- [ ] Actualizar URLs en README.md con tu usuario real

## 🔗 URLs a Actualizar

Después de crear el repo, actualiza estas URLs en README.md:

```markdown
# Cambiar:
https://github.com/tu-usuario/yootheme-info-card-grid

# Por:
https://github.com/TU-USUARIO-REAL/yootheme-info-card-grid
```

## 🎯 Próximos Pasos

1. **Personalizar el README**: Agregar screenshots, tu nombre real, etc.
2. **Configurar GitHub Pages** (opcional): Para documentación
3. **Agregar Issues Templates**: Para reportes de bugs
4. **Configurar Branch Protection**: Para main/master
5. **Agregar Contributors**: Si trabajas en equipo

---

¿Necesitas ayuda? Abre un issue en el repo! 🚀
