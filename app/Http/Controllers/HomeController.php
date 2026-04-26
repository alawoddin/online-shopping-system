<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function AllHome() {
        $allhomedata  = Home::get();

        return view('admin.frontend.home.all_home' , compact('allhomedata'));
    }

    public function AddHome() {
        return view('admin.frontend.home.add_home');
    }
}
