Logout = {};

Logout.Do = function(page)
{
    SideBar.Remove(Page.Layout);
    Util.LoadJSON("../json/logout.php", Util.DoNothing, {});
}