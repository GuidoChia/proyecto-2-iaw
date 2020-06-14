<?php

namespace App\Http\Controllers;

use App\Reactive;
use Illuminate\Http\Request;

class UploadReactiveController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('upload-reactive');
    }
}
