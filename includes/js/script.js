$(document).ready(() => {
  const currentPage = window.location.href;

  const pagesToCheck = ["users", "ucenici"];

  pagesToCheck.forEach(function (page) {
    if (currentPage.includes(page)) {
      $("#sidebar" + page.charAt(0).toUpperCase() + page.slice(1)).addClass(
        "active"
      );
    }
  });
});
