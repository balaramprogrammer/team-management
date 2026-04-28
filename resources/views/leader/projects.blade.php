@extends('leader.layouts.main')

@section('main')

<div class="main-content">
<div class="container-fluid">

<h3 class="page-title mb-3">
<i class="bi bi-kanban"></i> Projects
</h3>

@if(session('success'))
<div class="alert alert-success">
   <i class="bi bi-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="card shadow">

   <div class="card-header bg-primary text-white">
      <i class="bi bi-plus-circle"></i> Create New Project
   </div>

   <div class="card-body">

      <form action="{{ route('leader.projects.store') }}" method="POST">
         @csrf

         <!-- Title -->
         <div class="mb-3">
            <label><i class="bi bi-type"></i> Project Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter project title">
         </div>

         <!-- Description -->
         <div class="mb-3">
            <label><i class="bi bi-card-text"></i> Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
         </div>

         <!-- Student -->
         <div class="mb-3">
            <label><i class="bi bi-person"></i> Assign Student</label>

            <select name="student_id" class="form-control">
               <option value="">Select Student</option>
               @foreach($students as $student)
                  <option value="{{ $student->id }}">
                     {{ $student->student_name }}
                  </option>
               @endforeach
            </select>
         </div>

         <!-- Deadline -->
         <div class="mb-3">
            <label><i class="bi bi-calendar-event"></i> Deadline</label>
            <input type="date" name="deadline" class="form-control">
         </div>

         <!-- Status -->
         <div class="mb-3">
            <label><i class="bi bi-flag"></i> Status</label>
            <select name="status" class="form-control">
               <option value="Pending">Pending</option>
               <option value="In Progress">In Progress</option>
               <option value="Completed">Completed</option>
            </select>
         </div>

         <!-- Progress -->
         <div class="mb-3">
            <label><i class="bi bi-bar-chart"></i> Progress (%)</label>
            <input type="number" name="progress" class="form-control" min="0" max="100" value="0">
         </div>

         <!-- Submit -->
         <button class="btn btn-success">
            <i class="bi bi-save"></i> Create Project
         </button>

      </form>

   </div>
</div>

</div>
</div>

@endsection