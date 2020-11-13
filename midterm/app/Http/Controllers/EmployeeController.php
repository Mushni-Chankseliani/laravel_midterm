<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployees() {
        $data = Employee::orderBy('id', 'DESC')->get();

        return view('pages.employees-page')->with('employees', $data);
    } 
    
    public function createEmployee(Request $request) {
        Employee::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'personal_id' => $request->personal_id,
            'salary' => $request->salary,
        ]);

        return redirect()->back();
    }

    public function deleteEmployee(Request $request) {
        Employee::where('id', $request->id)->delete();

        return redirect()->back();
    }

    public function editEmployee($id) {
        $data = Employee::where('id', $id)->firstOrFail();
        return view('edit.employee-edit')->with('employee', $data);
    }

    public function updateEmployee(Request $request) {
        Employee::where('id', $request->id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'personal_id' => $request->personal_id,
            'salary' => $request->salary,
        ]);

        return redirect()->back();
    }
}
