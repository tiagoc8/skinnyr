<?php

namespace App\Http\Controllers;

use App\Weight;

use App\Charts\WeightChart;
use Illuminate\Http\Request;

class WeightChartController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wc = Weight::select()
        ->where('user_id', auth()->id())
        ->orderBy('created_at')->pluck('weight', 'created_at');

        $weightsChart = new WeightChart;
        $weightsChart->labels($wc->keys());
        $weightsChart->dataset('My Weight', 'bar', $wc->values())
        ->backgroundColor('#2FA360');
            
    
        return view('weight.chart', [ 'weightsChart' => $weightsChart ] );
    }

}
