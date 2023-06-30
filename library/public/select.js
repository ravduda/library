$(document).ready(function () {
  $("#role").select2();
  $("#authorId").select2();
  $("#categoryId").select2();
  $("#userId").select2();
  $("#test").select2();
});
function fetchContent(url, idToReload) {
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      $(idToReload).html(data);
    });
}
