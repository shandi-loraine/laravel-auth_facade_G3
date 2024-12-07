<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfileForm()
    {
        return view('profile.show');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Profile::create([
            'user_id' => Auth::id(),
            'address' => $validatedData['address'],
            'position' => $validatedData['position'],
            'phone' => $validatedData['phone'],
        ]);

        return redirect()->route('showDashboardPage')->with('success', 'Profile created successfully!');
    }
}