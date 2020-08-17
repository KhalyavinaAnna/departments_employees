<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $departments = Department::with('employees')->paginate(5);
     return view('departments.departments', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('departments.create'); 
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
            'department' => 'required|unique:departments'
          
        ]);

       $department = new Department;
       $department->fill($data);
       
        $department->save();
        return redirect('departments')->with('success', 'Данные сохранены!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'department' => 'required|unique:departments'
          
        ]);
        $department = Department::findOrFail($id);
        $department->fill($data);

        $department->save();
        return redirect('departments')->with('success', 'Данные сохранены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = new Employee();
        $department = Department::findOrFail($id);
        
        $department->employees()->detach();
        $department->delete();

        return redirect('departments')->with('success', 'Запись удалена!');
    }
}
