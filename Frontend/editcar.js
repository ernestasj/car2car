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


app.controller('editcarCtrl', function($scope, $http) {
    $scope.car = {};
    $scope.rego = GetURLParameter("car");

    $scope.MakeChanged = function (callback){
        console.log("Model changed!");
        
        $http.post("./json/models.php",
        {
            make: $scope.selectedMake.value
        })
        .then(function(response) {
            console.log(response.data);
            $scope.models = response.data;
            if(callback !== undefined) callback();
        });
    }

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

    $http.post("./json/car.php", {
        rego: GetURLParameter("car")
    })
    .then(function(response) {
        $scope.car = response.data;
        console.log($scope.car);
        $http.post("./json/makes.php",
        {
        })
        .then(function(makeresponse) {
            
            $scope.makes = makeresponse.data;
            var makeindex = 0;
            $scope.makes.forEach(function(item, index)
            {
                if(item.value == $scope.car.make)
                {
                    makeindex = index;
                }
            }
            );
            //$scope.car.make = $scope.makes[2].value;
            $scope.selectedMake = $scope.makes[makeindex];
            var modelindex = 0;
            $scope.MakeChanged(function(){
                $scope.models.forEach(function(item, index)
                {
                    if(item.value == $scope.car.model)
                    {
                        modelindex = index;
                    }
                    
                });
                $scope.selectedModel = $scope.models[modelindex];
            });
        });

        $http.post("./json/body.php", {})
        .then(function(response){
    
            $scope.bodys = response.data;
            var index = findIndex($scope.bodys, $scope.car.body, "value");
            $scope.selectedBody = $scope.bodys[index];
  
          });
    
        $scope.doors = [];
        $http.post("./json/doors.php", {})
        .then(function(response){
    
            $scope.doors = response.data;
            var index = findIndex($scope.doors, $scope.car.doors, "value");
            $scope.selectedDoor = $scope.doors[index];

          });
    
        $scope.engineccs = [];
        $http.post("./json/enginecc.php", {})
        .then(function(response){
    
            $scope.engineccs = response.data;
            var index = findIndex($scope.engineccs, $scope.car.enginecc, "value");
            $scope.selectedEnginecc = $scope.engineccs[index];
          });
        $scope.transmissions = [];
        $http.post("./json/transmission.php", {})
        .then(function(response){
    
            $scope.transmissions = response.data;
            var index = findIndex($scope.transmissions, $scope.car.transmission, "value");
            $scope.selectedTransmission = $scope.transmissions[index];

          });
    
        $scope.kms = [];
          
        $http.post("./json/kms.php", {})
        .then(function(response){
            $scope.kms = response.data;
            var index = findIndex($scope.kms, $scope.car.kms, "value");
            $scope.selectedKms = $scope.kms[index];

          });
    
        $scope.petrols = [];
        $http.post("./json/petrol.php", {})
        .then(function(response){
            $scope.petrols = response.data;
            var index = findIndex($scope.petrols, $scope.car.petrol, "value");
            $scope.selectedPetrol = $scope.petrols[index];

          });
    
        $scope.states = [];
    
        $http.post("./json/state.php", {})
        .then(function(response){
    
            $scope.states = response.data;
            var index = findIndex($scope.states, $scope.car.state, "value");
            $scope.selectedState = $scope.states[index];

          });
    });





    $scope.models_clicked = false
    $scope.ShowModels = function(){
        $scope.models_clicked = true;
        console.log("Clicked!");
    }



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