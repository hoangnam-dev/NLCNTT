<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public $data = [];
    
    public function index() {
        $this->data['title'] = 'Policy';
        return view('client.policies.security', $this->data);
    }
}
