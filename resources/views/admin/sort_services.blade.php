@php
    $title = 'Sort Services';
@endphp

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4 my-3">
        <label for="project" class="form-label">Select Group</label>
        <select class="form-select" id='project' name="project" required>
          @foreach ($groups as $group)
            <option value="{{$group->id}}">{{$group->group}}</option>
          @endforeach
        </select>
      </div>
      <div class="sort-projects">
        <ul id="sortable">
          @csrf
          @foreach ($services as $service)
          <li class="ui-state-default" data-id="{{$service->id}}">
            <img src="{{asset('Admin/Services/' . $service->image)}}"/>
            <p>{{$service->title}}</p>
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
  let _token=$("input[name=\"_token\"]").val();
  $('#project').on('change', function () {
    let id = $(this).val();
    let html = ''
    $.ajax({
      url: "{{route('admin.save_get_sort_services')}}",
      method: "post",
      data: {
        _token,
        id
      },
      success: function(data) {
        if(data.status == 'true'){
          $('#sortable').html('');
          data.services.forEach(service => {
          html += `<li class="ui-state-default" data-id="${service.id}">
            <img src="{{asset('Admin/Services/${service.image}')}}"/>
            <p>${service.title}</p>
          </li>`
          });
          $('#sortable').html(html);
        }
      }
    });
  });
  $(function () {
      $("#sortable").sortable();
      $("#sortable").disableSelection();
      $('#save_sort').on('click', function() {
        let sortArr = []
        let group = $('#project').val()
        $('#sortable li').each(function () {
            sortArr.push($(this).attr('data-id'));
        });
        $.ajax({
          url: "{{route('admin.save_sort_services')}}",
          method: "post",
          data: {
            _token,
            projects:sortArr,
            group,
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
