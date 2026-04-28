@include('leader.layouts.header')
<div class="pc-container">
   <div class="pc-content">
      @yield('main')
   </div>
</div>
 @yield('scripts')
@include('leader.layouts.footer')