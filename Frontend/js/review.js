var Review = {};

Review.Header = '\
    <div class="col-lg-12">\
        <h1 class="page-header">Review</h1>\
    </div>\
    <!-- /.col-lg-12 -->';

    Review.Body = '<div class="col-lg-12" >\
    <div class="list-car-panel panel panel-default">\
        <div class="panel-heading">\
            <h3 class="panel-title">Review</h3>\
        </div>\
        <div class="panel-body">\
            <form role="form" action = "" method = "post" enctype="multipart/form-data" id="searchform">\
                <fieldset>\
                    <div class="form-group rating">\
                        <label>\
                            <input type="radio" name="rating" value="1" />\
                            <span class="icon">★</span>\
                        </label>\
                        <label>\
                            <input type="radio" name="rating" value="2" />\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                        </label>\
                        <label>\
                            <input type="radio" name="rating" value="3" />\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>   \
                        </label>\
                        <label>\
                            <input type="radio" name="rating" value="4" />\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                        </label>\
                        <label>\
                            <input type="radio" name="rating" value="5" />\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                            <span class="icon">★</span>\
                        </label>\
                    </div>\
                    <div class="form-group">\
                        <label for="rego">Comments:</label>\
                        <textarea class="form-control" placeholder="Your comments" name="comments" rows="10" autofocus id="comments"></textarea>\
                    </div>\
                    <button class="btn btn-lg btn-success btn-block" id="btnSubmit">Submit Review</button>\
                </fieldset>\
            </form>\
        </div>\
    </div>\
</div>';

Review.Display = function(page){
    $("#"+page.header).html(Review.Header);
    $("#"+page.body).html(Review.Body);

    //Util.PrepareForm("#reviewform", "../json/search.php", "#btnSearch", "", Util.DoNothing, Util.DoNothing);
};
