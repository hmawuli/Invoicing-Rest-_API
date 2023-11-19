<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = Customer::all();
        return response()->json($customer);
    }

    public function storeCustomer(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "email" => "required|unique",
                "phone" => "string|nullable",
                "address" => "string|nullable"
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $customer = Customer::create($request->all()); //this is the function that create
        return response()->json($customer, 201);
    }

    public function updateCustomer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "email" => "required|unique",
                "phone" => "string|nullable",
                "address" => "string|nullable"
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $customer = Customer::find($request->id);

        $customer->name = $request["name"];
        $customer->email = $request["email"];
        $customer->phone = $request["phone"];
        $customer->address = $request["address"];

        $customer->save();
        return response()->json($customer, 200);

    }

    public function deleteCustomer(Request $request, $id)
    {
        //this is the validation functions
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

        $customer = Customer::find($id);

        $customer->delete();

        return response()->json($customer, 204);
    }

    public function getCustomer(Request $request,$id){
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
        $customer = Customer::find($id);
        return response()->json($customer, 200);

    }

}
