<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('stock_code', 'asc')->paginate(25);
        return view('dashboard.inventory.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'stock_type' => 'required',
            'inventory_type' => 'required',
            'material_unit' => 'required',
            'name' => 'required',
            'stock_code' => 'required|unique:item_records',
            'description' => 'required',
            'initial_stocks' => 'required'
        ]);

        if ($request->inventory_type !== 1) {
            $request->material_unit = 'null';
        }


        $item = new Item;
        $item->stock_type = $request->input('stock_type');
        $item->inventory_type = $request->input('inventory_type');
        $item->material_unit = $request->input('material_unit');
        $item->name = ucwords(strtolower($request->input('name')));
        $item->stock_code = ucwords(strtolower($request->input('stock_code')));
        $item->description = ucwords(strtolower($request->input('description')));
        $item->initial_stocks = ucwords(strtolower($request->input('initial_stocks')));
        $item->remaining_stocks = ucwords(strtolower($request->input('initial_stocks')));
        $item->save();

        return redirect('/home/items')->with('success', 'New entry has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if(empty($item)) {
            return abort(404);
        } else {
            return view('dashboard.inventory.show')->with('item', $item);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        if(empty($item)) {
            return abort(404);
        } else {
            return view('dashboard.inventory.edit')->with('item', $item);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'stock_type' => 'required',
            'inventory_type' => 'required',
            'material_unit' => 'required',
            'name' => 'required',
            'stock_code' => 'required',
            'description' => 'required',
            'initial_stocks' => 'required',
            'remaining_stocks' => 'required'
        ]);

        if ($request->inventory_type !== 1) {
            $request->material_unit = 'null';
        }

        $item = Item::find($id);
        $item->stock_type = $request->input('stock_type');
        $item->inventory_type = $request->input('inventory_type');
        $item->material_unit = $request->input('material_unit');
        $item->name = ucwords(strtolower($request->input('name')));
        $item->stock_code = ucwords(strtolower($request->input('stock_code')));
        $item->description = ucwords(strtolower($request->input('description')));
        $item->initial_stocks = ucwords(strtolower($request->input('initial_stocks')));
        $item->remaining_stocks = ucwords(strtolower($request->input('remaining_stocks')));
        $item->save();

        return redirect('/home/items')->with('success', 'Entry has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        if (DB::table('borrow_records')->where('item_id', $id)->count() > 0) {
            DB::table('borrow_records')->where('item_id', $id)->delete();
        }

        return redirect('/home/items')->with('success', 'Entry has been deleted.');
    }

    /**
     * Custom functions
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function decrement(Request $request)
    {
        if($request->ajax())
        {
            $id = (int) $request->id;
            $value = (int) $request->value;
            $query = DB::table('item_records')->where('id', $id);
            $query->decrement('remaining_stocks', $value);

            return "success";
        }
    }
}
