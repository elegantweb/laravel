<?php

namespace App\Data;

use Spatie\DataTransferObject\DataTransferObject;

class ClientData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
}
