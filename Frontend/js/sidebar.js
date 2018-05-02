SideBar = {};

SideBar.Listenters = [
    //{id: "#link_dashboard", call: Dashboard.Display, parameters: Page.Layout},
    {id: "#link_triplog", call: TripLog.Display, parameters: Page.Layout},
    //{id: "#link_bookings", call: Bookings.Display, parameters: Page.Layout},
    {id: "#link_addcar", call: AddCar.Display, parameters: Page.Layout},
    {id: "#link_createaccount", call: CreateAccount.Display, parameters: Page.Layout},
    {id: "#link_search", call: Search.Display, parameters: Page.Layout},
    //{id: "#link_review", call: Review.Display, parameters: Page.Layout},
    {id: "#link_chat", call: Chat.Display, parameters: Page.Layout},
    {id: "#link_inbox", call: Inbox.Display, parameters: Page.Layout},
    {id: "#link_logout", call: Logout.Do, parameters: Page.Layout}
    
    
    
];

SideBar.AddListeners = function()
{
    Util.AddListeners(SideBar.Listenters);
    /*
    Util.ButtonListener("#link_dashboard", Dashboard.Display, Page.Layout);
    Util.ButtonListener("#link_triplog", TripLog.Display, Page.Layout);
    Util.ButtonListener("#link_bookings", Bookings.Display, Page.Layout);
    Util.ButtonListener("#link_addcar", AddCar.Display, Page.Layout);
    Util.ButtonListener("#link_createaccount", CreateAccount.Display, Page.Layout);
    Util.ButtonListener("#link_search", Search.Display, Page.Layout);
    */
}