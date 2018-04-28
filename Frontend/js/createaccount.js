var CreateAccount = {};

CreateAccount.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Create an Account!</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

CreateAccount.Body = '\
    <div class="col-lg-12" >\
        <div class="list-car-panel panel panel-default">\
            <div class="panel-heading">\
                <h3 class="panel-title">Create Account</h3>\
            </div>\
            <div class="panel-body">\
                <form role="form" action = "" method = "post" enctype="multipart/form-data">\
                    <fieldset>\
                        <div class="form-group">\
                            <label for="email">Email Address:</label>\
                            <input class="form-control" placeholder="Email Address" name="email" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="password">Password:</label>\
                            <input class="form-control" placeholder="password" name="password" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="firstname">First Name:</label>\
                            <input class="form-control" placeholder="First Name" name="firstname" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="lastname">Last Name:</label>\
                            <input class="form-control" placeholder="Last Name" name="lastname" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="licence">Drivers Licence Number:</label>\
                            <input class="form-control" placeholder="Driver Licence" name="licence" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <select class="custom-select" name="cardtype">\
                                <option selected>Card Type</option>\
                                <option value="mastercard">Mastercard</option>\
                                <option value="visa">Visa</option>\
                            </select>\
                        </div>\
                        <div class="form-group">\
                            <label for="ccnumber">Card Number:</label>\
                            <input class="form-control" placeholder="Card Number" name="ccnumber" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="expiry">Expiry:</label>\
                            <input class="form-control" placeholder="Expiry" name="expiry" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="cvc">CVC:</label>\
                            <input class="form-control" placeholder="cvc" name="cvc" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label for="cardname">Name On Card:</label>\
                            <input class="form-control" placeholder="Name on Card" name="cardname" type="text" autofocus>\
                        </div>\
                        <div class="form-group">\
                            <label class="custom-file">\
                                <input type="file" id="file" class="custom-file-input" name="photo">\
                                <span class="custom-file-control"></span>\
                            </label>\
                        </div>\
                        <!-- Change this to a button or input when using this as a form -->\
                        <button type="submit" class="btn btn-lg btn-success btn-block">Create Account</button>\
                    </fieldset>\
                </form>\
            </div>\
        </div>\
    </div>';

CreateAccount.Display = function(page){
    $("#"+page.header).html(CreateAccount.Header);
    $("#"+page.body).html(CreateAccount.Body);
};
    