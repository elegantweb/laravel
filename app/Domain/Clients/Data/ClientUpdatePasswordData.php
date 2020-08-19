<?php

namespace App\Domain\Clients\Data;

use Spatie\DataTransferObject\DataTransferObject;

class ClientUpdatePasswordData extends DataTransferObject
{
    public string $password;
}
