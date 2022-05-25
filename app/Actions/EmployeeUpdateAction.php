<?php

namespace App\Actions;

use App\Models\Employee;
use App\Data\EmployeeUpdateData;

class EmployeeUpdateAction
{
    public function execute(Employee $employee, EmployeeUpdateData $data): void
    {
        $attrs = $data->toArray();

        $employee->update($attrs);
    }
}
