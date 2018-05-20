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

    $scope.MakeChanged = function (callback){
        console.log("Model changed!");
        
        $http.post("./json/models.php",
        {
            make: $scope.selectedMake.value
        })
        .then(function(response) {
            console.log(response.data);
            $scope.models = response.data;
            if(callback !== undefined) callback();
        });
    }

    $http.post("./json/car.php", {
        rego: GetURLParameter("car")
    })
    .then(function(response) {
        $scope.car = response.data;
        console.log($scope.car);
        $http.post("./json/makes.php",
        {
        })
        .then(function(makeresponse) {
            
            $scope.makes = makeresponse.data;
            var makeindex = 0;
            $scope.makes.forEach(function(item, index)
            {
                if(item.value == $scope.car.make)
                {
                    makeindex = index;
                }
            }
            );
            //$scope.car.make = $scope.makes[2].value;
            $scope.selectedMake = $scope.makes[makeindex];
            var modelindex = 0;
            $scope.MakeChanged(function(){
                $scope.models.forEach(function(item, index)
                {
                    if(item.value == $scope.car.model)
                    {
                        modelindex = index;
                    }
                    
                });
                $scope.selectedModel = $scope.models[modelindex];
            });
        });
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


});