<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Booking;
use DB;
use Datatables;
use Illuminate\Database\Eloquent\Collection;

class BookingController extends Controller
{
    public function getNew(){
        return view('bookings.new');
    }
    
    public function postNew(Request $request){
        //validate user input
        $this->validate($request, [
            "consignee" => "required",
            "vessel" => "required",
            "container" => "required",
            "eta" => "required",
            "status" => "required",
        ]);
        
        $booking = new Booking();
        $booking->consignee_id = $request['consignee'];
        $booking->vessel_id = $request['vessel'];
        $booking->voyageNo = $request['voyage'];
        $booking->container_no = $request['container'];
        $booking->eta = $this->setDate($request['eta']);
        $booking->status = $request['status'];
        $booking->documents = $request['documents'];
        $booking->bl = $request['bl'];
        $booking->delivery_order = $this->setDate($request['delivery_order']);
        $booking->weight = $request['weight'];
        $booking->port_charges = $request['port_charges'];
        $booking->port_charges_date = $this->setDate($request['port_charges_date']);
        $booking->entry_passed = $this->setDate($request['entry_passed']);
        $booking->t810_released = $this->setDate($request['t810_released']);
        $booking->t810 = $request['t810'];
        $booking->t812 = $request['t812'];
        $booking->loaded_released = $this->setDate($request['loaded_released']);
        $booking->notes = $request['notes'];
        $booking->driver_id = ($request['driver'] == "" ? null : $request['driver']);
        $booking->truck_no = $request['truck_no'];
        $booking->trailer_no = $request['trailer_no'];
        $booking->destination = $request['destination'];
        $booking->transfer_date = $this->setDate($request['transfer_date']);
        $booking->return_date = $this->setDate($request['return_date']);
        $booking->user_id = $user = Auth::user()->id;
        
        $message = "There were Errors!";
        
        if($booking->save()){
            $message = "Booking Created Successfully!";
        };
        
        return redirect()->route('booking.new')->with(['message' => $message]);
        
    }
    
    
    public function getBookingsList(){
        return view('bookings.list');
    }
    
