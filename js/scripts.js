$(function () {
  $("form").on("submit", function (event) {
    event.preventDefault();
    // var data = {
    //     'username' : $("#username").val(),
    //     'email': $("#email").val(),
    //     'photo_id' : $("#photo_id").val(),
    let avatarNum = Math.floor(Math.random() * (8 - 1) + 1);
    let avatar = `https://bootdey.com/img/Content/avatar/avatar${avatarNum}.png`;
    // }
    let dataString = $(this).serialize() + "&avatar=" + avatar;

    $.ajax({
      type: "POST",
      url: "/gallery/includes/add_comment.php",
      data: dataString,
      dataType: "json",
      encode: true,
      success: function (data) {
        console.log(data);
        if (!data.success) {
          if (data.errors.name) {
            $("#username").addClass("has-error");
          }
          if (data.errors.email) {
            $("#email").addClass("has-error");

            if (data.errors.body) {
              $("#body").addClass("has-error");
            }
          }
        } else {
          let comment =
            '<div class="be-comment">' +
            '<div class="be-img-comment">' +
            '<a href="blog-detail-2.html">' +
            `<img src="${data.comment.avatar}" alt="" class="be-ava-comment">` +
            "</a>" +
            "</div>" +
            '<div class="be-comment-content">' +
            '<span class="be-comment-name">' +
            `<a href="blog-detail-2.html">${data.comment.author}</a>` +
            `<small>${data.comment.email}</small>` +
            "</span>" +
            '<span class="be-comment-time">' +
            '<i class="fa fa-clock-o"></i>' +
            `${data.comment.date}` +
            "</span>" +
            '<p class="be-comment-text">' +
            `${data.comment.body}` +
            "</p>" +
            "</div>" +
            "</div>";
          $(".be-comment").hide().fadeIn(1000).last().append(comment);
        }
      },
    });
  });
});
