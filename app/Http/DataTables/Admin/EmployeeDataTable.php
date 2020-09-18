<?php

namespace App\Http\DataTables\Admin;

use App\Models\Employee;
use Elegant\DataTables\Model;

class EmployeeDataTable extends Model
{
    protected $addon = ['actions'];
    protected $raw = ['actions'];
    protected $exclude = ['password', 'remember_token'];
    protected $blacklist = ['password', 'remember_token'];

    public function columnActions(Employee $employee)
    {
        return view('admin.employees.dataTables.actions', compact('employee'));
    }
}
