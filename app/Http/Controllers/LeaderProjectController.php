<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class LeaderProjectController extends Controller
{
    public function index()
    {
        // Team members/students list
        $students = Student::where('leader_id', Auth::user()->id)->get();

        // Leader created projects
        $projects = Project::latest()->get();

        return view('leader.projects',compact('students','projects'));
    }


   public function store(Request $request)
{
    $request->validate([
        'student_id'  => 'required',
        'title'       => 'required',
        'description' => 'required',
        'deadline'    => 'nullable|date',
        'status'      => 'required',
        'progress'    => 'nullable|integer|min:0|max:100',
    ]);

    Project::create([
        'leader_id'   => auth::id(),
        'student_id'  => $request->student_id,
        'title'       => $request->title,
        'description' => $request->description,
        'deadline'    => $request->deadline,
        'status'      => $request->status,
        'progress'    => $request->progress ?? 0,
    ]);

    return back()->with('success', 'Project Created Successfully');
}



public function projectView()
{
    $allprojects = Project::where('leader_id', auth::id())->get();
    $students = Student::where('leader_id', auth::id())->get();

    $permissions = DB::table('role_permission')
        ->where('user_id', auth::id())
        ->pluck('permission_id')
        ->toArray();

    return view('leader.project_view', compact('allprojects', 'permissions', 'students'));
}

    public function viewForEdit()
    {
         $allprojects = Project::where('leader_id', Auth::id())->get();
        return view('leader.project_view_edite', compact('allprojects'));           
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return back()->with('success', 'Project Deleted Successfully');
    }  
    
    public function update(Request $request)
{
    $project = Project::findOrFail($request->id);

    $project->update([
        'student_id'  => $request->student_id,
        'title'       => $request->title,
        'description' => $request->description,
        'deadline'    => $request->deadline,
        'status'      => $request->status,
        'progress'    => $request->progress,
    ]);

    return back()->with('success', 'Project Updated Successfully');
}
}