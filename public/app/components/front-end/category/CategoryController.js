categoryApp.controller('CategoryController', ['$scope', '$rootScope', '$uibModal', '$filter', 'CartService', '$timeout', function ($scope, $rootScope, $uibModal, $filter, CartService, $timeout) {
	// Current page
	$scope.currentPage = 1;

	// Total product in page
	$scope.productsPerPage = 9;

	$timeout(function(){
		/* When js didn't  loaded then hide table categories */
		$('.content').removeClass('hidden');
		$('#page-loading').css('display', 'none');
		
		$(".image-zoom").elevateZoom({
		    zoomWindowFadeIn: 500,
		    zoomWindowFadeOut: 500,
		    lensFadeIn: 500,
		    lensFadeOut: 500,
		    zoomWindowPosition: 1, 
		    zoomWindowOffetx: 10
		});
	});

	$scope.productsTemp = angular.copy(window.products);

	$scope.showHideBtnNextOrPrev = function (currentPage) {
		// If current page > 1
		if (currentPage > 1) {
			$scope.backPage = true;
		} 

		// If curent page = total pages
		if (currentPage == $scope.totalPage) {
			$scope.nextPage = false;
		}
	}

	$scope.changePage = function(page)
	{	
		// Enable button click next
		$scope.nextPage = true;

		$scope.productsTemp = angular.copy(window.products);

		if (page == 1) {
			$scope.products = $scope.productsTemp.splice(page - 1, $scope.productsPerPage);
		} else {
			$scope.products = $scope.productsTemp.splice((page - 1) * $scope.productsPerPage, $scope.productsPerPage);
		}

		$scope.currentPage = page;	
		$scope.showHideBtnNextOrPrev($scope.currentPage);

		if ($scope.currentPage == 1) {
			$scope.backPage = false;
		}

		if ($scope.currentPage == $scope.totalPage) {
			$scope.nextPage = false;
		}
	}

	$scope.changePage(1);	

	$scope.category = window.category;

	$scope.addProductToCart = function (productId) {
		CartService.addProductToCart(productId).then(function(data) {
			$rootScope.$emit("CallToMethodShowCart", data);
		});
	}

	$scope.totalProducts = window.totalProducts;

	$scope.totalPage = Math.ceil($scope.totalProducts/$scope.productsPerPage);

	console.log($scope.totalPage, '$scope.totalPage');

	// Convert total pages to array
	$scope.getNumber = function(num) {
	    return new Array(num);   
	}

	// Disable button click prev
	$scope.backPage = false;

	// Enable button click next
	$scope.nextPage = true;

	
}]);