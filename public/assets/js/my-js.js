// Tabs
$(document).ready(function () {
  $(".tabs").click(function () {
    $(".tabs").removeClass("active");
    $(".tabs h6").removeClass("font-weight-bold");
    $(".tabs h6").addClass("text-muted");
    $(this).children("h6").removeClass("text-muted");
    $(this).children("h6").addClass("font-weight-bold");
    $(this).addClass("active");
    current_fs = $(".active");
    next_fs = $(this).attr("id");
    next_fs = "#" + next_fs + "1";
    $("fieldset").removeClass("show");
    $(next_fs).addClass("show");
    current_fs.animate(
      {},
      {
        step: function () {
          current_fs.css({
            display: "none",
            position: "relative",
          });
          next_fs.css({
            display: "block",
          });
        },
      }
    );
  });
});

// Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

// Delete
$(document).on("click", ".delete", function (e) {
  e.preventDefault();
  var url = $(this).val();
  $("#url").val(url);
  $("#DeleteModal").modal("show");
});

$(document).on("click", ".delete_btn", function (e) {
  e.preventDefault();

  $(this).text("در حال حذف ...");

  var url = $("#url").val();
  // console.log(url);
  const split = url.split("/");
  const firstLetter = split[1].charAt(0);
  const firstLetterCap = firstLetter.toUpperCase();
  const remainingLetters = split[1].slice(1);
  const capitalizedWord = firstLetterCap + remainingLetters;
  const existDash = capitalizedWord.includes("-") ? "Yes" : "No";
  if (existDash == "Yes") {
    const beforeDashWord = capitalizedWord.split("-")[0];
    const afterDashWord = capitalizedWord.split("-")[1];
    const firstLetter2 = afterDashWord[0].charAt(0);
    const firstLetterCap2 = firstLetter2.toUpperCase();
    const remainingLetters2 = afterDashWord.slice(1);
    const capitalizedWord2 = firstLetterCap2 + remainingLetters2;
    var fetch = "fetch" + beforeDashWord + capitalizedWord2;
    // console.log(fetch);
  } else {
    var fetch = "fetch" + capitalizedWord;
    // console.log(fetch);
  }

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });

  $.ajax({
    type: "DELETE",
    url: url,
    success: function (response) {
      // console.log(response);
      Swal.fire({
        icon: "success",
        title: response.message,
        confirmButtonText: "OK",
        // text: response.status,
      }).then(() => {
        let functionObj = window[fetch];
        functionObj();
      });
      $("#DeleteModal").modal("hide");
      $(".delete_btn").text("موافقم");
    },
    error: function () {
      Swal.fire({
        icon: "error",
        title: "متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید",
        denyButtonText: "OK",
        // text: textStatus,
      });
      $("#DeleteModal").modal("hide");
      $(".delete_btn").text("موافقم");
    },
  });
});
