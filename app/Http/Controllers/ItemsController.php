<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $items = Items::all();
        return response()->json($items);
    }
    public function storeItems(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "quantity" => "required",
                "price" => "required"
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $items = Items::create($request->all());
        return response()->json($items, 201);
    }

    public function updateItems(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
               "id" => "required",
                "name" => "required",
                "quantity" => "required",
                "price" => "required"
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $items = Items::find($request->id);

        $items->id = $request['id'];
        $items->name = $request['name'];
        $items->quantity = $request['quantity'];
        $items->price = $request['price'];

        $items->save();
        return response()->json($items, 200);
    }
    public function deleteItems(Request $request, $id)
    {
        //this is the validation functions
        $validator = Validator::make(
            ["id" => $id],
            [
                "id" => "required|integer|exists:items"
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $items = Items::find($id);
        $items->delete();
        return response()->json($items, 204);

    }

    public function getItems(Request $request,$id){
        //this is the validation functions
        $validator = Validator::make(
            ["id" => $id],
            [
                "id" => "required|integer|exists:items"
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }
        $items = Items::find($id);
        return response()->json($items,200);
    }
}
