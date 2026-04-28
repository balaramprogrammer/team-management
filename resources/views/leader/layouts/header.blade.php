<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive User  Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body{
        margin:0;
        background:#f4f6fb;
        overflow-x:hidden;
        font-family:Arial;
        }
        
        /* Topbar */
        .topbar{
        height:70px;
        position:fixed;
        top:0;
        left:0;
        right:0;
        z-index:1000;
        background:#fff;
        box-shadow:0 2px 8px rgba(0,0,0,.08);
        padding:0 20px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        }
        
        /* Sidebar */
        .sidebar{
        position:fixed;
        top:70px;
        left:0;
        width:260px;
        height:calc(100vh - 70px);
        background:linear-gradient(180deg,#1e3c72,#2a5298);
        overflow-y:auto;
        transition:.3s;
        }
        
        .sidebar .nav-link{
        color:white;
        padding:14px 25px;
        }
        
        .sidebar .nav-link:hover{
        background:rgba(255,255,255,.15);
        }
        
        /* Main */
        .main-content{
        margin-left:260px;
        margin-top:70px;
        padding:30px;
        transition:.3s;
        }
        
        /* Cards */
        .dashboard-card{
        border:none;
        border-radius:15px;
        box-shadow:0 4px 12px rgba(0,0,0,.05);
        }
        
        .icon-box{
        width:60px;
        height:60px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        color:white;
        font-size:25px;
        }
        
        .bg1{background:#0d6efd;}
        .bg2{background:#198754;}
        .bg3{background:#dc3545;}
        .bg4{background:#ffc107;color:black;}
        
        /* Table wrapper */
        .table-box{
        background:#fff;
        padding:25px;
        border-radius:15px;
        overflow:auto;
        }
        
        /* Mobile Toggle Hidden Desktop */
        .menu-btn{
        display:none;
        font-size:30px;
        cursor:pointer;
        }
        
        /* Tablet */
        @media(max-width:991px){
        
        .sidebar{
        width:220px;
        }
        
        .main-content{
        margin-left:220px;
        padding:20px;
        }
        
        }
        
        /* Mobile */
        @media(max-width:768px){
        
        .menu-btn{
        display:block;
        }
        
        .sidebar{
        left:-260px;
        width:260px;
        z-index:999;
        }
        
        .sidebar.show{
        left:0;
        }
        
        .main-content{
        margin-left:0;
        padding:15px;
        }
        
        .topbar h4{
        font-size:20px;
        }
        
        }
        
        /* Extra Small */
        @media(max-width:576px){
        
        .main-content{
        padding:12px;
        }
        
        .dashboard-card{
        text-align:center;
        }
        
        .icon-box{
        margin:auto;
        margin-top:10px;
        }
        
        .table{
        font-size:14px;
        }
        
        }
    </style>
</head>

<body>


    <!-- Topbar -->
    <div class="topbar">

        <div class="d-flex align-items-center gap-3">
            <span class="menu-btn" onclick="toggleSidebar()">
<i class="bi bi-list"></i>
</span>

            <h4 class="mb-0 fw-bold">
Leader: {{ Auth::user()->name }}
</h4>
        </div>

        <div class="dropdown">
            <a href="#" class="dropdown-toggle text-dark text-decoration-none" data-bs-toggle="dropdown">
User
</a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>

        </div>

    </div>

@include('leader.layouts.sidebar')