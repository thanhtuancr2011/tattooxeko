contactApp.controller('ContactController', ['$scope', '$timeout', 'ContactService', function ($scope, $timeout, ContactService) {
	/* When js didn't  loaded then hide table products */
	$timeout(function(){
		$('.container-fluid').removeClass('hidden');
		$('#page-loading').css('display', 'none');
		$scope.contactItem = angular.copy(window.contactItem);
		var editor = CKEDITOR.replace('description');
	});

	// Event on change ck editor
	CKEDITOR.on("instanceCreated", function(event) {
	    event.editor.on("change", function () {
	    	$timeout(function(){
	    		if (event.editor.getData() != '') {
		        	$scope.contactItem.description = event.editor.getData();
		        } else {
		        	$scope.contactItem.description = '';
		        }
	    	});
	    });
	});

	/* When user click add or edit product */
	$scope.submit = function () {

		$('#page-loading').css('display', 'block');

		delete($scope.contactItem.id);

		ContactService.createAboutProvider($scope.contactItem).then(function (data){
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
