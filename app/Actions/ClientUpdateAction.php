<?php

namespace App\Actions;

use App\Models\Client;
use App\Data\ClientUpdateData;

class ClientUpdateAction
{
    public function execute(Client $client, ClientUpdateData $data): void
    {
        $client->name = $data->name;
        $client->email = $data->email;
        $client->save();
    }
}
