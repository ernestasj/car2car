Review = {};

Review.Header = "";

Review.Body = "";

Review.Display = function(page){
    $("#"+page.header).html(Review.Header);
    $("#"+page.body).html(Review.Body);

    Review.PrepareForm();
};
