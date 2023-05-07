<?php

namespace App\Data;

readonly class EmployeeUpdateData
{
    public function __construct(
        public string $name,
        public string $email,
    ) {
    }
}
