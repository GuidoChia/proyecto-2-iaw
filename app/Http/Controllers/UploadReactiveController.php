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

    public function validateRequest(Request $request) {
        $validData = $request->validate([
            'reactive-input' => ['required', 'string'],
            'description-input' => ['required', 'string'],
            'barcode-file-input' => ['image', 'max:10240']
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
        $imageDataBLOB = null;
        $file=$request->file('barcode-file-input');
        if ($file!=null){
            $fileContents = file_get_contents($file);
            if ($fileContents != null) {
                $imageDataBLOB = base64_encode($fileContents);
            }
        }
        $this->validateRequest($request);
        $newReactive = new Reactive;
        $newReactive->name = $request->input('reactive-input');
        $newReactive->description = $request->input('description-input');
        $newReactive->barcode = $imageDataBLOB;
        $newReactive->save();
        return $this->index()->withMessage("Reactive created");
    }

}
