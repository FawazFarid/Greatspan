<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Datatables;

class EmployeeController extends Controller
{
    public function getNew(){
        return view('employees.new');
    }
    
    public function postNew(Request $request){
        //validate user input
        $this->validate($request, [
            "id_no" => 'required|min:6',
            "first_name" => "required|max:120",
            "middle_name" => "required|max:120",
        ]);
        
        
        $first_name = ucwords($request['first_name']);
        $middle_name = ucwords($request['middle_name']);
        $last_name = ucwords($request['last_name']);
        //encrypt password, you can use the bcrypt() built-in function
        $password = password_hash($request['password'], PASSWORD_DEFAULT);
       
        $employee = new Employee();
        $employee->id = $request['id_no'];
        $employee->first_name = $first_name;
        $employee->middle_name = $middle_name;
        $employee->last_name = $last_name;
        $employee->gender = $request['gender'];
        $employee->address = $request['address'];
        $employee->phone_home = $request['phone_home'];
        $employee->phone_office = $request['phone_office'];
        $employee->role = $request['role'];
        $employee->salary = $request['salary'];
        $employee->hire_date = $request['hire_date'];
        //write to database
        if($employee->save()){
            $message = "Employee Registered Successfully!";
            return redirect()->route('employee.list')->with(['message' => $message]);
        }
    }
    
    public function getEmployeeList(){
        return view('employees.list');
    }
    
    public function getEmployeeDatatable(){
        
        $employees = DB::table('employees')->select(['id', 'first_name', 'middle_name', 'gender', 'role']);
            
        //return $consignees datatables;
         
        return Datatables::of($employees)
            ->addColumn('action', function ($employee) {
                return '<a href="'. route('employee.profile', ['id' => $employee->id]) . '" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> View</a>
                        <a href="'. route('employee.edit', ['id' => $employee->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="'. route('employee.delete', ['id' => $employee->id]) . '" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure you want to delete this employee?\');"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->make(true);
    }
    
    public function getEmployeeById($id){
        $employee = Employee::find($id);
        return view('employees.profile', ['employee' => $employee ]);
        //print_r($employee);
    } 
    
    public function getEdit($id){
        $employee = Employee::findorfail($id);
        //print_r($employee);
        return view('employees.edit', [ 'employee' => $employee ]);
    } 
    
    public function postEdit(Request $request){
        $this->validate($request, [
            "id_no" => 'required|min:6',
            "first_name" => "required|max:120",
            "middle_name" => "required|max:120",
        ]);
        
        $employee = Employee::findorfail($request['employee_id']);
        $employee->id = $request['id_no'];
        $employee->first_name = ucwords($request['first_name']);
        $employee->middle_name = ucwords($request['middle_name']);
        $employee->last_name = ucwords($request['last_name']);
        $employee->gender = $request['gender'];
        $employee->address = $request['address'];
        $employee->phone_home = $request['phone_home'];
        $employee->phone_office = $request['phone_office'];
        $employee->role = $request['role'];
        $employee->salary = $request['salary'];
        $employee->hire_date = $request['hire_date']; 
        
        $message = "There Were Errors";
        
        if($employee->save()){
            $message = "Employee Edited Successfully!";
            return redirect()->route('employee.list')->with(['message' => $message]);
        }
    }
    
    public function getDelete($id){
        $message = "There Were Errors";
        if(Employee::destroy($id)){
            $message = "Employee Deleted Succesfully!";
        }
        
        return redirect()->route('employee.list')->with(['message' => $message]);
    }
}
