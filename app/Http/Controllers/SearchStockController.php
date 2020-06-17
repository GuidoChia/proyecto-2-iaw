<?php

namespace App\Http\Controllers;

use App\Reactive;
use App\Stock;
use Illuminate\Http\Request;

class SearchStockController extends Controller {
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
        return view('search-stock')->with('existent_reactives', $reactives);
    }

    public function validateRequest(Request $request) {
        $request->validate([
            'reactive-input' => ['required', 'string'],
        ]);
        $reactive = Reactive::where('name', '=', $request->input('reactive-input'))->get()->first();
        if ($reactive->stocks()->count() == 0) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'reactive-input' => ["Reactive doesn't exist in stock."],
            ]);
            throw $error;
        }
    }

    public function searchStock(Request $request) {
        $this->validateRequest($request);
        $reactiveInput = $request->input('reactive-input');
        $reactive = Reactive::where('name', '=', $reactiveInput)->get()->first();
        $dates = $reactive->stocks()->select('expiration')->distinct()->get();
        $rows = collect(new \stdClass());
        foreach ($dates as $date) {
            $upAmount = $reactive->getAmount($date->expiration, 'up');
            $downAmount = $reactive->getAmount($date->expiration, 'down');
            $row = new \stdClass();
            $row->amount = $upAmount - $downAmount;
            $row->expiration = $date->expiration;
            $rows->push($row);
        }
        return $this->index()->withReactive($reactive)->withRows($rows);
    }
}
