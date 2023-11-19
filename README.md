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

## How to get single Item

Route: localhost:8000/api/items/1
Method: get

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



## How to add a new Invoices
Route: localhost:8000/api/invoices

Parameters to pass to the route:
issue_date = 2023-11-04
due_date = 2023-11-20
customer_id = 1

## Install Dependencies

    composer update

## Run Migration

    php artisan migrate

## Running the Application

    php artisan serve

