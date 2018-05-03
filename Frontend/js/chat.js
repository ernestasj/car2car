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
    id: "bookingid",
    name: "bookingid"
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

Chat.Display = function(page, bookingid){
    //console.log(bookingid);

    $("#"+page.header).html(Chat.Header);

    $("#"+page.body).html(Chat.Body.Form);

    $("#bookingid").val(bookingid);

    Util.LoadJSON("../json/chat.php", function(data){
        var chat_history = Template.Messages({messages: data});
        $("#message_history").html(chat_history);
    }, {bookingid: bookingid});
    if(Chat.MessageRetrievalInterval != -1){
        clearInterval(Chat.MessageRetrievalInterval);
    }
    Chat.MessageRetrievalInterval = setInterval(Chat.CheckForNewMessages, 1000);
    Util.PrepareForm("#chatform", "../submit/message.php", "#btnSubmit", "", Chat.ClearInput, Util.DoNothing);
};

Chat.Refresh = function () {
    var bookingid = $("#bookingid").val();
    Chat.Display(bookingid);
}

Chat.ClearInput = function () {
    $("#message").val("");
}

Chat.CheckForNewMessages = function()
{
    if($("#message_history").length == 0)
    {
        clearInterval(Chat.MessageRetrievalInterval); 
    }
    else
    {
        var bookingid = $("#bookingid").val();
        Util.LoadJSON("../json/chat.php", function(data){
            var chat_history = Template.Messages({messages: data});
            $("#message_history").html(chat_history);
        }, {bookingid: bookingid});
    }
}