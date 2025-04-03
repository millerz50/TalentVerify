<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json(['message' => 'Employee created!', 'data' => $employee]);
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json(['message' => 'Employee updated!', 'data' => $employee]);
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json(['message' => 'Employee deleted!']);
    }
}
?>