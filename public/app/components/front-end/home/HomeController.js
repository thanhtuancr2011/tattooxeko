homeApp.controller('HomeController', ['$scope', '$rootScope', '$uibModal', '$filter', 'CartService', '$sce', '$timeout', function ($scope, $rootScope, $uibModal, $filter, CartService, $sce, $timeout) {
	/* When js didn't  loaded then hide table categories */
	$('.content').removeClass('hidden');

	$timeout(function(){
		$('#page-loading').css('display', 'none');
		// $("#zoom_image").elevateZoom({ 
		// 	zoomType: "inner", 
		// 	cursor: "crosshair" 
		// });
	})

	$scope.listProductMapCategoryId = angular.copy(window.listProductMapCategoryId);

	$scope.saleProducts = angular.copy(window.saleProducts);
	
	$scope.newProducts = angular.copy(window.newProducts);

	$scope.renderHtml = function(html_code) {
		var html = $sce.trustAsHtml(html_code);
	    return html;
	};

	$scope.viewImage = function(id){
		var template = '/view-image/' + id + '?' + new Date().getTime();
		var modalInstance = $uibModal.open({
		    templateUrl: window.baseUrl + template,
		    controller: 'ModalProductImage',
		    size: null,
		    resolve: {
		    }
		    
		});
	};
}])
.controller('ModalProductImage', ['$scope', '$rootScope', '$uibModalInstance', '$timeout', '$sce', function ($scope, $rootScope, $uibModalInstance, $timeout, $sce) {
		$timeout(function() {
			$('#page-loading').css('display', 'none');
			$scope.product = window.product;
		});

		/* When user click cancel then close modal popup */
		$scope.closeModal = function () {
		    $uibModalInstance.dismiss('cancel');
		};
	}
])
.filter("sanitize", ['$sce', function($sce) {
  	return function(htmlCode){
  	  	return $sce.trustAsHtml(htmlCode);
  	}
}]);