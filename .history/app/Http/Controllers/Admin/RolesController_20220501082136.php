<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.permission');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data = [];
    
    public function index()
    {
        $this->data['title'] = 'Quản lý quyền';
        $this->data['listRoles'] = Roles::orderBy('maquyen','ASC')->search()->paginate(10);
        return view('admin.roles.index', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Thêm quyền';
        return view('admin.roles.create', $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
            'role_name' => 'required',
            'role_description' => 'required'
        ];
        $message = [
            'role_name.required' => 'Hãy nhập vào tên quyền',
            'role_description.required' => 'Hãy nhập vào mô tả quyền'
        ];
        $request->validate($rules, $message);

        $roles = new Roles();
        $roles->tenquyen = $request->role_name;
        $roles->mota = $request->role_description;
        $roles->save();

        return redirect()->back()->with('success', 'Thêm quyền thành công');
    }

    public function edit(Request $request)
    {
        $this->data['title'] = 'Sửa quyền';
        $this->data['role'] = Roles::find($request->maquyen);
        return view('admin.roles.edit', $this->data);
    }

    public function update(Request $request)
    {
        $rules = [
            'role_name' => 'required',
            'role_description' => 'required'
        ];
        $message = [
            'role_name.required' => 'Hãy nhập vào tên quyền',
            'role_description.required' => 'Hãy nhập vào mô tả quyền'
        ];
        $request->validate($rules, $message);

        $roles = Roles::find($request->maquyen);
        $roles->tenquyen = $request->role_name;
        $roles->mota = $request->role_description;
        $roles->save();

        return redirect()->back()->with('success', 'Sửa quyền thành công');
    }

    public function destroy($id)
    {
        $roles = Roles::find($id);
        $roles->delete();

        return redirect()->route('roles.index')->with('success', 'Xóa quyền thành công');
    }
}
