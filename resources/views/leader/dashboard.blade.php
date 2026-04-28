@extends('leader.layouts.main')
@section('main')

    <!-- Main -->
    <div class="main-content">

        <h3 class="mb-4">Dashboard Overview</h3>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card dashboard-card p-4">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div>
                            <h6>Total Users</h6>
                            <h2>1200</h2>
                        </div>
                        <div class="icon-box bg1">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card dashboard-card p-4">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div>
                            <h6>Revenue</h6>
                            <h2>$8500</h2>
                        </div>
                        <div class="icon-box bg2">
                            <i class="bi bi-cash"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card dashboard-card p-4">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div>
                            <h6>Orders</h6>
                            <h2>560</h2>
                        </div>
                        <div class="icon-box bg3">
                            <i class="bi bi-cart"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card dashboard-card p-4">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div>
                            <h6>Pending</h6>
                            <h2>32</h2>
                        </div>
                        <div class="icon-box bg4">
                            <i class="bi bi-clock"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="mt-5 table-box">

            <h5 class="mb-4">Recent Users</h5>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John</td>
                        <td>john@gmail.com</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>David</td>
                        <td>david@gmail.com</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                    </tr>

                </tbody>
            </table>

        </div>

    </div>
@endsection