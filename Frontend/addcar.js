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

});