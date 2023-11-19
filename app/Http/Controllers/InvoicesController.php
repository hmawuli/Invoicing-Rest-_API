<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoicesController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoices::all();
        return response()->json($invoices);
    }

    public function storeInvoices(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "customer_id" => "required",
                "issue_date" => "required|date",
                "due_date" => "required|date",
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $invoices = Invoices::create($request->all()); //this is the function that create
        return response()->json($invoices, 201);
    }


    public function updateInvoices(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "customer_id" => "required",
                "issue_date" => "required|date",
                "due_date" => "required|date",
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $invoices = Invoices::find($request->id);

        $invoices->invoice_id = $request['invoice_id'];
        $invoices->description = $request['description'];
        $invoices->quantity = $request['quantity'];
        $invoices->amount = $request['amount'];

        $invoices->save();
        return response()->json($invoices, 200);
    }

    public function destoryInvoices(Request $request, $id)
    {
        //this is the validation functions
        $validator = Validator::make(
            ["id" => $id],
            [
                "id" => "required|integer|exists:invoices"
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $invoices = Invoices::find($id);

        $invoices->delete();

        return response()->json($invoices, 204);

    }

    public function getInvoices(Request $request, $id)
    {
        $validator = Validator::make(
            ["id" => $id],
            [
                "id" => "required|integer|exists:customer"
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $invoices = Invoices::find($id);
        return response()->json($invoices, 200);
    }
}
