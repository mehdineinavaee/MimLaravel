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
$(document).ajaxComplete(function () {
  // Required for Bootstrap tooltips in DataTables
  $('[data-toggle="tooltip"]').tooltip({
    html: true,
    delay: {
      show: 500,
      hide: 0,
    },
  });
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
  // console.log(capitalizedWord);
  const existDash = capitalizedWord.includes("-") ? "Yes" : "No";
  if (existDash == "Yes") {
    var fetch = "";
    var count = (capitalizedWord.match(/\-/g) || []).length;
    // console.log(count);
    for (var i = 0; i <= count; i++) {
      const afterDashWord = capitalizedWord.split("-")[i];
      // console.log(afterDashWord);
      const firstLetter2 = afterDashWord[0].charAt(0);
      // console.log(firstLetter2);
      const firstLetterCap2 = firstLetter2.toUpperCase();
      // console.log(firstLetterCap2);
      const remainingLetters2 = afterDashWord.slice(1);
      // console.log(remainingLetters2);
      const capitalizedWord2 = firstLetterCap2 + remainingLetters2;
      // console.log(capitalizedWord2);
      fetch = fetch + capitalizedWord2;
      // console.log("fetch=", fetch);
    }
    fetch = "fetch" + fetch;
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

$(document).ready(function () {
  var im = new Inputmask("(999)99999999");
  im.mask($(".inputMaskTel"));
});

$(document).ready(function () {
  var im = new Inputmask("(999)99999999");
  im.mask($(".inputMaskFax"));
});

$(document).ready(function () {
  var im = new Inputmask("9999-999-9999");
  im.mask($(".inputMaskPhone"));
});

$(document).ready(function () {
  var im = new Inputmask("9999999999");
  im.mask($(".inputMaskNationalCode"));
});

$(document).ready(function () {
  var im = new Inputmask("9999999999");
  im.mask($(".inputMaskZipCode"));
});
