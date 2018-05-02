Bookings = {};

Bookings.Header = Template.Header({
    title:"Bookings"
});

Bookings.Body = {};

Bookings.TableHeaders = {
    renter: "Renter",
    rego: "Rego",
    date: "Date",
};

Bookings.TableOrder = ["renter", "rego", "date"];

Bookings.Table = {};

Bookings.Table.Rows = "";

Bookings.Table.Headers = "";

Bookings.Body.Table = "";

Bookings.Display = function(page, data) {

    Util.LoadJSON("../json/booking.php", function(data){
        Bookings.Table.Rows = Template.Table.Rows({
            rows: data,
            fields: Bookings.TableOrder,
            classes: "goto-booking"
        });
        
        Bookings.Table.Headers = Template.Table.Headers({
            headers: Bookings.TableHeaders,
            fields: Bookings.TableOrder,
            classes: ""
        });
        
        // id, classes, headers, rows
        Bookings.Body.Table = Template.Table.Body({
            id: "bookings",
            headers: Bookings.Table.Headers,
            rows: Bookings.Table.Rows,
            classes: "table-hover"
        });
        
        $("#"+page.header).html(Bookings.Header);
        $("#"+page.body).html(Bookings.Body.Table);

        $(".goto-booking").click(function(){
            event.stopPropagation();
            event.stopImmediatePropagation();
            var bookingid = $(this).data('id');
            console.log("Goto booking "+ bookingid +" !");
            
            Chat.Display(Page.Layout, bookingid);
        });
    }, {});
}

Bookings.TableClasses = {
    body: {row: "goto-booking"}
};

