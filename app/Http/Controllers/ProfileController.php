<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProfileController extends Controller
{  
    /**
     * view
     *
     * @param  mixed $request
     * @return void
     */
    public function view(Request $request)
    {
        $currentRoute = Route::currentRouteName();

        return view('profile', [
            'user' => $request->user(),
            'current_route' => $currentRoute
        ]);
    }
}
