app.controller('inboxCtrl', function($scope, $http, $rootScope) {
    var inbox = [
        {userimage: "user1.jpg", username: "Wilfred", bookingid:0},
        {userimage: "user2.jpg", username: "Paul", bookingid:1},
        {userimage: "user3.jpg", username: "Sam", bookingid:2},
        {userimage: "user4.jpg", username: "Rob", bookingid:3}
    ];
    $scope.loadConversation = function(bookingid) {
        $http.post("./json/chat.php",
            {
                bookingid: bookingid
            })
            .then(function(response) {
                console.log(response.data);
                $rootScope.$broadcast('ChangeMessage', response.data);
            });
    }
    $scope.inbox = inbox;
});