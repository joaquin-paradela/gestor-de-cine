<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
       $salas = Sala::getSalas();
       return view('index.html', compact('salas'));
    }
}
