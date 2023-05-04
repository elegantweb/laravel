<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Http\DataTables\Admin\EmployeeDataTable;
use App\Http\Requests\Admin\EmployeeUpdateRequest;
use App\Http\Requests\Admin\EmployeePasswordUpdateRequest;
use App\Data\EmployeeUpdateData;
use App\Data\EmployeePasswordUpdateData;
use App\Actions\EmployeeUpdateAction;
use App\Actions\EmployeePasswordUpdateAction;
use App\Http\Controllers\Controller;

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

    public function update(
        EmployeeUpdateRequest $request,
        Employee $employee,
        EmployeeUpdateAction $action,
    ) {
        $data = new EmployeeUpdateData($request->validated());

        $action->execute($employee, $data);

        return back()->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(
        EmployeePasswordUpdateRequest $request,
        Employee $employee,
        EmployeePasswordUpdateAction $action,
    ) {
        $data = new EmployeePasswordUpdateData($request->validated());

        $action->execute($employee, $data);

        return back()->with('status:success', 'User successfully updated.');
    }
}
