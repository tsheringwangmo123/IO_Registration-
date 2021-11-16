<?php

namespace App\Http\Controllers;

use App\Models\Outing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutingController extends Controller
{
    public function index()
    {
        return view('outing');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $outing = Outing::create([
            'name' => $request->name,
            'date' => $request->date,
            'course' => $request->course,
            'year' => $request->year,
            'section' => $request->section,
            'contact' => $request->contact,
            'reason' => $request->reason,
            'outing_duration' => $request->outing_duration,
            'status' => $request->status
        ]);
        return redirect('/home');
    }
    public function show(Outing $outing)
    {
        
    }
    public function edit(Outing $outing)
    {
        //
    }
    public function update(Request $request, Outing $outing)
    {
        //
    }

    public function destroy(Outing $outing)
    {
        //
    }
    public function Showall()
    {
        $outing = Outing::all();
        return view("notification")->with("outing",$outing);
    }
    public function status($id)
    {
        $idsep = explode("-",$id);
        DB::table('outings')->where('id', $idsep[0])->update(['status' => $idsep[1]]);
        return "success";
    }
}
