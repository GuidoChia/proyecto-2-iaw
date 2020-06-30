<?php

namespace App\Http\Controllers;

use App\Reactive;
use Illuminate\Http\Request;

class UpdateReactiveController extends Controller {
    public function index(Request $request) {
        $reactives = Reactive::all()->sortBy('name');
        return view('update-reactive')->with('existent_reactives', $reactives);
    }

    private function validateRequest(Request $request) {
        $validData = $request->validate([
            'barcode-file-input' => ['image', 'max:10240']
        ]);
        $reactives = Reactive::where('name', $request->input('new-name-input'))->get();
        if ($reactives->count() > 0) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'reactive-input' => ["Reactive already exists"],
            ]);
            throw $error;
        }
    }

    public function updateReactive(Request $request) {
        $imageDataBLOB = null;
        $file = $request->file('barcode-file-input');
        if ($file != null) {
            $fileContents = file_get_contents($file);
            if ($fileContents != null) {
                $imageDataBLOB = base64_encode($fileContents);
            }
        }
        $this->validateRequest($request);
        $reactives = Reactive::where('name', $request->input('reactive-input'))->get();
        $newReactive = $reactives->first();
        $newName = $request->input('new-name-input');
        if ($newName != null && $newName != "") {
            $newReactive->name = $newName;
        }
        $newDescription = $request->input('description-input');
        if ($newDescription != null && $newDescription != "") {
            $newReactive->description = $newDescription;
        }
        if ($imageDataBLOB != null) {
            $newReactive->barcode = $imageDataBLOB;
        }
        $newReactive->save();
        return $this->index($request)->withMessage("Reactive updated");
    }
}
