<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigTypeController extends Controller
{
    //
    public function index()
    {

        return view('admin.config_type.index');
    }

    public function create()
    {

        return view('admin.config_type.create');
    }
}
