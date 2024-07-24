<?php

namespace App\Http\Controllers;
use App\Models\volunteer;
use App\Models\human_case;
use App\Models\campaign_request;
use App\Models\campaign;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
         $volunteer=volunteer::count();
        $campaign_request=campaign_request::count();
        $human_case=human_case::count();
        $campaign=campaign::count();
        return view('home' ,compact('volunteer','campaign_request','human_case','campaign'));
    }
}
