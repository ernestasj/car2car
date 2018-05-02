var ViewCar = {};

ViewCar.Header = Template.Header({
    title: "Car"
})

ViewCar.Body = {};
ViewCar.Form = {};

ViewCar.Form.Review = Template.Submit({
    label:"Leave a Review",
    id: "btnReview"
});

ViewCar.Form.Book = Template.Submit({
    label:"Book",
    id: "btnBook"
});

ViewCar.DateInput = Template.Form.DateInput({
    id: "date",
    classes: ""
});

ViewCar.Make = Template.Form.Info({
    id: "make",
    label: "Make",
    classes: "",
    content: "Vehicle Make"
})

ViewCar.Model = Template.Form.Info({
    id: "model",
    label: "Model",
    classes: "",
    content: "Vehicle Model"
})


ViewCar.Body.Form = Template.Form({
    formid: "viewcar",
    method: "post",
    groups: 
    ViewCar.Make +
    ViewCar.Model +
    ViewCar.DateInput +
    ViewCar.Form.Book +
    ViewCar.Form.Review
});

ViewCar.Body.PanelBody = Template.PanelBody({
    title:"Rego",
    body: ViewCar.Body.Form
});
/*
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
*/
ViewCar.InsertData = function(data)
{
    $("#rego").html(data.rego);
    $("#make").html(data.make);
    $("#model").html(data.model);
}

ViewCar.Display = function(page, carid){
    $("#"+page.header).html(ViewCar.Header);
    $("#"+page.body).html(ViewCar.Body.PanelBody);
    Util.LoadJSON("../json/viewcar.php", function(data){
        //console.log(data);
        ViewCar.InsertData(data);
    }, {carid: carid});
    $(function () {
        $(".datepicker").datepicker({
            format: "mm/dd/yyyy"
        });
    });

    /*
    $("#btnReview").click(function(){
        Review.Display(Page.Layout, carid);
    });
    */
    //Util.PrepareForm("#reviewform", "../json/search.php", "#btnSearch", "", Util.DoNothing, Util.DoNothing);
};

