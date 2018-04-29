var Template = {};

Template.Header = _.template('\
    <div class="col-lg-12">\
        <h1 class="page-header"><%=pagetitle%></h1>\
    </div>');

// title
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
