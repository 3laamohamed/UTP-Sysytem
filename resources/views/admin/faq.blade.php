@php
  $title = 'FAQ';
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
      <div class="row mt-3">
        @csrf
        <div class="col-md-6 offset-md-3">
          <div class="mb-3">
            <label for="group_name" class="form-label">Question</label>
            <input type="text" class="form-control mt-3" placeholder="Write Your Question" id="question"></input>
            <label for="group_name" class="form-label mt-2">Answer</label>
            <textarea class="form-control mt-3" placeholder="Write Your Answer" id="answer" style="height: 200px"></textarea>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-success clicked" id="save_faq" type="button">Save</button>
          </div>
        </div>
        <div class="col-12">
        <table class="table mt-4 text-center shadow-lg">
          <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody class="table-light">
          @foreach($faqs as $faq)
            <tr id="{{$faq->id}}">
              <td>{{$faq->id}}</td>
              <td>{{$faq->question}}</td>
              <td>{{$faq->answer}}</td>
              <td>
                <button class="table-buttons" onclick="getRow({{$faq->id}})">
                  <ion-icon class="text-primary" name="create-outline"></ion-icon>
                </button>
                <button class="table-buttons" id='delete_faq'>
                  <ion-icon class="text-danger" name="trash-outline"></ion-icon>
                </button>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        </div>
      </div>
</div>
<script>

let _token = $('input[name="_token"]').val(),
  action = "",
  mood = "create";
$("body").on("click", "#save_faq", function () {
  let question = $("#question").val();
  let answer = $("#answer").val();
  action = "save";
  let b = $("tbody").html();
  $.ajax({
    url: "{{route('admin.save_faq')}}",
    method: "post",
    enctype: "multipart/form-data",
    data: { _token,question,answer,action },
    success: function (c) {
      if (c.status == "true") {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Saved Question",
          showConfirmButton: !1,
          timer: 1500,
        }),
        (b += `<tr id="${c.msg}">
          <td>${c.msg}</td>
          <td>${question}</td>
          <td>${answer}</td>
          <td>
            <button class="table-buttons" onclick="getRow(${c.msg})"><ion-icon class="text-primary" name="create-outline"></ion-icon></button>
            <button class="table-buttons" id='delete_faq'><ion-icon class="text-danger" name="trash-outline"></ion-icon></button>
          </td>
        </tr>`),
        $("tbody").html(b),
        $("#question").val("")
        $("#answer").val("")
      }
    },
  });
}),
$("body").on("click", "#update_faq", function () {
  let question = $("#question");
  let answer = $("#answer").val();
  action = "update"
  $.ajax({
    url: "{{route('admin.update_faq')}}",
    method: "post",
    enctype: "multipart/form-data",
    data: { _token, questionId: question.attr("row"), question: question.val(),answer, action },
    success: function (b) {
      if(b.status == "true") {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Update Question",
          showConfirmButton: !1,
          timer: 1500,
        }),
        $(`tr#${question.attr("row")}`)
          .find("td:nth-child(2)")
          .text(question.val());
        $(`tr#${question.attr("row")}`)
          .find("td:nth-child(3)")
          .text(answer);
        mood = "create";
        $("#update_faq")
          .html("create" === mood ? "Save" : "Update")
          .removeClass("btn-primary")
          .addClass("btn-success")
          .attr("id", "save_faq");
          question.val("");
          $("#answer").val("");
      }
    },
  });
}),
$("body").on("click", "#delete_faq", function () {
  action = "del";
  let a = $(this).parents("tr").attr("id");
  Swal.fire({
    title: "Are you sure?",
    text: "You won't delete this Question",
    icon: "warning",
    showCancelButton: !0,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "e#d33",
    confirmButtonText: "Yes, dlete it!",
  }).then((b) => {
    b.isConfirmed &&
      $.ajax({
        url: "{{route('admin.delete_faq')}}",
        method: "post",
        enctype: "multipart/form-data",
        data: { _token, questionId: a, action },
        success: function (b) {
          $(`tr#${a}`).remove(),
            Swal.fire({
              position: "center",
              icon: "success",
              title: b.msg,
              showConfirmButton: !1,
              timer: 1500,
            });
        },
      });
  });
});
function getRow(a) {
  let question = $(`tr#${a}`).find("td:nth-child(2)").text();
  let answer = $(`tr#${a}`).find("td:nth-child(3)").text();
  $("#question").val(question).focus().attr("row", a);
  $("#answer").val(answer).focus();
  mood = "update"
  $("#save_faq")
    .html("update" === mood ? "Update" : "Save")
    .addClass("btn-primary")
    .removeClass("btn-success")
    .attr("id", "update_faq");
}
</script>
@stop
