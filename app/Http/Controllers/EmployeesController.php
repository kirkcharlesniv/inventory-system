<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('name', 'asc')->paginate(25);
        return view('dashboard.employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employees.create');
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
            'name' => 'required|unique:employees',
            'id_num' => 'required|unique:employees',
            'address' => 'required',
            'phone' => 'required|unique:employees|min:13|max:13',
            'tin_number' => 'required|unique:employees',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
//        $path = $request->file('picture')->store(
//            'images/'.$imageName, 's3'
//        );

        $storagePath = Storage::disk('s3')->put("images", $request->file('picture'), 'public');

        $employee = new Employee;
        $employee->name = ucwords(strtolower($request->input('name')));
        $employee->id_num = strtoupper($request->input('id_num'));
        $employee->address = ucwords(strtolower($request->input('address')));
        $employee->phone = ucwords(strtolower($request->input('phone')));
        $employee->tin_number = $request->input('tin_number');
        $employee->picture = $storagePath;
        $employee->save();

        return redirect('/home/employees')->with('success', 'New employee has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if(!empty($item)) {
            return abort(404);
        } else {
            return view('dashboard.employees.show')->with('employee', $employee);
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
        $employee = Employee::find($id);
        if(!empty($item)) {
            return abort(404);
        } else {
            return view('dashboard.employees.edit')->with('employee', $employee);
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
            'name' => 'required',
            'id_num' => 'required',
            'address' => 'required',
            'phone' => 'required|min:13|max:13',
            'tin_number' => 'required'
        ]);

        $employee = Employee::find($id);
        $employee->name = ucwords(strtolower($request->input('name')));
        $employee->id_num = $request->input('id_num');
        $employee->address = ucwords(strtolower($request->input('address')));
        $employee->phone = ucwords(strtolower($request->input('phone')));
        $employee->tin_number = ucwords(strtolower($request->input('tin_number')));
        $employee->save();

        return redirect('/home/employees')->with('success', 'New employee has been updated.');
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
        $employee = Employee::find($id);
        $employee->delete();

        if (DB::table('borrow_records')->where('user_id', $id)->count() > 0) {
            DB::table('borrow_records')->where('user_id', $id)->delete();
        }

        return redirect('/home/employees')->with('success', 'Employee has been deleted.');
    }
}
