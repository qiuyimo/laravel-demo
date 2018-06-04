<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo;

class DemoController extends Controller
{
    public function demo()
    {
        return Demo::all();
    }
}
