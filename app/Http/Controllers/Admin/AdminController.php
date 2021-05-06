<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }

    public function index()
    {
        $data['title'] = 'adminmanagement';
        return view('admin.adminmanagement', $data);
    }
}
