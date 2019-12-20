<?php

namespace App\Http\DataTables\Admin;

use App\Models\User;
use Elegant\DataTables\Model;

class UserDataTable extends Model
{
    protected $addon = ['actions'];
    protected $raw = ['actions'];
    protected $exclude = ['password', 'remember_token'];
    protected $blacklist = ['password', 'remember_token'];

    public function columnActions(User $user)
    {
        return view('admin.users.datatables.actions', compact('user'));
    }
}
