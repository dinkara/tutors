## ======= [/supportTickets]

### Get all items [GET]
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[SupportTicket, SupportTicket])

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->
### Create item [POST]
+ Request Rules:
    {
        "title": 'required',
        "category": 'required|in:'.SupportTicketCategories::stringify(),
        "content": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "title": corrupti (string),
            "category": enum1 (enum),
            "content": alias (string),

    }
+ Response 201 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: SupportTicket successfully created (string)
        + data: (SupportTicket)

<!-- include(response/401.md) -->
<!-- include(response/422.md) -->
<!-- include(response/500.md) -->

## ======= [/supportTickets/{id}]
### Update item [PUT]
<!-- include(parameters/id.md) -->
+ Request Rules:
    {
        "title": 'required',
        "category": 'required|in:'.SupportTicketCategories::stringify(),
        "content": 'required',

    }
+ Request (application/json)
    <!-- include(request/header.md) -->
    + Body
    {
            "title": eveniet (string),
            "category": enum1 (enum),
            "content": nisi (string),

    }
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: SupportTicket successfully updated (string)
        + data: (SupportTicket)

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
        + data: (SupportTicket)

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
        + message: SupportTicket successfully deleted (string)
        + data: null

<!-- include(response/401.md) -->
<!-- include(response/404.md) -->
<!-- include(response/500.md) -->

## ======= [/supportTickets/paginate?page={page}&pagination={pagination}]
### Paginated items [GET]
<!-- include(parameters/pagination.md) -->
+ Request (application/json)
    <!-- include(request/header.md) -->
+ Response 200 (application/json)
    + Attributes         
        + success: true (boolean)
        + message: Ok (string)
        + data: (array[SupportTicket, SupportTicket])
        + meta
            + pagination (Pagination)

<!-- include(response/401.md) -->
<!-- include(response/500.md) -->


