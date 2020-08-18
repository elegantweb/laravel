<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Http\DataTables\Admin\EmployeeDataTable;
use App\Http\Requests\Admin\EmployeeUpdateRequest;
use App\Http\Requests\Admin\EmployeeUpdatePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employees.index');
    }

    public function dataTables()
    {
        return new EmployeeDataTable(Employee::query());
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return back()->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(EmployeeUpdatePasswordRequest $request, Employee $employee)
    {
        $input = $request->validated();

        $attributes = [];
        $attributes['password'] = bcrypt($input['password']);

        $employee->update($attributes);

        return back()->with('status:success', 'User successfully updated.');
    }
}
