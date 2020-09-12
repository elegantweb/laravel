<?php

namespace App\Admin\Clients\DataTables;

use App\Domain\Clients\Models\Client;
use Elegant\DataTables\Model;

class ClientDataTable extends Model
{
    protected $addon = ['actions'];
    protected $raw = ['actions'];
    protected $exclude = ['password', 'remember_token'];
    protected $blacklist = ['password', 'remember_token'];

    public function columnActions(Client $client)
    {
        return view('admin.clients.dataTables.actions', compact('client'));
    }
}
