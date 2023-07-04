<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\User;
use App\ModelHasRoles;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $roles = Roles::get();
        return view('backend.pages.account_management.user', compact('roles'));
    }
    
    public function store(Request $request)
    {
        $roles = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
        ]);

        $request->request->add(['password' => Hash::make('P@ssw0rd')]);
        $request->request->add(['profile_img' => 'default.jpg']);
        $request->request->add(['company_id' => 1]);
        $request->request->add(['created_by' => Auth::user()->id]);
        $request->request->add(['status' => 1]);

        if($request->action === "save") {
            User::create($request->except(['action', 'id']));
        }
        else {
            User::find($request->id)->update($request->except(['action', 'id']));
        }

        return response()->json(compact('roles'));
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                User::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return response()->json(compact('user'));
    }

    public function check_access($id)
    {
        $permission_count = ModelHasRoles::with('role')->where('model_id', $id)->count();
        if($permission_count !== 0) {
            $permission = ModelHasRoles::with('role')->where('model_id', $id)->firstOrFail();
        }
        else {
            $permission = null;
        }
        return response()->json(compact('permission'));
    }
    
    public function give_access(Request $request)
    {
        $roles = $request->validate([
            'role_id' => ['required'],
        ]);

        if($request->action === "save") {
            ModelHasRoles::create($request->except(['action', 'id']));
        }
        else {
            ModelHasRoles::where('model_id', $request->id)->update($request->except(['action', 'id', '_token']));
        }

        return response()->json(compact('roles'));
    }

    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }

    public function roles() {
        return view('backend.pages.account_management.role');
    }

    public function roles_store(Request $request)
    {
        $roles = $request->validate([
            'name' => ['required']
        ]);

        $request->request->add(['guard_name' => 'web']);
        $request->request->add(['created_user' => Auth::user()->id]);

        if($request->action === "save") {
            Roles::create($request->except(['action', 'id']));
        }
        else {
            Roles::find($request->id)->update($request->except(['action', 'id']));
        }

        return response()->json(compact('roles'));
    }
    
    public function roles_get() {
        if(request()->ajax()) {
            return datatables()->of(
                Roles::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }
    
    public function roles_edit($id)
    {
        $roles = Roles::where('id', $id)->firstOrFail();
        return response()->json(compact('roles'));
    }

    public function roles_destroy($id)
    {
        $destroy = Roles::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
