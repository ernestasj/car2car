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
                <form role="form" action = "" method = "post" enctype="multipart/form-data" id="createaccountform">\
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
                        <button class="btn btn-lg btn-success btn-block" id="btnSubmit">Create Account</button>\
                    </fieldset>\
                </form>\
            </div>\
        </div>\
    </div>';

CreateAccount.Display = function(page){
    $("#"+page.header).html(CreateAccount.Header);
    $("#"+page.body).html(CreateAccount.Body);

    CreateAccount.PrepareForm("#createaccountform", "../submit/createaccount.php", "#btnSubmit", "");
};


CreateAccount.PrepareForm = function(form, url, btn, result) {

    $(btn).click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $(form)[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        //data.append("CustomField", "This is some extra data, testing");

        // disabled the submit button
        $(btn).prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {

                $(result).text(data);
                console.log("SUCCESS : ", data);
                $(btn).prop("disabled", false);

            },
            error: function (e) {

                $(result).text(e.responseText);
                console.log("ERROR : ", e);
                $(btn).prop("disabled", false);

            }
        });

    });
}

    