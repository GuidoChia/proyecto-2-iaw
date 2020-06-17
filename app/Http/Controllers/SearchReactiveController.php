<?php

namespace App\Http\Controllers;

use App\Reactive;
use Illuminate\Http\Request;

class SearchReactiveController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $reactives = Reactive::all()->sortBy('name');
        return view('search-reactive')->with('existent_reactives', $reactives);
    }

    public function searchReactive(Request $request) {
        $reactiveInput = $request->input('reactive-input');
        if ($reactiveInput != null) {
            $reactive = Reactive::where('name', '=', $reactiveInput)->get()->first();
            return $this->index()->withReactive($reactive);
        } else {
            return $this->index();
        }
    }
}
