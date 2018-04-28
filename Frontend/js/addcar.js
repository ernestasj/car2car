var AddCar = {};

AddCar.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Add a new car!</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

AddCar.Body = '\
    <div class="col-lg-12" >\
        <div class="list-car-panel panel panel-default">\
            <div class="panel-heading">\
                <h3 class="panel-title">List Car</h3>\
            </div>\
            <div class="panel-body">\
                <form role="form" action = "" method = "post" enctype="multipart/form-data" id="addcarform">\
                    <fieldset>\
                        <div class="form-group">\
                            <label for="rego">Rego:</label>\
                            <input class="form-control" placeholder="Rego" name="rego" type="text" autofocus id="rego">\
                        </div>\
                        <div class="form-group">\
                            <label for="make">Make:</label>\
                            <input class="form-control" placeholder="Make" name="make" type="text" id="make">\
                        </div>\
                        <div class="form-group">\
                            <label for="model">Model:</label>\
                            <input class="form-control" placeholder="Model" name="model" type="text" id="model">\
                        </div>\
                        <div class="form-group">\
                            <label for="year">Year:</label>\
                            <input class="form-control" placeholder="Year" name="year" type="text" id="year">\
                        </div>\
                        <div class="form-group">\
                            <label for="enginecc">Engine size (cc):</label>\
                            <input class="form-control" placeholder="cc" name="enginecc" type="text" id="enginecc">\
                        </div>\
                        <div class="form-group">\
                            <label for="kms">Odometer kms:</label>\
                            <input class="form-control" placeholder="kms" name="kms" type="text" id="kms">\
                        </div>\
                        <div class="form-group">\
                            <label for="doors">Doors:</label>\
                            <select class="custom-select" name="doors" id="doors">\
                                <option selected>Doors</option>\
                                <option value="1">1</option>\
                                <option value="2">2</option>\
                                <option value="3">3</option>\
                                <option value="4">4</option>\
                                <option value="5">5</option>\
                                <option value="6">6+</option>\
                            </select>\
                        </div>\
                        <div class="form-group">\
                            <label for="petrol">Petrol:</label>\
                            <select class="custom-select" name="petrol" id="petrol">\
                                <option selected>Petrol</option>\
                                <option value="ron91">ron91</option>\
                                <option value="ron95">ron95</option>\
                                <option value="ron98">ron98</option>\
                                <option value="diesel">diesel</option>\
                                <option value="electric">electric</option>\
                            </select>\
                        </div>\
                        <div class="form-group">\
                            <label for="transmission">Transmission:</label>\
                            <select class="custom-select" name="transmission" id="transmission">\
                                <option selected>Tranmission</option>\
                                <option value="auto">auto</option>\
                                <option value="manual">manual</option>\
                            </select>\
                        </div>\
                        <div class="form-group">\
                            <label for="body">Body:</label>\
                            <select class="custom-select" name="body" id="body">\
                                <option selected>Body</option>\
                                <option value="sedan">sedan</option>\
                                <option value="hatch">hatch</option>\
                                <option value="coupe">coupe</option>\
                                <option value="suv">suv</option>\
                            </select>\
                        </div>\
                        <div class="form-group">\
                            <label class="custom-file">\
                                <input type="file" id="file" class="custom-file-input" name="photo" id="photo">\
                                <span class="custom-file-control"></span>\
                            </label>\
                        </div>\
                        <!-- Change this to a button or input when using this as a form -->\
                        <button class="btn btn-lg btn-success btn-block" id="btnSubmit">List Car</button>\
                    </fieldset>\
                </form>\
            </div>\
        </div>\
    </div>';


AddCar.Display = function(page){
    $("#"+page.header).html(AddCar.Header);
    $("#"+page.body).html(AddCar.Body);

    AddCar.InsertJSON();
    AddCar.PrepareForm();
};

AddCar.InsertJSON = function()
{
    Util.LoadJSON("../json/messages.php", function(messages){
        AddCar.InsertMessages(messages, "messages", AddCar.FormatMessage);
    });
    
    Util.LoadJSON("../json/tasks.php", function(tasks){
        AddCar.InsertMessages(tasks, "tasks", AddCar.FormatTask);
    });

    Util.LoadJSON("../json/alerts.php", function(alerts){
        AddCar.InsertMessages(alerts, "alerts", AddCar.FormatAlert);
    });
    
    if(typeof car !== 'undefined')
    {
        AddCar.UpdateFromPrevious(car);
    }

    AddCar.PrepareForm();
};


