


$(document).ready(function(){
    /*$("#nav_login").click(function(){
          window.location.href = "./login.html";
    });*/
    $("#nav_signup").click(function(){
          window.location.href = "./createaccount.html";
    });
/*
    $("#nav_search").click(function(){
        window.location.href = "./results.html";
    });
*/
});

app.controller('navbarCtrl', function($scope, $http) {
    $scope.show_login = true;
    $scope.show_signup = true;
    $scope.show_accountlinks = false;
    $scope.form = {};

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
        $http.post("./submit/login.php",
        {
            email: $scope.form.email,
            password: $scope.form.password
        })
        .then(function(response) {
            //debugger;
            if(response.data.status == "loggedin")
            {
                console.log("logged in!");
                $scope.show_login = false;
                $scope.show_signup = false;
                $scope.show_accountlinks = true;
            }
            });            
    };


    });


