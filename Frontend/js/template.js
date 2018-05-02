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
    var TableRow = Template.Table.Row({row: row, classes: classes, fields: fields});%>\
    <%=TableRow%>\
<%});%>\
');

// sender, message
Template.Message = _.template('\
<div class="col-sm-12 well-sm">\
<div class="col-sm-2"><b><span class="message-sender"><%=sender%></span></b><p/></div>\
<div class="col-sm-10"><span class="message-content"><%=message%></span></div>\
</div>\
');

// array of messages (sender, message)
Template.Messages = _.template('\
<%_.forEach(messages, function(message){\
    var msg = Template.Message(message);%>\
    <%=msg%>\
<%});%>\
');

// classes, id
Template.Form.Div = _.template('\
<div class="form-group <%=classes%>" id="<%=id%>">\
</div>\
');


// id, classes, name, rows, placeholder
Template.Form.TextBox = _.template('\
<div class="form-group">\
<textarea class="form-control <%=classes%>" placeholder="<%=placeholder%>" name="<%=name%>" rows="<%=rows%>" autofocus id="<%=id%>"></textarea>\
</div>\
');

// name, id
Template.Form.HiddenInput = _.template('\
<input type="hidden" name="<%=name%>" id="<%=id%>">\
');



// id, classes
Template.Form.DateInput = _.template('\
<div class="form-group">\
    <div class="input-group date <%=classes%>" data-provide="datepicker" id="<%=id%>">\
        <input type="text" class="form-control" />\
        <div class="input-group-addon">\
            <span class="fa fa-calendar"></span>\
            </span>\
        </div>\
    </div>\
</div>\
');

// id, classes, content, label
Template.Form.Info = _.template('\
<div class="form-group">\
    <label for="<%=name%>"><%=label%></label>\
    <span id="<%=id%>" classes="<%=classes%>"><%=content%></span>\
</div>\
');

// name
Template.Form.StarRating = _.template('\
<div class="form-group rating">\
    <label>\
        <input type="radio" name="<%=name%>" value="1" />\
        <span class="icon">★</span>\
    </label>\
    <label>\
        <input type="radio" name="<%=name%>" value="2" />\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
    </label>\
    <label>\
        <input type="radio" name="<%=name%>" value="3" />\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
    </label>\
    <label>\
        <input type="radio" name="<%=name%>" value="4" />\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
    </label>\
    <label>\
        <input type="radio" name="<%=name%>" value="5" />\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
        <span class="icon">★</span>\
    </label>\
</div>\
');


// classes, id, title
Template.SubHeading = _.template('\
<div class="form-group <%=classes%>" id="<%=id%>">\
<h2><%=title%></h2>\
</div>\
');

