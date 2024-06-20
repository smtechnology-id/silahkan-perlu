<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }


    public function event() {
        $events = Event::all();
        return view('admin.event', compact('events'));
    }
}
