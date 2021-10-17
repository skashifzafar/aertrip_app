<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Employees;
function numValid ($numbers) {
    $out=[];
    foreach ($numbers as $num) {
        if (strlen($num) == 10){
            if (is_numeric($num)){
                array_push($out,$nums);
            }
        }
    
    }
    return $out;
 }
class ApiController extends Controller
{
    public function home(Request $req) {
		return response()->json([
          "message" => "Welcome!"
        ], 200);
	}
    public function createDepartment(Request $request) {
		$department = new Departments;
		$department->name = $request->name;
		$department->description = $request->description;
		$department->save();
		return response($department, 200);
		/*return response()->json([
			"message" => "department record created"
		], 201);*/
    }

    public function addEmployee(Request $request) {
		$employee = new Employees;
		$employee->name = $request->name;
		$employee->department = $request->department_name;
        if (!Departments::where('name', $request->department_name)->exists()) {
            return response()->json([
                "message" => "Department not found"
            ], 404);
        }

		$employee->phone_num = join('; ', $request->phone_numbers); //join('; ',numValid($request->phone_numbers));//to check the length of the numbers and the content are numeric
		$employee->address = join('; ', $request->addresses);
		$employee->save();
		return response($employee, 200);
		/*return response()->json([
			"message" => "department record created"
		], 201);*/
    }

    public function updateEmployee(Request $request) {
		
       if (Employees::where('id', $request->employee_id)->exists()) {
        $employee = Employees::find($request->employee_id);
        $employee->name = is_null($request->name) ? $employee->name : $request->name;
        $employee->department = is_null($request->department_name) ? $employee->department : $request->department_name;

        if (!is_null($request->department_name) && !Departments::where('name', $request->department_name)->exists()) {
            return response()->json([
                "message" => "Department not found"
            ], 404);
        }


        $employee->phone_num = is_null($request->phone_numbers) ? $employee->phone_num : join('; ',numValid($request->phone_numbers));//join('; ', $request->phone_numbers); //to check the length of the numbers and the content are numeric
        $employee->address = is_null($request->addresses) ? $employee->address : join('; ', $request->addresses);
        $employee->save();

        return response()->json([
            "employee updated object" => $employee
        ], 200);
        } else {
            return response()->json([
                "message" => "Employee not found"
            ], 404);
        }
    }

    public function searchEmployee(Request $request) {
      if (Employees::where('name', $request->employee_name)->exists()) {
        $employee = Employees::where('name', $request->employee_name)->get()->toJson(JSON_PRETTY_PRINT);
        return response($employee, 200);
      } else {
        return response()->json([
          "message" => "Employee not found"
        ], 404);
      }
    }

    public function viewEmployee (Request $request) {
      if (Employees::where('id', $request->employee_id)->exists()) {
        $employee = Employees::where('id', $request->employee_id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($employee, 200);
      } else {
        return response()->json([
          "message" => "Employee not found"
        ], 404);
      }
    }
	
    public function deleteEmployee (Request $request) {
       if(Employees::where('id', $request->employee_id)->exists()) {
        $employee = Employees::find($request->employee_id);
        $employee->delete();

        return response()->json([
          "deleted Employee" => $employee
        ], 202);
      } else {
        return response()->json([
          "message" => "Employee not found"
        ], 404);
      }
    }

    
}
