# 💄 Aura Glow Cosmetics - Planificación y Reglas del Proyecto

Este es el repositorio oficial de **Aura Glow Cosmetics**, una tienda en línea de maquillaje de alta gama inspirada en marcas modernas como *Rare Beauty*. Proyecto desarrollado individualmente utilizando **PHP Laravel 11** para el backend y **Blade/Tailwind** para el frontend.

---

## 🛠️ Stack Tecnológico
- **Backend:** PHP 8.2+ / Framework Laravel 11 (Arquitectura MVC).
- **Frontend:** Laravel Blade + Tailwind CSS.
- **Base de Datos:** MySQL (Gestionado con Laragon de forma local).

---

## 📐 Reglas de Oro del Repositorio (Scrum Unipersonal)

Para mantener el código ordenado, limpio y sin errores, aplicaremos estrictamente estas 3 reglas en GitHub, aunque el proyecto sea de una sola persona:

### 1. Control de Ramas (Git Flow)
Nunca programaremos ni guardaremos cambios directamente en la rama principal.
- **`main`**: Aquí solo vive el código que ya funciona perfectamente (versión final). No se toca directamente.
- **`feature/nombre-de-la-tarea`**: Ramas temporales que crearemos para programar cada nueva función (Ejemplo: `feature/login`, `feature/carrito`). Una vez terminada la tarea, se une a `main`.

### 2. Estándar para escribir los cambios (Commits)
Cada vez que guardemos un avance en Git, el mensaje debe empezar por una palabra clave que describa lo que hicimos:
- **`feat:`** Si agregamos una nueva función (Ej: `feat: crear vista de productos`).
- **`fix:`** Si reparamos un error o bug (Ej: `fix: corregir precio en el carrito`).
- **`docs:`** Si solo modificamos textos de documentación (Ej: `docs: actualizar el readme`).
- **`style:`** Si cambiamos diseño o estilos visuales sin alterar cómo funciona la página (Ej: `style: cambiar color de botones`).

### 3. Integración mediante Pull Requests (PR)
Cuando termines una característica en tu rama `feature/`, la subirás a GitHub y abrirás un "Pull Request". Antes de unirlo a la rama `main`, revisarás visualmente tu propio código en la web de GitHub para asegurarte de que no dejas líneas basura o notas temporales.

---

## 🚀 Cronograma de Sprints (6 semanas)
- **Sprint 1 (Sem. 1-2):** Base de datos, autenticación de usuarios y panel de administración.
- **Sprint 2 (Sem. 3-4):** Catálogo visual de maquillaje y lógica del carrito de compras.
- **Sprint 3 (Sem. 5-6):** Formulario de pedido, pago simulado y finalización.