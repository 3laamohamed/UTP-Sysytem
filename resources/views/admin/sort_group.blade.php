@php
    $title = 'Sort Groups';
@endphp

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="sort-projects">
        <ul id="sortable">
          @csrf
          @foreach ($groups as $group)
          <li class="ui-state-default" data-id="{{$group->id}}">
            <img src="{{asset('Admin/Services/' . $group->image)}}"/>
            <p>{{$group->group}}</p>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-6 mx-auto">
        <button class="btn btn-success w-100" id="save_sort"> Save </button>
      </div>
    </div>
</div>

<script>
  let _token=$("input[name=\"_token\"]").val()
  $(function () {
      $("#sortable").sortable();
      $("#sortable").disableSelection();
      $('#save_sort').on('click', function() {
        let sortArr = []
        $('#sortable li').each(function () {
            sortArr.push($(this).attr('data-id'));
        });
        $.ajax({
          url: "{{route('admin.save_group_services')}}",
          method: "post",
          data: {
            _token,
            projects:sortArr
          },
          success: function(data) {
            if(data.status == 'true'){
              Swal.fire({
                position:"center",
                icon:"success",
                title:data.msg,
                showConfirmButton:!1,
                timer:1500
              })
            }
          }
        });
      });
  });
</script>
@stop
