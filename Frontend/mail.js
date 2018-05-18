app.controller('inboxCtrl', function($scope, $http, $rootScope, $interval) {
/*    var inbox = [
        {userimage: "user1.jpg", username: "Wilfred", bookingid:0},
        {userimage: "user2.jpg", username: "Paul", bookingid:1},
        {userimage: "user3.jpg", username: "Sam", bookingid:2},
        {userimage: "user4.jpg", username: "Rob", bookingid:3}
    ];*/

    var inbox = [];
    $scope.otherimage;
    $scope.othername;
    $scope.bookingid = -1;
    $scope.car = false;
    var user;
    $http.post("./json/user.php", {})
    .then(function(response){
        
        user = response.data;
        console.log(user);
    });

    $http.post("./json/inbox.php", {})
        .then(function(response){
            $scope.inbox = response.data;
        });

    $scope.loadConversation = function(bookingid, otherimage, othername) {
        $http.post("./json/chat.php",
            {
                bookingid: bookingid
            })
            .then(function(response) {
                $scope.otherimage = otherimage;
                $scope.othername = othername;
                $scope.bookingid = bookingid;
                var data = {
                    messages: response.data,
                    otherimage: otherimage,
                    othername: othername,
                    username: user.username,
                    userimage: user.userimage


                }
                //console.log(data);
                $rootScope.$broadcast('ChangeMessage', data);
            });
            console.log(bookingid);
        $http.post("./json/car.php",
            {
                bookingid: bookingid
            })
            .then(function(response)
            {
                console.log(response.data);
                $scope.car = response.data;
            });
    };
    $scope.SendMessage = function() {
        $http.post("./submit/message.php", 
            {
            bookingid: $scope.bookingid,
            message: $scope.form.message
            })
            .then(function(response) {
                //console.log(response);
            $scope.form.message = "";
            $scope.loadConversation($scope.bookingid, $scope.otherimage, $scope.othername);
        });
    }
    $scope.intervalLoadConversation = function()
    {
        if($scope.bookingid >= 0 && !(user === undefined))
        {
            $scope.loadConversation($scope.bookingid, $scope.otherimage, $scope.othername);
        }
    }
    $interval($scope.intervalLoadConversation, 1000);
});