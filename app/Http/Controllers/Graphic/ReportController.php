<?php

namespace App\Http\Controllers\Graphic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('graphics.show');
    }
}
