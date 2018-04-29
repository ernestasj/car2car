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

TripLog.MakeTable = function(rows)
{
    var table = Util.MakeTable("#triplogtable", TripLog.TableHeaders, rows, TripLog.TableOrder);
}