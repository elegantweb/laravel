<?php

namespace App\Http\Controllers\Web\Admin\Panel;

use App\Models\User;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.panel.users.index');
    }

    public function datatables()
    {
        return datatables()->of(User::query())
                           ->addColumn('actions', 'admin.panel.users.datatables.actions')
                           ->rawColumns(['actions'])
                           ->toJson();
    }

    public function edit(User $user)
    {
        return view('admin.panel.users.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        $input = $request->validated();

        $attributes = [];
        $attributes['password'] = bcrypt($input['password']);

        $user->update($attributes);

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }
}
