<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('profile', [
            'user' => $request->user()
        ]);
    }
}
