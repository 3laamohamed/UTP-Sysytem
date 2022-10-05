@php
    $title = 'Data View';
@endphp

@extends('layouts.app')
@section('content')
<div class="container">
  <div class="buttons-filter">
    <button class='btn btn-light filter-btn' data-value='today'>today</button>
    <button class='btn btn-light filter-btn' data-value='yesterday'>yesterday</button>
    <button class='btn btn-light filter-btn' data-value='this-week'>this week</button>
    <button class='btn btn-light filter-btn' data-value='last-week'>last week</button>
    <button class='btn btn-light filter-btn' data-value='this-month'>this month</button>
    <button class='btn btn-light filter-btn' data-value='last-month'>last month</button>
    <button class='btn btn-light filter-btn' data-value='this-year'>this year</button>
    <button class='btn btn-light filter-btn filter-custom'>custom</button>
    <div class="input-group mb-3 mt-1 d-none">
      <div class="d-flex align-items-center justify-content-center gap-2 w-100">
        <div class="d-flex">
          <span class="input-group-text">From</span>
          <input type="date" class="form-control" id="from">
        </div>
        <div class="d-flex">
          <span class="input-group-text">To</span>
          <input type="date" id="to" class="form-control">
        </div>
        <button class="btn btn-primary filter-btn d-flex align-items-center justify-content-center gap-2 " data-value='custom' type="button" id="search">
          <ion-icon class="fs-4" name="search-outline"></ion-icon>
          <span> Search </span>
        </button>
      </div>
    </div>
  </div>
  <div class="view-table table-responsive-md">
    <table class="table m-0 text-center shadow-lg">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>IP</th>
          <th>Device</th>
          <th>OS</th>
          <th>Browser</th>
          <th>Date &amp; Time</th>
        </tr>
      </thead>
      <tbody class="table-light">
        @php $count=1; @endphp
        @foreach($counter as $vis)
          <tr>
            <td>{{$count}}</td>
            <td>{{$vis->mac}}</td>
            <td>{{$vis->device}}</td>
            <td>{{$vis->os}}</td>
            <td>{{$vis->browser}}</td>
            <td>{{$vis->created_at}}</td>
          </tr>
          @php $count++; @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script>
  let _token=$("input[name=\"_token\"]").val();
$("#save_data").on("click",function(t){t.preventDefault();t=new FormData($("#save_form")[0]);$.ajax({url:"{{route('admin.save_datasheet')}}",method:"post",enctype:"multipart/form-data",processData:!1,cache:!1,contentType:!1,data:t,success:function(t){Swal.fire({position:"center",icon:"success",title:t.msg,showConfirmButton:!1,timer:1500})}})});
$('.filter-btn').on('click', function() {
  $(this).addClass('btn-primary').removeClass('btn-light').siblings('.btn').removeClass('btn-primary').addClass('btn-light');
  if ($(this).hasClass('filter-custom')) {
    $(this).next('.input-group').removeClass('d-none');
  } else {
    $(this).siblings('.input-group').addClass('d-none');
    let type = $(this).data('value');
    let from = $('#from').val();
    let to   = $('#to').val();
    let tableContent = ''
    $('tbody').html(tableContent)
    $.ajax({
      url: "{{route('admin.search.vis')}}",
      method: 'post',
      enctype: "multipart/form-data",
      data: {
        _token,
        type,
        from,
        to
      },
      success: function (data) {
        if(data.status == 'true')
        {
          let count = 0
          for (let i = 0; i < data.msg.length; i++) {
            let myDate = new Date(data.msg[i].created_at)
            count++
            tableContent += `<tr>
              <td>${count}</td>
              <td>${data.msg[i].mac}</td>
              <td>${data.msg[i].device}</td>
              <td>${data.msg[i].os}</td>
              <td>${data.msg[i].browser}</td>
              <td>${myDate.toLocaleString().replace(',' , ' ')}</td>
              </tr>`;
          }
          $('tbody').html(tableContent)
        }
      }
    });
  }
});
</script>
@stop
