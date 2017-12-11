## ======= [/students]

### Get all items [GET]
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Student, Student])

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->
### Create item [POST]
+ Request Rules:
    {
        "name": 'required',
        "nick": 'required',
        "gender": 'required|in:'.StudentGenders::stringify(),

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "name": repellat (string),
            "nick": omnis (string),
            "gender": enum1 (enum),

    }
+ Response 201 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Student successfully created (string)
        + data: (Student)

<!-- include(response/401.md) -->
<!-- include(response/422.md) -->
<!-- include(response/500.md) -->

## ======= [/students/{id}]
### Update item [PUT]
<!-- include(parameters/id.md) -->
+ Request Rules:
    {
        "name": 'required',
        "nick": 'required',
        "gender": 'required|in:'.StudentGenders::stringify(),

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "name": nemo (string),
            "nick": consequatur (string),
            "gender": enum1 (enum),

    }
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Student successfully updated (string)
        + data: (Student)

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
        + data: (Student)

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
        + message: Student successfully deleted (string)
        + data: null

<!-- include(response/401.md) -->
<!-- include(response/404.md) -->
<!-- include(response/500.md) -->

## ======= [/students/paginate?page={page}&pagination={pagination}]
### Paginated items [GET]
<!-- include(parameters/pagination.md) -->
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[Student, Student])
        + meta
            + pagination (Pagination)

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->


