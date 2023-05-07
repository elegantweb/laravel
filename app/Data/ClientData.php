<?php

namespace App\Data;

readonly class ClientData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
