<?php

namespace App\Http\Controllers;

use App\Reactive;
use App\Stock;
use Illuminate\Http\Request;

class SearchReactiveController extends Controller
{
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
        return view('search-reactive');
    }

    public function searchReactive(Request $request) {
        $reactiveInput = $request->input('reactive-input');
        if ($reactiveInput != null) {
            $reactives = Reactive::like('name', '%' . $reactiveInput . '%')->get();
            if (count($reactives) > 0) {
                return $this->index()->withReactives($reactives);
            } else {
                return $this->index()->withMessage('The reactive doesn\'t exist');
            }
        } else {
            return $this->index();
        }
    }
}
