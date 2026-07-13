# 💄 Aura Glow Cosmetics - Planificación y Reglas del Proyecto[cite: 1, 3]

Este es el repositorio oficial de **Aura Glow Cosmetics**, una tienda en línea de maquillaje de alta gama inspirada en marcas modernas como *Rare Beauty*[cite: 1, 3]. Proyecto desarrollado individualmente utilizando **PHP Laravel 11** para el backend y **Blade/Tailwind** para el frontend[cite: 1, 3].

---

## 🛠️ Stack Tecnológico
- **Backend:** PHP 8.2+ / Framework Laravel 11 (Arquitectura MVC)[cite: 1, 3].
- **Frontend:** Laravel Blade + Tailwind CSS[cite: 1, 3].
- **Base de Datos:** MySQL (Gestionado con Laragon de forma local)[cite: 1, 3].

---

## 📐 Reglas de Oro del Repositorio (Scrum Unipersonal)[cite: 1, 3]

Para mantener el código ordenado, limpio y sin errores, aplicaremos estrictamente estas 3 reglas en GitHub, aunque el proyecto sea de una sola persona[cite: 1, 3]:

### 1. Control de Ramas (Git Flow)[cite: 3]
Nunca programaremos ni guardaremos cambios directamente en la rama principal[cite: 1, 3].
- **`main`**: Aquí solo vive el código que ya funciona perfectamente (versión final)[cite: 1, 3]. No se toca directamente[cite: 1, 3].
- **`feature/nombre-de-la-tarea`**: Ramas temporales que crearemos para programar cada nueva función (Ejemplo: `feature/login`, `feature/carrito`)[cite: 1, 3]. Una vez terminada la tarea, se une a `main`[cite: 3].

### 2. Estándar para escribir los cambios (Commits)[cite: 3]
Cada vez que guardemos un avance en Git, el mensaje debe empezar por una palabra clave que describa lo que hicimos[cite: 1, 3]:
- **`feat:`** Si agregamos una nueva función (Ej: `feat: crear vista de productos`)[cite: 1, 3].
- **`fix:`** Si reparamos un error o bug (Ej: `fix: corregir precio en el carrito`)[cite: 1, 3].
- **`docs:`** Si solo modificamos textos de documentación (Ej: `docs: actualizar el readme`)[cite: 1, 3].
- **`style:`** Si cambiamos diseño o estilos visuales sin alterar cómo funciona la página (Ej: `style: cambiar color de botones`)[cite: 3].

### 3. Integración mediante Pull Requests (PR)[cite: 3]
Cuando termines una característica en tu rama `feature/`, la subirás a GitHub y abrirás un "Pull Request"[cite: 3]. Antes de unirlo a la rama `main`, revisarás visualmente tu propio código en la web de GitHub para asegurarte de que no dejas líneas basura o notas temporales[cite: 1, 3].

---

## 🚀 Cronograma de Sprints (6 semanas)[cite: 3]
- **Sprint 1 (Sem. 1-2):** Base de datos, autenticación de usuarios y panel de administración[cite: 1, 3].
- **Sprint 2 (Sem. 3-4):** Catálogo visual de maquillaje y lógica del carrito de compras[cite: 1, 3].
- **Sprint 3 (Sem. 5-6):** Formulario de pedido, pago simulado y finalización[cite: 1, 3].