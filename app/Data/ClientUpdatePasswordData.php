<?php

namespace App\Data;

use Spatie\DataTransferObject\DataTransferObject;

class ClientUpdatePasswordData extends DataTransferObject
{
    public string $password;
}
