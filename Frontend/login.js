app.controller('loginCtrl', function($scope, $http) {
    $scope.show_login = true;
    $scope.show_signup = true;
    $scope.show_accountlinks = false;
    $scope.form = {};
    $scope.login = function () {
        console.log("Logged in!");
        $http.post("./submit/login.php",
        {
            email: $scope.form.email,
            password: $scope.form.password
        })
        .then(function(response) {
            //debugger;
            console.log(response);
            if(response.data.status == "loggedin")
            {
                //window.location.href = "./index2.html";
                $scope.show_login = false;
                $scope.show_signup = false;
                $scope.show_accountlinks = true;
            }
            });            
    };

});