<?php

namespace App\Data;

use Spatie\DataTransferObject\DataTransferObject;

class ClientUpdateData extends DataTransferObject
{
    public string $name;
    public string $email;
}
