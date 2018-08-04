<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use DB;

class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.borrow.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.borrow.create');
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
            'name_selection' => 'required',
            'item_selection' => 'required',
            'borrow_number' => 'required'
        ]);

        $borrow = new Borrow;
        $borrow->item_id = $request->input('item_selection');
        $borrow->user_id = $request->input('name_selection');
        $borrow->borrowed = $request->input('borrow_number');
        $borrow->save();

        DB::table('item_records')->where('id', $borrow->item_id)->decrement('remaining_stocks', $borrow->borrowed);
        return redirect('/home/items')->with('success', 'New item has been borrowed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrow = Borrow::find($id);
        $items = DB::table('item_records')->where('id', '=', $borrow->item_id)->get();
        if(empty($borrow)) {
            return abort(404);
        } else {
            return view('dashboard.borrow.show')->with('borrow', $borrow)->with('item', $items[0]);
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
        $borrow = Borrow::find($id);
        $items = DB::table('item_records')->where('id', '=', $borrow->item_id)->get();
        if(empty($borrow)) {
            return abort(404);
        } else {
            return view('dashboard.borrow.edit')->with('borrow', $borrow)->with('item', $items[0]);
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
            'return_number' => 'required'
        ]);

        DB::table('item_records')->where('id', $request->item_id)->increment('remaining_stocks', $request->return_number);
        DB::table('borrow_records')->where('item_id', $request->item_id)->increment('returned', $request->return_number);

        $borrow = Borrow::find($id);
        if($borrow->borrowed == $borrow->returned) {
            $borrow->status = 1;
        } else {
            $borrow->status = 0;
        }
        $borrow->save();

        return redirect('/home/borrow')->with('success', 'Record has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow = Borrow::find($id);
        $take_back = abs((int) $borrow->borrowed - (int) $borrow->returned);

        DB::table('item_records')->where('id', $borrow->item_id)->increment('remaining_stocks', $take_back);
        $borrow->delete();

        return redirect('/home/borrow')->with('success', 'Borrowed Item\'s Record has been deleted.');
    }

    /**
     * Custom functions
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output = "";
            $items = DB::table('item_records')->where('name', 'LIKE', '%'.$request->search.'%')->where('remaining_stocks', '>', '0')->get();
            if($items)
            {
                foreach($items as $item) {
                    $output .= '<option value="'.$item->id.'" data-max="'.$item->remaining_stocks.'">'.$item->name.' | Remaining Stocks ('.$item->remaining_stocks.')</option>';
                }
                return Response($output);
            }
        }
    }

    public function employeerecords(Request $request)
    {
        if($request->ajax())
        {
            $output = "";
            $items = DB::table('borrow_records')->where('user_id', \'LIKE', '%'.$request->name_selection.'%')->get();
            if($items)
            {
                foreach($items as $item) {
                    $item_stats = DB::table('item_records')->where('id', '=', $item->item_id)->get(['name']);
                    $status = 'NOT';
                    if($item->status > 0) {
                        $status = 'Cleared';
                    }
                    $output.='<tr>'.
                        '<td>'.$item_stats[0]->name.'</td>'.
                        '<td>'.$status.'</td>'.
                        '<td>'.$item->borrowed.'</td>'.
                        '<td>'.$item->returned.'</td>'.
                        '<td>'.$item->created_at.'</td>'.
                        '<td>'.$item->updated_at.'</td>'.
                        '<td>
                            <a href="borrow/'.$item->borrow_id.'/edit" class="btn btn-primary">Edit</a>
                            <a href="borrow/'.$item->borrow_id.'" class="btn btn-primary">Record</a>
                        </td>'.

                        '</tr>';
                }
                return Response($output);
            }
        }
    }

    public function employeenames(Request $request)
    {
        if($request->ajax())
        {
            $output = "";
            $employees = DB::table('employees')->where('name', 'LIKE', '%'.$request->name_search.'%')->get();
            if($employees)
            {
                foreach($employees as $employee) {
                    $output .= '<option value="'.$employee->id.'">'.$employee->name.'</option>';
                }
                return Response($output);
            }
        }
    }
}
