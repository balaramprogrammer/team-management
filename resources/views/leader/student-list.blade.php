@extends('leader.layouts.main')
@section('main')
<style>
/* Horizontal scroll enable */
.custom-table {
    overflow-x: auto;
}

/* Prevent wrapping */
#studentTable th,
#studentTable td {
    white-space: nowrap;
    vertical-align: middle;
}

/* Keep action buttons inline */
#studentTable td .btn {
    margin-right: 3px;
    white-space: nowrap;
}

/* Truncate long text */
.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
<div class="main-content">
   <h3 class="mb-4">Student Management</h3>

   <div class="mt-4 table-box">

      <!-- Top Bar -->
      <div class="d-flex justify-content-between mb-3">
         <h5>All Students</h5>

        <!-- Add Button -->
         <a href="javascript:void(0)"
            class="btn btn-primary ms-2"
            data-bs-toggle="modal"
            data-bs-target="#studentModal">
            Add Student
         </a>

         
      </div>
      <div class="d-flex justify-content-between mb-3">
      

         <!-- Search -->
         <input type="text"
            id="searchInput"
            class="form-control w-25"
            placeholder="Search student...">

         
      </div>

      <div class="table-responsive custom-table">

<table class="table table-hover table-bordered table-striped text-nowrap" id="studentTable">

   <thead class="table-dark">
      <tr>
         <th>#</th>
         <th>Name</th>
         <th>Father</th>
         <th>Email</th>
         <th>Mobile</th>
         <th>Course</th>
         <th>Batch</th>
         <th>Fees</th>
         <th>Status</th>
         <th style="min-width: 160px;">Action</th>
      </tr>
   </thead>

   <tbody>
      @forelse($students as $student)
      <tr>

         <td>{{ $loop->iteration }}</td>

         <td class="text-truncate" style="max-width:120px;">
            {{ $student->student_name }}
         </td>

         <td class="text-truncate" style="max-width:120px;">
            {{ $student->father_name }}
         </td>

         <td class="text-truncate" style="max-width:150px;">
            {{ $student->email }}
         </td>

         <td>{{ $student->mobile }}</td>

         <td>{{ $student->course }}</td>

         <td>{{ $student->batch }}</td>

         <td>₹{{ $student->fees }}</td>

         <td>
            <span class="badge bg-success">
               {{ $student->status }}
            </span>
         </td>

       <td class="text-nowrap">

   <a href="javascript:void(0)"
      class="btn btn-sm btn-info viewStudent"
      data-name="{{ $student->student_name }}"
      data-father="{{ $student->father_name }}"
      data-email="{{ $student->email }}"
      data-mobile="{{ $student->mobile }}"
      data-course="{{ $student->course }}"
      data-batch="{{ $student->batch }}"
      data-fees="{{ $student->fees }}"
      data-address="{{ $student->address }}"
      data-status="{{ $student->status }}">
      View
   </a>

   <a href="javascript:void(0)"
      class="btn btn-sm btn-warning editStudent"
      data-id="{{ $student->id }}"
      data-name="{{ $student->student_name }}"
      data-father="{{ $student->father_name }}"
      data-email="{{ $student->email }}"
      data-mobile="{{ $student->mobile }}"
      data-course="{{ $student->course }}"
      data-batch="{{ $student->batch }}"
      data-fees="{{ $student->fees }}"
      data-address="{{ $student->address }}">
      Edit
   </a>

   <a href="javascript:void(0)"
      class="btn btn-sm btn-danger deleteStudent"
      data-id="{{ $student->id }}">
      Delete
   </a>

</td>

      </tr>
      @empty
      <tr>
         <td colspan="10" class="text-center text-danger">
            No Students Found
         </td>
      </tr>
      @endforelse
   </tbody>

</table>

</div>
   </div>
</div>

