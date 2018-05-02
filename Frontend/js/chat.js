var Chat = {};

Chat.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Chat</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

Chat.Header = Template.Header({
   title: "Chat" 
});


Chat.MessageRetrievalInterval = -1

Chat.Body = {};

Chat.Form = {};

Chat.Form.History = Template.Form.Div({
    id: "message_history",
    classes: "messages"
});

Chat.Form.TextBox = Template.Form.TextBox({
    id: "message",
    classes: "",
    placeholder: "Your message",
    name: "message",
    rows: "5",

});

Chat.Form.HiddenInput = Template.Form.HiddenInput({
    id: "messageid",
    name: "messageid"
});

Chat.Form.SendButton = Template.Submit({
    label:"Send Message",
    id: "btnSubmit"
});

Chat.Body.Form = Template.Form({
    formid: "chatform",
    method: "post",
    groups: 
    Chat.Form.History +
    Chat.Form.TextBox +
    Chat.Form.HiddenInput +
    Chat.Form.SendButton
});

/*
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
                        <input type="hidden" name="messageid" id="messageid">\
                    </div>\
                    <button class="btn btn-lg btn-success btn-block" id="btnSubmit">Submit Review</button>\
                </fieldset>\
            </form>\
        </div>\
    </div>\
</div>';

*/

Chat.FormatMessage = function(message)
{
    var html = '<div class="col-sm-12 well-sm">';
    html += '<div class="col-sm-2"><b><span class="message-sender">'+message.sender+'</span></b><p/></div>';
    html += '<div class="col-sm-10"><span class="message-content">'+message.message+'</span></div>';
    html += '</div>';
    return html;
}

Chat.AppendMessages = function(messages)
{

    messages.forEach(function(message){
        $('#message_history').append(Chat.FormatMessage(message));
    });
}

Chat.Display = function(page, messageid){


    $("#"+page.header).html(Chat.Header);

    $("#"+page.body).html(Chat.Body.Form);

    Util.LoadJSON("../json/chat.php", function(data){
        var messages = data.messages;
        test_messages = data.messages;
        var messageid = data.messageid;
        var chat_history = Template.Messages({messages: messages});
        $("#message_history").html(chat_history);
        $("#messageid").val(messageid);
    }, {messageid: messageid});

    Chat.MessageRetrievalInterval = setInterval(Chat.CheckForNewMessages, 3000)
    Util.PrepareForm("#chatform", "../submit/message.php", "#btnSubmit", "", Util.DoNothing, Util.DoNothing);
};

Chat.CheckForNewMessages = function()
{
    Util.LoadJSON("../json/chat.php", function(data){
        var messages = data.messages;
        test_messages = data.messages;
        var messageid = data.messageid;
        var chat_history = Template.Messages({messages: messages});
        $("#message_history").html(chat_history);
        $("#messageid").val(messageid);
    }, {messageid: messageid});    
}