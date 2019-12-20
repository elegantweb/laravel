<?php

namespace App\Http\DataTables\Admin;

use App\Models\Enduser;
use Elegant\DataTables\Model;

class EnduserDataTable extends Model
{
    protected $addon = ['actions'];
    protected $raw = ['actions'];
    protected $exclude = ['password', 'remember_token'];
    protected $blacklist = ['password', 'remember_token'];

    public function columnActions(Enduser $enduser)
    {
        return view('admin.endusers.datatables.actions', compact('enduser'));
    }
}
