<?php

namespace App\Http\Controllers;

use App\Reactive;
use App\Stock;
use Illuminate\Http\Request;

class UpdateStockController extends Controller {
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
        return view('update-stock')->with('existent_reactives', $reactives);
    }

    private function validateRequest(Request $request) {
        $request->validate([
            'amount-input' => ['required', 'int'],
            'expiration-date-input' => ['required', 'date_format:Y-m-d'],
        ]);
        $reactiveInput = $request->input('reactive-input');
        $reactive = Reactive::where('name', $reactiveInput)->get()->first();
        $expirationDateInput = $request->input('expiration-date-input');
        $date = date_create_from_format('Y-m-d', $expirationDateInput);

        if (strtolower($request->input('type-input')) == 'down') {
            $upAmount = $reactive->getAmount( $date, 'up');
            $downAmount = $reactive->getAmount( $date, 'down');
            $amountInput = $request->input('amount-input');
            if ($upAmount - ($downAmount + $amountInput) < 0) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'type-input' => ["There isn't enough " . $reactiveInput . " in stock, it's not possible delete it."],
                ]);
                throw $error;
            }
        }
    }

    public function uploadStock(Request $request) {
        $this->validateRequest($request);
        $reactiveInput = $request->input('reactive-input');
        $reactive = Reactive::where('name', $reactiveInput)->get()->first();
        $reactiveId = $reactive->id;
        $expirationDateInput = $request->input('expiration-date-input');
        $date = date_create_from_format('Y-m-d', $expirationDateInput);
        $type = strtolower($request->input('type-input'));
        $amountInput = $request->input('amount-input');

        for ($i = 0; $i < $amountInput; $i++) {
            $newStock = new Stock;
            $newStock->reactive_id = $reactiveId;
            $newStock->expiration = $date;
            $newStock->type = $type;
            $newStock->save();
        }
        return $this->index()->withMessage("Stock updated");
    }

}
