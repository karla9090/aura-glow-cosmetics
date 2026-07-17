# Aura Glow Cosmetics

El sistema está desarrollado individualmente utilizando el framework PHP Laravel 11 para el backend y Blade/Tailwind CSS para la maquetación del frontend.

---

## Stack Tecnológico
*   **Servidor Local:** Laragon
*   **Backend:** PHP 8.2+ / Laravel 11 (Arquitectura MVC)
*   **Frontend:** Blade templates / Tailwind CSS
*   **Base de Datos:** MySQL

---

## Flujo de Trabajo en el Repositorio (Git)

Para mantener la estabilidad del código y un historial ordenado, se aplican de forma estricta las siguientes directrices de desarrollo:

### 1. Política de Ramas
Queda prohibido realizar commits directamente sobre la rama de producción. El desarrollo se divide en:
*   **`principal` (main):** Contiene únicamente código estable y probado. Solo se actualiza a través de Pull Requests.
*   **`feature/nombre-de-la-tarea`:** Ramas temporales creadas para desarrollar nuevas características (vistas, lógica de negocio o integraciones). Se eliminan local y remotamente tras ser fusionadas.
*   **`hotfix/descripcion-error`:** Ramas de alta prioridad creadas para solucionar errores críticos directamente en producción.

### 2. Estándar de Mensajes de Commit (Conventional Commits)
Cada confirmación de cambios debe utilizar la estructura `tipo: descripción en minúsculas` para garantizar la legibilidad del historial de versiones:
*   **`feat:`** Nueva funcionalidad o vista para el sistema.
*   **`fix:`** Resolución de un error en el código.
*   **`docs:`** Modificaciones exclusivas en archivos de documentación (ej. README).
*   **`style:`** Cambios visuales o de formato que no alteran la lógica de programación.
*   **`chore:`** Tareas de mantenimiento general, dependencias o configuración del entorno.
*   **`refactor:`** Reestructuración de código existente para mejorar rendimiento o calidad sin añadir funciones.

### 3. Integración mediante Pull Requests (PR)
1. Al terminar una tarea, se sube la rama temporal al servidor remoto: `git push origin feature/nombre-tarea`.
2. Se abre una solicitud de Pull Request (PR) en GitHub apuntando hacia la rama `principal`.
3. Se realiza una auto-revisión visual en la pestaña "Files changed" de GitHub para evitar subir código de depuración temporal (como `dd()` o `dump()`).
4. Tras validar que todo funciona, se ejecuta la fusión (Merge) y se elimina la rama temporal.

---

## Instalación y Configuración Local

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/karla9090/aura-glow-cosmetics.git](https://github.com/karla9090/aura-glow-cosmetics.git)
    ```
2.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```
3.  **Configurar variables de entorno:**
    *   Duplicar el archivo `.env.example` y renombrarlo como `.env`.
    *   Configurar las credenciales de la base de datos de MySQL local de Laragon.
4.  **Generar la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```
5.  **Iniciar el servidor:**
    ```bash
    php artisan serve
    ```