var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope, $http) {
	$scope.curPage = 1;
	$scope.curNum = 9;
	$scope.curType = 0;
	$scope.mostImportantPort = {};
	
	$scope.takeData = function(){
		console.log($scope.curType, $scope.curNum, $scope.curPage);
		let url = "http://localhost:8000/api/posts/show/"+$scope.curType+"/"+$scope.curNum+"/"+$scope.curPage;
		$http.get(url)
		.then(function(response) {
			$scope.posts = response.data;
			if($scope.posts.length==0 && $scope.curPage!=1) $scope.prevPage();
			if($scope.curPage==1) $scope.mostImportantPort = $scope.posts[0];
		});
	}

	$scope.prevPage = function(){
		console.log("PrevPage Called");
		if($scope.curPage>1) --$scope.curPage;
		$scope.takeData();
	}

	$scope.nextPage = function(){
		console.log("NextPage Called");
		++$scope.curPage;
		$scope.takeData();
	}

	$scope.takeData();
});
