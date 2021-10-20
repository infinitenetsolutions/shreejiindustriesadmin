function changeSubCategories(dataValue) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function () {
    document.getElementById('all_sub_cat').innerHTML = xmlhttp.responseText
  }
  xmlhttp.open('GET', 'subcategrieslist.php?data=' + dataValue)
  xmlhttp.send()
}
