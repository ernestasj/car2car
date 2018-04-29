var Chat = {};

Chat.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Chat</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

    Chat.Body = '<div class="col-lg-12" >\
    <div class="list-car-panel panel panel-default">\
        <div class="panel-heading">\
            <h3 class="panel-title">Chat</h3>\
        </div>\
        <div class="panel-body">\
            <form role="form" action = "" method = "post" enctype="multipart/form-data" id="chatform">\
                <fieldset>\
                    <div class="form-group messages" id="message_history">\
                    </div>\
                    <div class="form-group">\
                        <textarea class="form-control" placeholder="Your comments" name="message" rows="5" autofocus id="message"></textarea>\
                    </div>\
                    <button class="btn btn-lg btn-success btn-block" id="btnSubmit">Submit Review</button>\
                </fieldset>\
            </form>\
        </div>\
    </div>\
</div>';

Chat.Display = function(page){
    $("#"+page.header).html(Chat.Header);
    $("#"+page.body).html(Chat.Body);

    //Util.PrepareForm("#reviewform", "../json/search.php", "#btnSearch", "", Util.DoNothing, Util.DoNothing);
};
