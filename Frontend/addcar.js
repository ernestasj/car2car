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


app.controller('addcarCtrl', function($scope, $http) {

    $scope.form = {};
    
    $scope.addcar = function () {
        console.log($scope.form)
        /*$http.post("./submit/login.php",
        {
            email: $scope.form.email,
            password: $scope.form.password
        })
        .then(function(response) {
            //debugger;
            console.log(response);
            if(response.data.status == "loggedin")
            {
                $scope.show_login = false;
                $scope.show_signup = false;
                $scope.show_accountlinks = true;
            }
            });            */
    };

    $scope.models_clicked = false
    $scope.ShowModels = function(){
        $scope.models_clicked = true;
        console.log("Clicked!");
    }

    $http.post("./json/makes.php",
    {
    })
    .then(function(response) {
        
        $scope.makes = response.data;
    });

    $scope.MakeChanged = function (){
        console.log("Model changed!");
        
        $http.post("./json/models.php",
        {
            make: $scope.selectedMake.value
        })
        .then(function(response) {
            console.log(response.data);
            $scope.models = response.data;
        });
    }

    $http.post("./json/body.php", {})
    .then(function(response){

        $scope.bodys = response.data;
      });

    $scope.doors = [];
    $http.post("./json/doors.php", {})
    .then(function(response){

        $scope.doors = response.data;
      });

    $scope.engineccs = [];
    $http.post("./json/enginecc.php", {})
    .then(function(response){

        $scope.engineccs = response.data;
      });
    $scope.transmissions = [];
    $http.post("./json/transmission.php", {})
    .then(function(response){

        $scope.transmissions = response.data;
      });

    $scope.kms = [];
      
    $http.post("./json/kms.php", {})
    .then(function(response){
        $scope.kms = response.data;
      });

    $scope.petrols = [];
    $http.post("./json/petrol.php", {})
    .then(function(response){
        $scope.petrols = response.data;
      });

    $scope.states = [];

    $http.post("./json/state.php", {})
    .then(function(response){

        $scope.states = response.data;
      });

    $scope.SuburbChanged = function(){
      $http.post("./json/suburbfill.php",
      {
        suburb:$scope.suburb
      })
      .then(function(response){
        if("state" in response.data && "postcode" in response.data)
        {
          var data = response.data;

          var state_index = findIndex($scope.states, data.state, "value");
          $scope.selectedState = $scope.states[state_index];
          
          $scope.selectedPostcode = data.postcode;
        }
      });
    };
});