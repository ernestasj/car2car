CarList = {};

CarList.Header = '\
<div class="col-lg-12">\
    <h1 class="page-header">Results</h1>\
</div>\
<!-- /.col-lg-12 -->';

CarList.Body = '\
    <div class="table-responsive">\
        <table class="table" id="carlisttable">\
        </table>\
    </div>';

    CarList.Table = "";

CarList.Display = function(page, data) {
    $("#"+page.header).html(CarList.Header);
    $("#"+page.body).html(CarList.Body);
    //CarList.MakeTable(data);
    Util.MakeTable("#carlisttable", CarList.TableHeaders, data, CarList.TableOrder, CarList.TableClasses, function(){
        $("td").click(function(){
            var carid = $(this).parent().data('id');
            console.log(carid);
            ViewCar.Display(Page.Layout, carid);
        });
    });
}

CarList.TableClasses = {
    body: {row: "goto-review"}
};

CarList.TableOrder = ["rego", "make", "model"];

CarList.TableHeaders = {
    rego: "Rego",
    make: "Make",
    model: "Model",
};
