function ajaxCall(url,callback) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(callback) {
    if (this.readyState == 4 && this.status == 200) {
      callback(this.responseText);
    }
  }.bind(xhttp,callback);
  xhttp.open("GET", url, true);
  xhttp.send();
}