<?php

namespace App\Http\Controllers;

class test extends Controller
{
    public function index()
    {
        return bu_years();
        return session()->all();
        # code...
        $akkar_rent = ['شراء', 'بيع'];
        $rand_rent = array_rand($akkar_rent);
        return $akkar_rent[$rand_rent];
    }
}
