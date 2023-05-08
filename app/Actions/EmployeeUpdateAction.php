<?php

namespace App\Actions;

use App\Models\Employee;
use App\Data\EmployeeUpdateData;

class EmployeeUpdateAction
{
    public function execute(Employee $employee, EmployeeUpdateData $data): void
    {
        $employee->name = $data->name;
        $employee->email = $data->email;
        $employee->save();
    }
}
