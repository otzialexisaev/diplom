<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SubjectsController extends Controller
{
    public function create()
    {
        return view('layouts.onlyVue');
    }
}
