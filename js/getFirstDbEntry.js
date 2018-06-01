function queryData() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && 200 == this.status) {

            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "api", true);
    xmlhttp.send();
}