<?php

namespace App\Admin\Employees\Controllers;

use App\Domain\Employees\Models\Employee;
use App\Admin\Employees\DataTables\EmployeeDataTable;
use App\Admin\Employees\Requests\EmployeeUpdateRequest;
use App\Admin\Employees\Requests\EmployeeUpdatePasswordRequest;
use App\Domain\Employees\Data\EmployeeUpdateData;
use App\Domain\Employees\Data\EmployeeUpdatePasswordData;
use App\Domain\Employees\Jobs\EmployeeUpdate;
use App\Domain\Employees\Jobs\EmployeeUpdatePassword;
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
