<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Member;

class MemberAuthController extends Controller
{
    /**
     * Handle member login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'account' => 'required|string',
            'password' => 'required|string',
        ]);

        $member = Member::where('account', $request->account)->first();

        if (!$member || !Hash::check($request->password, $member->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate a simple API token (for demonstration purposes)
        $token = bin2hex(random_bytes(40));
        $member->remember_token = $token;
        $member->save();

        return response()->json(['message' => 'Login successful', 'token' => $token, 'member' => $member]);
    }
}
