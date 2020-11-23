<?php

namespace App\Http\Controllers;

use App\akkar;
use App\contact;
use App\User;
use DB;

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
        $title = 'الرئيسية';

        // count users number
        $usersCount = User::count();
        $buApprovedCount = akkar::where('bu_status', '1')->count();
        $buWattingCount = akkar::where('bu_status', '0')->count();
        $messagesCount = contact::count();

        // get the building added by month
        $date = date('Y');
        $query = 'select count(*) as nbBu , MONTH(created_at) as month from akkars where year(created_at)=? group By month order By month asc ';
        $chart = DB::select($query, [$date]);

        // chartJs-------------------------------------------------------------------------------------
        $chartData = [];
        $chartMonth = [];

        // get the nbBu and affected to month $chartMonth[month] = nbBu
        foreach ($chart as $item) {
            $chartMonth[$item->month] = $item->nbBu;
        }

        // check the chartMonth in months=$i and pushed to chartdata
        for ($i = 1; $i <= 12; $i++) {
            if (in_array($i, array_keys($chartMonth))) {
                $chartData[$i] = $chartMonth[$i];
            } else {
                $chartData[$i] = 0;
            }
        }

        //---------------------------------------------------------------------------------------------------------

        // get the lat and lang of building in the map
        $map = akkar::select('bu_langtituide', 'bu_latituide', 'bu_place')->get();

        // get the list of 10 latest users
        $latestUsers = User::orderBy('id', 'desc')->limit(8)->get();

        // get latest building added
        $latestBu = akkar::orderBy('id', 'desc')->limit(4)->get();

        // get latest messages
        $latestMessages = contact::orderBy('id', "desc")->limit(5)->get();

        return view('dashboard.admin.index', compact('title', 'usersCount', 'buApprovedCount', "buWattingCount", 'messagesCount', "chartData", "map", 'latestUsers', 'latestBu', 'latestMessages'));
    }

    public function buStatistics()
    {
        // get the building added by month
        $date = '';
        if (request()->has('year')) {

            $date = request()->year;
        } else {
            $date = date('Y');

        }
        $title = 'عدد العقارات سنة '.$date;

        $query = 'select count(*) as nbBu , MONTH(created_at) as month from akkars where year(created_at)=? group By month order By month asc ';
        $chart = DB::select($query, [$date]);

        // chartJs-------------------------------------------------------------------------------------
        $chartData = [];
        $chartMonth = [];

        // get the nbBu and affected to month $chartMonth[month] = nbBu
        foreach ($chart as $item) {
            $chartMonth[$item->month] = $item->nbBu;
        }

        // check the chartMonth in months=$i and pushed to chartdata
        for ($i = 1; $i <= 12; $i++) {
            if (in_array($i, array_keys($chartMonth))) {
                $chartData[$i] =$chartMonth[$i];
            } else {
                $chartData[$i] = 0;
            }
        }

        //---------------------------------------------------------------------------------------------------------

        return view('dashboard.admin.akkar.buStatistics', compact('chartData', 'date','title'));
    }
}
