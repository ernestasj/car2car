app.controller('accountCtrl', function($scope, $http) {
    $scope.form = {};
    
    $http.post("./json/account.php",
    {
    })
    .then(function(response) {
        console.log(response);
        $scope.form = response.data;
        console.log($scope.form);
    });

    $scope.prntform = function() {
        console.log($scope.form);
    }
});