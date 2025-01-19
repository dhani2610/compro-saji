<!DOCTYPE html>
<html lang="en">
@include('frontend.layouts.partials.head')

<body class="index-page">

    <style>
        * {
            font-family: "Alice", serif!important;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    @include('frontend.layouts.partials.header')

    <main class="main">

        @yield('content')

    </main>


    @include('frontend.layouts.partials.footer')

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    @include('frontend.layouts.partials.foot')



</body>

</html>
