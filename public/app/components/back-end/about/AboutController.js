aboutApp.controller('AboutController', ['$scope', '$timeout', 'AboutService', function ($scope, $timeout, AboutService) {
	/* When js didn't  loaded then hide table products */
	$timeout(function(){
		$('.container-fluid').removeClass('hidden');
		$('#page-loading').css('display', 'none');
		$scope.aboutItem = angular.copy(window.aboutItem);
		var editor = CKEDITOR.replace('description');
	});

	// Event on change ck editor
	CKEDITOR.on("instanceCreated", function(event) {
	    event.editor.on("change", function () {
	    	$timeout(function(){
	    		if (event.editor.getData() != '') {
		        	$scope.aboutItem.description = event.editor.getData();
		        } else {
		        	$scope.aboutItem.description = '';
		        }
	    	});
	    });
	});

	/* When user click add or edit product */
	$scope.submit = function () {

		$('#page-loading').css('display', 'block');

		delete($scope.aboutItem.id);

		AboutService.createAboutProvider($scope.aboutItem).then(function (data){
			// If success
			if(data.status != 0){
				$scope.messageSuccess = 'Chỉnh sửa nội dung thành công.';
				$('#page-loading').css('display', 'none');
			} 
		});
	};

	/* When user click cancel then close modal popup */
	$scope.cancel = function () {
		window.location.href = window.baseUrl + '/admin/about/create';
	};

}])
