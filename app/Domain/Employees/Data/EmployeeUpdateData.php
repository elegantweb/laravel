<?php

namespace App\Domain\Employees\Data;

use Spatie\DataTransferObject\DataTransferObject;

class EmployeeUpdateData extends DataTransferObject
{
    public string $name;
    public string $email;
}