    public function getBookingsJson(){
        
        $bookings = DB::table('bookings')
            ->join('vessels', 'bookings.vessel_id', '=', 'vessels.imo')
            ->join('consignees', 'bookings.consignee_id', '=', 'consignees.id')
            ->select(['bookings.id', 'bookings.container_no', 'consignees.name as consignee_name', 'vessels.name as vessel_name', 'bookings.voyageNo', 'bookings.bl', 'bookings.eta', 'bookings.status' ]);
            
        //return $bookings datatables;
         
        return Datatables::of($bookings)
            ->addColumn('action', function ($booking) {
                return '<a href="'. route('booking.profile', ['id' => $booking->id]) . '" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> View</a>
                        <a href="'. route('booking.edit', ['id' => $booking->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="'. route('booking.delete', ['id' => $booking->id]) . '" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete this?\');"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->editColumn('eta', function($booking){
                 return $this->getDate($booking->eta);
            })
            ->editColumn('status', function($booking){
                 if($booking->status){
                    return '<span style="font-size:14px; color:#4cd964;"><strong>'.$booking->status.'</strong></span>';
                 }
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
        
    }
    
    public function getBookingById($id){
        $booking = DB::table('bookings')
            ->join('vessels', 'bookings.vessel_id', '=', 'vessels.imo')
            ->join('consignees', 'bookings.consignee_id', '=', 'consignees.id')
            ->leftJoin('drivers', 'bookings.driver_id', '=', 'drivers.id')
            ->select(['bookings.*', 'consignees.name as consignee_name', 'vessels.name as vessel_name', 'drivers.name as driver_name'])
            ->where('bookings.id', $id)
            ->first();
            
        $booking->eta = $this->getDate($booking->eta);
        $booking->delivery_order = $this->getDate($booking->delivery_order);
        $booking->port_charges_date = $this->getDate($booking->port_charges_date);
        $booking->entry_passed = $this->getDate($booking->entry_passed);
        $booking->t810_released = $this->getDate($booking->t810_released);
        $booking->loaded_released = $this->getDate($booking->loaded_released);
        $booking->transfer_date = $this->getDate($booking->transfer_date);
        $booking->return_date = $this->getDate($booking->return_date);
        
        
        return view('bookings.profile', ['booking' => $booking ]);
        //print_r($booking);
    }
    
    public function getEdit($id){
        $booking = DB::table('bookings')
            ->join('vessels', 'bookings.vessel_id', '=', 'vessels.imo')
            ->join('consignees', 'bookings.consignee_id', '=', 'consignees.id')
            ->leftJoin('drivers', 'bookings.driver_id', '=', 'drivers.id')
            ->select(['bookings.*', 'consignees.name as consignee_name', 'vessels.name as vessel_name', 'drivers.name as driver_name'])
            ->where('bookings.id', $id)
            ->first();
            
        $booking->eta = $this->getDate($booking->eta, 'd-m-Y');
        $booking->delivery_order = $this->getDate($booking->delivery_order, 'd-m-Y');
        $booking->port_charges_date = $this->getDate($booking->port_charges_date, 'd-m-Y');
        $booking->entry_passed = $this->getDate($booking->entry_passed, 'd-m-Y');
        $booking->t810_released = $this->getDate($booking->t810_released, 'd-m-Y');
        $booking->loaded_released = $this->getDate($booking->loaded_released, 'd-m-Y');
        $booking->transfer_date = $this->getDate($booking->transfer_date, 'd-m-Y');
        $booking->return_date = $this->getDate($booking->return_date, 'd-m-Y');
        
        return view('bookings.edit', ['booking' => $booking ]);
    } 
    
    public function postEdit(Request $request){
        //validate user input
        $this->validate($request, [
            "consignee" => "required",
            "vessel" => "required",
            "container" => "required",
            "eta" => "required",
            "status" => "required",
        ]);
        
        $booking = Booking::find($request['booking_id']);
        $booking->consignee_id = $request['consignee'];
        $booking->vessel_id = $request['vessel'];
        $booking->voyageNo = $request['voyage'];
        $booking->container_no = $request['container'];
        $booking->eta = $this->setDate($request['eta']);
        $booking->status = $request['status'];
        $booking->documents = $request['documents'];
        $booking->bl = $request['bl'];
        $booking->delivery_order = $this->setDate($request['delivery_order']);
        $booking->weight = $request['weight'];
        $booking->port_charges = $request['port_charges'];
        $booking->port_charges_date = $this->setDate($request['port_charges_date']);
        $booking->entry_passed = $this->setDate($request['entry_passed']);
        $booking->t810_released = $this->setDate($request['t810_released']);
        $booking->t810 = $request['t810'];
        $booking->t812 = $request['t812'];
        $booking->loaded_released = $this->setDate($request['loaded_released']);
        $booking->notes = $request['notes'];
        $booking->driver_id = ($request['driver'] == "" ? null : $request['driver']);
        $booking->truck_no = $request['truck_no'];
        $booking->trailer_no = $request['trailer_no'];
        $booking->destination = $request['destination'];
        $booking->transfer_date = $this->setDate($request['transfer_date']);
        $booking->return_date = $this->setDate($request['return_date']);
        //$booking->user_id = $user = Auth::user()->id;
        
        $message = "There were Errors!";
        
        if($booking->update()){
            $message = "Booking Updated Successfully";
            return redirect()->route('booking.profile', ['id' => $request['booking_id'] ])->with(['message' => $message]);
        }
    }
    
    public function setDate($value){
        return ($value == "" ? null : date('Y-m-d', strtotime(str_replace('/', '-', $value))));
    }
    
    public function getDate($date, $format=""){
        
        if($format == ""){
            return ($date == "" ? null : date('jS F, Y', strtotime($date)));//set as default date format
        }else{
            return ($date == "" ? null : date($format, strtotime($date)));
        }
        
        if($date = null) return "";
    }
    
    public function getDelete($id){
        if(Booking::destroy($id)){
            $message = "Booking Deleted Succesfully!";
            return redirect()->route('bookings.list')->with(['message' => $message]);
        }
    }
}
