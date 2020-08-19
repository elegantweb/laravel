<?php

namespace App\Domain\Clients\Data;

use Spatie\DataTransferObject\DataTransferObject;

class ClientUpdateData extends DataTransferObject
{
    public string $name;
    public string $email;
}
