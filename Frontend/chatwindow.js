app.controller('messagesCtrl', function($scope, $http) {
/*
        var data = {
            userid: 1,
            userimage: "user1.jpg",
            otherimage: "user2.jpg",
            othername: "Bob",
            username: "Robert",
            messages: [
                {
                    senderid: 0,
                    content: "Hello!"
                },
                {
                    senderid: 1,
                    content: "Howdy!"
                },
                {
                    senderid: 0,
                    content: "Is the car still for rent?"
                },
                {
                    senderid: 1,
                    content: "No"
                },
                {
                    senderid: 1,
                    content: "Just kidding ofcourse it is! XD"
                },
                {
                    senderid: 0,
                    content: "Phew. I need it on Friday from 6pm"
                },
                {
                    senderid: 1,
                    content: "Sure. Come pick it up."
                }
            ]
        };
*/
        
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
                $scope.messages = response.data.messages;
                });

        $scope.$on('ChangeMessage', function(event, data) {
            $scope.userimage = data.userimage;
            $scope.userid = data.userid;
            $scope.otherimage = data.otherimage;
            $scope.othername = data.othername;
            $scope.username = data.username;
            $scope.messages = data.messages;
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

