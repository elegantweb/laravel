<?php

namespace App\Domain\Clients\Data;

use Spatie\DataTransferObject\DataTransferObject;

class ClientData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
}
