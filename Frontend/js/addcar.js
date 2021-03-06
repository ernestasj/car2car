var AddCar = {};

AddCar.Header = Template.Header({
    title: "Add a New Car!"
})

AddCar.Body = {};
AddCar.Form = {};


AddCar.Form.Rego = Template.InputGroup({
    label: "Rego",
    name: "rego",
    type: "text",
    placeholder: "ABC123",
    classes: "",
    id: "rego"
});

// label, name, id, placeholder, classes, options

AddCar.Form.Make = Template.SelectGroup({
    label: "Make",
    name: "make",
    placeholder: "Model",
    classes: "",
    id: "make",
    options: ""
});
AddCar.Form.Model = Template.SelectGroup({
    label: "Model",
    name: "model",
    placeholder: "Model",
    classes: "",
    id: "model",
    options: ""
});
AddCar.Form.Year = Template.InputGroup({
    label: "Year",
    name: "year",
    type: "text",
    placeholder: "2001",
    classes: "",
    id: "year"
});
AddCar.Form.EngineSize = Template.InputGroup({
    label: "Engine Size (cc)",
    name: "enginecc",
    type: "text",
    placeholder: "ABC123",
    classes: "",
    id: "rego"
});
AddCar.Form.Odometer = Template.InputGroup({
    label: "Odometer (kms)",
    name: "kms",
    type: "text",
    placeholder: "23093",
    classes: "",
    id: "odometer"
});
AddCar.Form.Doors = Template.SelectGroup({
    label: "Doors",
    name: "doors",
    placeholder: "Doors",
    classes: "",
    id: "doors",
    options: ""
});
AddCar.Form.Petrol = Template.SelectGroup({
    label: "Petrol",
    name: "petrol",
    placeholder: "Petrol",
    classes: "",
    id: "petrol",
    options: ""
});
AddCar.Form.Body = Template.SelectGroup({
    label: "Body",
    name: "body",
    placeholder: "Body",
    classes: "",
    id: "body",
    options: ""
});
AddCar.Form.Transmission = Template.SelectGroup({
    label: "Transmission",
    name: "transmission",
    placeholder: "Transmission",
    classes: "",
    id: "transmission",
    options:
        Template.Option({value:"auto", text:"Auto"}) +
        Template.Option({value:"manual", text:"Manual"})
});
AddCar.Form.Photo = Template.FileGroup({
    label: "Photo",
    name: "photo",
    type: "file",
    placeholder: "Cars Photo",
    classes: "",
    id: "file"
});

AddCar.Form.Submit = Template.Submit({
    label:"Add Car",
    id: "btnSubmit"
});
AddCar.Body.Form = Template.Form({
    formid: "addcarform",
    method: "post",
    groups: 
    AddCar.Form.Rego +
    AddCar.Form.Make +
    AddCar.Form.Model +
    AddCar.Form.Year+
    AddCar.Form.EngineSize+
    AddCar.Form.Odometer+
    AddCar.Form.Doors+
    AddCar.Form.Petrol+
    AddCar.Form.Body+
    AddCar.Form.Transmission+
    AddCar.Form.Photo +
    AddCar.Form.Submit
});

AddCar.Body.PanelBody = Template.PanelBody({
    title: "Car Details",
    body: AddCar.Body.Form
});
/*
                        <div class="form-group">\
                            <label for="transmission">Transmission:</label>\
                                <input type="checkbox" checked data-toggle="toggle" id="checkboxtransmission">\
                                <select type="hidden" class="custom-select" name="transmission" id="transmission">\
                                    <option selected>Tranmission</option>\
                                    <option value="auto">auto</option>\
                                    <option value="manual">manual</option>\
                                </select>\
                            </label>\
                        </div>\
 */

AddCar.Display = function(page){
    $("#"+page.header).html(AddCar.Header);
    $("#"+page.body).html(AddCar.Body.PanelBody);

    AddCar.FormCustomisation();
    //Util.UpdateToggles(AddCar.ToggleValues);
    /*
    $("#checkboxtransmission").change(function() {
        Util.UpdateToggles(AddCar.ToggleValues);
    });
    */
    //AddCar.InsertJSON();
    Util.PrepareForm("#addcarform", "../submit/addcar.php", "#btnSubmit", Util.DoNothing, AddCar.SubmitCallback, function() {
        //Display.Search(Page.Layout);
        //Util.UpdateToggles(AddCar.ToggleValues);
    });
};

AddCar.FormCustomisation = function()
{
    /*
  $(function() {
    $('#checkboxtransmission').bootstrapToggle({
      on: 'Auto',
      off: 'Manual',
      offstyle: 'success'
    });
  })
    */
  Util.LoadJSON("../json/makes.php", function(data){
        Util.AppendChoices("#make", data);
      //AddCar.AddMakes("#make", data);
  });
   
    $("#make").change(function() {
        var make = $("#make").val();
        Util.LoadJSON("../json/models.php", function(data){
            AddCar.AddModels("#model", data);
        }, {make: make});      
    });


    Util.LoadJSON("../json/petrol.php", function(data){
        AddCar.AddPetrol("#petrol", data);
    });

    Util.LoadJSON("../json/doors.php", function(data){
        Util.AppendChoices("#doors", data);
    });
  
    Util.LoadJSON("../json/body.php", function(data){
        Util.AppendChoices("#body", data);
    });

    //AddCar.AddMakes("#make", AddCar.Makes);

  //$('#transmission').css('visibility', 'hidden');
}

AddCar.Makes = [
    {value: "ford", text: "Ford"},
    {value: "holden", text: "Holden"},
    {value: "mazda", text: "Mazda"},
    {value: "subaru", text: "Subaru"},
    {value: "toyota", text: "Toyota"}
];

AddCar.InsertJSON = function()
{
   
    if(typeof car !== 'undefined')
    {
        AddCar.UpdateFromPrevious(car);
    }
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

AddCar.ToggleValues = [
    {checkbox: "#checkboxtransmission", target: "#transmission", on: "auto", off: "manual"}
]

AddCar.SubmitCallback = function(data)
{
    //console.log("Hello!");
    Search.Display(Page.Layout);
}

AddCar.AddMakes = function(id, value_pairs)
{
    Util.AppendChoices(id, value_pairs);
}

AddCar.AddModels = function(id, value_pairs)
{
    $(id).empty();
    Util.AppendChoices(id, value_pairs);
}

AddCar.AddPetrol = function(id, value_pairs)
{
    Util.AppendChoices(id, value_pairs);
}
