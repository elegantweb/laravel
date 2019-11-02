<?php

namespace App\Http\Controllers\Admin;

use App\Enduser;
use App\Http\DataTables\Admin\EnduserDataTable;
use App\Http\Requests\Admin\EnduserStoreRequest;
use App\Http\Requests\Admin\EnduserUpdateRequest;
use App\Http\Requests\Admin\EnduserUpdatePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnduserController extends Controller
{
    public function index()
    {
        return view('admin.endusers.index');
    }

    public function datatables()
    {
        return new EnduserDataTable(Enduser::query());
    }

    public function create()
    {
        return view('admin.endusers.create');
    }

    public function store(EnduserStoreRequest $request)
    {
        $enduser = Enduser::create($request->validated());

        return redirect()->route('admin.endusers.edit', [$enduser])
                         ->with('status:success', 'User successfully stored.');
    }

    public function edit(Enduser $enduser)
    {
        return view('admin.endusers.edit', compact('enduser'));
    }

    public function update(EnduserUpdateRequest $request, Enduser $enduser)
    {
        $enduser->update($request->validated());

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(EnduserUpdatePasswordRequest $request, Enduser $enduser)
    {
        $input = $request->validated();

        $attributes = [];
        $attributes['password'] = bcrypt($input['password']);

        $enduser->update($attributes);

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }

    public function destroy(Enduser $enduser)
    {
        $enduser->delete();

        return redirect()->route('admin.endusers.index')
                         ->with('status:success', 'User successfully removed.');
    }
}
