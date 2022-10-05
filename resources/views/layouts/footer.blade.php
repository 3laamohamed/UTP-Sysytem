<!-- Start Footer -->
<footer class="py-3 text-center bg-dark">
  <p class="m-0 text-white">Copyright © 2020 UTP SYSTEMS</p>
</footer>
<!-- End Footer -->
<script>
  let _token = $("input[name=\"_token\"]").val();
  $("body").on("click", "#save_message", function() {
    let a = $("#user_name").val(),
      b = $("#user_email").val(),
      c = $("#user_phone").val(),
      d = $("#message").val();
    action = "save";
    $("tbody").html();
    $.ajax({
      url: "{{ route('save.message') }}",
      method: "post",
      enctype: "multipart/form-data",
      data: {
        _token,
        name: a,
        email: b,
        phone: c,
        message: d
      },
      success: function(a) {
        if(a.status == "true")
        {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Saved Message",
            showConfirmButton: !1,
            timer: 1500
          })
          $("#user_name").val(""), $("#user_email").val(""), $("#user_phone").val(
            ""), $("#message").val("")
        }

        else if(a.status == "false"){
          Swal.fire({
            title: 'Error!',
            text: a.msg,
            icon: 'error',
            confirmButtonText: 'Done'
          })
        }

      }
    })
  });
</script>
