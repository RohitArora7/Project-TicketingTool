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
	}).state('home.userinfo', {
		url: '/userinfo',
		templateUrl: "userinfo.php",
		controller: "Control"
	
	
	}).state('login', {
		url: '/login',
		templateUrl: "login.php",
		controller: "Control"
	})
	
	.state('admin', {
		url: '/admin',
		templateUrl: "admin.php",
		controller: "Control"
	}).state('admin.form', {
		url: '/form',
		templateUrl: "form.php",
		controller: "Control"
	}).state('admin.userinfo', {
		url: '/userinfo',
		templateUrl: "userinfo.php",
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
	}, {
		model: "Admin"
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
			"userid": $scope.userid,
			"name": $scope.team_rname,
			"subject": $scope.formData.subject,
			"body": $scope.formData.body,
			"team": $scope.team,
			"ticket_to": $scope.formData.ticket_to,
			"option": 'Ticket_insert'
		}).then(function (data) {
			if (data.data == true) {
				//alert("insert done")
				$scope.$parent.getInfo();
			}
		});
	};
	
	
	$scope.homee = function () {
		$state.go('login');
	}
	
	$scope.login = function (a) {
		//alert(a.model)
		//alert($scope.team_name)
		//alert($scope.team_pass)
		
		$http.post('databaseFiles/valid.php', {
			"name": $scope.team_name,
			"pass": $scope.team_pass,
			"team": a.model
			
		}).then(function (data) {
		if(data.data==true)
		{
			$localStorage.session = a.model;
			//$localStorage.session_name =$scope.team_name;
			$localStorage.session_userid =$scope.team_name;
			if($scope.team_name=='admin' || $scope.team_name=='ADMIN')
			{
				$state.go('admin');
			}
			else{
			$state.go('home');
			}
	    }
	    else
	    {   
         	alert('Wrong Username and Password ')}
		});
		
		
		//
		//$state.go('home');
	}
	$scope.one_m = 0;
	

	
	$scope.second_m = 0; //for my ticket
	$scope.getInfo = function () {
		//$scope.one_m.remove();
		$scope.one_m = 1;
		$scope.second_m = 0;
		$scope.a = $localStorage.session;//welcome It support
		$scope.team = $localStorage.session //for form to retain value
		$scope.team_name=$localStorage.session_userid//welcome ast555
		$scope.userid=$localStorage.session_userid // form user id 
		
		$http.post('databaseFiles/empDetails.php', {
			"name": $scope.a
		}).then(function (data) {
			$scope.details = data.data;
			//alert(JSON.stringify(data.data))
		});
	$scope.user_info();
	}
	
	$scope.user_info= function () {
		
		
		$http.post('databaseFiles/insertDetails.php', {
			"name": $localStorage.session_userid,
			"option": 'user_infoo'
		}).then(function (data) {
			//$scope.details = data.data;
			//alert(JSON.stringify(data.data))
			//alert(data.data[0].team_rname)
		$scope.team_rname=data.data[0].team_rname               // imp to retain in user form
		$scope.team_rphone=data.data[0].team_rphone
		$scope.team_remail=data.data[0].team_remail
		});
	}
	
	
	$scope.user_update= function () {
		
		//alert($scope.team_rname)
		//alert($scope.team_rphone)
		//alert($scope.team_remail)
		
		$http.post('databaseFiles/insertDetails.php', {
			"token_nameid": $localStorage.session_userid,
			"rname": $scope.team_rname,
			"rphone": $scope.team_rphone,
			"remail": $scope.team_remail,
			"option": 'user_update'
		}).then(function (data) {
			//alert("update done")
		});
		
	}
	//
	
	///////////////////////////my ticket 
	
	
	$scope.getInfo2 = function () { //alert("sr")
		$scope.one_m = 0;
		$scope.second_m = 1;
		//$state.go('login');
		$scope.ab = $localStorage.session_userid ;
		$http.post('databaseFiles/empDetails2.php', {
			"name": $scope.ab
		}).then(function (data) {
			$scope.details = data.data;
			//alert(JSON.stringify(data.data))
		});
	}
	
	
	///////////////////////////get user information 
	
	$scope.getInfo3 = function (a) { 
	//alert(a)
	//$scope.test=a;
	$scope.details2 = []; //hide when form call
		$scope.comment = '';
	
	$http.post('databaseFiles/empDetails3.php', {
			"name": a
		}).then(function (data) {
			$scope.details3 = data.data;
			//alert(JSON.stringify(data.data))
		});
	
	}
	
