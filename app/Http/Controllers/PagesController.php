<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth', ['only' => [
            'adminInicio'
        ]]);
    }


    public function adminInicio()
    {
        return view('admin.inicio');
    }
}
