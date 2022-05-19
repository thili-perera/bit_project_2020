<?php

namespace App\Http\Controllers\Backend\Role;

use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('Backend.Role.index', compact('roles'));
    }

    public function create()
    {

        return view('Backend.Role.create');
    }

    public function store(Request $request, Role $role)
    {
        // dd($request);
        $role = new Role();
        $role->rname = $request->rname;
        $role->save();
        Alert::success('Successfully new role created');
        return redirect()->route('dashboard.role.create');
    }

    public function destroy($request)
    {
        // dd($role);
        $role = Role::where('id', $request)->first();
        // dd($role);

        $role->delete();
        Alert::success('Successfully new role deleted');
        return redirect()->route('dashboard.role.index');
    }
}
