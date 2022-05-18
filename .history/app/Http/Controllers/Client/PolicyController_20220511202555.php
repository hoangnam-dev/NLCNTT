<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public $data = [];
    
    public function index() {
        $this->data['title'] = 'Policy';
        $this->data['categories'] = Categories::where('trangthai','=', '1')->orderBy('madm', 'ASC')->get();
        $this->data['total_item'] = isset(Session::all()['carts'])?count(Session::all()['carts']):0;
        return view('client.policies.security', $this->data);
    }
}
