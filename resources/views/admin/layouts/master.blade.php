<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.header-scripts')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.nav')

    @include('admin.layouts.sidebar')

    @yield('contents')

{{--    <!-- Control Sidebar -->--}}
{{--    <aside class="control-sidebar control-sidebar-dark">--}}
{{--        <!-- Control sidebar content goes here -->--}}
{{--        <div class="p-3">--}}
{{--            <h5>Title</h5>--}}
{{--            <p>Sidebar content</p>--}}
{{--        </div>--}}
{{--    </aside>--}}
{{--    <!-- /.control-sidebar -->--}}

    @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->
@include('admin.layouts.footer-scripts')
</body>
</html>
