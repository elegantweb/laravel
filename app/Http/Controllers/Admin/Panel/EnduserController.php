<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Models\Enduser;
use App\Http\Requests\Admin\Enduser\StoreRequest;
use App\Http\Requests\Admin\Enduser\UpdateRequest;
use App\Http\Requests\Admin\Enduser\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnduserController extends Controller
{
    public function index()
    {
        return view('admin.panel.endusers.index');
    }

    public function datatables()
    {
        return datatables()->of(Enduser::query())
                           ->addColumn('actions', 'admin.endusers.datatables.actions')
                           ->rawColumns(['actions'])
                           ->toJson();
    }

    public function create()
    {
        return view('admin.panel.endusers.create');
    }

    public function store(StoreRequest $request)
    {
        $enduser = Enduser::create($request->validated());

        return redirect()->route('admin.endusers.edit', [$enduser])
                         ->with('status:success', 'User successfully saved.');
    }

    public function edit(Enduser $enduser)
    {
        return view('admin.panel.endusers.edit', compact('customer'));
    }

    public function update(UpdateRequest $request, Enduser $enduser)
    {
        $enduser->update($request->validated());

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }

    public function updatePassword(UpdatePasswordRequest $request, Enduser $enduser)
    {
        $enduser->update($request->validated());

        return redirect()->back()
                         ->with('status:success', 'User successfully updated.');
    }

    public function destroy(Enduser $customer)
    {
        $customer->delete();

        return redirect()->back()
                         ->with('status:success', 'User successfully removed.');
    }
}
