<?php

namespace App\Actions;

use App\Models\Employee;
use App\Data\EmployeeUpdatePasswordData;

class EmployeeUpdatePasswordAction
{
    public function execute(Employee $employee, EmployeeUpdatePasswordData $data): void
    {
        $employee->password = bcrypt($data->password);
        $employee->save();
    }
}
