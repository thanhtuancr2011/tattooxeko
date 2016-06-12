var aboutApp = angular.module('AboutApp', []);
aboutApp.factory('AboutResource',['$resource', function ($resource){
    return $resource('/api/about/:method/:id', {'method':'@method','id':'@id'}, {
        add: {method: 'post'},
        save:{method: 'post'},
        update:{method: 'put'}
    });
}])
.service('AboutService', ['AboutResource', '$q', function (AboutResource, $q) {

    /* Function create new about */
	this.createAboutProvider = function(data){

		var defer = $q.defer(); 
        var temp  = new AboutResource(data);
        /* Create about successfull */
        temp.$save({}, function success(data) {
            /* Resolve result */
            defer.resolve(data);
        },
        /* If create about is error */
        function error(reponse) {
            /* Resolve result */
        	defer.resolve(reponse.data);
        });

        return defer.promise;  
	};

}]);
