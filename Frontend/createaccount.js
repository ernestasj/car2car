function findIndex(arr, target, key)
{
  var target_index = -1;
  arr.forEach(function(item, index)
  {
    if(item[key] == target )
    {
      target_index = index;
    }
    
  });
  return target_index;
}


app.controller('accountCtrl', function($scope, $http) {
    $scope.form = {};
    

    $scope.states = [];

    $http.post("./json/state.php", {})
    .then(function(response){

        $scope.states = response.data;
      });

    $scope.SuburbChanged = function(){
        console.log($scope.form.suburb);
      $http.post("./json/suburbfill.php",
      {
        suburb:$scope.form.suburb
      })
      .then(function(response){
        if("state" in response.data && "postcode" in response.data)
        {
          var data = response.data;

          var state_index = findIndex($scope.states, data.state, "value");
          $scope.form.state = $scope.states[state_index];
          
          $scope.form.postcode = data.postcode;
        }
      });
    };

});