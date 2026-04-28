@extends('admin.layouts.main') @section('main')

<div class="main-content">

    <h3 class="mb-4">Team Leader Management</h3>

   <div class="mt-4 table-box">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h5 class="mb-0">
            <i class="bi bi-people-fill me-2"></i>
            All Team Leaders
        </h5>

        <button 
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#quickModal">

            <i class="bi bi-person-plus-fill me-1"></i>
            Add Team Leader

        </button>

    </div>


    <table class="table table-hover table-bordered">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Team Leader</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($leader as $leader)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $leader->name }}</td>

            <td>{{ $leader->email }}</td>

            <td>
                <span class="badge bg-primary">
                    Team Leader
                </span>
            </td>

            <td>
                <span class="badge bg-success">
                    Active
                </span>
            </td>

            <td>

                <a href="javascript:void(0)"
                   class="btn btn-sm btn-info viewPermission"
                   data-id="{{ $leader->id }}"
                   data-name="{{ $leader->name }}">

                    <i class="bi bi-shield-lock me-1"></i>
                    Permission

                </a>


                <a href="javascript:void(0)"
                   class="btn btn-sm btn-warning editLeader"
                   data-id="{{ $leader->id }}"
                   data-name="{{ $leader->name }}"
                   data-email="{{ $leader->email }}">

                    <i class="bi bi-pencil-square me-1"></i>
                    Edit

                </a>


                <a href="javascript:void(0)"
                   class="btn btn-sm btn-danger deleteLeader"
                   data-id="{{ $leader->id }}">

                    <i class="bi bi-trash me-1"></i>
                    Delete

                </a>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="6"
                class="text-center text-danger">
                No Users Found
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</div>
<div class="modal fade" id="editModal" tabindex="-1">
 <div class="modal-dialog">
  <div class="modal-content">

   <div class="modal-header bg-warning">
      <h5 class="modal-title text-white">Edit Team Leader</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
   </div>

   <div class="modal-body">
      <input type="hidden" id="edit_id">

      <div class="mb-3">
         <label>Name</label>
         <input type="text" id="edit_name" class="form-control">
      </div>

      <div class="mb-3">
         <label>Email</label>
         <input type="email" id="edit_email" class="form-control">
      </div>
   </div>

   <div class="modal-footer">
      <button class="btn btn-success" id="updateLeader">
         Save Changes
      </button>
   </div>

  </div>
 </div>
</div>
<!-- Permission Modal -->
<div class="modal fade" id="permissionModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">
                    Manage Leader Permissions
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                <input type="hidden" id="leader_id">

                <h4 id="leaderName"></h4>


                <div class="card mt-3">

                    <div class="card-header">
                        Assign Permissions
                    </div>


                    <div class="card-body">

                        <div class="row">

                            @foreach($permissions as $permission)

                            <div class="col-md-6 mb-2">

                                <div class="form-check">

                                    <input
                                      class="form-check-input permission"
                                      type="checkbox"
                                      value="{{ $permission->name }}">

                                    <label class="form-check-label">

                                        {{ ucwords(
                                           str_replace(
                                             '_',
                                             ' ',
                                             $permission->name
                                           )
                                        ) }}

                                    </label>

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>


            <div class="modal-footer">

                <button
                    class="btn btn-success"
                    id="savePermission">

                    Save Permission

                </button>

            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="quickModal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">
               Add User
            </h5>
            <button
               type="button"
               class="btn-close"
               data-bs-dismiss="modal">
            </button>
         </div>
         <form action="{{ route('save_record') }}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="mb-3">
                  <label>Name</label>
                  <input
                     type="text"
                     name="name"
                     value="{{ old('name') }}"
                     required
                     class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                  <small class="text-danger">
                  {{ $message }}
                  </small>
                  @enderror
               </div>
               <div class="mb-3">
                  <label>Email</label>
                  <input
                     type="email"
                     name="email"
                     value="{{ old('email') }}"
                     required
                     class="form-control @error('email') is-invalid @enderror">
                  @error('email')
                  <small class="text-danger">
                  {{ $message }}
                  </small>
                  @enderror
               </div>
               <div class="mb-3">
                  <label>Password</label>
                  <input
                     type="password"
                     name="password"
                     required
                     class="form-control @error('password') is-invalid @enderror">
                  @error('password')
                  <small class="text-danger">
                  {{ $message }}
                  </small>
                  @enderror
               </div>
               <div class="mb-3">
                  <label>Confirm Password</label>
                  <input
                     type="password"
                     name="password_confirmation"
                     required
                     class="form-control">
               </div>
               <div class="form-check">
                  <input
                     type="checkbox"
                     name="terms"
                     required
                     class="form-check-input">
                  <label class="form-check-label">
                  Accept Terms
                  </label>
                  @error('terms')
                  <br>
                  <small class="text-danger">
                  {{ $message }}
                  </small>
                  @enderror
               </div>
            </div>
            <div class="modal-footer">
               <button
                  type="submit"
                  class="btn btn-success">
               Save Details
               </button>
            </div>
         </form>
      </div>
   </div>
</div>
<script>$(document).on('click', '.viewPermission', function() {

	let leaderId = $(this).data('id');
	let leaderName = $(this).data('name');

	$('#leader_id').val(leaderId);
	$('#leaderName').text("Leader : " + leaderName);


	$('.permission').prop('checked', false);


	$.get('/admin/get-permissions/' + leaderId, function(data) {
		data.forEach(function(item) {
			$('.permission[value="' + item + '"]')
				.prop('checked', true);
		});

	});

	// modal open
	var myModal = new bootstrap.Modal(
		document.getElementById('permissionModal')
	);

	myModal.show();

});


$(document).on('click', '.editLeader', function() {

	$('#edit_id').val($(this).data('id'));
	$('#edit_name').val($(this).data('name'));
	$('#edit_email').val($(this).data('email'));

	new bootstrap.Modal(
		document.getElementById('editModal')
	).show();

});

$('#updateLeader').click(function() {

	$.ajax({
		url: '/admin/update-leader',
		type: 'POST',
		data: {
			id: $('#edit_id').val(),
			name: $('#edit_name').val(),
			email: $('#edit_email').val(),
			_token: '{{ csrf_token() }}'
		},
		success: function() {

			Swal.fire({
				icon: 'success',
				title: 'Updated Successfully',
				confirmButtonText: 'OK'
			}).then(() => {
				location.reload();
			});

		}
	});

});




$(document).on('click', '.deleteLeader', function() {

	let id = $(this).data('id');

	Swal.fire({
		title: 'Delete this Team Leader?',
		text: 'This action cannot be undone',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes Delete'
	}).then((result) => {

		if (result.isConfirmed) {

			$.ajax({
				url: '/admin/delete-leader/' + id,
				type: 'DELETE',
				data: {
					_token: '{{ csrf_token() }}'
				},
				success: function() {

					Swal.fire(
						'Deleted!',
						'Team Leader removed.',
						'success'
					).then(() => {
						location.reload();
					});

				}
			});

		}

	});

});

$('#savePermission').click(function() {

	let permissions = [];

	$('.permission:checked').each(function() {
		permissions.push($(this).val());
	});

	$.ajax({
		url: '/admin/save-permission',
		type: 'POST',
		data: {
			leader_id: $('#leader_id').val(),
			permissions: permissions,
			_token: '{{ csrf_token() }}'
		},
		success: function(res) {

			Swal.fire({
				icon: 'success',
				title: 'Permission Saved',
				text: 'Permissions updated successfully',
				confirmButtonText: 'OK'
			}).then(() => {
				location.reload();
			});

		}
	});

});
</script>
@endsection