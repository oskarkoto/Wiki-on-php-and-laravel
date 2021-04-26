<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wiki;
use App\Models\Wstate;
use App\Models\Wtype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $myUsers = User::all();
        $wikis = Wiki::all()->sortByDesc('created_at')->take(3);
        $wiki = Wiki::latest()->first();
        $data = ['wiki' => $wiki, 'wikis' => $wikis, 'users' => $myUsers];
        return view('home', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
