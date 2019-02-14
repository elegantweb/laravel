<?php

namespace App\Http\DataTables\Admin;

use App\Enduser;
use Elegant\DataTables\Model;

class EndusersDataTable extends Model
{
    protected $addon = ['actions'];
    protected $raw = ['actions'];
    protected $exclude = ['password', 'remember_token'];
    protected $blacklist = ['password', 'remember_token'];

    public function columnActions(Enduser $enduser)
    {
        return view('admin.panel.endusers.datatables.actions', compact('enduser'));
    }
}
