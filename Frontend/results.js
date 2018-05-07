function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}





app.controller('resultsCtrl', function($scope, $http) {
    $scope.yes = "yes";
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
        $scope.show_modal = function(car){
            console.log(car);
            $scope.car = car;
            $("#detailed").modal("show");
        };
        $http.post("./json/search.php",
        {
            keywords: GetURLParameter("keywords")
        })
        .then(function(response) {
            console.log(response);
            $scope.cars = response.data;
        });
        
        
    //});
});

