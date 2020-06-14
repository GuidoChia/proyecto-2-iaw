<?php

namespace App\Http\Controllers;

use App\Reactive;
use App\Stock;
use Illuminate\Http\Request;

class SearchController extends Controller {
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
        return view('search');
    }

    public function searchReactive(Request $request) {
        $reactiveInput = $request->input('reactive-input');
        if ($reactiveInput != null) {
            $reactives = Reactive::like('name', '%' . $reactiveInput . '%')->get();
            $stocks = collect(new Stock());
            $reactives = $reactives->reject(function ($value, $key) {
                return $value->stocks()->get()->count() == 0;
            });
            foreach ($reactives as $reactive) {
                $currentStocks = $reactive->stocks()->get();
                $stocks->push($currentStocks);
            }
            if (count($stocks) > 0) {
                return view('search')->withReactives($reactives)->with('stocks', $stocks);
            } else {
                return view('search')->withMessage('The reactive doesn\'t exists in stock');
            }
        } else {
            return view('search');
        }
    }
}
