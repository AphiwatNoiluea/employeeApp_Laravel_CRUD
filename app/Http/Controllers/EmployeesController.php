<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Exception;
use App\Models\Employee;

class EmployeesController extends Controller
{
    // Get Employee List From Database.

    public function getEmployeeList()
    {
        try
        {
            $employees = Employee::orderBy('id', 'ASC')->get();
            return response()->json($employees);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }

    public function getEmployeeDetails(Request $request)
    {
        try
        {
            $employeeData = Employee::findOrFail($request->get('employeeId'));
            return response()->json($employeeData);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }

    public function updateEmployeeData(Request $request)
    {
        try
        {
            $employeeId     = $request->get('employeeId');
            $employeeName   = $request->get('employeeName');
            $employeeSalary = $request->get('employeeSalary');

            Employee::where('id', $employeeId)->update([
                'employee_name'   =>  $employeeName,
                'salary' =>  $employeeSalary
            ]);

            return response()->json([
                'employee_name'   =>  $employeeName,
                'salary' =>  $employeeSalary
            ]);
        
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }


    //deleting 
    public function destroy(Employee $employee)
    {
        try
        {
            $employee->delete();
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }

    //storing new employee
    public function store(Request $request)
    {
        try
        {
            $employeeName = $request->get('employeeName');
            $employeeSalary = $request->get('employeeSalary');

            Employee::create([
                'employee_name'   =>  $employeeName,
                'salary'          =>  $employeeSalary
            ]);

            return response()->json([
                'employee_name'     =>  $employeeName,
                'salary'            =>  $employeeSalary
            ]);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }
}



