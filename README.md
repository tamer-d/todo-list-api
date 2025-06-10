s d'API avec les résultats attendus :

# ✅ Todo List API – Laravel

This project was inspired by the [Roadmap.sh Todo List API project](https://roadmap.sh/projects/todo-list-api).
It is a simple RESTful API built using **Laravel** and **MySQL** to demonstrate core backend skills such as:

-   ✅ User authentication
-   🧩 Schema design and databases
-   🔄 RESTful API design
-   ✏️ CRUD operations
-   🚧 Error handling
-   🔐 API security

## 📋 Table of Contents

-   [Requirements](#requirements)
-   [Installation](#installation)
-   [Testing the API](#testing-the-api)
-   [API Endpoints](#api-endpoints)
-   [API Examples](#api-examples)

## 📦 Requirements

-   PHP 8.1+
-   Composer
-   MySQL or MariaDB
-   Laravel CLI

## 🚀 Installation

1. Clone the repository:

    ```
    git clone https://github.com/tamer-d/todo-list-api.git
    cd todo-api

    ```

2. Install dependencies:

    ```
    composer install

    ```

3. Create a copy of the `.env` file:

    ```
    cp .env.example .env

    ```

4. Generate an application key:

    ```
    php artisan key:generate

    ```

5. Configure your database in the `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=todo_api
    DB_USERNAME=root
    DB_PASSWORD=

    ```

6. Run migrations:

    ```
    php artisan migrate

    ```

7. Start the server:
    ```
    php artisan serve
    ```

## 🧪 Testing the API

You can test the API using tools like [Postman](https://www.postman.com/) or [cURL](https://curl.se/).

### API Authentication

This API uses Laravel Sanctum for token-based authentication. You need to:

1. Register a new user
2. Login to get a token
3. Include the token in the Authorization header for protected routes:
    ```
    Authorization: Bearer your_token_here
    ```

### Headers for API requests

Make sure to include these headers in your requests:

```
Accept: application/json
Content-Type: application/json
```

## 🌐 API Endpoints

### Authentication

| Method | Endpoint    | Description         | Authentication |
| ------ | ----------- | ------------------- | -------------- |
| POST   | `/register` | Register a new user | No             |
| POST   | `/login`    | Login a user        | No             |
| POST   | `/logout`   | Logout a user       | Yes            |

### Tasks

| Method    | Endpoint      | Description                           | Authentication |
| --------- | ------------- | ------------------------------------- | -------------- |
| GET       | `/tasks`      | List all tasks for authenticated user | Yes            |
| POST      | `/tasks`      | Create a new task                     | Yes            |
| GET       | `/tasks/{id}` | Get a specific task                   | Yes            |
| PUT/PATCH | `/tasks/{id}` | Update a task                         | Yes            |
| DELETE    | `/tasks/{id}` | Delete a task                         | Yes            |

## 📝 API Examples

### Register a New User

**Request:**

```http
POST /register HTTP/1.1
Accept: application/json
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123"
}
```

**Expected Response:**

```json
{
    "message": "User registered successfully.",
    "token": "1|laravel_sanctum_token_example..."
}
```

### Login

**Request:**

```http
POST /login HTTP/1.1
Accept: application/json
Content-Type: application/json

{
    "email": "john@example.com",
    "password": "password123"
}
```

**Expected Response:**

```json
{
    "message": "Login successful.",
    "token": "1|laravel_sanctum_token_example..."
}
```

### Create a Task

**Request:**

```http
POST /tasks HTTP/1.1
Accept: application/json
Content-Type: application/json
Authorization: Bearer your_token_here

{
    "title": "Book a dentist appointment",
    "description": "Call and schedule an annual dental check-up"
}
```

**Expected Response:**

```json
{
    "id": 1,
    "title": "Book a dentist appointment",
    "description": "Call and schedule an annual dental check-up",
    "completed": false,
    "user_id": 1,
    "created_at": "2023-10-25T14:30:00.000000Z",
    "updated_at": "2023-10-25T14:30:00.000000Z"
}
```

### List All Tasks

**Request:**

```http
GET /tasks HTTP/1.1
Accept: application/json
Authorization: Bearer your_token_here
```

**Expected Response:**

```json
{
    {
    "data": [
        {
            "id": 1,
            "title": "Car maintenance",
            "description": "Take the car to the garage for oil change and inspection",
            "completed": false,
            "user_id": 1,
            "created_at": "2023-10-25T14:30:00.000000Z",
            "updated_at": "2023-10-25T14:30:00.000000Z"
        },
        {
            "id": 2,
            "title": "Feed the cat",
            "description": "Give food and fresh water to the cat in the morning",
            "completed": true,
            "user_id": 1,
            "created_at": "2023-10-25T08:00:00.000000Z",
            "updated_at": "2023-10-25T08:15:00.000000Z"
        },
        {
            "id": 3,
            "title": "Order pizza",
            "description": "Order a large pepperoni pizza for dinner",
            "completed": false,
            "user_id": 1,
            "created_at": "2023-10-25T18:00:00.000000Z",
            "updated_at": "2023-10-25T18:00:00.000000Z"
        }
    ],
    "page": 1,
    "limit": 10,
    "total": 3
}
}
```

### Get a Specific Task

**Request:**

```http
GET /tasks/3 HTTP/1.1
Accept: application/json
Authorization: Bearer your_token_here
```

**Expected Response:**

```json
{
    "id": 3,
    "title": "Order pizza",
    "description": "Order a large pepperoni pizza for dinner",
    "completed": false,
    "user_id": 1,
    "created_at": "2023-10-25T18:00:00.000000Z",
    "updated_at": "2023-10-25T18:00:00.000000Z"
}
```

### Update a Task

**Request:**

```http
PUT /tasks/1 HTTP/1.1
Accept: application/json
Content-Type: application/json
Authorization: Bearer your_token_here

{
    "title": "Complete project documentation",
    "description": "Write detailed API documentation with examples",
    "completed": true
}
```

**Expected Response:**

```json
{
    "id": 1,
    "title": "Complete project documentation",
    "description": "Write detailed API documentation with examples",
    "completed": true,
    "user_id": 1,
    "created_at": "2023-10-25T14:30:00.000000Z",
    "updated_at": "2023-10-25T14:35:00.000000Z"
}
```

### Delete a Task

**Request:**

```http
DELETE /tasks/1 HTTP/1.1
Accept: application/json
Authorization: Bearer your_token_here
```

**Expected Response:**

```json
{
    "message": "Task deleted successfully"
}
```

### Permission Denied Example

**Request (trying to access another user's task):**

```http
GET /tasks/2 HTTP/1.1
Accept: application/json
Authorization: Bearer your_token_here
```

**Expected Response:**

```json
{
    "message": "Forbidden"
}
```