/////////////////////////////////////////////	admin all ticket
	
		
	
		
	$scope.getInfo4 = function () {
		//$scope.one_m.remove();
		$scope.one_m = 1;
		$scope.second_m = 0;
		$scope.a = $localStorage.session;//welcome It support
		$scope.team = $localStorage.session //for form to retain value
		$scope.team_name=$localStorage.session_userid//welcome ast555
		$scope.userid=$localStorage.session_userid // form user id 
		
		$http.post('databaseFiles/admin_all_tickets.php', {
			"name": $scope.a,
			"option": 'admin_all_tickets'
		}).then(function (data) {
			$scope.details = data.data;
			//alert(JSON.stringify(data.data))
			 //alert($scope.details[0].editing)
			 //$scope.show_subject[0]=$scope.details[0].editing;
		
			//alert($scope.show_subject[0]);
		});
	$scope.user_info();
	}
	
	
	
	
		
	///////////////////////////admin work  ticket 
	
	
	$scope.getInfo5 = function () { //alert("sr")
		$scope.one_m = 0;
		$scope.second_m = 1;
		//$state.go('login');
		$scope.ab = $localStorage.session_userid ;
		$http.post('databaseFiles/admin_work_tickets.php', {
			"name": $scope.ab
		}).then(function (data) {
			$scope.details = data.data;
			//alert(JSON.stringify(data.data))
		});
	}
	
	
	
		///////////////////////////admin Edit ticket 
	
		$scope.show_data3 =0;
	$scope.getInfo6 = function (a,b) { //alert("sr")
    
        $scope.show_data = 0;
		$scope.show_data2 = 0;
		$scope.show_data3 = 1;
	
	$scope.details2 = [a];
	
	}
	
	
	$scope.save_ticket = function (a,b) { 
	//alert(a);
	//alert(b);
	
				$http.post('databaseFiles/admin_all_tickets.php', {
			"id": a,
			"subject": b,
			"option": 'edit_ticket'
		}).then(function (data) {
			//alert('done');
			
		});
	
	
	}
	
	
	
	
	
	
