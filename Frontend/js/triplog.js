TripLog = {};

TripLog.Header = '\
<div class="col-lg-12">\
    <h1 class="page-header">Trip History</h1>\
</div>\
<!-- /.col-lg-12 -->';

TripLog.Body = '\
    <div class="table-responsive">\
        <table class="table" id="triplogtable">\
        </table>\
    </div>';

TripLog.Table = "";

TripLog.Display = function(page) {
    $("#"+page.header).html(TripLog.Header);
    $("#"+page.body).html(TripLog.Body);
    Util.LoadJSON("../json/triplog.php", TripLog.MakeTable);
    
}

TripLog.DownloadJSON = function()
{
    Util.LoadJSON("../json/messages.php", function(messages){
        AddCar.InsertMessages(messages, "messages", AddCar.FormatMessage);
    });
    
}


TripLog.TableOrder = ["date", "owner", "rego", "cost"];

TripLog.TableHeaders = {
    date: "Date",
    owner: "Owner",
    rego: "Rego",
    cost: "Cost"
};

TripLog.MakeHeader = function(headers)
{
    var html = "<tr>";
    TripLog.TableOrder.forEach(function(item, index){
        html += "<th>";
        html += headers[item];
        html += "</th>";
    });
    html += "</tr>";
    return html;
};

TripLog.MakeRows = function(rows) {
    var html = "";
    rows.forEach(function(row, r_index) {
        html += "<tr>";
        TripLog.TableOrder.forEach(function(field, f_index){
            html += "<td>";
            html += row[field];
            html += "</td>";
        });
        html += "</tr>";
    });
    
    return html;
}

TripLog.MakeTable = function(rows)
{

    var table = "";
    table += TripLog.MakeHeader(TripLog.TableHeaders);
    table += TripLog.MakeRows(rows);
    $("#triplogtable").html(table);
}