<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile()
    {
        return view('users.profile');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $loggedInUser = auth()->id();

        $query = User::query();

        if ($search) {
            $query->where('username', 'like', '%' . $search . '%');
        }

        if ($loggedInUser) {
            $query->where('id', '!=', $loggedInUser);
        }

        $users = $query->get();
        return view('users.search', ['users' => $users], ['searchWord' => $search]);
    }
}
