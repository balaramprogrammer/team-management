@extends('leader.layouts.main')

@section('main')

<div class="main-content">
<div class="container-fluid">

@php
   $permissions = DB::table('role_permission')
       ->where('user_id', auth()->id())
       ->pluck('permission_id')
       ->toArray();
       //dd($permissions);
   
@endphp

<div class="card shadow">
 @if(in_array(1, $permissions))
                  <div class="d-flex justify-content-end mb-3">
   <button class="btn btn-sm btn-primary"
           data-bs-toggle="modal"
           data-bs-target="#projectModal">
      <i class="bi bi-plus-circle"></i> Add Task
   </button>
</div>
                  @endif

   <div class="card-header bg-dark text-white">
      <i class="bi bi-list-task"></i> All Projects
   </div>

   <div class="card-body table-responsive">

      <table class="table table-bordered table-hover text-nowrap">

         <thead class="table-dark">
            <tr>
               <th>#</th>
               <th>Title</th>
               <th>Student</th>
               <th>Deadline</th>
               <th>Status</th>
               <th>Progress</th>
               <th>Action</th>
            </tr>
         </thead>

         <tbody>

            @forelse($allprojects as $key => $project)

            <tr>

               <td>{{ $key+1 }}</td>

               <td>{{ $project->title }}</td>

               <td>
                  {{ $project->student->student_name ?? 'N/A' }}
               </td>

               <td>
                  {{ $project->deadline ?? '-' }}
               </td>

               <td>
                  <span class="badge bg-info">
                     {{ $project->status }}
                  </span>
               </td>

               <td style="min-width:150px;">
                  <div class="progress">
                     <div class="progress-bar bg-success"
                          style="width: {{ $project->progress }}%">
                        {{ $project->progress }}%
                     </div>
                  </div>
               </td>

               <!-- ACTION -->
               <td class="text-nowrap">

                
                 


                {{-- VIEW --}}
                @if(in_array(2, $permissions))
                <a href="#" class="btn btn-sm btn-info" title="View">
                <i class="bi bi-eye"></i>
                </a>
                @endif

                    {{-- EDIT --}}
                 @if(in_array(3, $permissions))
<a href="javascript:void(0)"
   class="btn btn-sm btn-warning editProject"
   title="Edit"
   data-id="{{ $project->id }}"
   data-student="{{ $project->student_id }}"
   data-title="{{ $project->title }}"
   data-description="{{ $project->description }}"
   data-deadline="{{ $project->deadline }}"
   data-status="{{ $project->status }}"
   data-progress="{{ $project->progress }}">

   <i class="bi bi-pencil-fill"></i>
</a>
@endif
                  {{-- DELETE (permission_id = 4) --}}
                 @if(in_array(4, $permissions))
                <a href="{{ route('leader.projects.delete', $project->id) }}"
                class="btn btn-sm btn-danger"
                title="Delete"
                onclick="return confirm('Are you sure you want to delete this project?')">

                <i class="bi bi-trash"></i>

                </a>
                @endif

               </td>

            </tr>

            @empty

            <tr>
               <td colspan="7" class="text-center text-danger">
                  No Projects Found
               </td>
            </tr>

            @endforelse

         </tbody>

      </table>

   </div>

