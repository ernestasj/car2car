var Login = {};

Login.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Welcome</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

    Login.Body = '\
    <div class="col-lg-12" >\
        <div class="list-car-panel panel panel-default">\
            <div class="panel-heading">\
                <h3 class="panel-title">Create Account</h3>\
            </div>\
            <div class="panel-body">\
                <form role="form" action = "" method = "post" enctype="multipart/form-data" id="formlogin">\
                    <fieldset>\
                        <div class="form-group">\
                            <label for="email">Email Address:</label>\
                            <input class="form-control" placeholder="Email Address" name="email" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="password">Password:</label>\
                            <input class="form-control" placeholder="password" name="password" type="password" autofocus>\
                        </div>\
                        <!-- Change this to a button or input when using this as a form -->\
                        <button class="btn btn-lg btn-success btn-block" id="btnLogin">Login</button>\
                        <button class="btn btn-lg btn-success btn-block" id="btnCreate">Create Account</button>\
                    </fieldset>\
                </form>\
            </div>\
        </div>\
    </div>';

Login.Display = function(page){
    $("#"+page.header).html(Login.Header);
    $("#"+page.body).html(Login.Body);

    Util.PrepareForm("#formlogin", "../submit/login.php", "#btnLogin", "", Login.Check);
    Util.ButtonListener("#btnCreate", CreateAccount.Display, Page.Layout);
}

Login.Check = function(data)
{

}
