<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ClientData extends Data
{
    public string $name;
    public string $email;
    public string $password;
}
