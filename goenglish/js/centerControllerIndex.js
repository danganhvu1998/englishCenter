var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope, $http) {
	$scope.curPage = 1;
	$scope.curNum = 3;
	$scope.curType = 1;
	
	$scope.takeData = function(){
		console.log($scope.curType, $scope.curNum, $scope.curPage);
		let url = "http://178.128.211.111:8000/api/posts/show/"+$scope.curType+"/"+$scope.curNum+"/"+$scope.curPage;
		$http.get(url)
		.then(function(response) {
			$scope.posts = response.data;
			if($scope.posts.length==0) $scope.prevPage();
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
