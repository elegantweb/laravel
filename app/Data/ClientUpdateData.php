<?php

namespace App\Data;

readonly class ClientUpdateData
{
    public function __construct(
        public string $name,
        public string $email,
    ) {
    }
}
