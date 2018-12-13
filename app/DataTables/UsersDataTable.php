<?php

namespace App\DataTables;

use App\Models\User;
use Elegant\DataTables\Model;

class UsersDataTable extends Model
{
    protected $addon = ['actions'];
    protected $raw = ['actions'];
    protected $hidden = ['password', 'remember_token'];
    protected $blacklist = ['password', 'remember_token'];

    public function columnActions(User $user)
    {
        return view('admin.panel.users.datatables.actions', compact('user'));
    }
}
