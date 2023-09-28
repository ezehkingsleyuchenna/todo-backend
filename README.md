# Todo List

## System Requirements
- PHP **V8**
- Composer **^V2**

## Installation

```
git clone https://github.com/ezehkingsleyuchenna/todo-backend.git
composer install
```

**Create .env file in the root folder**

**Copy env data from .env.example**

```
php artisan key:generate
```

**Create database.sqlite in database directory**

```
php artisan migrate
```

## API Documentation
### BASE URL
```http request
https://todo-backend.test/api/v1
```
### Content-Type
`application/json`

### Create task
`POST /create`
```http request
https://todo-backend.test/api/v1/create
```

| Parameter | Type     | Description             |
|:----------|:---------|:------------------------|
| `task`    | `string` | **Required**. User task |

### Complete task
`GET /completed/:todo`
```http request
https://todo-backend.test/api/v1/completed/:todo
```
**NOTE:** `:todo is the id`

### Delete task
`GET /delete/:todo`
```http request
https://todo-backend.test/api/v1/delete/:todo
```
**NOTE:** `:todo is the id`

### Filter Todos
`Get /todos/?status`
```http request
https://todo-backend.test/api/v1/todos
```
```http request
https://todo-backend.test/api/v1/todos/active
```
```http request
https://todo-backend.test/api/v1/todos/completed
```

| Parameter | Type     | Description                                                                 | Possible values | Default |
|:----------|:---------|:----------------------------------------------------------------------------|-----------------|:--------|
| `limit`   | `int`    | **Nullable** <br/> Number of records in one page.                           | 1 - 100         | 20      |
| `page`    | `int`    | **Nullable** <br/>The page number you want to get.                          | 1 - page count  |         |
| `orderBy` | `string` | **Nullable** <br/>Display in ascending or descending order.                 | asc, desc       | asc     |


## Responses

Most API endpoints return the JSON representation of the resources created or edited. In the same view, any invalid request or any other errors will return a JSON
response in the following format:

```javascript
{
    "status"  : bool,
    "message" : string,
    "data"    : string
}
```

The `status` attribute describes if the request was successful or not.

The `message` attribute contains a message commonly used to give more information about the response of the request.

The `data` attribute contains response data, like a created task, a completed task, filtered todos. This will be an escaped string containing JSON data.

## Status Codes

| Status Code | Description             |
|:------------|:------------------------|
| 200         | `OK`                    |
| 400         | `BAD REQUEST`           |
| 404         | `NOT FOUND`             |
| 500         | `INTERNAL SERVER ERROR` |

## License

licensed under the [MIT license](https://opensource.org/licenses/MIT).
