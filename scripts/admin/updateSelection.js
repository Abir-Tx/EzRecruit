function updateSelection(id, selected) {
  selected == 1 ? (selected = 2) : (selected = 1);
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(selected);
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open(
    "GET",
    `./updateSelection.php?id=${id}&selected=${selected}`,
    true
  );
  xhttp.send();

  location.reload();
}
