<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\DataTables\Admin\ClientDataTable;
use App\Http\Requests\Admin\ClientStoreRequest;
use App\Http\Requests\Admin\ClientUpdateRequest;
use App\Http\Requests\Admin\ClientUpdatePasswordRequest;
use App\Data\ClientData;
use App\Data\ClientUpdateData;
use App\Data\ClientUpdatePasswordData;
use App\Jobs\ClientCreate;
use App\Jobs\ClientUpdate;
use App\Jobs\ClientUpdatePassword;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        return view('admin.clients.index');
    }

    public function dataTables()
    {
        return new ClientDataTable(Client::query());
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(ClientStoreRequest $request)
    {
        $data = new ClientData($request->validated());

        $client = ClientCreate::dispatchNow($data);

        return redirect()->route('admin.clients.edit', $client)
                        ->with('status:success', 'User successfully stored.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientUpdateRequest $request, Client $client)
    {
        $data = new ClientUpdateData($request->validated());

        ClientUpdate::dispatchNow($client, $data);

        return back()->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(ClientUpdatePasswordRequest $request, Client $client)
    {
        $data = new ClientUpdatePasswordData($request->validated());

        ClientUpdatePassword::dispatchNow($client, $data);

        return back()->with('status:success', 'User successfully updated.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')
                        ->with('status:success', 'User successfully removed.');
    }
}
