var Search = {};


Search.Header = {
    pagetitle: "Search for a Car"};
    /*
Search.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Search for a Car</h1>\
    </div>\
    <!-- /.col-lg-12 -->';
*/
Search.Body = {};

Search.Form = {};

Search.Form.Keywords = {
    label: "Keywords",
    name: "rego",
    type: "text",
    placeholder: "Keywords",
    classes: "",
    id: "keywords"
};

Search.Form.Submit = {
    label:"Search",
    id: "btnSearch"
};

Search.Body.Form = {
    formid: "searchform",
    method: "post",
    groups: 
    Template.InputGroup(Search.Form.Keywords) +
    Template.Submit(Search.Form.Submit)
};

Search.Body.PanelBody = {
    title: "Search Cars",
    body: Template.Form(Search.Body.Form)
};

/*
Search.Body1 = '<div class="col-lg-12" >\
    <div class="list-car-panel panel panel-default">\
        <div class="panel-heading">\
            <h3 class="panel-title">Search cars</h3>\
        </div>\
        <div class="panel-body">\
            <form role="form" action = "" method = "post" enctype="multipart/form-data" id="searchform">\
                <fieldset>\
                    <div class="form-group">\
                        <label for="rego">Keywords:</label>\
                        <input class="form-control" placeholder="Keywords" name="keywords" type="text" autofocus id="keywords">\
                    </div>\
                    <!-- Change this to a button or input when using this as a form -->\
                    <button class="btn btn-lg btn-success btn-block" id="btnSearch">Search</button>\
                </fieldset>\
            </form>\
        </div>\
    </div>';
*/

Search.Display = function(page){
    $("#"+page.header).html(Template.Header(Search.Header));
    //$("#"+page.body).html(Search.Body1);
    $("#"+page.body).html(Template.PanelBody(Search.Body.PanelBody));
    Util.PrepareForm("#searchform", "../json/search.php", "#btnSearch", "", Search.DisplayResults, Util.DoNothing);
};

Search.DisplayResults = function(data) {
    CarList.Display(Page.Layout, data);
}



