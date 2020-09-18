<?php

namespace App\Data;

use Spatie\DataTransferObject\DataTransferObject;

class EmployeeUpdatePasswordData extends DataTransferObject
{
    public string $password;
}
