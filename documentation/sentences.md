## ======= [/sentences]

### Get all items [GET]
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Sentence, Sentence])

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->
### Create item [POST]
+ Request Rules:
    {
        "text": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "text": totam (string),

    }
+ Response 201 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Sentence successfully created (string)
        + data: (Sentence)

<!-- include(response/401.md) -->
<!-- include(response/422.md) -->
<!-- include(response/500.md) -->

## ======= [/sentences/{id}]
### Update item [PUT]
<!-- include(parameters/id.md) -->
+ Request Rules:
    {
        "text": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "text": officia (string),

    }
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Sentence successfully updated (string)
        + data: (Sentence)

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
        + data: (Sentence)

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
        + message: Sentence successfully deleted (string)
        + data: null

<!-- include(response/401.md) -->
<!-- include(response/404.md) -->
<!-- include(response/500.md) -->

## ======= [/sentences/paginate?page={page}&pagination={pagination}]
### Paginated items [GET]
<!-- include(parameters/pagination.md) -->
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Sentence, Sentence])
        + meta
            + pagination (Pagination)

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->


