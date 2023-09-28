# Todo Backend

## Introduction
This is a Todo list backend application.

### Dependencies
- PHP `^v8.1`
- Composer `^v2`

## Installing

```
git clone https://github.com/ezehkingsleyuchenna/todo-backend.git
composer install
```

### Environment file
- **Create `.env` file in the root folder**

- **Copy `.env` data from `.env.example`**

### Generate App key
```
php artisan key:generate
```

### Database

- **Create `database.sqlite` in database directory**

### Migrate tables
```
php artisan migrate
```

## API Documentation
### BASE URL
```
https://todo-backend.test/api/v1
```
**Content-Type** `application/json`

## Endpoints

### Create task

```http request
POST https://todo-backend.test/api/v1/create
```

| Parameter | Type     | Description          | Required |
|:----------|:---------|:---------------------|----------|
| `task`    | `string` | User task (Max: 225) | true     |

### Complete task

```http request
GET https://todo-backend.test/api/v1/completed/:todo
```
**NOTE:** `:todo = id`

### Delete task

```http request
GET https://todo-backend.test/api/v1/delete/:todo
```
**NOTE:** `:todo = id`

### Filter Todos

```http request
GET https://todo-backend.test/api/v1/todos/:status
```

| Parameter | Type     | Description                                                                               | Required | Possible values          | Default |
|:----------|:---------|:------------------------------------------------------------------------------------------|----------|--------------------------|:--------|
| `status`  | `string` | Specifies the status of the todos to retrieve.<br/> eg. /todos/(all, active or completed) | false    | [all, active, completed] | all     |
| `limit`   | `int`    | Number of records in one page.                                                            | false    | 1 - 100                  | 20      |
| `page`    | `int`    | The page number you want to get.                                                          | false    | 1 - page count           |         |
| `orderBy` | `string` | Display in ascending or descending order.                                                 | false    | [asc, desc]              | asc     |

### Clear completed task

```http request
GET https://todo-backend.test/api/v1/clear-completed-tasks
```


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
