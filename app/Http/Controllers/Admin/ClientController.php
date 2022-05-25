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
use App\Actions\ClientStoreAction;
use App\Actions\ClientUpdateAction;
use App\Actions\ClientUpdatePasswordAction;
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

    public function store(ClientStoreRequest $request, ClientStoreAction $action)
    {
        $data = new ClientData($request->validated());

        $client = $action->execute($data);

        return redirect()->route('admin.clients.edit', $client)
                        ->with('status:success', 'User successfully stored.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(
        ClientUpdateRequest $request,
        Client $client,
        ClientUpdateAction $action,
    ) {
        $data = new ClientUpdateData($request->validated());

        $action->execute($client, $data);

        return back()->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(
        ClientUpdatePasswordRequest $request,
        Client $client,
        ClientUpdatePasswordAction $action,
    ) {
        $data = new ClientUpdatePasswordData($request->validated());

        $action->execute($client, $data);

        return back()->with('status:success', 'User successfully updated.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')
                        ->with('status:success', 'User successfully removed.');
    }
}
