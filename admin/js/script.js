$(document).ready(function () {
  var user_id = $("#user_id").text();
  var image_name;
  var photo_id;

  $("#summernote").summernote({
    height: 100,
  });

  $(".image_modal").click(function () {
    $(this).addClass("selected"); // TODO focus mode fix
    image_name = $(this).prop("src").split("/");
    image_name = image_name[image_name.length - 1];
    $("#set_user_image").prop("disabled", false);

    photo_id = $(this).attr("data");

    $.ajax({
      url: "includes/ajax_code.php",
      data: { photo_id: photo_id },
      type: "POST",
      success: function (data) {
        $("#modal_sidebar").html(data);
      },
    });
  });

  $("#set_user_image").click(function () {
    $.ajax({
      url: "includes/ajax_code.php",
      data: { image_name: image_name, user_id: user_id },
      type: "POST",
      success: function (data) {
        $(".user_image_box a img").prop("src", data); //TODO reload page fix
        
      },
    });
  });

  // DELETE PHOTO FUNCTION

  $(".delete_link").click(function () {
    return confirm("are you shure?");
  });
});
