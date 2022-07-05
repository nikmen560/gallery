$(function() {
  function showMessage(type,message, additionalMsg = '') {
    return `
    <div class='alert alert-${type}'>
      <h4>${message}</h4>
      <p>${additionalMsg}</p>
    </div>
    `;
  }
  
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

        if (!data.success) {
          
          $('.alert').remove();
          $("#message").append(showMessage('danger', data.message, ''));


        }

        if (data.success) {
          const message = `Welcome back ${data.user.username}`;
          const additionalMsg = 'This window will be automatically closed';
          const adminNavLink = '<a class="nav-link nav-link-4" id="adminNavButton" href="/gallery/admin/index.php">Admin</a>';
          $(".modal_content").remove();
          $(".alert").remove();
          $(".modal-body").append(showMessage('success',message, additionalMsg));

          setTimeout(() => {
            $("#closeModal").click();
            $("#loginNavButton").remove();
            $("#loginLinkPlaceholder").append(adminNavLink);
          }, 1500);

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