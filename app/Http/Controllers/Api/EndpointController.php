<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reactive;
use App\Stock;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    public function getUsage(Request $request){
        $stocks = Stock::where('created_at', '>', today()->subMonths(6))->get();
        return response()->json(['success' => $stocks], 200);
    }

    public function getReactive(Request $request){
        $validatedData = $request->validate([
            'reactive-id'=>'int|required|min:0'
        ]);
        $reactive = Reactive::find($validatedData['reactive-id']);
        if ($reactive== null){
            return response()->json(['message' => 'Reactive not found'], 400);

        }
        return response()->json(['success' => $reactive], 200);
    }
}