<div class="modal fade" id="studentModal" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header bg-primary text-white">
            <h5>Add Student</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <form action="{{ route('leader.students.store') }}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <label>Student Name</label>
                     <input type="text" name="student_name" class="form-control" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Father Name</label>
                     <input type="text" name="father_name" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Email</label>
                     <input type="email" name="email" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Mobile</label>
                     <input type="text" name="mobile" maxlength="10" class="form-control" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Date of Birth</label>
                     <input type="date" name="dob" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Gender</label>
                     <select name="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                     </select>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label>Address</label>
                     <textarea name="address" class="form-control"></textarea>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Course</label>
                     <select name="course" class="form-control" required>
                        <option value="">Select Course</option>
                        <option value="PHP">PHP</option>
                        <option value="Laravel">Laravel</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="React JS">React JS</option>
                        <option value="Node JS">Node JS</option>
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="CCC">CCC</option>
                        <option value="O Level">O Level</option>
                        <option value="ADCA">ADCA</option>
                        <option value="DCA">DCA</option>
                        <option value="Tally GST">Tally GST</option>
                     </select>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Batch</label>
                     <input type="text" name="batch" class="form-control" placeholder="Morning / Evening">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Admission Date</label>
                     <input type="date" name="admission_date" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label>Fees</label>
                     <input type="number" name="fees" class="form-control" required>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success">
               Save Student
               </button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="modal fade" id="viewModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-info text-white">
            <h5>Student Details</h5>
            <button class="btn-close"
               data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body">
            <p><b>Name:</b> <span id="v_name"></span></p>
            <p><b>Course:</b> <span id="v_course"></span></p>
            <p><b>Mobile:</b> <span id="v_mobile"></span></p>
            <p><b>Fees:</b> ₹<span id="v_fees"></span></p>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="editModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-warning">
            <h5 class="modal-title text-white" >Edit Student</h5>
         </div>
         <div class="modal-body">
            <input type="hidden" id="edit_id">
            <input type="text"
               id="edit_name"
               class="form-control mb-3">
            <input type="text"
               id="edit_course"
               class="form-control mb-3">
            <input type="text"
               id="edit_mobile"
               class="form-control mb-3">
            <input type="text"
               id="edit_fees"
               class="form-control mb-3">
            <button id="updateStudent"
               class="btn btn-success">
            Update
            </button>
         </div>
      </div>
   </div>
</div>
<script>

$(document).on('click','.editStudent',function(){

$('#edit_id').val($(this).data('id'));
$('#edit_name').val($(this).data('name'));
$('#edit_course').val($(this).data('course'));
$('#edit_mobile').val($(this).data('mobile'));
$('#edit_fees').val($(this).data('fees'));

new bootstrap.Modal(
document.getElementById('editModal')
).show();

});

$(document).on('click', '.viewStudent', function() {

    $('#v_name').text($(this).data('name'));
    $('#v_father').text($(this).data('father'));
    $('#v_email').text($(this).data('email'));
    $('#v_mobile').text($(this).data('mobile'));
    $('#v_course').text($(this).data('course'));
    $('#v_batch').text($(this).data('batch'));
    $('#v_fees').text($(this).data('fees'));
    $('#v_address').text($(this).data('address'));
    $('#v_status').text($(this).data('status'));

    new bootstrap.Modal(
        document.getElementById('viewModal')
    ).show();

});

$('#updateStudent').click(function() {
	
	$.ajax({
		url: '/leader/student-update',
		type: 'POST',
		data: {
			id: $('#edit_id').val(),
			student_name: $('#edit_name').val(),
			course: $('#edit_course').val(),
			mobile: $('#edit_mobile').val(),
			fees: $('#edit_fees').val(),
			_token: '{{ csrf_token() }}'
		},
		success: function() {

			Swal.fire(
				'Updated!',
				'Student updated successfully',
				'success'
			).then(() => location.reload());

		}
	});

});


$(document).on('click', '.deleteStudent', function() {

	let id = $(this).data('id');

	Swal.fire({
		title: 'Delete Student?',
		icon: 'warning',
		showCancelButton: true
	}).then((result) => {

		if (result.isConfirmed) {

			$.ajax({
				url: '/leader/student-delete/' + id,
				type: 'DELETE',
				data: {
					_token: '{{ csrf_token() }}'
				},
				success: function() {

					Swal.fire(
						'Deleted!',
						'Student removed',
						'success'
					).then(() => location.reload());

				}
			});

		}

	});

});
</script>

@endsection