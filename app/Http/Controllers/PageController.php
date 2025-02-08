<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login() {
        return view('login');
    }

    public function member() {
        return view('member');
    }

    public function bcard() {
        return view('bcard');
    }
}
