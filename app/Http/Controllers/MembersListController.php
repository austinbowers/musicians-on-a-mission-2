<?php

namespace App\Http\Controllers;

use App\Models\User;

class MembersListController extends Controller
{
    public function index()
    {
        return view('pages.members.index', [
            'users' => User::all()->sortBy('name'),
        ]);
    }
    public function show(User $user)
    {
        return view('pages.members.show', [
            'user' => $user,
        ]);
    }
}
