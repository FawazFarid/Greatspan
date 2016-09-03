<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Consignee;
use DB;
use Datatables;

class ConsigneeController extends Controller
{
    public function getNew(){
        return view('consignees.new');
    }
    
    public function postNew(Request $request){
        //validate user input
        $this->validate($request, [
            "name" => "required|unique:consignees",
            "email" => "email"
        ]);
        
        $consignee = new Consignee();
        $consignee->name = $request['name'];
        $consignee->type = $request['type'];
        $consignee->address = $request['address'];
        $consignee->country = $request['country'];
        $consignee->phone = $request['phone'];
        $consignee->email = $request['email'];
        
        $message = "There Were Errors";
        
        if($consignee->save()){
            $message = "Consignee Registered Successfully!";
        };
        
        return redirect()->route('consignee.new')->with(['message' => $message]);
        
    }
    
    public function getConsigneeJson(){
        $consignees = DB::table('consignees')->select('id', 'name')->get();
        return response()->json($consignees);
    }
    
    public function getConsigneeList(){
        return view('consignees.list');
    }
    
    
    
    public function getConsigneeDatatable(){
        
        $consignees = DB::table('consignees')->select(['id', 'name', 'type', 'address', 'country', 'phone', 'email' ]);
            
        //return $consignees datatables;
         
        return Datatables::of($consignees)
            ->addColumn('action', function ($consignee) {
                return '<a href="'. route('consignee.edit', ['id' => $consignee->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="'. route('consignee.delete', ['id' => $consignee->id]) . '" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete this this?\');"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }
    
    public function getConsigneeById($id){
        $consignee = Consignee::find($id);
        return view('consignees.profile', ['consignee' => $consignee ]);
        //print_r($booking);
    }
    
    public function getEdit($id){
        $consignee = Consignee::findorfail($id);
        return view('consignees.edit', [ 'consignee' => $consignee ]);
    } 
    
    public function postEdit(Request $request){
        $this->validate($request, [
            "name" => "required",
            "email" => "email"
        ]);
        
        $consignee = Consignee::find($request['consignee_id']);
        $consignee->name = $request['name'];
        $consignee->type = $request['type'];
        $consignee->address = $request['address'];
        $consignee->country = $request['country'];
        $consignee->phone = $request['phone'];
        $consignee->email = $request['email'];
        
        $message = "There Were Errors";
        
        if($consignee->save()){
            $message = "Consignee Edited Successfully!";
            return redirect()->route('consignee.profile', ['id' => $request['consignee_id'] ])->with(['message' => $message]);
        }
    }
    
    public function getDelete($id){
        if(Consignee::destroy($id)){
            $message = "Consignee Deleted Succesfully!";
            return redirect()->route('consignee.list')->with(['message' => $message]);
        }
    }
}
