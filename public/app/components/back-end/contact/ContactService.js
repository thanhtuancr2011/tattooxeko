var contactApp = angular.module('ContactApp', []);
contactApp.factory('ContactResource',['$resource', function ($resource){
    return $resource('/api/contact/:method/:id', {'method':'@method','id':'@id'}, {
        add: {method: 'post'},
        save:{method: 'post'},
        update:{method: 'put'}
    });
}])
.service('ContactService', ['ContactResource', '$q', function (ContactResource, $q) {

    /* Function create new contact */
	this.createAboutProvider = function(data){

		var defer = $q.defer(); 
        var temp  = new ContactResource(data);
        /* Create contact successfull */
        temp.$save({}, function success(data) {
            /* Resolve result */
            defer.resolve(data);
        },
        /* If create contact is error */
        function error(reponse) {
            /* Resolve result */
        	defer.resolve(reponse.data);
        });

        return defer.promise;  
	};

}]);
