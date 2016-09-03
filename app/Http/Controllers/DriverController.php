<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Driver;
use DB;
use Datatables;

class DriverController extends Controller
{
    public function postNew(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $driver = new Driver();
        $driver->name = $request['name'];
        $driver->id_no = $request['id_no'];
        $driver->company = $request['company'];
        $driver->phone = $request['phone'];
        
        // $message = "errors found";
        $driver->save();
        
        //return response()->json(['status' => 'success'], 200);
    }
    
    public function getDriverList(){
        return view('drivers.list');
    }
    
    public function getDriverDatatable(){
        $drivers = DB::table('drivers')->select(['id', 'name', 'id_no', 'phone', 'company' ]);
            
        //return $drivers datatables;
         
        return Datatables::of($drivers)
            ->addColumn('action', function ($driver) {
                return '<a href="'. route('driver.edit', ['id' => $driver->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="'. route('driver.delete', ['id' => $driver->id]) . '" class="btn btn-xs btn-danger delete" onclick="return confirm(\'Are you sure you want to delete this?\');"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }
    
    public function getDriverJson(){
        $drivers = DB::table('drivers')->select('id', 'name')->get();
        return response()->json($drivers);
    }
    
    public function getDriverById($id){
        $driver = Driver::find($id);
        return view('drivers.profile', ['driver' => $driver ]);
        //var_dump($driver);
    }
    
    public function getEdit($id){
        $driver = Driver::findorfail($id);
        return view('drivers.edit', [ 'driver' => $driver ]);
    } 
    
    public function postEdit(Request $request){
        $this->validate($request, [
            "name" => "required",
        ]);
        
        $driver = Driver::findorfail($request['driver_id']);
        $driver->name = $request['name'];
        $driver->id_no = $request['id_no'];
        $driver->phone = $request['phone'];
        $driver->company = $request['company'];
        
        $message = "There Were Errors";
        
        if($driver->save()){
            $message = "Driver Edited Successfully!";
            return redirect()->route('driver.profile', ['id' => $request['id'] ])->with(['message' => $message]);
        }
    }
    
    public function getDelete($id){
        if(Driver::destroy($id)){
            $message = "Driver Deleted Succesfully!";
            return redirect()->route('driver.list')->with(['message' => $message]);
        }
    }
}
