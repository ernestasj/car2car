app.controller('messagesCtrl', function($scope, $http) {
        $scope.userid = 0;
        $scope.bookingid = 0;
         $http.post("./json/chat.php",
            {
                bookingid: $scope.bookingid
            })
            .then(function(response) {
                $scope.userimage = response.data.userimage;
                $scope.userid = response.data.userid;
                $scope.otherimage = response.data.otherimage;
                $scope.othername = response.data.othername;
                $scope.username = response.data.username;
                $scope.messages = [];
                });

        $scope.$on('ChangeMessage', function(event, data) {
            $scope.userimage = data.userimage;
            $scope.userid = data.userid;
            $scope.otherimage = data.otherimage;
            $scope.othername = data.othername;
            $scope.username = data.username;
            $scope.messages = data.messages;
            $scope.userid = 0;
            
        });
        /*
        $scope.bookingid = 0;
        $interval(function () {
            $http.post("./json/chat.php",
            {
                bookingid: $scope.bookingid
            })
            .then(function(response) {
                $scope.userimage = data.userimage;
                $scope.userid = data.userid;
                $scope.otherimage = data.otherimage;
                $scope.othername = data.othername;
                $scope.username = data.username;
                $scope.messages = data.messages;
                });
            }, 1000);

            */
    
});

