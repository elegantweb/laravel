<?php

namespace App\Actions;

use App\Models\Client;
use App\Data\ClientData;

class ClientStoreAction
{
    public function execute(ClientData $data): Client
    {
        $client = new Client();
        $client->name = $data->name;
        $client->email = $data->email;
        $client->password = bcrypt($data->password);
        $client->save();

        return $client;
    }
}
