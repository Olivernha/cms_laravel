@include('includes.front_header')

<!-- Navigation -->
@include('includes.front_nav')

<!-- Page Content -->
<div class="container">
    @include('includes.flash_messages')
        @yield('content')

   @include('includes.front_footer')

</div>