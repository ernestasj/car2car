
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

function UpdateFromPrevious(car) {
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

function FormatMessage(message){
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

function MapProgressToClass(progress) {
    if(progress>20)
        return "progress-bar-success";
    else
        return "progress-bar-info";
}

function FormatAlert(alert){
    var tag = "";
    tag += '<li> <a href="#"> <div>';
    tag += '<i class="fa fa-comment fa-fw"></i>' + alert.text;
    tag += '<span class="pull-right text-muted small">' + alert.time+ '</span>';
    tag += '</div> </a> </li>';

    return tag;
}


function FormatTask(task) {
    var tag = '<li><a href="#"><div><p><strong>'+task.name+' - '+task.rego+'</strong>';
    tag += '<span class="pull-right text-muted">'+task.percentage+'% Complete</span>';
    tag += '</p><div class="progress "><div class="progress-bar ' + MapProgressToClass(task.percentage) + '" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: ' + task.percentage+'%">';
    tag += '<span class="sr-only">'+ task.percentage +'% Complete (success)</span>';
    tag += '</div> </div> </div> </a> </li>';
    return tag;

}
function InsertMessages(messages, id, format){
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

function PrepareForm() {

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
