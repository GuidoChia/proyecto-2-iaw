<?php

namespace App\Http\Controllers;

use App\Reactive;
use Illuminate\Http\Request;

class UploadReactiveController extends Controller {
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
        return view('upload-reactive');
    }

    public function uploadReactive(Request $request) {
        $reactiveInput = $request->input('reactive-input');
        $reactives = Reactive::where('name', $reactiveInput)->get();
        if ($reactives->count() > 0) {
            return $this->index()->withMessage("Reactive already exists");
        } else {
            $newReactive = new Reactive;
            $newReactive->name = $reactiveInput;
            $description = $request->input('description-input');
            if ($description == null) {
                $description = "";
            }
            $newReactive->description = $request->input('description-input');
            // TODO: ADD BARCODE
            $newReactive->save();
            return $this->index()->withMessage("Reactive created");
        }
    }
}
