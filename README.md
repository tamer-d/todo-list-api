# ✅ Todo List API – Laravel

This project was inspired by the [Roadmap.sh Todo List API project](https://roadmap.sh/projects/todo-list-api).
It is a simple RESTful API built using **Laravel** and **MySQL** to demonstrate core backend skills such as:

-   ✅ User authentication
-   🧩 Schema design and databases
-   🔄 RESTful API design
-   ✏️ CRUD operations
-   🚧 Error handling
-   🔐 API security

## 📦 Requirements

-   PHP 8.1+
-   Composer
-   MySQL or MariaDB
-   Laravel CLI

## 🚀 Installation

Clone the repository:

```
git clone https://github.com/tamer-d/todo-list-api.git
cd todo-api

```

Install dependencies:

```
composer install

Create a copy of the .env file:

cp .env.example .env

Generate an application key:

php artisan key:generate

Generate JWT secret key:

php artisan jwt:secret

```

Configure your database in the .env file:

```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_api
DB_USERNAME=root
DB_PASSWORD=

```

Run migrations:

```

php artisan migrate

```

Start the server:

```

php artisan serve

```

🧪 Testing the API

You can test the API using tools like Postman or cURL.

🔐 API Authentication – JWT

This API uses JWT (JSON Web Tokens) for authentication. To access protected routes, follow these steps:

-   Register a new user via /register.

-   Login via /login to receive a JWT token.

-   Include the token in the Authorization header for protected routes:

Authorization: Bearer your_jwt_token_here

📎 Headers for API requests
Make sure to include these headers in your requests:

Accept: application/json
Content-Type: application/json

Note: You do not need to manually generate the token. It is automatically returned upon successful login.

🌐 API Endpoints
| Method | Endpoint | Description | Authentication |
|--------|-------------|---------------------|----------------|
| POST | `/register` | Register a new user | No |
| POST | `/login` | Login a user | No |
| POST | `/logout` | Logout a user | Yes |

✅ Tasks
| Method | Endpoint | Description | Authentication |
|-----------|---------------|---------------------------------------|----------------|
| GET | `/tasks` | List all tasks for authenticated user | Yes |
| POST | `/tasks` | Create a new task | Yes |
| GET | `/tasks/{id}` | Get a specific task | Yes |
| PUT/PATCH | `/tasks/{id}` | Update a task | Yes |
| DELETE | `/tasks/{id}` | Delete a task | Yes |
