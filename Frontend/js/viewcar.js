var ViewCar = {};

ViewCar.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Car</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

    ViewCar.Body = '<div class="col-lg-12" >\
    <div class="list-car-panel panel panel-default">\
        <div class="panel-heading">\
            <h3 class="panel-title" id="rego"></h3>\
        </div>\
        <button class="btn btn-lg btn-success btn-block" id="btnReview">Leave a Review</button>\
        <div class="panel-body">\
        </div>\
    </div>\
</div>';

ViewCar.InsertData = function(data)
{
    $("#rego").html(data.rego);
}

ViewCar.Display = function(page, carid){
    $("#"+page.header).html(ViewCar.Header);
    $("#"+page.body).html(ViewCar.Body);
    Util.LoadJSON("../json/viewcar.php", function(data){
        //console.log(data);
        ViewCar.InsertData(data);
    }, {carid: carid});

    $("#btnReview").click(function(){
        Review.Display(Page.Layout, carid);
    });
    //Util.PrepareForm("#reviewform", "../json/search.php", "#btnSearch", "", Util.DoNothing, Util.DoNothing);
};
