<?php

namespace App\Http\Controllers;

use App\Weight;
use Illuminate\Http\Request;

use App\Charts\WeightChart;

use ConsoleTVs\Charts\Facades\Charts;

class WeightController extends Controller
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

        $weights = Weight::select()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', "ASC")
            ->get();

            return view('weight.index')->with([
                'weight' => $weights
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'weight' => 'required:min:2'
        ]);

        $weight = new Weight([
            'weight' => $request['weight'],
            'created_at' => $request['created_at'],
            'user_id' => auth()->id()
        ]);
        $weight->save();
        
        return $this->index()->with([
            'message_success' => "The weight has inserted"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight)
    {
        return view('weight.show')->with([
            'weight' => $weight
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight)
    {
        return view('weight.edit')->with([
            'weight' => $weight
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weight $weight)
    {
        $request->validate([
            'weight' => 'required:min:2'
        ]);

        $weight ->update([
            'weight' => $request['weight'],
            'created_at' => $request['created_at'],
            'user_id' => auth()->id()
        ]);
        
        return $this->index()->with([
            'message_success' => "The weight has updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $weight)
    {
        $oldName = $weight->weight;
        $weight->delete();
        return $this->index()->with([
            'message_success' => "The weight has deleted"
        ]);
    }


}
