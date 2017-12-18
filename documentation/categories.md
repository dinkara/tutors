## ======= [/categories]

### Get all items [GET]
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Category, Category])

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->
### Create item [POST]
+ Request Rules:
    {
        "name": 'required',
        "color": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "name": itaque (string),
            "color": officiis (string),

    }
+ Response 201 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Category successfully created (string)
        + data: (Category)

<!-- include(response/401.md) -->
<!-- include(response/422.md) -->
<!-- include(response/500.md) -->

## ======= [/categories/{id}]
### Update item [PUT]
<!-- include(parameters/id.md) -->
+ Request Rules:
    {
        "name": 'required',
        "color": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "name": dicta (string),
            "color": consequuntur (string),

    }
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Category successfully updated (string)
        + data: (Category)

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
        + data: (Category)

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
        + message: Category successfully deleted (string)
        + data: null

<!-- include(response/401.md) -->
<!-- include(response/404.md) -->
<!-- include(response/500.md) -->

## ======= [/categories/paginate?page={page}&pagination={pagination}]
### Paginated items [GET]
<!-- include(parameters/pagination.md) -->
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Category, Category])
        + meta
            + pagination (Pagination)

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->


