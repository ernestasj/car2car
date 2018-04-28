var Util = {};

Util.LoadJSON = function(file, callback, parameters){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            obj = JSON.parse(this.responseText);
            callback(obj);
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
        if(parameters)
            callback(parameters);
        else 
            callback();
        $(btn).prop("disabled", false);
    });
}

Util.PrepareForm = function(formid, url, btn, result, callback, precall) {

    $(btn).click(function (event) {
        if(precall)
        {
            precall();
        }
            
        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $(formid)[0];

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
                if(typeof(callback) !== undefined)
                {
                    callback(JSON.parse(data));
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

Util.UpdateToggles = function(combos)
{
    combos.forEach(function(combo){
    var checked = $(combo.checkbox).is(":checked");
        if(checked)
        {
            $(combo.target).val(combo.on);
        }
        else
        {
            $(combo.target).val(combo.off);
        }            
    });
}

Util.AddListener = function(id, call, parameters){
    Util.ButtonListener(id, call, parameters);
}

Util.AddListeners = function (listeners)
{
    listeners.forEach(function(parameters){
        Util.AddListener(parameters.id, parameters.call, parameters.parameters);
    });
}