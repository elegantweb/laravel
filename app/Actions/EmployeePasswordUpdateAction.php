<?php

namespace App\Actions;

use App\Models\Employee;
use App\Data\EmployeePasswordUpdateData;

class EmployeePasswordUpdateAction
{
    public function execute(Employee $employee, EmployeePasswordUpdateData $data): void
    {
        $employee->password = bcrypt($data->password);
        $employee->save();
    }
}
