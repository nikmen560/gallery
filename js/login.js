$(function() {
$("#loginNavButton").click(function (e) { 
    e.preventDefault();
    $("#loginModal").modal();
    $("#loginName").focus();
    
});

  $("#loginModal").on("shown.bs.modal", function () {
    $("#loginName").focus();
  });

  $("#loginSubmit").click(function (e) { 
    e.preventDefault();
    const data = {
            username : $("#loginName").val(),
            password :$("#loginPassword").val(),

    };

    $.ajax({
      type: "POST",
      url: "/gallery/includes/login_execute.php",
      data: data,
      dataType: "json",
      success: function (data) {
        console.log(data);
        if (data.error) {

        }

        if (data.result) {


        }
      },
      error: function (data, status, error) {
        console.log(data);
        console.log(status);
        console.log(error);
      },
    });
    
  });

})