@extends('admin.layouts.main') @section('main')

<div class="main-content">

    <h3 class="mb-4">Users Management</h3>

    <div class="mt-4 table-box">

        <h5 class="mb-4">All Users</h5>

        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($users as $user)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        <span class="badge bg-primary">
                    User
                    </span>
                    </td>

                    <td>
                        <span class="badge bg-success">
                    Active
                    </span>
                    </td>

                    <td>

                        <a href="" class="btn btn-sm btn-info">
                            View
                            </a>

                        <a href="" class="btn btn-sm btn-warning">
                        Edit
                        </a>

                        <a href="" class="btn btn-sm btn-danger">
                        Delete
                        </a>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center text-danger">
                        No Users Found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection