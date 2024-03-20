<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', [
            'nama' => $user->name,
            'role' => $user->role,
        ]);
    }
}
