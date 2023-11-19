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
                "customer_id" => "required|exists:customer,id",
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
                "customer_id" => "required|exists:customer,id",
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

        $invoices->customer_id = $request['customer_id'];
        $invoices->issue_date = $request['issue_date'];
        $invoices->due_date = $request['due_date'];

        $invoices->save();
        return response()->json($invoices, 200);
    }

    public function deleteInvoices(Request $request, $id)
    {
        //this is the validation functions
        $validator = Validator::make(
            ["id" => $id],
            [
                "id" => "required|exists:customer"
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
                "id" => "required|exists:customer"
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
