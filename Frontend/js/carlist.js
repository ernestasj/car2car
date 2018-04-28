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
    CarList.MakeTable(data);
   
}

CarList.TableOrder = ["rego", "make", "model"];

CarList.TableHeaders = {
    rego: "Rego",
    make: "Make",
    model: "Model",
};

CarList.MakeHeader = function(headers)
{
    var html = "<tr>";
    CarList.TableOrder.forEach(function(item, index){
        html += "<th>";
        html += headers[item];
        html += "</th>";
    });
    html += "</tr>";
    return html;
};

CarList.MakeRows = function(rows) {
    var html = "";
    rows.forEach(function(row, r_index) {
        html += "<tr>";
        CarList.TableOrder.forEach(function(field, f_index){
            html += "<td>";
            html += row[field];
            html += "</td>";
        });
        html += "</tr>";
    });
    
    return html;
}

CarList.MakeTable = function(rows)
{
    var table = "";
    table += CarList.MakeHeader(CarList.TableHeaders);
    table += CarList.MakeRows(rows);
    $("#carlisttable").html(table);
}