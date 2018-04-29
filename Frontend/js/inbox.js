var Inbox = {};

Inbox.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Inbox</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

    Inbox.Body = '<div class="col-lg-12" >\
    <div class="list-car-panel panel panel-default">\
        <div class="panel-heading">\
            <h3 class="panel-title">Inbox</h3>\
        </div>\
        <div class="panel-body">\
            <form role="form" action = "" method = "post" enctype="multipart/form-data" id="chatform">\
                <fieldset>\
                    <div class="form-group messages" id="message_history">\
                    </div>\
                    <div class="form-group">\
                        <textarea class="form-control" placeholder="Your comments" name="message" rows="5" autofocus id="message"></textarea>\
                        <input type="hidden" name="messageid" id="messageid">\
                    </div>\
                    <button class="btn btn-lg btn-success btn-block" id="btnSubmit">Submit Review</button>\
                </fieldset>\
            </form>\
        </div>\
    </div>\
</div>';


Inbox.AppendMailItem = function(message)
{
    var html = '<div class="col-sm-12 well-sm mailitem" id="'+message.messageid+'">';
    html += '<div class="col-sm-2"><b><span class="message-sender">'+message.sender+'</span></b><p/></div>';
    html += '<div class="col-sm-10"><span class="message-content">'+message.message+'</span></div>';
    html += '</div>';
    return html;
}

Inbox.AppendMailItems = function(messages)
{
    messages.forEach(function(message){
        $('#message_history').append(Inbox.AppendMailItem (message));
    });
}

Inbox.Display = function(page){
    $("#"+page.header).html(Inbox.Header);
    $("#"+page.body).html(Inbox.Body);
    Util.LoadJSON("../json/inbox.php", function(messages){
        Inbox.AppendMailItems(messages);
        $(".mailitem").click(function(){
            var messageid = $(this).attr('id');
            Chat.Display(Page.Layout, messageid);
        });
  
    });

    //Util.PrepareForm("#reviewform", "../json/search.php", "#btnSearch", "", Util.DoNothing, Util.DoNothing);
};
