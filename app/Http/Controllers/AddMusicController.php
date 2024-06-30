<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AddMusicController extends Controller
{
    /**
     * Render addMusic view
     */
    public function render() : View
    {
        return View('addMusic');
    }
}
