@php $title = 'Pages'; $check = "" @endphp
@extends('layouts.app')
@section('content')
  <div class="container">
    <form class="d-flex align-items-center justify-content-center view-form" id="save_form" action=" " method="POST" multiple enctype="multipart/form-data">
      <div class="form-check form-switch" style="font-size:25px">
        @csrf
        @foreach($pages as $page)
          @php if($page->status == 1){$check="checked";} @endphp
          <div>
            <input class="form-check-input" name="{{$page->page}}" type="checkbox" id="page-{{$page->page}}" vlaue='{{$page->status}}' {{$check}}>
            <label class="form-check-label" for="page-{{$page->page}}">
              <span style="font-size:25px">{{$page->page}}</span>
            </label>
          </div>
          @php $check = "" @endphp
        @endforeach
      </div>
    </form>
    <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-success clicked" id="save_control_page" type="button">Save</button>
    </div>
  </div>

<script>
  let _token=$("input[name=\"_token\"]").val()
  $("#save_control_page").on("click",function(t){
    t.preventDefault();
    t=new FormData($("#save_form")[0]);
    let pages = []
    $('.form-check-input').each(function() {
      pages.push({
        name: $(this).attr('name'),
        value: $(this).is(":checked") ? 1 : 0
      })
    });
    $.ajax({
      url:"{{route('admin.save_control_page')}}",
      method:"post",
      data: {
        _token,
        pages,
      },
      success:function(t){
        Swal.fire({
          position:"center",
          icon:"success",
          title:t.msg,
          showConfirmButton:!1,
          timer:1500
        })
      }
    })
  });
</script>
@stop


