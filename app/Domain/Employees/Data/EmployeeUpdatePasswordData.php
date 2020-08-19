<?php

namespace App\Domain\Employees\Data;

use Spatie\DataTransferObject\DataTransferObject;

class EmployeeUpdatePasswordData extends DataTransferObject
{
    public string $password;
}
