Logout = {};

Logout.Do = function(page)
{
    Util.LoadJSON("../json/logout.php", Util.DoNothing, {});
}