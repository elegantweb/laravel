<?php

namespace App\Data;

readonly class EmployeePasswordUpdateData
{
    public function __construct(
        public string $password,
    ) {
    }
}
