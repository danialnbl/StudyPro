<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyPro | Staff</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('assets/StudyProLogo.png') }}" />
    {{-- styles --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stepper.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>
    <div id="wrapper">
        <x-staffNavbar />
        <main id="main" class="main">
            @yield('staff')
        </main>
    </div>


</body>

{{-- Scripts --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/stepper.js') }}"></script>

{{-- DataTable --}}
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.min.js"></script>

{{-- Document Ready --}}
<script>
    $(document).ready(function() {
        $('#myTable').dataTable({
            responsive: true
        });
    });
</script>

</html>