// Previous data from a failed attempt to add a car
var car = {
    rego: "ASD-345",
    manufacturer: "Holden",
    make: "Commodore",
    model: "SS",
    year: "2017",
    doors: "4",
    petrol: "ron98",
    transmission: "auto",
    enginecc: "3500",
    kms: "860",
    body: "sedan",
    photo: ""
};
var Messages = {};
/*
// Messages
var Messages = [
    {name: "Pablo Escobar", time: "Yesterday", message: "Yeah Mate, full tank of 98 for yah when I drop it off beautiful ride"},
    {name: "Jake Paul", time: "Yesterday", message: "Yeah I am in Sydney for a week for recording and need a ride for that time."},
    {name: "Ernestas", time: "Yesterday", message: "There is an issue with your car mate, got caught in a bingle."},
];
*/
// Tasks
var Tasks = [
    {name:"Pablo", rego: "CH55HI", percentage: 40},
    {name:"Ernestas", rego: "CK16YL", percentage: 20}
];

// Alerts
var Alerts = [
    {text: "New Enquiry", time: "4 minutes ago"},
    {text: "3 New Shares on your Ad", time: "12 minutes ago"},
    {text: "Vehicle Returned", time: "4 minutes ago"}
];

AddCar.UpdateFromPrevious = function(car) {
    var previous_values = {
        rego: "",
        manufacturer: "",
        make: "",
        model: "",
        year: "",
        doors: "",
        petrol: "",
        transmission: "",
        enginecc: "",
        kms: "",
        body: "",
        photo: ""
    };
    if(typeof car !== 'undefined')
    {
        previous_values = car;
    }

    if(previous_values.rego != "")
        $('#rego').val(previous_values.rego);
    if(previous_values.manufacturer != "")
        $('#manufacturer').val(previous_values.manufacturer);
    if(previous_values.make != "")
        $('#make').val(previous_values.make);
    if(previous_values.model != "")
        $('#model').val(previous_values.model);
    if(previous_values.year != "")
        $('#year').val(previous_values.year);
    if(previous_values.doors != "")
        $('#doors').val(previous_values.doors);
    if(previous_values.petrol != "")
        $('#petrol').val(previous_values.petrol);
    if(previous_values.transmission != "")
        $('#transmission').val(previous_values.transmission);
    if(previous_values.enginecc != "")
        $('#enginecc').val(previous_values.enginecc);
    if(previous_values.kms != "")
        $('#kms').val(previous_values.kms);
    if(previous_values.body != "")
        $('#body').val(previous_values.body);
    if(previous_values.photo != "")
        $('#photo').val(previous_values.photo);
}

AddCar.FormatMessage = function(message){
    var tag = '<li>';
    tag += '<a href="#">';
    tag += '<div>';
    tag += '<strong>' + message.name + '</strong>';
    tag += '<span class="pull-right text-muted">';
    tag += '<em>'+ message.time +'</em>';
    tag += '</span>';
    tag += '</div>';
    tag += '<div>' + message.message + '</div>';
    tag += '</a>';
    tag += '</li>';
    return tag;

}

AddCar.MapProgressToClass = function(progress) {
    if(progress>20)
        return "progress-bar-success";
    else
        return "progress-bar-info";
}

AddCar.FormatAlert = function(alert){
    var tag = "";
    tag += '<li> <a href="#"> <div>';
    tag += '<i class="fa fa-comment fa-fw"></i>' + alert.text;
    tag += '<span class="pull-right text-muted small">' + alert.time+ '</span>';
    tag += '</div> </a> </li>';

    return tag;
}


AddCar.FormatTask = function(task) {
    var tag = '<li><a href="#"><div><p><strong>'+task.name+' - '+task.rego+'</strong>';
    tag += '<span class="pull-right text-muted">'+task.percentage+'% Complete</span>';
    tag += '</p><div class="progress "><div class="progress-bar ' + AddCar.MapProgressToClass(task.percentage) + '" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: ' + task.percentage+'%">';
    tag += '<span class="sr-only">'+ task.percentage +'% Complete (success)</span>';
    tag += '</div> </div> </div> </a> </li>';
    return tag;

}
AddCar.InsertMessages = function(messages, id, format){
    var first = true;
    messages.forEach(function(message){
        var tag = "";
        if(!first) {
            tag += '<li class="divider"></li>'
        } else {
            first = false;
        }
        tag += format(message);
        $("#" + id ).append(tag);

    });
}

AddCar.PrepareForm = function() {

    $("#btnSubmit").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#addcarform')[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        //data.append("CustomField", "This is some extra data, testing");

        // disabled the submit button
        $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "../submit/addcar.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {

                $("#result").text(data);
                console.log("SUCCESS : ", data);
                $("#btnSubmit").prop("disabled", false);

            },
            error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }
        });

    });
}
