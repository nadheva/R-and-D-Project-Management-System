<!--
=========================================================
* Soft UI Dashboard PRO - v1.0.7
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-dashboard-pro
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body class="g-sidenav-show  bg-gray-100">
    @include('partials.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            {{ $slot }}

            @include('partials.footer')

        </div>
    </main>
    @include('partials.scripts')

</body>

</html>
