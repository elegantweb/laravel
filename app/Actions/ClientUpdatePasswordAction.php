<?php

namespace App\Actions;

use App\Models\Client;
use App\Data\ClientUpdatePasswordData;

class ClientUpdatePasswordAction
{
    public function execute(Client $client, ClientUpdatePasswordData $data): void
    {
        $client->password = bcrypt($data->password);
        $client->save();
    }
}
