<div class="sidebar" id="sidebar">
   <ul class="nav flex-column">
      <li>
         <a class="nav-link"
            href="{{ route('leader.dashboard') }}">
         <i class="bi bi-speedometer2"></i>
         Dashboard
         </a>
      <li>
         <a class="nav-link"
            href="{{ route('leader.students') }}">
         <i class="bi bi-people"></i>
         Students/ Members
         </a>
      </li>
      <li>
         <a class="nav-link"
            href="{{route('leader.view_project')}}">
         <i class="bi bi-kanban"></i>
         Projects
         </a>  
      </li>
      <li>
         <a class="nav-link"
            href="{{ route('logout') }}">
         <i class="bi bi-box-arrow-right"></i>
         Logout
         </a>
      </li>
   </ul>
</div>