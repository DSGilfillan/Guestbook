<?php

namespace App\Http\Controllers;

class SignaturesController extends Controller
{
    /*
    _
    _
    _ @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index()
    {
        return view('signatures.index');
    }
}
