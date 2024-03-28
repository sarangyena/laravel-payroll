<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Payroll;
use Illuminate\Http\RedirectResponse;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('a-employee');
    }

    public function details(): View
    {
        // Retrieve all data from the table
        $data = Employee::paginate(6);
        // Pass the data to the view
        return view('a-view', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'role' => 'required|string|uppercase|max:255',
                'userId' => 'required|string|uppercase|max:255',
                'last' => 'required|string|uppercase|max:255',
                'first' => 'required|string|uppercase|max:255',
                'middle' => 'nullable|string|uppercase|max:255',
                'status' => 'required|string|uppercase|max:255',
                'email' => 'nullable|string|uppercase|max:255',
                'phone' => 'nullable|string|uppercase|max:255',
                'job' => 'required|string|uppercase|max:255',
                'sss' => 'nullable|string|uppercase|max:255',
                'philhealth' => 'nullable|string|uppercase|max:255',
                'pagibig' => 'nullable|string|uppercase|max:255',
                'rate' => 'required|string|uppercase|max:255',
                'address' => 'required|string|uppercase|max:255',
                'eName' => 'nullable|string|uppercase|max:255',
                'ePhone' => 'nullable|string|uppercase|max:255',
                'eAdd' => 'nullable|string|uppercase|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Get the authenticated user's name
            $userName = auth()->user()->name;

            // Add the user's name to the validated data
            $validated['created_by'] = $userName;
            // Create a new record in the database
            Employee::create($validated); 

            //Save image in Database
            $employee = Employee::where('userId', $request->all()['userId'])->first();
            $id = $employee->id;

            $image = new Image();
            $imageName = $request->all()['userId'].'-'.time().'.'.$request->image->extension();  
            if($request->all()['role'] == 'EMPLOYEE'){
                $request->image->move(public_path('images/employee'), $imageName);
                $image->file_path = '/images/employee/'.$imageName;
            }else if($request->all()['role'] == 'ON-CALL'){
                $request->image->move(public_path('images/on-call'), $imageName);
                $image->file_path = '/images/on-call/'.$imageName;
            }
            $image->user_id = $id;
            $image->file_name = $imageName;
            $image->save();

            $payroll = new Payroll();
            $payroll->user_id = $id;
            $payroll->name = $request->all()['last'].', '.$request->all()['first'].' '.$request->all()['middle'];
            $payroll->job = $request->all()['job'];
            $payroll->rate = $request->all()['rate'];
            $payroll->rph = $request->all()['rate']/8+($request->all()['rate']/8)*0.2;
            $payroll->save();


            return redirect(route('employee.index'))->with('success', 'Successfully added employee.');
        } catch (\Exception $e) {
            return redirect(route('employee.index'))->with('error', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function handleAjaxRequest(Request $request): Response
    {
        // Retrieve data sent from jQuery AJAX request
        $data = $request->input('dataString');
        $count = (string)Employee::where('role', $data)->count() + 1;
        $role = substr($data, 0, 1);
        $length = strlen($count);
        switch($length){
            case 1:
                return response($role.'-00'.$count);
            case 2:
                return response($role.'-0'.$count);
            case 3:
                return response($role.'-'.$count);
            default:
                return response('default');
        }
    }
}
