var app = angular.module('myApp', []);

app.controller('myCtrl', function($sce, $scope, $http) {
	$scope.curPage = 1;
	$scope.curNum = 4;
	$scope.curType = 1;
	
	$scope.videoTaker = function(postContent){
		regularExpress = /\[\[\[(\S*)\]\]\]/;
		replaceRegularExpress = /\[\[\[\S*\]\]\]/;
		while(regularExpress.exec(postContent)!=null){
			replacer = '<iframe style="height: 500px; width: 100%; object-fit: contain" src="'+regularExpress.exec(postContent)[1]+'"></iframe>';
			postContent = postContent.replace(replaceRegularExpress, replacer);
		}
		return postContent;
	}

	$scope.takeData = function(){
		console.log($scope.curType, $scope.curNum, $scope.curPage);
		let url = "http://178.128.211.111:8000/api/posts/show/"+$scope.curType+"/"+$scope.curNum+"/"+$scope.curPage;
		$http.get(url)
		.then(function(response) {
			$scope.posts = response.data;
			if($scope.posts.length==0) $scope.prevPage();
		});
	}

	$scope.postTaker = function(){
		console.log(/id=(\d*)/.exec(document.URL)[1]);
		console.log($scope.curType, $scope.curNum, $scope.curPage);
		let url = "http://178.128.211.111:8000/api/posts/show/content/"+/id=(\d*)/.exec(document.URL)[1];
		$http.get(url)
		.then(function(response) {
			$scope.content = response.data;
			$scope.content.post = $scope.videoTaker($scope.content.post);
		});
	}

	$scope.renderHtml = function(html_code)
	{
    	return $sce.trustAsHtml(html_code);
	};

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
	$scope.postTaker();
});
