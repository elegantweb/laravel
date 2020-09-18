<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Http\DataTables\Admin\EmployeeDataTable;
use App\Http\Requests\Admin\EmployeeUpdateRequest;
use App\Http\Requests\Admin\EmployeeUpdatePasswordRequest;
use App\Data\EmployeeUpdateData;
use App\Data\EmployeeUpdatePasswordData;
use App\Jobs\EmployeeUpdate;
use App\Jobs\EmployeeUpdatePassword;
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

    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $data = new EmployeeUpdateData($request->validated());

        EmployeeUpdate::dispatchNow($employee, $data);

        return back()->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(EmployeeUpdatePasswordRequest $request, Employee $employee)
    {
        $data = new EmployeeUpdatePasswordData($request->validated());

        EmployeeUpdatePassword::dispatchNow($employee, $data);

        return back()->with('status:success', 'User successfully updated.');
    }
}
