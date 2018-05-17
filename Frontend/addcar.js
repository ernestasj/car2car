app.controller('addcarCtrl', function($scope, $http) {
    $scope.form = {};
    
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