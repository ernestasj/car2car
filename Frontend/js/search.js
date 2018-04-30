var Search = {};

Search.Header = Template.Header({
    title: "Search for a Car"
});

Search.Body = {};

Search.Form = {};

Search.Form.Keywords = Template.InputGroup({
    label: "Keywords",
    name: "rego",
    type: "text",
    placeholder: "Keywords",
    classes: "",
    id: "keywords"
});

Search.Form.Submit = Template.Submit({
    label:"Search",
    id: "btnSearch"
});

Search.Body.Form = Template.Form({
    formid: "searchform",
    method: "post",
    groups: 
    Search.Form.Keywords +
    Search.Form.Submit
});

Search.Body.PanelBody = Template.PanelBody({
    title: "Search Cars",
    body: Search.Body.Form
});

Search.Display = function(page){
    $("#"+page.header).html(Search.Header);
    //$("#"+page.body).html(Search.Body1);
    $("#"+page.body).html(Search.Body.PanelBody);
    Util.PrepareForm("#searchform", "../json/search.php", "#btnSearch", "", Search.DisplayResults, Util.DoNothing);
};

Search.DisplayResults = function(data) {
    CarList.Display(Page.Layout, data);
}



