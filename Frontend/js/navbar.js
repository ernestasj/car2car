NavBar = {};

NavBar.Update = function()
{
    NavBar.UpdateMessages();
    NavBar.UpdateTasks();
    NavBar.UpdateAlerts();
    Util.AddListeners(NavBar.Listeners);
}

NavBar.UpdateMessages = function()
{
    Util.LoadJSON("../json/messages.php", function(messages){
        NavBar.InsertMessages(messages, "messages", NavBar.FormatMessage);
    });

}

NavBar.UpdateTasks = function()
{

    Util.LoadJSON("../json/tasks.php", function(tasks){
        NavBar.InsertMessages(tasks, "tasks", NavBar.FormatTask);
    });

}

NavBar.UpdateAlerts = function()
{
    Util.LoadJSON("../json/alerts.php", function(alerts){
        NavBar.InsertMessages(alerts, "alerts", NavBar.FormatAlert);
    });

}

NavBar.IntervalUpdate = function(ms)
{
    if(NavBar.IntervalReference)
    {
        clearInterval(NavBar.IntervalReference);
        NavBar.IntervalReference = setInterval(NavBar.Update, ms);
    }
    else
    {
        NavBar.Update();
        NavBar.IntervalReference = setInterval(NavBar.Update, ms);
    }
    
}

NavBar.FormatMessage = function(message){
    var tag = '<li>';
    tag += '<a href="#">';
    tag += '<div>';
    tag += '<strong>' + message.name + '</strong>';
    tag += '<span class="pull-right text-muted">';
    tag += '<em>'+ message.time +'</em>';
    tag += '</span>';
    tag += '</div>';
    tag += '<div>' + message.message + '</div>';
    tag += '</a>';
    tag += '</li>';
    return tag;

}

NavBar.MapProgressToClass = function(progress) {
    if(progress>20)
        return "progress-bar-success";
    else
        return "progress-bar-info";
}

NavBar.FormatAlert = function(alert){
    var tag = "";
    tag += '<li> <a href="#"> <div>';
    tag += '<i class="fa fa-comment fa-fw"></i>' + alert.text;
    tag += '<span class="pull-right text-muted small">' + alert.time+ '</span>';
    tag += '</div> </a> </li>';

    return tag;
}


NavBar.FormatTask = function(task) {
    var tag = '<li><a href="#"><div><p><strong>'+task.name+' - '+task.rego+'</strong>';
    tag += '<span class="pull-right text-muted">'+task.percentage+'% Complete</span>';
    tag += '</p><div class="progress "><div class="progress-bar ' + NavBar.MapProgressToClass(task.percentage) + '" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: ' + task.percentage+'%">';
    tag += '<span class="sr-only">'+ task.percentage +'% Complete (success)</span>';
    tag += '</div> </div> </div> </a> </li>';
    return tag;

}

NavBar.InsertMessages = function(messages, id, format){
    var first = true;
    $("#" + id ).html("");
    messages.forEach(function(message){
        var tag = "";
        if(!first) {
            tag += '<li class="divider"></li>'
        } else {
            first = false;
        }
        tag += format(message);
        $("#" + id ).append(tag);

    });
}

NavBar.Logout = function(parameters)
{
    Util.ButtonListener("#logout", Login.Display, parameters);
}

NavBar.Listeners = [
    {id: "#logout", call: NavBar.Logout, parameters: Page.Layout}
];