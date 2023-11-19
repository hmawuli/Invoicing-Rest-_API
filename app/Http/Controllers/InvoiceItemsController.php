<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Invoice_Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceItemsController extends Controller
{
    public function index(Request $request)
    {
        $invoice_items = Invoice_Items::all();
        return response()->json($invoice_items);

    }

    public function getInvoiceItems(Request $request, $id)
    {
        $validator = Validator::make(
            ["id" => $id],
            ["id" => "required|integer|exists:invoice_items"],
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $invoice_items = Invoice_Items::find($id);
        return response()->json($invoice_items, 200);
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "item_id" => "required|exists:items,id",
                "invoice_id" => "required|exists:invoices,id",
                "description" => "required|string",
                "unit_price" => "required|numeric",
                "quantity" => "required|numeric",
                "amount" => "required|numeric"

            ],

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $isOver = $this->isQuantityOver($request->quantity, $request->item_id);

        if ($isOver) {
            return response()->json(["status" => false, "message" => "quantity over"], 201);
        } else {
            $invoice_items = Invoice_Items::create($request->all()); //this is the function that create
            $item = Items::find($request->item_id);
            $item->quantity = $item->quantity - $request->quantity;
            $item->save();
            return response()->json($invoice_items, 201);
        }


    }

    public function isQuantityOver($quantity, $item_id): bool
    {
        // Get the related item
        $item = Items::find($item_id);

        // Check if the quantity in the invoice item is greater than the available quantity in the item
        if ($quantity <= $item->quantity) {
            return false;
        } else {
            return true;
        }
    }

    public function update(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [

                "item_id" => "required|exists:items,id",
                "invoice_id" => "required|exists:invoices,id",
                "description" => "required|string",
                "unit_price" => "required|numeric",
                "quantity" => "required|numeric",
                "amount" => "required|numeric"

            ],

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $invoice_items = Invoice_Items::find($request->id);

        $invoice_items->invoice_id = $request['invoice_id'];
        $invoice_items->description = $request['description'];
        $invoice_items->quantity = $request['quantity'];
        $invoice_items->amount = $request['amount'];

        $invoice_items->save();
        return response()->json($invoice_items, 200);
    }

    public function destroy(Request $request, $id)
    {
        //this is the validation functions
        $validator = Validator::make(
            ["id" => $id],
            [
                "id" => "required|integer|exists:invoice_items"
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $invoice_items = Invoice_Items::find($id);

        $invoice_items->delete();

        return response()->json($invoice_items, 204);
    }

}


