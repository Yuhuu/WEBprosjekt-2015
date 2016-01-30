<!--http://tutsnare.com/post-form-data-using-angularjs/-->
<div class="space-6" style="margin-top:20px;"></div>
<div class="breadcrumbs" id="breadcrumbs" style="margin-top:20px;">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li class="active">Login</li>
    </ul>
</div>

<div class="container col-xs-12 col-md-10 col-md-offset-1" style="margin-top:20px;">
    
    <form class="form-inline" action="" name="registerForm" ng-submit="doSubmit()" 
          ng-init="user.myEmail = 'Please enter your email';user.myPassword = 'Please enter your password'"
          vmsgs-form>
    <div class="input-group col-xs-12 col-md-5" >
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <input type="email"
                   name = "myEmail"
                   vmsg
                   ng-model="user.myEmail"
                   ng-minlength ="10"
                   class="form-control" 
                   /></div>
    <div class="input-group col-xs-12 col-md-5" >
        <span ng-show="registerForm.myEmail.$touched && registerForm.myEmail.$invalid">
            The correct email address is required,it should contain minimun 10 character</span>
    </div>
    <div class="input-group col-xs-12 col-md-5" style="margin-top:10px;">
    
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input type="password" 
                   name = "myPassword"
                   vmsg
                   ng-model="user.myPassword"
                   ng-minlength ="3"
                   class="form-control" 
                   /></div>
   <div class="input-group col-xs-12 col-md-5" >
       <span ng-show="registerForm.myPassword.$touched && registerForm.myPassword.$invalid">
            The myPassword is required, it should contain minimun 3 character</span>
       <span>{{cancelsucceed}}</span>
   </div>
    
    <div class="input-group col-xs-3" style="margin-top:20px;">
<!--    <input type="button" value="Cancel changes" />-->
    <button type="button" data-ng-click="doCancel()" class="btn btn-default col-md-12">Cancel changes</button>
    <button type="submit" class="btn btn-default col-md-12">Registe</button>
    </div>
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
              // Showing errors in data array
              $scope.errorUserName = data.errors.myEmail;
              $scope.errorPassword = data.errors.myPassword;
            } else {
            $scope.message = data.message;
            console.log("inserted Successfully");
            }
        });
    };
    $scope.doCancel = function(){
        $scope.user.myEmail='';
        $scope.user.myPassword ='';
        $scope.cancelsucceed = 'You had just cleared your input';
    }
 });
</script>