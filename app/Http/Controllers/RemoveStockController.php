<?php

namespace App\Http\Controllers;

use App\Reactive;
use App\Stock;
use Illuminate\Http\Request;

class RemoveStockController extends Controller {
    public function index() {
        $reactives = Reactive::all()->sortBy('name');
        return view('remove-stock')->with('existent_reactives', $reactives);
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

        if (strtolower($request->input('type-input')) == 'up') {
            $upAmount = $reactive->getAmount( $date, 'up');
            $downAmount = $reactive->getAmount( $date, 'down');
            $amountInput = $request->input('amount-input');

            if ($upAmount - ($downAmount + $amountInput) < 0) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'type-input' => ["Cannot remove this stock, there are not enough up."],
                ]);
                throw $error;
            }
        }

        $type = strtolower($request->input('type-input'));
        $stocks = Stock::where('reactive_id', '=', $reactive->id)
            ->where('expiration', '=', $date)
            ->where('type', '=', $type)->get();

        if ($stocks->count()==0){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'type-input' => ["There is not such entry in stock."],
            ]);
            throw $error;
        }
    }

    public function removeStock(Request $request) {
        $this->validateRequest($request);
        $reactiveInput = $request->input('reactive-input');
        $reactive = Reactive::where('name', $reactiveInput)->get()->first();
        $expirationDateInput = $request->input('expiration-date-input');
        $date = date_create_from_format('Y-m-d', $expirationDateInput);
        $amountInput = $request->input('amount-input');
        $type = strtolower($request->input('type-input'));
        $stocks = Stock::where('reactive_id', '=', $reactive->id)
            ->where('expiration', '=', $date)
            ->where('type', '=', $type)->get();

        for ($i = 0; $i < $amountInput; $i++) {
            $stocks->pop()->delete();
        }
        return $this->index()->withMessage("Stock removed.");
    }
}
