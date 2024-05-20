<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyPro | Platinum</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('assets/StudyProLogo.png') }}" />
    {{-- styles --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/stepper.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- DataTable --}}
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.min.js"></script>

    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: inline;
        }

        .parsley-errors-list {
            color: red;
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <x-navbar />
        <main id="main" class="main">
            @yield('container')
        </main>
    </div>

    {{-- Document Ready --}}
    <script>
        $(document).ready(function() {
            $('#myTable').dataTable({
                responsive: true
            });
        });

        //addMoreButn
        var i = 0;
        $('#addMore').click(function() {
            ++i;
            $('#addExpertTable').append(
                `
                <tr>
                    <td>
                        <input class="form-control" type="file" id="RP_File_[` + i + `]" name="RP_File_[` + i + `]" required>
                    </td>
                    <td>
                        <button id="removeMore" name="removeMore" type="button" class=" btn btn-danger ml-5 remove-table-row">
                            X
                        </button>
                    </td>
                </tr>
                `
            )
        })

        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        })

        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {

                $sections.removeClass('current').eq(index).addClass('current');

                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [Type=submit]').toggle(atTheEnd);
                $('.form-navigation .addMore').toggle(index == 1);

                const step = document.querySelector('.step' + index);



            }

            function curIndex() {

                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            });

            $('.form-navigation .next').click(function() {
                $('.expert-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                });

            });

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });
            navigateTo(0);
        });
    </script>

</body>

</html>
