<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(): View
    {
        $role = new Employee();

        return view('employee.index', compact('role'));    
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
            $validated = $request->validate([
                'role' => 'required|string|max:255',
                'status' => 'required|string|uppercase|max:255',
                'email' => 'string|uppercase|max:255',
                'phone' => 'string|uppercase|max:255',
                
            ], [
                'last.uppercase' => 'The :attribute must be uppercase.',
            ]);
            $request->user()->employee()->create($validated);
            return redirect(route('employee.index'));
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
        $count = (string)Employee::where('role', $data)->count();
        $role = substr($data, 0, 1);
        if($count == 0){
            return response($role.'-001');
        }else{
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
    
    public function upload(Request $request)
    {
        // Validate the image file
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        // Save the image
        $imagePath = $request->file('image')->store('images', 'public');

        // Return a response or perform additional actions
        return response()->json([
            'message' => 'Image uploaded successfully',
            'path' => $imagePath,
        ]);
    }
}
