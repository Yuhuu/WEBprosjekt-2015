<!--http://tutsnare.com/post-form-data-using-angularjs/-->
<div class="container">
    
    <form class="form-inline" name="registerForm" ng-submit="doSubmit()" vmsgs-form>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
      <input type="email"
             name = "myEmail"
             vmsg
             ng-model="user.myEmail"
             ng-minlength ="10"
             class="form-control" 
             placeholder="{{errorUserName}}" />
      
      
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
      <input type="password" 
             name = "myPassword"
             vmsg
             ng-model="user.myPassword"
             class="form-control" 
             placeholder="{{errorPassword}}"/>
<!--      <span ng-show="errorPassword">{{errorPassword}}</span>-->
    </div>
    <button data-ng-click="user.myEmail=''; user.myPassword=''" class="btn btn-default">Clear</button>
    <button type="submit" class="btn btn-default">Registe</button>
  </form>
</div>
<script>
    // Defining angularjs application.
var postApp = angular.module('myApp', []);
postApp.controller('myCtrl', function($scope, $http) {
    // create a blank object to handle form data.
    $scope.user = {};
    // calling our submit function.
    $scope.doSubmit = function(){
            $http({
            method: 'POST',
            url: 'insert.php',
            data: $scope.user,
            headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
        .success(function(data){
            if (data.errors) {
              // Showing errors.
              $scope.errorUserName = data.errors.myEmail;
              $scope.errorPassword = data.errors.myPassword;
            } else {
            $scope.message = data.message;
            console.log("inserted Successfully");
            }
        });
    };
 });
</script>