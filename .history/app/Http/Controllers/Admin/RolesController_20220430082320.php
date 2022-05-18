<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data = [];
    
    public function index()
    {
        $this->data['title'] = 'Quản lý quyền';
        $this->data['roles'] = Roles::orderBy('manv','DESC')->search()->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }
}
