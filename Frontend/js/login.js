var Login = {};

Login.Header = Template.Header({
    title: "Welcome"
});
/*
Login.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Welcome</h1>\
    </div>\
    <!-- /.col-lg-12 -->';
*/
Login.Body = {};
Login.Form = {};

Login.Form.Email = Template.InputGroup({
    label: "Email",
    name: "email",
    type: "text",
    placeholder: "email address",
    classes: "",
    id: "email"
});

Login.Form.Password = Template.InputGroup({
    label: "Password",
    name: "password",
    type: "password",
    placeholder: "password",
    classes: "",
    id: "password"
});

Login.Form.Login = Template.Submit({
    label:"Login",
    id: "btnLogin"
});

Login.Form.CreateAccount = Template.Submit({
    label:"Create Account",
    id: "btnCreate"
});

Login.Body.Form = Template.Form({
    formid: "formlogin",
    method: "post",
    groups: 
    Login.Form.Email +
    Login.Form.Password +
    Login.Form.Login +
    Login.Form.CreateAccount
});

Login.Body.PanelBody = Template.PanelBody({
    title:"Login",
    body: Login.Body.Form
});

Login.Display = function(page){
    $("#"+page.header).html(Login.Header);
    $("#"+page.body).html(Login.Body.PanelBody);

    Util.PrepareForm("#formlogin", "../submit/login.php", "#btnLogin", "", Login.Check);
    Util.ButtonListener("#btnCreate", CreateAccount.Display, Page.Layout);
}

Login.Check = function(data)
{

}
