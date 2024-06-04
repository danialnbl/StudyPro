@extends('layouts.main')
@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Weekly Focus</title>
    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery UI CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('.btn-check');
        const blocks = document.querySelectorAll('.inputinfo');
        
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                blocks.forEach(block => {
                    block.style.display = 'none';
                });
                checkboxes.forEach(cb => {
                    if (cb !== this) {
                        cb.checked = false;
                    }
                });
                if (this.checked) {
                    document.getElementById(this.id + '-block').style.display = 'block';
                }
            });
        });
    });
    </script>
</head>

<body>
<div class="btn-group mt-3 col-12" role="group" aria-label="Basic checkbox toggle button group">
  <input type="checkbox" class="btn-check" id="admin" autocomplete="off">
  <label class="btn btn-outline-primary" for="admin">Admin Block</label>

  <input type="checkbox" class="btn-check" id="focus" autocomplete="off">
  <label class="btn btn-outline-primary" for="focus">Focus Block</label>

  <input type="checkbox" class="btn-check" id="recovery" autocomplete="off">
  <label class="btn btn-outline-primary" for="recovery">Recovery Block</label>

  <input type="checkbox" class="btn-check" id="social" autocomplete="off">
  <label class="btn btn-outline-primary" for="social">Social Block</label>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col-md-1">#</th>
      <th scope="col-md-5">Weekly Focus Info</th>
      <th scope="col-md-3">Date</th>
      <th scope="col-md-1">checklist</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($weeklyFocus as $i => $item)
  <td>{{$i+1}}</td>
  <td>
        @if($item->WF_AdminInfo)
            {{ $item->WF_AdminInfo }}
        @elseif($item->WF_FocusInfo)
            {{ $item->WF_FocusInfo }}
        @elseif($item->WF_RecoveryInfo)
            {{ $item->WF_RecoveryInfo }}
        @elseif($item->WF_SocialInfo)
            {{ $item->WF_SocialInfo }}
        @endif
    </td>
    <td>{{$item->WF_Date}}</td>
    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"></td>
  </tr>
  <?php $i++ ?>
  @endforeach
  </tbody>
</table>

<div class="d-grid col-6 mx-auto">
  <button class="btn btn-warning" type="button">Edit</button>
</div>

</body>
</html>
@endsection