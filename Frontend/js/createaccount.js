var CreateAccount = {};

CreateAccount.Header = Template.Header({
    title: "Create an Account!"
});

CreateAccount.Body = {};
CreateAccount.Form = {};

CreateAccount.Form.Email = Template.InputGroup({
    label: "Email Address",
    name: "email",
    type: "text",
    placeholder: "Email Address",
    classes: "",
    id: "email"
});
CreateAccount.Form.Password = Template.InputGroup({
    label: "Password",
    name: "password",
    type: "password",
    placeholder: "Password",
    classes: "",
    id: "password"
});
CreateAccount.Form.FirstName = Template.InputGroup({
    label: "First Name",
    name: "firstname",
    type: "text",
    placeholder: "eg; John",
    classes: "",
    id: "firstname"
});
CreateAccount.Form.LastName = Template.InputGroup({
    label: "Last Name",
    name: "lastname",
    type: "text",
    placeholder: "eg; Smith",
    classes: "",
    id: "lastname"
});
CreateAccount.Form.DriversLicence = Template.InputGroup({
    label: "Drivers Licence",
    name: "licence",
    type: "text",
    placeholder: "eg; 1234567",
    classes: "",
    id: "licence"
});
CreateAccount.Form.Photo = Template.FileGroup({
    label: "Photo",
    name: "photo",
    type: "file",
    placeholder: "Your Photo",
    classes: "",
    id: "file"
});

CreateAccount.Form.Submit = Template.Submit({
    label:"Create Account",
    id: "btnSubmit"
});


CreateAccount.Body.Form = Template.Form({
    formid: "createaccountform",
    method: "post",
    groups: 
    CreateAccount.Form.Email +
    CreateAccount.Form.Password +
    CreateAccount.Form.FirstName +
    CreateAccount.Form.LastName +
    CreateAccount.Form.DriversLicence +
    CreateAccount.Form.Photo +
    CreateAccount.Form.Submit
});

CreateAccount.Body.PanelBody = Template.PanelBody({
    title: "Account Details",
    body: CreateAccount.Body.Form
});


CreateAccount.Display = function(page){

    $("#"+page.header).html(CreateAccount.Header);
    $("#"+page.body).html(CreateAccount.Body.PanelBody);
    Util.PrepareForm("#createaccountform", "../submit/createaccount.php", "#btnSubmit", "", CreateAccount.Success, Util.DoNothing);
};

CreateAccount.Success= function(data)
{
    Search.Display(Page.Layout);
}
