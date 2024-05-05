<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyPro | Expert</title>

    {{-- styles --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.min.css">
</head>

<body>
    <x-navbar />

    <div class="container mt-4">
        @yield('container')
    </div>
</body>

{{-- Scripts --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
