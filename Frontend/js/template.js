var Template = {};

Template.Header = _.template('\
    <div class="col-lg-12">\
        <h1 class="page-header"><%=title%></h1>\
    </div>');

// title, body
Template.PanelBody = _.template('\
<div class="col-lg-12" >\
    <div class="list-car-panel panel panel-default">\
        <div class="panel-heading">\
            <h3 class="panel-title"><%=title%></h3>\
        </div>\
        <div class="panel-body" id="panelbody">\
            <%=body%>\
        </div>\
    </div>\
</div>\
');

// formid, method, groups
Template.Form = _.template('\
<form role="form" action = "" method = "<%=method%>" enctype="multipart/form-data" id="<%=formid%>">\
    <fieldset>\
        <%=groups%>\
    </fieldset>\
</form>\
');

// label, input, name, type, id, placeholder, classes
Template.InputGroup = _.template('\
<div class="form-group">\
    <label for="<%=name%>"><%=label%></label>\
    <input class="form-control <%=classes%>" placeholder="<%=placeholder%>" name="<%=name%>" type="<%=type%>" autofocus id="<%=id%>">\
</div>\
');
// label, id
Template.Submit = _.template('\
<button class="btn btn-lg btn-success btn-block" id="<%=id%>"><%=label%></button>\
');

// name, id
Template.FileGroup = _.template('\
<div class="form-group">\
    <label class="custom-file">\
        <input type="file" id="<%=id%>" class="custom-file-input" name="<%=name%>">\
        <span class="custom-file-control"></span>\
    </label>\
</div>\
');

// value, text
Template.Option = _.template('\
<option value="<%=value%>"><%=text%></option>\
');

// label, name, id, placeholder, classes, options
Template.SelectGroup = _.template('\
<div class="form-group">\
    <label for="<%=name%>"><%=label%></label>\
    <select class="form-control <%=classes%>" name="<%=name%>" id="<%=id%>">\
        <option selected><%=placeholder%></option>\
        <%=options%>\
    </select>\
</div>\
');

Template.Table = {};

// id, classes, headers, rows
Template.Table.Body = _.template('\
<div class="table-responsive">\
    <table class="table <%=classes%>" id="<%=id%>">\
    <%=headers%>\
    <%=rows%>\
    </table>\
</div>');

//headers, classes, fields
Template.Table.Headers = _.template('\
<tr>\
    <%_.forEach(fields, function (field){\
        var header = headers[field]%>\
        <th class="<%=classes%>">\
            <%=header%>\
        </th>\
    <%});%>\
</tr>\
');

// row, classes, fields
Template.Table.Row = _.template('\
<tr>\
    <%_.forEach(fields, function (field){\
        var item = row[field];\
        var id = row["id"] || "";\
        %>\
        <td data-id="<%=id%>" class="<%=classes%>"><%=item%></td>\
    <%});%>\
</tr>\
');

//rows, classes, fields
Template.Table.Rows = _.template('\
<%_.forEach(rows, function (row){\
    console.log(classes);\
    var TableRow = Template.Table.Row({row: row, classes: classes, fields: fields});%>\
    <%=TableRow%>\
<%});%>\
');
