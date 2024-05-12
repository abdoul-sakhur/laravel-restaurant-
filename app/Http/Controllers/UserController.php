<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\SearchRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_list(SearchRequest $request)
    {
        $all_users = User::all();

        return view('admin.user_list', [
            'all_users' => $all_users,
        ]);
    }

    public function delete_user(User $user)
    {
        $user->delete();

        return to_route('user_list')->with('success', 'Utilisateur supprime avec success');
    }


}
