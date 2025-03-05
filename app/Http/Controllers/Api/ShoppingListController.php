<?php

namespace App\Http\Controllers\Api;

use App\Models\ShoppingList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingListController extends Controller
{
    public function index()
    {
        $list = ShoppingList::all();
        return response()->json($list, 200);
    }

    public function store(Request $request)
    {
        $existing = ShoppingList::where('name', '=', $request->name)->first();

        if ($existing ){
            return 'this product exists';
        }

        $list = ShoppingList::create([
            'name' => $request->name,
        ]);

        $list->save();
        return response()->json($list, 200);
    }

    public function show(string $id)
    {
        $list = ShoppingList::find($id);
        return response()->json($list, 200);
    }

    public function update(Request $request, string $id)
    {
        $list = ShoppingList::find($id);

        $list -> update([
            'name' => $request->name,
        ]);
        $list->save();
        return response()->json($list, 200);
    }

    public function destroy(string $id)
    {
        $list = ShoppingList::find($id);
        $list->delete();
    }

    public function destroyAll()
    {
        $list = ShoppingList::all();

        foreach($list as $element){
            $element->delete();
        }
    }
}
