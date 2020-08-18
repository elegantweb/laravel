<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\DataTables\Admin\ClientDataTable;
use App\Http\Requests\Admin\ClientStoreRequest;
use App\Http\Requests\Admin\ClientUpdateRequest;
use App\Http\Requests\Admin\ClientUpdatePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $input = $request->validated();

        $attributes = $input;
        $attributes['password'] = bcrypt($input['password']);

        $client = Client::create($attributes);

        return redirect()->route('admin.clients.edit', $client)
                        ->with('status:success', 'User successfully stored.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());

        return back()->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(ClientUpdatePasswordRequest $request, Client $client)
    {
        $input = $request->validated();

        $attributes = $input;
        $attributes['password'] = bcrypt($input['password']);

        $client->update($attributes);

        return back()->with('status:success', 'User successfully updated.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')
                        ->with('status:success', 'User successfully removed.');
    }
}