///////////////////////////////////////////////////////////////////Form show	
	$scope.token_form = 0;
	$scope.formshow = function () {
		$scope.details2 = []; //hide when form call
		$scope.comment = '';
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
	///////////////////////////////////////////////////////////////////////////////read ticket 
	$scope.details2 = [];
	$scope.readshow = function (a,b) {
		if(b=='admin'){
		$state.go('admin');
		}
		else
		{
		$state.go('home');	
		}
	    $scope.show_data = 1;
		$scope.show_data2 = 0;		// this will help to remove form 
		$scope.show_data3 = 0;
		//alert(JSON.stringify(a))
		//alert()
		if (a.status == 'Transfer') {
			$scope.pay = a.status;
		} else {
			$scope.pay = ''; //to hide transfer dd
		}
		//transfer data to scope[]< imp
		$scope.details2 = [a];
		//drop down 1st
		$scope.payment = $scope.option_t[$scope.option_t.findIndex(x => x.model === a.status)];
		//$scope.t_token=	$scope.option_f[0]
		$scope.t_token = "";
		$scope.readshow2(a.id);
		//alert(JSON.stringify($scope.option_t[$scope.option_t.findIndex(x=>x.model === a.status)]))
		//alert(JSON.stringify($scope.option_f[0]))
	}
	$scope.comment = '';
	/////////////////////////////////////////////////////////////////////////////////read comment
	$scope.show_data = 0; //show ticket details
	$scope.readshow2 = function (a) {
	
		$http.post('databaseFiles/insertDetails.php', {
			"name": a,
			"option": 'Ticket_comment'
		}).then(function (data) {
			//alert(JSON.stringify(data.data))
			$scope.comment = data.data;
		});
	}
	
	///////////////////////////////////////////////////////////////////////////////read ticket _ my ticket 
	$scope.details2 = [];
	$scope.readshow3 = function (a,b) {
		
		if(b=='admin'){
		$state.go('admin');
		}
		else
		{
		$state.go('home');	
		}
		
        $scope.show_data2 = 1;        //remove and show full ticket
		$scope.show_data = 0;		// this will help to remove form 
		//alert(JSON.stringify(a))
		//alert()
		if (a.status == 'Transfer') {
			$scope.pay = a.status;
		} else {
			$scope.pay = ''; //to hide transfer dd
		}
		//transfer data to scope[]< imp
		$scope.details2 = [a];
		//drop down 1st
		$scope.payment = $scope.option_t[$scope.option_t.findIndex(x => x.model === a.status)];
		//$scope.t_token=	$scope.option_f[0]
		$scope.t_token = "";
		$scope.readshow4(a.id);
		//alert(JSON.stringify($scope.option_t[$scope.option_t.findIndex(x=>x.model === a.status)]))
		//alert(JSON.stringify($scope.option_f[0]))
	}
	$scope.comment = '';
	/////////////////////////////////////////////////////////////////////////////////read comment _ my ticket
	$scope.show_data2 = 0; //show ticket details
	$scope.readshow4 = function (a) {
		
		$http.post('databaseFiles/insertDetails.php', {
			"name": a,
			"option": 'Ticket_comment'
		}).then(function (data) {
			//alert(JSON.stringify(data.data))
			$scope.comment = data.data;
		});
	}
	
	
	/////////////////////////////////////////////////////////////////////////////////////////comment update 
	$scope.read_update = function (a, b, c, d, e ,token) {
		//var myElement = angular.element(document.querySelector("#tokenn")).val()
		//alert(token)
		//alert(JSON.stringify(d.model))
		//alert(JSON.stringify(d));
		//alert(a)
		//alert("kkkkkkkkkkkkkkkkkkkkkk")
		
		
		
		
		if (c.model == "Transfer") {
			//alert("transfer called");
			
			if(d=='')
		{
			//alert("Please Fill Transfer ")
			return
		}
		
		
		if(token=='mt')  //this is done to remove > from comment in transfer case means id ticket comes 
		{
			//alert("null boss")
			$scope.ee=d
		}else
		{
		 $scope.ee=d.model
		}
		
	
			
			$http.post('databaseFiles/insertDetails.php', {
				"name": c.model,                                   //Transfer                         
				"subject": a,                                          //id                           
				"option": 'Ticket_status_update_transfer',
				"body": b,
				"to": $scope.ee,                            //accounts
				"from": e ,				//it support
			    "token": token ,
			}).then(function (data) {
				if (data.data == true) {
					//alert("update done");
						if(token=='wt')       // work team active or my team active
					{
						$scope.getInfo(); //refresh tickets
					$scope.readshow2(a);   //refesh comments
					}else{
						$scope.getInfo2(); //refresh tickets
					$scope.readshow4(a);	
					}
					$scope.formDataa = "";
				}
			});
		} else {
			
			//alert("im am  non trafer")
			
				if(d=='' || d==null)          //this is done to remove> from comment
		{
			
			$scope.ee=' ';
			
		}
		
			
			
			$http.post('databaseFiles/insertDetails.php', {
				"name": c.model,
				"subject": a,
				"option": 'Ticket_status_update',
				"body": b,
				"from": e,
				"to": ''                                 // well this is non transfer so no need for coment to                  
			}).then(function (data) {
				if (data.data == true) {
					//alert("update done");
					
					if(token=='wt')       // work team active or my team active
					{
						$scope.getInfo(); //refresh tickets
					$scope.readshow2(a);   //refesh comments
					}else{
						$scope.getInfo2(); //refresh tickets
					$scope.readshow4(a);	
					}
					
					//$scope.getInfo(); //refresh tickets
					$scope.readshow2(a);
					$scope.formDataa = ""
				}
			});
		}
	}
	//no need 
	
	$scope.callme = function () {
		//alert('Read call');
		$scope.token2 = $scope.$parent.token;
	}
	$scope.pay = '';
	$scope.t_token = "";
	$scope.changeme = function (a) {       // pay token active when transfer call
		//alert(a);
		$scope.t_token = "" ;
		$scope.pay = a.model;
	}
	$scope.sel = $scope.option_t[0].model;
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