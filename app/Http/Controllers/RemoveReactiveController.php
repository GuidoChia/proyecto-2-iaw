<?php

namespace App\Http\Controllers;

use App\Reactive;
use Illuminate\Http\Request;

class RemoveReactiveController extends Controller
{
    public function index() {
        $reactives = Reactive::all()->sortBy('name');
        return view('remove-reactive')->with('existent_reactives', $reactives);
    }

    private function validateRequest(Request $request){
        $request->validate([
            'reactive-input' => ['required', 'string'],
        ]);
    }

    public function removeReactive(Request $request) {
        $this->validateRequest($request);
        // TODO: ELIMINAR TODOS LOS STOCKS ASOCIADOS AL REACTIVO
        $reactiveInput = $request->input('reactive-input');
        $reactive = Reactive::where('name', '=', $reactiveInput)->get()->first();
        $reactive->delete();
        return $this->index();
    }
}
