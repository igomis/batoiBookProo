<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashBoard extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $missatge = session('missatge', 'Benvingut al teu perfil');
        return view('dashboard', compact('missatge'));
    }
}
