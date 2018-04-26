function LoadJSON(file, callback, parameters){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            obj = JSON.parse(this.responseText);
            callback(obj);
            //console.log(myObj);
        }
    };
    parameters = parameters || "";
    xmlhttp.open("GET", file + parameters, true);
    xmlhttp.send();
}