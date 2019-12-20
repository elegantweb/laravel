<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\DataTables\Admin\UserDataTable;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Requests\Admin\UserUpdatePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function datatables()
    {
        return new UserDataTable(User::query());
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(UserUpdatePasswordRequest $request, User $user)
    {
        $input = $request->validated();

        $attributes = [];
        $attributes['password'] = bcrypt($input['password']);

        $user->update($attributes);

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }
}
