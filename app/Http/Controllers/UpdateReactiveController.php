<?php

namespace App\Http\Controllers;

use App\Reactive;
use Illuminate\Http\Request;

class UpdateReactiveController extends Controller {
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
        return view('update-reactive');
    }

    public function validateRequest(Request $request) {
        $request->validate([
            'reactive-input' => ['required', 'string'],
            'description-input' => ['required', 'string'],
        ]);
        $reactives = Reactive::where('name', $request->input('reactive-input'))->get();
        if ($reactives->count() > 0) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'reactive-input' => ["Reactive already exists"],
            ]);
            throw $error;
        }
    }

    public function uploadReactive(Request $request) {
        $this->validateRequest($request);
        $newReactive = new Reactive;
        $newReactive->name = $request->input('reactive-input');
        $newReactive->description = $request->input('description-input');
        // TODO: ADD BARCODE
        $newReactive->save();
        return $this->index()->withMessage("Reactive created");

    }

}
