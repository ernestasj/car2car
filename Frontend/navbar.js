

app.controller('navbarCtrl', function($scope, $http) {
    $scope.show_login = true;
    $scope.show_signup = true;
    $scope.show_accountlinks = false;

    $scope.form = {};

    $scope.signup = function(){
        window.location.href = "./createaccount.html";
    }

    $http.post("./json/loggedin.php",
    {
    })
    .then(function(response) {
        //debugger;
        
        if(response.data.status == "loggedin")
        {
            $scope.show_login = false;
            $scope.show_signup = false;
            $scope.show_accountlinks = true;
        }
        });

    $scope.logout = function () {
        $http.post("./submit/logout.php",
            {
            })
            .then(function(response) {
    
                
                $scope.show_login = true;
                $scope.show_signup = true;
                $scope.show_accountlinks = false;

            });
        };
    
    $scope.login = function () {
        console.log("Logged in!");
        console.log($scope.form.email);
        console.log($scope.form.password);

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
                
                window.location.href = "./index.html";
                $scope.show_login = false;
                $scope.show_signup = false;
                $scope.show_accountlinks = true;
            }
            });            
    };


    });


