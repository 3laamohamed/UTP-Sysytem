@php
$title = 'Project';
@endphp

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-3 project">
            <div class="col-md-10 offset-md-1">
                <form id="project_form" action=" " method="POST" multiple enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                @csrf
                                <input type="hidden" name="project_id" value="" id='project_id'>
                                <label for="project_name" class="form-label">Group Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Please Enter Group Name" required>
                            </div>
                            <!-- Upload Image -->
                            <div class='text-center'>
                              <i class="file-image">
                                <input autocomplete="off" id="image" name="image" type="file"
                                  onchange="readImage(this)" title="" required />
                                <i class="reset" onclick="resetImage(this.previousElementSibling)"></i>
                                <div id='item-image'>
                                  <label for="image" class="image" data-label="Add thumbnail"></label>
                                </div>
                              </i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                <textarea class="form-control" name='disc' placeholder="Write Your Description" id="description" required
                                    style="height: 350px"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success clicked" id="save_project" type="button">Save</button>
                    <button class="btn btn-primary clicked d-none" id="update_project" type="button">Update</button>
                </div>
                <table class="table mt-4 text-center shadow-lg">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        @foreach ($groups as $group)
                            <tr id="{{ $group->id }}">
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->group }}</td>
                                <td>
                                    <button class="table-buttons" onclick="getRow({{ $group->id }})">
                                        <ion-icon class="text-primary" name="create-outline"></ion-icon>
                                    </button>
                                    <button class="table-buttons" id='delete_project'>
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
  let rowId, _token = $("input[name=\"_token\"]").val();
  $("#save_project").on("click", function(a) {
    a.preventDefault();
    let b = new FormData($("#project_form")[0]),
        c = $("tbody").html();
    $.ajax({
      url: "{{ route('admin.save_services_group') }}",
      method: "post",
      enctype: "multipart/form-data",
      processData: !1,
      cache: !1,
      contentType: !1,
      data: b,
      success: function(a) {
        "true" == a.status && (c +=
            `<tr id="${a.msg}"><td>${a.msg}</td><td>${$("#name").val()}</td><td><button class="table-buttons" onclick="getRow(${a.msg})"><ion-icon class="text-primary" name="create-outline"></ion-icon></button><button class="table-buttons" id='delete_project'><ion-icon class="text-danger" name="trash-outline"></ion-icon></button></td></tr>`,
            $("tbody").html(c), $("#group").val(groupId).change(), Swal.fire({
                position: "center",
                icon: "success",
                title: "Saved Project",
                showConfirmButton: !1,
                timer: 1500
            }), document.getElementById("project_form").reset(), $(".reset").click())
      }
      })
  })
  $("#update_project").on("click", function(a) {
      a.preventDefault();
      let b = new FormData($("#project_form")[0]);
      $.ajax({
          url: "{{ route('admin.update_services_group') }}",
          method: "post",
          enctype: "multipart/form-data",
          processData: !1,
          cache: !1,
          contentType: !1,
          data: b,
          success: function(a) {
            "true" === a.status && ($(`tr#${rowId}`).find("td:nth-child(2)").text($(
                    "#name").val()), $("#save_project").removeClass("d-none"), $(
                    "#update_project").addClass("d-none"), document.getElementById(
                    "project_form").reset(), $(".reset").click(), $("#group").val(groupId)
                .change(), Swal.fire({
                    position: "center",
                    icon: "success",
                    title: a.msg,
                    showConfirmButton: !1,
                    timer: 1500
                }))
          }
      })
  }),
        $("body").on("click", "#delete_project", function() {
            let a = $(this).parents("tr").attr("id");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't delete this group",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "e#d33",
                confirmButtonText: "Yes, dlete it!"
            }).then(b => {
                b.isConfirmed && $.ajax({
                    url: "{{ route('admin.del.project') }}",
                    method: "post",
                    enctype: "multipart/form-data",
                    data: {
                        _token,
                        project: a
                    },
                    success: function(b) {
                        (b.status = "true") && ($(`tr#${a}`).remove(), Swal.fire({
                            position: "center",
                            icon: "success",
                            title: b.msg,
                            showConfirmButton: !1,
                            timer: 1500
                        }))
                    }
                })
            })
        });

        function getRow(a) {
            $.ajax({
                url: "{{ route('admin.get_update_services_group') }}",
                method: "post",
                enctype: "multipart/form-data",
                data: {
                    _token,
                    id: a
                },
                success: function(b) {
                    "true" === b.status && (rowId = a, $("#save_project").addClass("d-none"), $(
                        "#update_project").removeClass("d-none"), $("#project_id").val(rowId), $(
                        "#name").val(b.msg.group), $("#description").val(b.msg.disc), $(
                        "#image").attr("title", b.msg.image), $("#item-image").html(
                        `<label for="image" class="image unvisibile" data-label="Add thumbnail" style="background-image:url({{ URL::asset('Admin/Services') }}/${b.msg.image})"></label>`
                        ), window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    }))
                }
            })
        }
    </script>
@stop
