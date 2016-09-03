<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Vessel;

class VesselController extends Controller
{
    public function postNew(Request $request){
        $this->validate($request, [
            'imo' => 'required',
            'name' => 'required',
        ]);
        
        $vessel = new Vessel();
        $vessel->imo = $request['imo'];
        $vessel->name = $request['name'];
        
        //$message = "Your Request Couldnt be submitted!";
        $vessel->save();
        
        //return response()->json(['message' => 'success'], 200);
        //return response()->json(['new_vessel' => $vessel->name] ,200);
    }
    
    public function getVesselJson(){
        $vessels = DB::table('vessels')->select('imo', 'name')->get();
        return response()->json($vessels);
    }
}
