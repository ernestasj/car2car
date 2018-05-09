function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}





app.controller('bookingsCtrl', function($scope, $http) {

    $http.post("./json/booking.php",
    {
    })
    .then(function(response) {
        console.log(response);
        $scope.bookings = response.data;
    });

});

