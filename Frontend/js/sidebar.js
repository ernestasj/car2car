SideBar = {};



SideBar.Dashboard = Template.Sidebar.Item({
    id: "link_dashboard",
    text: "Dashboard",
    icon: "fa-dashboard"
});

SideBar.Search = Template.Sidebar.Item({
    id: "link_search",
    text: "Search",
    icon: "fa-search"
});

SideBar.Recent = Template.Sidebar.Item({
    id: "link_triplog",
    text: "Recent Trips",
    icon: "fa-table"
});

SideBar.Bookings = Template.Sidebar.Item({
    id: "link_bookings",
    text: "Bookings",
    icon: "fa-edit"
});

SideBar.AddCar = Template.Sidebar.Item({
    id: "link_addcar",
    text: "Add a Car",
    icon: "fa-car"
});

SideBar.Logout= Template.Sidebar.Item({
    id: "link_logout",
    text: "Logout",
    icon: "fa-times-circle-o"
});


SideBar.Menu = 
    SideBar.Dashboard +
    SideBar.Search +
    SideBar.Recent +
    SideBar.Bookings +
    SideBar.AddCar +
    SideBar.Logout;



/*
<!-- <li>
<a id="link_dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
</li>
-->
<li>
<a id="link_search"><i class="fa fa-search fa-fw"></i> Search</a>
</li>
<li>
<a id="link_triplog"><i class="fa fa-table fa-fw"></i> Recent Trips</a>
</li>
<li>
<a id="link_bookings"><i class="fa fa-edit fa-fw"></i> Bookings</a>
</li>
<li>
<a id="link_addcar"><i class="fa fa-car fa-fw"></i> Add a car</a>
</li>
<!--
<li>
<a id="link_createaccount"><i class="fa fa-edit fa-fw"></i> Create Account</a>
</li>
-->
<!--<li>
<a id="link_review"><i class="fa fa-edit fa-fw"></i> Review</a>
</li>-->
<!--
<li>
<a id="link_inbox"><i class="fa fa-envelope-square fa-fw"></i> Inbox</a>
</li>
-->
<li>
<a id="link_logout"><i class="fa fa-times-circle-o fa-fw"></i> Logout</a>
</li>
</li>
*/

SideBar.Listenters = [
    //{id: "#link_dashboard", call: Dashboard.Display, parameters: Page.Layout},
    {id: "#link_triplog", call: TripLog.Display, parameters: Page.Layout},
    {id: "#link_bookings", call: Bookings.Display, parameters: Page.Layout},
    {id: "#link_addcar", call: AddCar.Display, parameters: Page.Layout},
    {id: "#link_createaccount", call: CreateAccount.Display, parameters: Page.Layout},
    {id: "#link_search", call: Search.Display, parameters: Page.Layout},
    //{id: "#link_review", call: Review.Display, parameters: Page.Layout},
    {id: "#link_chat", call: Chat.Display, parameters: Page.Layout},
    {id: "#link_inbox", call: Inbox.Display, parameters: Page.Layout},
    {id: "#link_logout", call: Logout.Do, parameters: Page.Layout}
    
    
    
];

SideBar.Display = function(page)
{
    $("#"+page.sidebar).html(SideBar.Menu);
    SideBar.AddListeners();
}

SideBar.Remove = function(page)
{
    $("#"+page.sidebar).html("");
}

SideBar.AddListeners = function()
{
    Util.AddListeners(SideBar.Listenters);
}