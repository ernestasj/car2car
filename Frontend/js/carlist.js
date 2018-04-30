CarList = {};

CarList.Header = Template.Header({
    title:"Results"
});

CarList.Body = {};

CarList.TableHeaders = {
    rego: "Rego",
    make: "Make",
    model: "Model"
};

CarList.TableOrder = ["rego", "make", "model"];

CarList.Table = {};

CarList.Table.Rows = "";

CarList.Table.Headers = "";

CarList.Body.Table = "";

CarList.Display = function(page, data) {

    CarList.Table.Rows = Template.Table.Rows({
        rows: data,
        fields: CarList.TableOrder,
        classes: "goto-review"
    });
    
    CarList.Table.Headers = Template.Table.Headers({
        headers: CarList.TableHeaders,
        fields: CarList.TableOrder,
        classes: ""
    });
    
    // id, classes, headers, rows
    CarList.Body.Table = Template.Table.Body({
        id: "carlisttable",
        headers: CarList.Table.Headers,
        rows: CarList.Table.Rows,
        classes: "table-hover"
    });
    
    $("#"+page.header).html(CarList.Header);
    $("#"+page.body).html(CarList.Body.Table);

    $(".goto-review").click(function(){
        event.stopPropagation();
        event.stopImmediatePropagation();
        var carid = $(this).data('id');
        console.log(carid);
        ViewCar.Display(Page.Layout, carid);
    });

}

CarList.TableClasses = {
    body: {row: "goto-review"}
};

