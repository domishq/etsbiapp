$("#aplikacija").hide();

$(document).ready(() => {
  const currentPage = window.location.href;

  const pagesToCheck = ["users", "ucenici"];

  pagesToCheck.forEach(function (page) {
    if (currentPage.includes(page)) {
      /*$("#sidebar" + page.charAt(0).toUpperCase() + page.slice(1)).addClass(
        "active"
      );*/
      $(
        "#sidebar" +
          page.charAt(0).toUpperCase() +
          page.slice(1) +
          " .linkSelector"
      ).css("visibility", "visible");
    }
  });

  setTimeout(function () {
    $(".aplikacija").removeClass("hide");
    $(".loader").hide();
  }, 500);
});
