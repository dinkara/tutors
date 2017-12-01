## ======= [/comments]

### Get all items [GET]
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Comment, Comment])

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->
### Create item [POST]
+ Request Rules:
    {
        "text": 'required',
        "caption": 'required',
        "favorite": 'required',
        "score": 'required',
        "count": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "text": deserunt (string),
            "caption": corrupti (string),
            "favorite": 0 (boolean),
            "score": 19 (numeric),
            "count": 20 (numeric),

    }
+ Response 201 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Comment successfully created (string)
        + data: (Comment)

<!-- include(response/401.md) -->
<!-- include(response/422.md) -->
<!-- include(response/500.md) -->

## ======= [/comments/{id}]
### Update item [PUT]
<!-- include(parameters/id.md) -->
+ Request Rules:
    {
        "text": 'required',
        "caption": 'required',
        "favorite": 'required',
        "score": 'required',
        "count": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "text": ea (string),
            "caption": quis (string),
            "favorite": 1 (boolean),
            "score": 14 (numeric),
            "count": 6 (numeric),

    }
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Comment successfully updated (string)
        + data: (Comment)

<!-- include(response/401.md) -->
<!-- include(response/404.md) -->
<!-- include(response/422.md) -->
<!-- include(response/500.md) -->
### Get single item [GET]
<!-- include(parameters/id.md) -->
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (Comment)

<!-- include(response/401.md) -->
<!-- include(response/404.md) -->
<!-- include(response/500.md) -->
### Delete item [DELETE]
<!-- include(parameters/id.md) -->
+ Request (application/json)
    <!-- include(request/header.md) -->    
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Comment successfully deleted (string)
        + data: null

<!-- include(response/401.md) -->
<!-- include(response/404.md) -->
<!-- include(response/500.md) -->

## ======= [/comments/paginate?page={page}&pagination={pagination}]
### Paginated items [GET]
<!-- include(parameters/pagination.md) -->
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Comment, Comment])
        + meta
            + pagination (Pagination)

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->


