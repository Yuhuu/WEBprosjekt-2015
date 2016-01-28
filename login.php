 <div class="container" ng-app="myApp" ng-controller="myCtrl">
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.doSubmit = "Your Email address";
});
</script>
 <form id ="panel" class="form-inline" role="form" name="myForm" ng-submit="doSubmit" vmsgs-form>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
      <input type="email"
             name = "myEmail"
             ng-model="myEmail"
             ng-minlength ="10"
             required 
             vmsg
             class="form-control" 
             id="email" 
             placeholder="Enter email" />
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
      <input type="password" 
             required 
             vmsg
             class="form-control" 
             id="pwd" 
             placeholder="Password"/>
    </div>
    <button ng-click="myEmail=''" class="btn btn-default">Clear</button>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
 </div>
