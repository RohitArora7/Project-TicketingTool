var app = angular.module("myApp", ["ui.router", "angularUtils.directives.dirPagination", 'ngStorage']);
app.config(function ($stateProvider, $urlRouterProvider) {
	$urlRouterProvider.otherwise('/login');
	$stateProvider.state('home', {
		url: '/home',
		templateUrl: "view.php",
		controller: "Control"
	}).state('home.form', {
		url: '/form',
		templateUrl: "form.php",
		controller: "Control"
	}).state('login', {
		url: '/login',
		templateUrl: "login.php",
		controller: "Control"
	})
});
app.controller("Control", function ($scope, $http, $state, $localStorage, $stateParams) {
	$scope.msg = "I love London";
	$scope.option_f = [{
		model: "Finance"
	}, {
		model: "IT Support"
	}, {
		model: "Accounts"
	}];
	$scope.option_t = [{
		model: "work in process"
	}, {
		model: "New"
	}, {
		model: "Hold"
	}, {
		model: "Transfer"
	}, {
		model: "Closed"
	}];
	$scope.details = [];
	//$scope.formData="sds"
	$scope.createTodo = function () {
		// alert(angular.element(document.querySelector("#txtSample2")).val());
		//alert("insert start")
		//alert($scope.formData.name)
		$http.post('databaseFiles/insertDetails.php', {
			"name": $scope.formData.name,
			"subject": $scope.formData.subject,
			"body": $scope.formData.body,
			"team": $scope.team,
			"ticket_to": $scope.formData.ticket_to,
			"option": 'Ticket_insert'
		}).then(function (data) {
			if (data.data == true) {
				alert("insert done")
				$scope.$parent.getInfo();
			}
		});
	}
	$scope.login = function (a) {
		//alert(a.model)
		$localStorage.session = a.model
		$state.go('home');
	}
	$scope.one_m = 0;
	$scope.second_m = 0; //for my ticket
	$scope.getInfo = function () {
		//$scope.one_m.remove();
		$scope.one_m = 1
		$scope.second_m = 0;
		$scope.a = $localStorage.session
		$http.post('databaseFiles/empDetails.php', {
			"name": $scope.a
		}).then(function (data) {
			$scope.details = data.data;
			//alert(JSON.stringify(data.data))
		});
	}
	$scope.getInfo2 = function () { //alert("sr")
		$scope.one_m = 0;
		$scope.second_m = 1;
		//$state.go('login');
		$scope.a = $localStorage.session
		$http.post('databaseFiles/empDetails2.php', {
			"name": $scope.a
		}).then(function (data) {
			$scope.details = data.data;
			//alert(JSON.stringify(data.data))
		});
	}
	$scope.token_form = 0;
	$scope.formshow = function () {
		$scope.details2 = [] //hide when form call
		$scope.comment = ''
		$scope.team = $localStorage.session
		//$scope.formData.team='IT'
		//$scope.formdataaaa='ITi'
		//alert("we")
		//$scope.token_form=1;
		//$scope.show_data=0;
	}
	$scope.formhide = function () {
		//alert("hide")
		$scope.token_form = 0;
	}
	//full report
	$scope.details2 = []
	//$scope.t_token=	"";
	$scope.readshow = function (a) {
		$state.go('home');
		//alert(JSON.stringify(a))
		//alert()
		if (a.status == 'Transfer') {
			$scope.pay = a.status
		} else {
			$scope.pay = ''; //to hide transfer dd
		}
		//transfer data to scope[]< imp
		$scope.details2 = [a]
		//drop down 1st
		$scope.payment = $scope.option_t[$scope.option_t.findIndex(x => x.model === a.status)];
		//$scope.t_token=	$scope.option_f[0]
		$scope.t_token = ""
		$scope.readshow2(a.id);
		//alert(JSON.stringify($scope.option_t[$scope.option_t.findIndex(x=>x.model === a.status)]))
		//alert(JSON.stringify($scope.option_f[0]))
	}
	$scope.comment = ''
	//coment show
	$scope.show_data = 0; //show ticket details
	$scope.readshow2 = function (a) {
		$scope.show_data = 1;
		$http.post('databaseFiles/insertDetails.php', {
			"name": a,
			"option": 'Ticket_comment'
		}).then(function (data) {
			//alert(JSON.stringify(data.data))
			$scope.comment = data.data;
		});
	}
	//comment update 
	$scope.read_update = function (a, b, c, d, e) {
		//var myElement = angular.element(document.querySelector("#tokenn")).val()
		alert(c.model)
		alert(JSON.stringify(d.model))
		alert(JSON.stringify(e))
		//alert(a)
		//alert(c)
		if (c.model == "Transfer") {
			alert("transfer called");
			$http.post('databaseFiles/insertDetails.php', {
				"name": c.model,
				"subject": a,
				"option": 'Ticket_status_update_transfer',
				"body": b,
				"to": d.model,
				"from": e
			}).then(function (data) {
				if (data.data == true) {
					alert("update done")
					$scope.getInfo(); //refresh tickets
					$scope.readshow2(a);
					$scope.formDataa = ""
				}
			});
		} else {
			$http.post('databaseFiles/insertDetails.php', {
				"name": c.model,
				"subject": a,
				"option": 'Ticket_status_update',
				"body": b
			}).then(function (data) {
				if (data.data == true) {
					alert("update done")
					$scope.getInfo(); //refresh tickets
					$scope.readshow2(a);
					$scope.formDataa = ""
				}
			});
		}
	}
	$scope.callme = function () {
		alert('Read call')
		$scope.token2 = $scope.$parent.token;
	}
	$scope.pay = '';
	$scope.t_token = "";
	$scope.changeme = function (a) {
		alert("called")
		$scope.t_token = "" // to reset drop down //ng-show works not ng-if
		$scope.pay = a.model;
	}
	$scope.sel = $scope.option_t[0].model
	$scope.currentPage = 1;
	$scope.pageSize = 5;
	$scope.sort = function (keyname) {
		$scope.sortKey = keyname; //set the sortKey to the param passed
		$scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
});
app.filter('customSorter', function () {
	function CustomOrder(item) {
		switch (item) {
		case 'Hold':
			return 4;
		case 'New':
			return 1;
		case 'Transfer':
			return 2;
		case 'work in process':
			return 3;
		case 'Closed':
			return 5;
		}
	}
	return function (items, field) {
		var filtered = [];
		angular.forEach(items, function (item) {
			filtered.push(item);
		});
		filtered.sort(function (a, b) {
			return (CustomOrder(a.status) > CustomOrder(b.status) ? 1 : -1);
		});
		return filtered;
	};
});