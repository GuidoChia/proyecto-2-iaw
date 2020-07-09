<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller {
    public function index(Request $request) {
        $name = strtolower($request->input('user-input'));
        $users = null;
        if ($name == null || trim($name) == '') {
            $users = User::paginate(8);
        } else {
            $users = User::where('name', 'ilike', '%'.$name.'%')->paginate(8);
        }
        return view('manage-users')->withUsers($users);
    }
    public function setAsAdmin(Request $request){
        $userId = $request->input('user-id');
        $user = User::find($userId);
        $user->type='admin';
        $user->save();
        return $this->index($request);
    }
}
