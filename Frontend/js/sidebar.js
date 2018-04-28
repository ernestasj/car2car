SideBar = {};

SideBar.AddListeners = function()
{
    Util.ButtonListener("#link_dashboard", Dashboard.Display, Page.Layout);
    Util.ButtonListener("#link_triplog", TripLog.Display, Page.Layout);
    Util.ButtonListener("#link_bookings", Bookings.Display, Page.Layout);
    Util.ButtonListener("#link_addcar", AddCar.Display, Page.Layout);
    Util.ButtonListener("#link_createaccount", CreateAccount.Display, Page.Layout);
    Util.ButtonListener("#link_search", Search.Display, Page.Layout);
    
}