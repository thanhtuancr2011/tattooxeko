var fileUpload = angular.module('shop');
fileUpload.directive("fileUpload", ['FileService', 'Upload', '$timeout',
    function(FileService, Upload, $timeout) {
        return {
            restrict: 'EA',
            require : '^ngModel',
            scope: {
                files:'=',
                fileIds:'=',
                openPicture:'&',
                disabled: '=',
                control: '=',
                filesUpload: '=',
                isSaved: '=',
                onSelect: '&',
                onEdit: '&',
                fileType: '=',
                multipleFile: '='
            },
            replace: true,
            transclude: true,
            templateUrl: baseUrl + '/app/shared/file-upload/views/file-upload.html?v=1',
            link: function(scope, element, attrs, ngModel) {
                scope.baseUrl = baseUrl;
                scope.fileUpload = {};
                scope.fileUploaded = [];
                scope.fileError = {};

                /**
                 * After save file then begin upload file
                 * @param  {Boolen} newVal  
                 * @param  {Boolen} oldVal
                 */
                scope.$watch('isSaved', function(newVal, oldVal) {
                    if (angular.isDefined(newVal)) {
                        scope.upload(scope.selectedFile);
                    } 
                })

                /**
                 * Load file when edit
                 */
                if (angular.isDefined(scope.filesUpload)) {

                    scope.selectedFile = [];

                    angular.forEach(scope.filesUpload, function(value, key) {

                        // Show file in view directive
                        value.type = scope.fileType;
                        value.progress = 100;
                        scope.fileUpload[value['uniId']] = value;

                        scope.selectedFile.push(value);

                        // Set to scope file
                        scope.fileUploaded.push(value);
                        ngModel.$setViewValue({files: scope.fileUploaded});

                        // Check user choose image
                        scope.onSelect({selected: true});

                    })
                }
               
                /**
                 * Choose file upload
                 *
                 * @author Thanh Tuan <tuan@httsolution.com>
                 * 
                 * @param  {File} files File
                 * 
                 * @return {Void}       
                 */
                scope.chooseFile = function(files) {

                    scope.selectedFile = [];

                    if (files && files.length) {

                        // Check user choose image
                        scope.onSelect({selected: true});

                        for (var i = 0; i < files.length; i++) {
                            (function(i){
                                var file = files[i];
                                if (angular.isDefined(window.maxUpload)) {
                                    if(file['size'] > window.maxUpload['size']){
                                        file['uniId'] = getId();
                                        file['proccess'] = 100;
                                        file['error'] = 1;
                                        file['status'] = 0;
                                        scope.fileUpload[file['uniId']] = file;
                                        scope.fileUpload[file['uniId']]['error'] = 'Max file size is ' + window.maxUpload['name'];
                                        scope.fileError[file['uniId']] =file;
                                        return;
                                    } 
                                }

                                file['uniId'] = getId();
                                file['proccess'] = 0;
                                file['error'] = '';
                                scope.fileUpload[file['uniId']] = file;

                                // Push to scope file selected 
                                scope.selectedFile.push(file);
                            })(i);
                        }
                    }
                }

                /**
                 * Upload file
                 *
                 * @author Thanh Tuan <thanhtuancr2011@gmail.com>
                 * 
                 * @param  {File} files File
                 * 
                 * @return {Void}       
                 */
                scope.upload = function (files) {
                    // When user edit but no choose file
                    if (angular.isUndefined(files)) {
                        scope.onEdit({edited: true});
                    }

                    var count = 0;

                    angular.forEach(files, function(file, key) {
                        Upload.upload({
                            url: baseUrl + window.linkUpload,
                            file: file
                        }).progress(function(evt) {
                            if(angular.isDefined(scope.fileUpload[file['uniId']])) {
                                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                            } else {
                                var progressPercentage =100;
                            }
                            if(angular.isDefined(scope.fileUpload[file['uniId']])) {
                                scope.fileUpload[file['uniId']]['proccess'] = progressPercentage;
                            }
                            
                        }).error(function(data, status, headers, config) {
                            files.splice(1, i);
                            if(angular.isDefined(scope.fileUpload[file['uniId']])) {
                            if (angular.isDefined(data.message)) {
                                scope.fileUpload[file['uniId']]['error'] = data.message;
                            }
                              scope.fileError[config.file['uniId']] = data;
                            }
                        }).success(function(data, status, headers, config) {
                            if(angular.isDefined(scope.fileUpload[config.file.uniId])){
                                if (angular.isDefined(data.item)) {
                                    data.item['uniId'] = config.file.uniId;
                                    scope.fileUploaded.push(data.item);
                                }
                            }
                        }).finally(function(){
                            count++;
                            if (count == files.length) {    
                                $timeout(function(){
                                    ngModel.$setViewValue({files: scope.fileUploaded});
                                })
                            }
                        });
                    });
                }

                ngModel.$render = function(){
                    $timeout(function(){
                        scope.filesUpload = ngModel.$viewValue; 
                    })   
                }

                /**
                  * [checkFile description]
                  * @param  {[type]} type [description]
                  * @return {[type]}      [description]
                  */
                scope.checkFile = function(type){
                    return FileService.checkFile(type);
                }

                /**
                 * Get id of file
                 * @return {Void} 
                 */
                function getId() {
                    return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
                }

                /**
                 * Delete file
                 * @param  {Double} uniId 
                 * @return {Void}       
                 */
                scope.deleteFile = function(uniId) {
                    delete scope.fileUpload[uniId];

                    // Delete fileUploaded
                    angular.forEach(scope.fileUploaded, function(value, key) {
                        if (uniId == value['uniId']) {
                            scope.fileUploaded.splice(key, 1);
                        }
                    });

                    // Delete file selected
                    angular.forEach(scope.selectedFile, function(value, key) {
                        if (uniId == value['uniId']) {
                            scope.selectedFile.splice(key, 1);
                        }
                    });

                    $timeout(function(){
                        ngModel.$setViewValue({files: scope.fileUploaded});
                        // Set validate file
                        if (scope.selectedFile.length == 0) {
                            scope.onSelect({selected: false});
                        }
                    });
                }
                
                scope.$on("emptyFiles", function (event, args) {
                    scope.fileUpload = {};
                    scope.fileUploaded = [];
                });
                
            }
        }
    }
]).filter('bytes', function() {
    return function(bytes, precision) {
        if (isNaN(parseFloat(bytes)) || !isFinite(bytes)) return '-';
        if (typeof precision === 'undefined') precision = 1;
        var units = ['bytes', 'kB', 'MB', 'GB', 'TB', 'PB'],
            number = Math.floor(Math.log(bytes) / Math.log(1024));
        return (bytes / Math.pow(1024, Math.floor(number))).toFixed(precision) + ' ' + units[number];
    }
});