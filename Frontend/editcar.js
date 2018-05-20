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


app.controller('editcarCtrl', function($scope, $http) {
    $scope.car = {};
    $scope.rego = GetURLParameter("car");
    $http.post("./json/car.php", {
        rego: GetURLParameter("car")
    })
    .then(function(response) {
        console.log($scope.rego);
        console.log(response.data);
        $scope.car = response.data;
    });



    $scope.addcar = function () {
        console.log($scope.form)
        /*$http.post("./submit/login.php",
        {
            email: $scope.form.email,
            password: $scope.form.password
        })
        .then(function(response) {
            //debugger;
            console.log(response);
            if(response.data.status == "loggedin")
            {
                $scope.show_login = false;
                $scope.show_signup = false;
                $scope.show_accountlinks = true;
            }
            });            */
    };

    $scope.models_clicked = false
    $scope.ShowModels = function(){
        $scope.models_clicked = true;
        console.log("Clicked!");
    }

    $http.post("./json/makes.php",
    {
    })
    .then(function(response) {
        
        $scope.makes = response.data;
    });

    $scope.MakeChanged = function (){
        console.log("Model changed!");
        
        $http.post("./json/models.php",
        {
            make: $scope.selectedMake.value
        })
        .then(function(response) {
            console.log(response.data);
            $scope.models = response.data;
        });
    }

});