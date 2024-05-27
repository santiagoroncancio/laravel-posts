<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function store(Request $request, User $user)
    {
        if ($request->user()->isFriend($user)) {
            return back();
        }

        if ($request->user()->id === $user->id) {
            return back();
        }

        $request->user()->from()->attach($user);

        return back();
    }

    public function update(Request $request, User $user)
    {
        $request->user()->pendingTo()->where('from_id', $user->id)
            ->update([
                'accepted' => true
            ]);

        return back();
    }
}
