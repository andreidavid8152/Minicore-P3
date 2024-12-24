# Minicore-P3

## Descripción del Proyecto
Este proyecto está enfocado en la gestión de empleados, departamentos y gastos dentro de una organización. La plataforma permite administrar de manera eficiente las entidades principales, asegurando una experiencia de usuario sencilla y funcional.

### Funcionalidades principales:
- Gestión de empleados: Crear, editar y listar empleados.
- Gestión de departamentos: Crear, editar y listar departamentos.
- Gestión de gastos: Registrar, editar, filtrar y visualizar los gastos por un rango de fechas.

## Cómo Instalar y Ejecutar el Proyecto
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/andreidavid8152/Minicore-P3.git
   ```
2. Instalar dependencias:
   ```bash
   composer install
   npm install
   ```
3. Configurar variables de entorno:
   - Editar el archivo `.env` con las credenciales necesarias (base de datos, claves API, etc.).

4. Migrar la base de datos:
   ```bash
   php artisan migrate
   ```

5. Levantar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## Cómo Utilizar el Proyecto
### Gestión de Empleados:
- **Crear empleados:** Acceder al formulario para registrar empleados con sus datos básicos.
- **Editar empleados:** Modificar información existente de un empleado.
- **Listar empleados:** Ver una lista de empleados.

### Gestión de Departamentos:
- **Crear departamentos:** Registrar nuevos departamentos dentro de la organización.
- **Editar departamentos:** Actualizar información de departamentos existentes.
- **Listar departamentos:** Consultar departamentos registrados en el sistema.

### Gestión de Gastos:
- **Registrar gastos:** Crear registros de gastos asociados a empleados y departamentos.
- **Filtrar gastos:** Ver gastos a traves del filtrado de fechas.
- **Visualizar gastos:** Analizar la información consolidada de los gastos.

## Créditos
Videos de referencia:
- [Fazt Code - Laravel desde cero (Parte 1)](https://youtube.com)
- [Fazt Code - Laravel desde cero (Parte 2)](https://youtube.com)

## Licencia
Este proyecto se distribuye bajo la Licencia MIT. Puedes usarlo, modificarlo y distribuirlo libremente.
