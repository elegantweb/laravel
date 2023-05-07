<?php

namespace App\Data;

readonly class ClientPasswordUpdateData
{
    public function __construct(
        public string $password,
    ) {
    }
}
