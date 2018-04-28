var Util = {};

Util.LoadJSON = function(file, callback, parameters){
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

Util.ButtonListener = function(btn, callback, parameters)
{
    $(btn).click(function (event) {
        event.preventDefault();
        $(btn).prop("disabled", true);
        callback(parameters);
        $(btn).prop("disabled", false);
    });
}

Util.PrepareForm = function(form, url, btn, result, callback) {

    $(btn).click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $(form)[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        //data.append("CustomField", "This is some extra data, testing");

        // disabled the submit button
        $(btn).prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                if(callback)
                {
                    callback(data);
                }
                $(result).text(data);
                console.log("SUCCESS : ", data);
                $(btn).prop("disabled", false);

            },
            error: function (e) {

                $(result).text(e.responseText);
                console.log("ERROR : ", e);
                $(btn).prop("disabled", false);

            }
        });

    });
}

Util.DoNothing = function(arg)
{

}