<?php

namespace App\Actions;

use App\Models\Client;
use App\Data\ClientPasswordUpdateData;

class ClientPasswordUpdateAction
{
    public function execute(Client $client, ClientPasswordUpdateData $data): void
    {
        $client->password = bcrypt($data->password);
        $client->save();
    }
}
