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
    xmlhttp.open("GET", file + Util.ParseForGet(parameters), true);
    xmlhttp.send();
}

Util.ParseForGet = function(pairs)
{
    var exp = "?";
    var first = true;
    for(var key in pairs)
    {
        if(first)
        {
            first = false;
        }
        else
        {
            exp+= "&";
        }
        exp += key;
        exp += "=";
        exp += pairs[key];
    }
    return exp;
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
                console.log("SUCCESS : ", data);
                if(typeof(callback) !== undefined)
                {
                    callback(JSON.parse(data));
                }
                $(result).text(data);
                
                $(btn).prop("disabled", false);

            },
            error: function (e) {
                console.log("ERROR : ", e);
                $(result).text(e.responseText);
                
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

Util.MakeHeader = function(headers, order, classes)
{
    var classes = classes || {};
    var header = classes.header || {};
    var row_class = header.row || "";
    
    var html = "<tr class='"+row_class+"'>";
    order.forEach(function(item, index) {
        var field = header.field || {};
        var field_class = field[item] || "";
        html += "<th class='"+field_class+"'>";
        html += headers[item];
        html += "</th>";
    });
    html += "</tr>";
    return html;
};

Util.MakeRows = function(rows, order, classes) {
    var html = "";
    rows.forEach(function(row, r_index) {
        var classes = classes || {};
        var body = classes.body || {};
        var row_class = body.row || "";
        html += "<tr class='"+row_class+"'>";
        order.forEach(function(field_name, f_index) {
            var field = body.field || {};
            var field_class = field[field_name] || "";    
            html += "<td class='"+field_class+"'>";
            html += row[field_name];
            html += "</td>";
        });
        html += "</tr>";
    });
    
    return html;
}

Util.MakeTable = function(target, headers, rows, order, classes)
{
    var table = "";
    table += Util.MakeHeader(headers, order, classes);
    table += Util.MakeRows(rows, order, classes);
    $(target).html(table);
}

Util.AppendChoice = function(id, value, text, classes)
{
    var classes = classes || "";
    var html = "";
    html += "<option class='"+value+"' class='"+classes+"'>"+text+"</option>";
    $(id).append(html);
}

Util.AppendChoices = function(id, choices)
{
    choices.forEach(function(choice){
        Util.AppendChoice(id, choice.value, choice.text, choice.classes);
    });
}