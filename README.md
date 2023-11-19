# invoicing REST Backend API.

## How to add new Items
Route: localhost:8000/api/items

Method:post

Parameters to pass to the route:

name = Supacem

quantity = 30

price = 5

id = 5

## How to get all items

Route: localhost:8000/api/items

Method: get

## How to get single Item

Route: localhost:8000/api/items/1

Method: get

## How to update items

Route: localhost:8000/api/items

Method: put

Parameters to pass to the route:

name = Supacem

quantity = 30

price = 5

id = 8

## How to delete an Item

Route: localhost:8000/api/items/4

Method: delete

## How to add a new InvoiceItem
Route: localhost:8000/api/invoice_items

Method: post

Parameters to pass to the route:

item_id = 1

invoice_id = 1

description = diamond

unit_price = 55

quantity = 3

amount = 1000

## How to get all InvoiceItems

Route: localhost:8000/api/invoices

Method: get

## How to get single InvoiceItems

Route: localhost:8000/api/invoice_items/1

Method: get

## How to update InvoiceItem

Route: localhost:8000/api/invoice_items

Method: put

item_id = 1

invoice_id = 1

description = diamond

unit_price = 55

quantity = 3

amount = 1000

## How to delete InvoiceItems

Rote: localhost:8000/api/invoice_items/1

Method: delete


## How to add a new Invoices
Route: localhost:8000/api/invoices

Method: post

Parameters to pass to the route:

issue_date = 2023-11-04

due_date = 2023-11-20

customer_id = 1

id = 1


## How to get all Invoices

Route: localhost:8000/api/invoices

Method: get

## How to get single Invoices

Route: localhost:8000/api/invoices/1

Method: get

## How to update Invoices

Route: localhost:8000/api/invoices

Method: put

Parameters to pass to the route:

issue_date = 2023-11-04

due_date = 2023-11-20

customer_id = 1

id = 1



## How to delete Invoices

Route: localhost:8000/api/invoices/1

Method: delete

## Install Dependencies

    composer update

## Run Migration

    php artisan migrate

## Running the Application

    php artisan serve

