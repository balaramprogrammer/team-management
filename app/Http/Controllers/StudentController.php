<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::where('leader_id',Auth::id())->get();
        
        return view('leader.student-list',compact('students'));
        
    }


public function store(Request $request)
{
    $request->validate([
        'student_name'   => 'required',
        'father_name'    => 'nullable|string',
        'email'          => 'nullable|email',
        'mobile'         => 'required|digits:10',
        'dob'            => 'nullable|date',
        'gender'         => 'nullable|string',
        'address'        => 'nullable|string',
        'course'         => 'required',
        'batch'          => 'nullable|string',
        'admission_date' => 'nullable|date',
        'fees'           => 'required|numeric',
    ]);

    Student::create([
        'leader_id'      => Auth::id(),
        'student_name'   => $request->student_name,
        'father_name'    => $request->father_name,
        'email'          => $request->email,
        'mobile'         => $request->mobile,
        'dob'            => $request->dob,
        'gender'         => $request->gender,
        'address'        => $request->address,
        'course'         => $request->course,
        'batch'          => $request->batch,
        'admission_date' => $request->admission_date,
        'fees'           => $request->fees,
        'status'         => 'Active',
    ]);

    return back()->with('success', 'Student added successfully!');
}

public function update(Request $request)
{
    $student = Student::findOrFail($request->id);

    $student->update([
        'student_name' => $request->student_name,
        'course'       => $request->course,
        'mobile'       => $request->mobile,
        'fees'         => $request->fees
    ]);

    return response()->json([
        'status'=>true
    ]);
}

public function destroy($id)
{
    $student = Student::findOrFail($id);

    $student->delete();

    return response()->json([
        'status'=>true
    ]);
}

}
