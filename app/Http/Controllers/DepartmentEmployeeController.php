<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Department;

use Illuminate\Http\Request;

class DepartmentEmployeeController extends Controller
{
   public function getMainPage()
   {
    $departments = Department::get();
    $employees = Employee::paginate(10);
    return view('index', compact('departments', 'employees'));  
   }
}
