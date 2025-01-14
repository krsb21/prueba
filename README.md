## **Requisitos Previos**

1. PHP >= 8.0
2. Composer instalado
3. Servidor web (Apache o Nginx)
4. Base de datos MySQL

## **Pasos para la Instalación**

1. Instalar dependencias con Composer:
   ```bash
   composer install
   ```

2. Configurar el entorno:
   - Copia el archivo `.env.example` a `.env`:
     ```bash
     cp .env.example .env
     ```
   - Edita `.env` y agrega:
     - `DB_DATABASE`: dev
     - `DB_USERNAME`: root
     - `DB_PASSWORD`: root
     - `AUTH_API_TOKEN`: $2a$12$h5FYkEWlHASLWuLPC1Ld8OS.p6zFyyZYuuVxvfdYjklapdtaF54ba

3. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

4. Crear las tablas en la base de datos:
   ```bash
   php artisan migrate
   ```

5. (Opcional) Cargar datos iniciales:
   ```bash
   php artisan db:seed
   ```

6. Iniciar el servidor:
   ```bash
   php artisan serve
   ```

## **Uso de la API**

### **Endpoints Disponibles**

- **Usuarios**:
  - `GET /api/users`: Lista todos los usuarios.
  - `GET /api/users/{id}/tasks`: Lista las tareas de un usuario.

- **Tareas**:
  - `POST /api/tasks`: Crear una tarea nueva.
  - `PUT /api/tasks/{id}`: Actualizar una tarea.
  - `DELETE /api/tasks/{id}`: Eliminar una tarea.

### **Requisitos para las Solicitudes**
- Todas las solicitudes necesitan este encabezado:
  ```
  Authorization: Bearer <AUTH_API_TOKEN>
  Para PUT y DELETE necesita API KEY
  KEY: Authorization
  Value: 1234567890
  Add to: Header
  ```

## **Pruebas**

Para correr las pruebas:
```bash
php artisan test
```
