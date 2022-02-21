<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $data = [];

    public function index(Request $request) {
        dd($request);
    }
}
