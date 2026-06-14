<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        return view('approvals.index');
    }

    public function show()
    {
        return view('approvals.show');
    }
}
