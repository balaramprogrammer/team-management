<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Team Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
font-family:Arial, sans-serif;
background:#f5f7fb;
}

.navbar{
box-shadow:0 2px 15px rgba(0,0,0,0.08);
}

.hero{
background:linear-gradient(135deg,#0d6efd,#6610f2);
color:white;
padding:100px 0;
}

.hero h1{
font-size:55px;
font-weight:bold;
}

.hero p{
font-size:20px;
margin-top:20px;
}

.btn-custom{
padding:14px 30px;
border-radius:30px;
font-weight:bold;
}

.section-title{
font-weight:bold;
margin-bottom:50px;
}

.feature-card{
background:white;
border:none;
border-radius:20px;
padding:35px 25px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
transition:.3s;
height:100%;
}

.feature-card:hover{
transform:translateY(-10px);
}

.feature-card i{
font-size:45px;
color:#0d6efd;
margin-bottom:20px;
}

.role-box{
background:white;
border-radius:20px;
padding:35px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.stats{
background:#0d6efd;
color:white;
padding:70px 0;
}

.counter{
font-size:45px;
font-weight:bold;
}

.cta{
background:#111827;
color:white;
padding:80px 0;
}

footer{
background:#000;
color:#ddd;
padding:20px;
}


html {
    scroll-behavior: smooth;
}

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white sticky-top">
<div class="container">
<a class="navbar-brand fw-bold text-primary" href="#">TeamManager</a>
<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="menu">
<ul class="navbar-nav ms-auto">
<li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Home</a></li>
<li class="nav-item"><a class="nav-link" href="#">Features</a></li>
<li class="nav-item"><a class="nav-link" href="#roles">Roles</a></li>
<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
</ul>
<a href="{{route('login')}}" class="btn btn-primary ms-3">Login</a>
</div>
</div>
</nav>

<section class="hero text-center">
<div class="container">
<h1>Smart Team Management System</h1>
<p>Manage Employees, Assign Tasks, Track Progress and Control Role-Based Access Efficiently.</p>
<div class="mt-4">
<a href="{{route('login')}}" class="btn btn-light btn-custom me-3">Get Started</a>
<a href="#" class="btn btn-outline-light btn-custom">Learn More</a>
</div>
</div>
</section>

<section class="py-5" id="features">
<div class="container">
<h2 class="text-center section-title">System Features</h2>
<div class="row g-4">

<div class="col-md-4">
<div class="feature-card text-center">
<i class="fa-solid fa-users"></i>
<h4>Employee Management</h4>
<p>Add team members, manage profiles and monitor staff details.</p>
</div>
</div>

<div class="col-md-4">
<div class="feature-card text-center">
<i class="fa-solid fa-list-check"></i>
<h4>Task Assignment</h4>
<p>Assign tasks to leaders and members with deadlines.</p>
</div>
</div>

<div class="col-md-4">
<div class="feature-card text-center">
<i class="fa-solid fa-shield-halved"></i>
<h4>Role Based Access</h4>
<p>Separate dashboards for Admin, Team Leader and Members.</p>
</div>
</div>

</div>
</div>
</section>

<section class="py-5 bg-light" id="roles">
<div class="container">
<h2 class="text-center section-title">User Roles</h2>
<div class="row g-4">

<div class="col-md-4">
<div class="role-box text-center">
<h3 class="text-primary">Admin</h3>
<ul class="list-unstyled mt-4">
<li>Create Users</li>
<li>Assign Roles</li>
<li>Manage Projects</li>
<li>Generate Reports</li>
</ul>
</div>
</div>

<div class="col-md-4">
<div class="role-box text-center">
<h3 class="text-success">Team Leader</h3>
<ul class="list-unstyled mt-4">
<li>Manage Members</li>
<li>Assign Tasks</li>
<li>Update Progress</li>
<li>Monitor Deadlines</li>
</ul>
</div>
</div>

<div class="col-md-4">
<div class="role-box text-center">
<h3 class="text-danger">Member</h3>
<ul class="list-unstyled mt-4">
<li>View Tasks</li>
<li>Submit Work</li>
<li>Update Status</li>
<li>Track Progress</li>
</ul>
</div>
</div>

</div>
</div>
</section>

<section class="stats text-center">
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="counter">500+</div>
<p>Projects Managed</p>
</div>
<div class="col-md-4">
<div class="counter">1500+</div>
<p>Active Users</p>
</div>
<div class="col-md-4">
<div class="counter">98%</div>
<p>Efficiency Rate</p>
</div>
</div>
</div>
</section>

<section class="cta text-center">
<div class="container">
<h2>Ready To Manage Your Team Better?</h2>
<p class="mt-3">Start your role based team management portal today.</p>
<a href="#" class="btn btn-primary btn-lg mt-3">Start Now</a>
</div>
</section>

<footer class="text-center">
© 2026 TeamManager | All Rights Reserved
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
