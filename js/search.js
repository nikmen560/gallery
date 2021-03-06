$(function () {
  function showErrorMessage(message) {
    return `
  <div class='row search-result text-center'>
      <h3>${message}</h3>
  </div>
  `;
  }
  $("#inputSearch").keyup(function () {
    $("#searchModal").modal();
    $("#searchModalInput").val($(this).val());
  });

  $("#searchModal").on("shown.bs.modal", function () {
    $("#searchModalInput").focus();
    $("#searchSubmit").click();
  });

  $("#searchModalInput").keyup(function () {
    $("#searchSubmit").click();
  });
  $("#searchForm").submit(function (e) {
    e.preventDefault();
    // let data = $(this).serialize();
    let inputValue = $("#searchModalInput").val();
    let data = { search: inputValue };

    $.ajax({
      type: "POST",
      url: "/gallery/includes/search_execute.php",
      data: data,
      // dataType: "json",
      dataType: "json",
      // encode: true,
      success: function (data) {
        console.log(data);
        if (data.error) {
          $(".search-result").remove();
          $(".modal-body").append(showErrorMessage(data.error));
        }

        if (data.result) {
          $(".search-result").remove();
          $(".modal-body").append(data.result);
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
});
