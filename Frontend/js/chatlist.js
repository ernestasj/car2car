var ChatList = {};

ChatList.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Chat</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

    ChatList.Body = '<div class="col-lg-12" >\
    <div class="list-car-panel panel panel-default">\
        <div class="panel-heading">\
            <h3 class="panel-title">Chat</h3>\
        </div>\
        <div class="panel-body">\
        </div>\
    </div>\
</div>';

ChatList.Display = function(page){
    $("#"+page.header).html(ChatList.Header);
    $("#"+page.body).html(ChatList.Body);

    //Util.PrepareForm("#reviewform", "../json/search.php", "#btnSearch", "", Util.DoNothing, Util.DoNothing);
};