</div>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="projectModal" tabindex="-1">
   <div class="modal-dialog modal-lg modal-dialog-centered">

      <div class="modal-content">

         <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">
               <i class="bi bi-kanban"></i> Add New Project
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>

         <form action="{{ route('leader.projects.store') }}" method="POST">
            @csrf

            <div class="modal-body">

               <!-- Student -->
               <div class="mb-3">
                  <label><i class="bi bi-person"></i> Assign Student</label>
                  <select name="student_id" class="form-control" required>
                     <option value="">Select Student</option>
                     @foreach($students as $student)
                        <option value="{{ $student->id }}">
                           {{ $student->student_name }}
                        </option>
                     @endforeach
                  </select>
               </div>

               <!-- Title -->
               <div class="mb-3">
                  <label><i class="bi bi-type"></i> Project Title</label>
                  <input type="text" name="title" class="form-control" required>
               </div>

               <!-- Description -->
               <div class="mb-3">
                  <label><i class="bi bi-card-text"></i> Description</label>
                  <textarea name="description" class="form-control" rows="3" required></textarea>
               </div>

               <!-- Deadline -->
               <div class="mb-3">
                  <label><i class="bi bi-calendar-event"></i> Deadline</label>
                  <input type="date" name="deadline" class="form-control">
               </div>

               <!-- Status -->
               <div class="mb-3">
                  <label><i class="bi bi-flag"></i> Status</label>
                  <select name="status" class="form-control" required>
                     <option value="Pending">Pending</option>
                     <option value="In Progress">In Progress</option>
                     <option value="Completed">Completed</option>
                  </select>
               </div>

               <!-- Progress -->
               <div class="mb-3">
                  <label><i class="bi bi-bar-chart"></i> Progress (%)</label>
                  <input type="number" name="progress"
                         class="form-control"
                         min="0" max="100"
                         value="0">
               </div>

            </div>

            <!--  MODAL FOOTER (SUBMIT BUTTON ADDED) -->
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancel
               </button>

               <button type="submit" class="btn btn-success">
                  <i class="bi bi-save"></i> Save Project
               </button>
            </div>

         </form>

      </div>

   </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editProjectModal" tabindex="-1">
   <div class="modal-dialog modal-lg modal-dialog-centered">

      <div class="modal-content">

         <div class="modal-header bg-warning text-dark">
            <h5 class="modal-title">
               <i class="bi bi-pencil-square"></i> Update Project
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>

         <form action="{{ route('leader.projects.update') }}" method="POST">
            @csrf

            <input type="hidden" name="id" id="edit_id">

            <div class="modal-body">

               <!-- Student -->
               <div class="mb-3">
                  <label>Assign Student</label>
                  <select name="student_id" id="edit_student" class="form-control">
                     @foreach($students as $student)
                        <option value="{{ $student->id }}">
                           {{ $student->student_name }}
                        </option>
                     @endforeach
                  </select>
               </div>

               <!-- Title -->
               <div class="mb-3">
                  <label>Project Title</label>
                  <input type="text" name="title" id="edit_title" class="form-control">
               </div>

               <!-- Description -->
               <div class="mb-3">
                  <label>Description</label>
                  <textarea name="description" id="edit_description" class="form-control"></textarea>
               </div>

               <!-- Deadline -->
               <div class="mb-3">
                  <label>Deadline</label>
                  <input type="date" name="deadline" id="edit_deadline" class="form-control">
               </div>

               <!-- Status -->
               <div class="mb-3">
                  <label>Status</label>
                  <select name="status" id="edit_status" class="form-control">
                     <option value="Pending">Pending</option>
                     <option value="In Progress">In Progress</option>
                     <option value="Completed">Completed</option>
                  </select>
               </div>

               <!-- Progress -->
               <div class="mb-3">
                  <label>Progress (%)</label>
                  <input type="number" name="progress" id="edit_progress" class="form-control">
               </div>

            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancel
               </button>

               <button type="submit" class="btn btn-success">
                  <i class="bi bi-save"></i> Update Project
               </button>
            </div>

         </form>

      </div>

   </div>
</div>

<script>
$(document).on('click', '.editProject', function() {

    $('#edit_id').val($(this).data('id'));
    $('#edit_student').val($(this).data('student'));
    $('#edit_title').val($(this).data('title'));
    $('#edit_description').val($(this).data('description'));
    $('#edit_deadline').val($(this).data('deadline'));
    $('#edit_status').val($(this).data('status'));
    $('#edit_progress').val($(this).data('progress'));

    new bootstrap.Modal(document.getElementById('editProjectModal')).show();

});
</script>
@endsection