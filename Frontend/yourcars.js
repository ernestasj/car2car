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
    $scope.requested = false;
    
    $scope.booking_class = "btn-primary";
    $scope.action_text = "Book";   

    $scope.editcar = function(car){
        window.location.href = "./editcar.html" + "?car=" + $scope.car.rego;
    };

        $scope.show_modal = function(car){
            console.log(car);
            $scope.car = car;
            $scope.car.date = "";
            $("#detailed").modal("show");
        };
        
        $http.post("./json/usercars.php",
        {
        })
        .then(function(response) {
            console.log(response);
            $scope.cars = response.data;
        });
        
});

