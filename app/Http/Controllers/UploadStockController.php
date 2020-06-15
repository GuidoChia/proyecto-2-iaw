<?php

namespace App\Http\Controllers;

use App\Reactive;
use App\Stock;
use Illuminate\Http\Request;

class UploadStockController extends Controller {
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
        return view('upload-stock');
    }

    public function uploadStock(Request $request) {
        $reactiveInput = $request->input('reactive-input');
        $reactives = Reactive::where('name', $reactiveInput)->get();
        if ($reactives->count() == 0) {
            return $this->index()->withMessage("Reactive doesn't exists, please add it first");
        } else {
            $newStock = new Stock;
            $newStock->reactive_id = $reactives->first()->id;
            $expirationDateInput = $request->input('expiration-date-input');
            $date = date_create_from_format('d/m/Y', $expirationDateInput);
            $newStock->expiration = $date;
            $newStock->amount = $request->input('amount-input');
            $newStock->save();
            return $this->index()->withMessage("Stock created");
        }
    }
}
