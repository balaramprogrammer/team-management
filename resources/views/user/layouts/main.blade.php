@include('user.layouts.header')
<div class="pc-container">
   <div class="pc-content">
      @yield('main')
   </div>
</div>
 @yield('scripts')
@include('user.layouts.footer')