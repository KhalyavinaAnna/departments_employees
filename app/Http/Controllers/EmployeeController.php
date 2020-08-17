<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Department;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employees = Employee::paginate(5);
      return view('employees.employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $departments = Department::get();
       return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic' => 'nullable',
            'sex' => 'nullable',
            'salary' => 'nullable|numeric',
            'department' => 'required'
        ]);

       $employee = new Employee();
       $employee->fill($data);
       $employee->save();
       $employee->departments()->attach($request->input('department'));
       
        return redirect('employees')->with('success', 'Данные сохранены!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $departments = Department::get();
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'),compact('departments')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic' => 'nullable',
            'sex' => 'nullable',
            'salary' => 'nullable|numeric',
            'department' => 'required'
        ]);

        $employee = Employee::findOrFail($id);
        $employee->fill($data);
        $employee->save();
        $employee->departments()->sync();
        //if($request->input('department')) {
        //$employee->departments()->attach($request->input('department'));
        //}

        return redirect('employees')->with('success', 'Данные сохранены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->departments()->detach();
        $employee->delete();
        return redirect('employees')->with('success', 'Запись удалена!');
    }
}
