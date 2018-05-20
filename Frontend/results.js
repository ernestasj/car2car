function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return decodeURIComponent(sParameterName[1]);
        }
    }
}





app.controller('resultsCtrl', function($scope, $http) {
    $scope.yes = "yes";
    $scope.requested = false;
    
    $scope.booking_class = "btn-primary";
    $scope.action_text = "Book";   
    /*
        var cars = [
            {
                images: ["car.jpg", "cara.jpg", "carb.jpg"],
                rego: "ABC-123",
                make: "Holden",
                model: "Commodore",
                kms: "10000-14999kms",
                year: "1998",
                suburb: "Bondi",
                transmission: "Auto",
                availability: [
                    "Monday", "Tuesday", "Thursday", "Saturday", "Sunday", "Weekends", "Public Holidays"
                ]
            },
            {
                images: ["car2.jpg"],
                rego: "ABC-124",
                make: "Holden",
                model: "Commodore",
                kms: "10000-14999kms",
                year: "1998",
                suburb: "Bondi",
                transmission: "Auto",
                availability: [
                    "Monday", "Tuesday", "Thursday", "Saturday", "Sunday", "Weekends", "Public Holidays"
                ]
            },
            {
                images: ["car3.jpg"],
                rego: "ABC-124",
                make: "Holden",
                model: "Commodore",
                kms: "10000-14999kms",
                year: "1998",
                suburb: "Bondi",
                transmission: "Auto",
                availability: [
                    "Monday", "Tuesday", "Thursday", "Saturday", "Sunday", "Weekends", "Public Holidays"
                ]
            }
        ];
        $scope.cars = cars;
        $scope.pizza = "Yum!";
    //$http.get("customers.php").then(function (response) {
        */
    $scope.book = function(car) {
        console.log("Booking!");
        console.log(car);
        $http.post("./submit/booking.php",
        {
            rego: car.rego,
            date: car.date
        })
        .then(function(response) {
            console.log(response);
            $scope.requested = true;
            //<button type="button" class="btn btn-danger col-sm-2" ng-show="requested" ng-click="unbook(car)">Cancel Booking</button>

            $scope.action = $scope.unbook;
            $scope.booking_class = "btn-danger";
            $scope.action_text = "Cancel";
        });


    }

    $scope.unbook = function(car) {
        console.log("Unbooking!");
        
        $http.post("./submit/unbooking.php",
        {
            rego: car.rego,
            date: car.date
        })
        .then(function(response) {
            console.log(response)
            $scope.requested = false;  
            $scope.action = $scope.book;
            $scope.booking_class = "btn-primary";
            $scope.action_text = "Book";   

        });


    }


        $scope.show_modal = function(car){
            console.log(car);
            $scope.car = car;
            $scope.car.date = "";
            $("#detailed").modal("show");
        };

        var search = {
            keywords: GetURLParameter("keywords"),
            suburb: GetURLParameter("suburb"),
            state: GetURLParameter("state"),
            postcode: GetURLParameter("postcode"),
            monday: GetURLParameter("monday"),
            tuesday: GetURLParameter("tuesday"),
            wednesday: GetURLParameter("wednesday"),
            thursday: GetURLParameter("thursday"),
            friday: GetURLParameter("friday"),
            saturday: GetURLParameter("saturday"),
            sunday: GetURLParameter("sunday"),
            public_holidays: GetURLParameter("public_holidays"),
            make: GetURLParameter("make"),
            model: GetURLParameter("model"),
            body: GetURLParameter("body"),
            doors: GetURLParameter("doors"),
            year: GetURLParameter("year"),
            kms: GetURLParameter("kms"),
            enginecc: GetURLParameter("enginecc"),
            transmission: GetURLParameter("transmission")

        };
        for (var key in search) {
            if(search[key] == "?" || search[key] == undefined)
            {
                search[key] = "";
            }
          }

        console.log(search);
    
        $http.post("./json/search.php",
        {
            keywords: GetURLParameter("keywords"),
            suburb: GetURLParameter("suburb"),
            state: GetURLParameter("state"),
            postcode: GetURLParameter("postcode"),
            monday: GetURLParameter("monday"),
            tuesday: GetURLParameter("tuesday"),
            wednesday: GetURLParameter("wednesday"),
            thursday: GetURLParameter("thursday"),
            friday: GetURLParameter("friday"),
            saturday: GetURLParameter("saturday"),
            sunday: GetURLParameter("sunday"),
            public_holidays: GetURLParameter("public_holidays"),
            make: GetURLParameter("make"),
            model: GetURLParameter("model"),
            body: GetURLParameter("body"),
            doors: GetURLParameter("doors"),
            year: GetURLParameter("year"),
            kms: GetURLParameter("kms"),
            enginecc: GetURLParameter("enginecc"),
            transmission: GetURLParameter("transmission")

        })
        .then(function(response) {
            console.log(response);
            $scope.cars = response.data;
        });
        
        $scope.action = $scope.book;
    //});
});

