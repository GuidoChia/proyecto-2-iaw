<?php

namespace App\Http\Controllers;

use App\Reactive;
use Illuminate\Http\Request;

class SearchReactiveController extends Controller {
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
        return view('search-reactive')->with('existent_reactives', $reactives);
    }

    public function searchReactive(Request $request) {
        $reactiveInput = $request->input('reactive-input');
        if ($reactiveInput != null) {
            $reactive = Reactive::where('name', '=', $reactiveInput)->get()->first();
            if ($reactive->barcode != null) {
                $target_dir = "uploads/temp/products/";
                $target_name = "latest_uploaded_product" . $reactive->name;
                $path = $target_dir . $target_name;
                $imageBLOB = $reactive->barcode;
                if (!file_exists($target_dir)){
                    mkdir($target_dir, 0777, true);
                }
                $file = fopen($path, "w");
                fwrite($file, base64_decode($imageBLOB));
                return $this->index()->withReactive($reactive)->withImagePath($path);
            }
            return $this->index()->withReactive($reactive);
        } else {
            return $this->index();
        }
    }
}
