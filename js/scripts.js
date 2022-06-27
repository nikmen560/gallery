$(function () {

  $("form").on('submit', function (event) {
    event.preventDefault();
    // var data = {
    //     'username' : $("#username").val(),
    //     'email': $("#email").val(),
    //     'photo_id' : $("#photo_id").val(),
    // }
    let dataString = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "/gallery/includes/add_comment.php",
      data: dataString,
      dataType: 'json',
      encode:true,
      success: function(data) {
        let randomAva = Math.floor(Math.random() * (4 - 1) + 1);

  let comment = 
                '<div class="be-comment">' +
                    '<div class="be-img-comment">' +
                        '<a href="blog-detail-2.html">' +
                            `<img src="https://bootdey.com/img/Content/avatar/avatar${randomAva}.png" alt="" class="be-ava-comment">` +
                        '</a>' +
                    '</div>' +
                    '<div class="be-comment-content">' +
                        '<span class="be-comment-name">' +
                            `<a href="blog-detail-2.html">${data.author}</a>` +
                        '</span>' +
                        '<span class="be-comment-time">' +
                            '<i class="fa fa-clock-o"></i>'+
                            'May 27, 2015 at 3:14am' +
                        '</span>' +
                        '<p class="be-comment-text">' +
                         `${data.body}` +
                        '</p>' +
                    '</div>' +
                '</div>';
        $(".be-comment")
        .hide()
        .fadeIn(1000)
        .last()
        .append(comment);
      }
    });
  });
});
