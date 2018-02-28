// Inisiasi
var app = angular.module('app',['ngMaterial','ngRoute','ngResource', 'ngMessages', 'ngAnimate', 'toastr', 'ui.router', 'satellizer','permission']);
app.config(function ($logProvider) {
	$logProvider.debugEnabled(false);
});

// Auth
app.config(function($authProvider) {
	$authProvider.httpInterceptor = function() { return true; };
	$authProvider.withCredentials = false;
	$authProvider.tokenRoot = null;
	$authProvider.baseUrl = '/';
	$authProvider.loginUrl = '/api/auth/login';
	$authProvider.signupUrl = '/auth/signup';
	$authProvider.unlinkUrl = '/auth/unlink/';
	$authProvider.tokenName = 'token';
	$authProvider.tokenPrefix = 'satellizer';
	$authProvider.tokenHeader = 'Authorization';
	$authProvider.tokenType = 'Bearer';
	$authProvider.storageType = 'localStorage';

});

// angular.module('MyApp', ['ngResource', 'ngMessages', 'ngAnimate', 'toastr', 'ui.router', 'satellizer'])
app.config(function($stateProvider, $urlRouterProvider, $authProvider, $routeProvider,$locationProvider) {

    /**
     * Helper auth functions
     */
    var skipIfLoggedIn = ['$q','$location','$auth', function($q, $location, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        $location.path('/dash');
        deferred.reject();
      } else {
        deferred.resolve();
      }
      return deferred.promise;
    }];

    var loginRequired = ['$q', '$location', '$auth', function($q, $location, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.resolve();
      } else {
        $location.path('/login');
      }
      return deferred.promise;
    }];

    /**
     * App routes
     */
    // $stateProvider
    //   .state('home', {
    //     url: '/',
    //     controller: 'HomeCtrl',
    //     templateUrl: 'partials/home.html'
    //   })
    //   .state('login', {
    //     url: '/login',
    //     templateUrl: 'partials/login.html',
    //     controller: 'LoginCtrl',
    //     resolve: {
    //       skipIfLoggedIn: skipIfLoggedIn
    //     }
    //   })
    //   .state('signup', {
    //     url: '/signup',
    //     templateUrl: 'partials/signup.html',
    //     controller: 'SignupCtrl',
    //     resolve: {
    //       skipIfLoggedIn: skipIfLoggedIn
    //     }
    //   })
    //   .state('logout', {
    //     url: '/logout',
    //     template: null,
    //     controller: 'LogoutCtrl'
    //   })
    //   .state('profile', {
    //     url: '/profile',
    //     templateUrl: 'partials/profile.html',
    //     controller: 'ProfileCtrl',
    //     resolve: {
    //       loginRequired: loginRequired
    //     }
    //   });
    // $urlRouterProvider.otherwise('/');


    $routeProvider
	.when('/', {
		templateUrl: 'pages/landing/index.html',
		controller: 'pemesanan'
	})
	.when('/login', {
		templateUrl: 'pages/landing/login.html',
		controller: 'pemesanan',
		resolve: {
          skipIfLoggedIn: skipIfLoggedIn
        }
	})
	.when('logout', {
        url: '/logout',
        template: null,
        controller: 'LogoutCtrl'
    })
	.when('/pesan', {
		templateUrl: 'pages/landing/pesan.html',
		controller: 'pemesanan'
	})
	.when('/kontak', {
		templateUrl: 'pages/landing/pesan.html',
		controller: 'pemesanan'
	})
	// .otherwise({ redirectTo: '/' });
	$locationProvider.html5Mode({
		enabled: true,
		// requireBase: false
	});
});


app.controller('LoginCtrl', function($scope, $auth, $location,toastr,appAuth,$localstorage) {
	var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
	};

	$scope.user = {
		email : '',
		password : ''
	}

    $scope.submit = function(){
    	$auth.login($.param($scope.user), config)
			.then(function(response) {
				// $location.path('/dash');
				// this.appAuth.isUserAuthorized = true;
				// this.appAuth.isAdminAuthorized = false;
				// console.log(appAuth);
				// console.log(response);
				$localstorage.set('role', response.data.role);
			})
			.catch(function(response) {
				alert('login error');
			});
    }
});

app.value('appAuth', {
    isUserAuthorized: false,
    isAdminAuthorized: false
});

app.run(function(PermRoleStore, $auth, appAuth, $window) {
    var checkSession = function (role) {
      return $auth.isAuthenticated(role);
    };

    PermRoleStore.defineManyRoles({
      'PELANGGAN' : function () { return checkSession('PELANGGAN'); },
      'ADMIN' : function () { return checkSession('ADMIN'); }
    });

    // Rerun authentication on page load
    if ($auth.isAuthenticated('PELANGGAN')) {
      appAuth.isUserAuthorized = true;
    } else if ($auth.isAuthenticated('ADMIN')) {
      appAuth.isAdminAuthorized = true;
    }
})

app.factory('$localstorage', ['$window', function($window) {
  return {
    set: function(key, value) {
      $window.localStorage[key] = value;
    },
    get: function(key, defaultValue) {
      return $window.localStorage[key] || defaultValue;
    },
    setObject: function(key, value) {
      $window.localStorage[key] = JSON.stringify(value);
    },
    getObject: function(key) {
      return JSON.parse($window.localStorage[key] || '{}');
    }
  }
}]);

// End Auth

// Route Angular
app.config(function ($routeProvider,$locationProvider) {
	// $routeProvider
	// .when('/', {
	// 	templateUrl: 'pages/landing/index.html',
	// 	controller: 'pemesanan'
	// })
	// .when('/login', {
	// 	templateUrl: 'pages/landing/login.html',
	// 	controller: 'pemesanan'
	// })
	// .when('/pesan', {
	// 	templateUrl: 'pages/landing/pesan.html',
	// 	controller: 'pemesanan'
	// })
	// .when('/kontak', {
	// 	templateUrl: 'pages/landing/pesan.html',
	// 	controller: 'pemesanan'
	// })
	// .when('/pelanggan', {
	// 	templateUrl: 'pages/pelanggan/pemesanan.html',
	// 	controller: 'pemesanan'
	// })
	// // .otherwise({ redirectTo: '/' });
	// $locationProvider.html5Mode({
	// 	enabled: true,
	// 	// requireBase: false
	// });
});

// Constroller

app.controller('pemesanan', function($scope, $http){
	$scope.message = {
		show: false,
		type: '',
		title: '',
		content: '',
	};
    $scope.pemesanan = {
      nama: '',
      umur: '',
      no_hp: '',
      kd_rute: '',
    };

    // Start Autocomplete
    $scope.throttle = 300;
    $scope.selectedItemChange = function(item) {
      $scope.result = JSON.stringify(item, null, 2);
      $scope.pemesanan.kd_rute = item.value;
    }

    $scope.searchTextChange = function(query) {
      $scope.items = $http
        .get('/api/rute/search/' + query, {
          params: {
            address: query
          }
        })
        .then(function (response) {
			return response.data.map(function (item) {
				return {
					display: item.kota_asal + " - " + item.kota_tujuan,
					value: item.kd_rute
					};
				}) || [];
        }, function () {
          return [
            {
              display: 'error',
              value: ''
            }
          ];
        });
    };

    $scope.submit = function(){
      var data_user = {
                nm_user: $scope.pemesanan.nm_user,
                email: $scope.pemesanan.email,
                no_hp: $scope.pemesanan.no_hp,
                password: $scope.pemesanan.password,
      };
      var data_rute = {
                kd_rute: $scope.pemesanan.kd_rute,
      };

      var data = {
          user : data_user,
          rute : data_rute
      };

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      };
      $http.post('/pesan/add', $.param(data), config ).then(
        function(response){
        	$scope.message = {
				show: true,
				type: 'success',
				title: 'Berhasil!',
				content: 'Pemesanan Tiket Online Anda Berhasil. <br>Untuk Selanjutnya Silahkan Melakukan Pembayaran dan Kemudian Melakukan Konfirmasi Pembayaran',
				button: true
			};
        }, 
        function(response){
        	$scope.message = {
				show: true,
				type: 'success',
				title: 'Gagal!',
				content: 'Pemesanan Tiket Gagal, Silahkan Ulangi Lagi dan Pastikan Semua Data Dimasukkan Dengan Benar',
			};
        }
      );
    }
    // End Autocomplete
  });

app.factory('pemesananPelanggan', function ($http) {
	getData = function(){
		$http.get('/pelanggan/pemesanan/all').then(
			function(response){
				return response;
			},
			function(response){
				console.log(response);
			}
			);
	}	
});
app.controller('pelanggan-pemesanan',function($scope, $http,pemesananPelanggan){
	$scope.pemesanan = pemesananPelanggan.getData();

	// $scope.pemesanan = [
	// 						{
	// 							kd_pemesanan: "Thomas",
	// 							nm_user: "thomasTheKing"
	// 						},
	// 						{
	// 							kd_pemesanan: "Linda",
	// 							nm_user: "lindatheQueen"
	// 						}
	// 					];
	$scope.test = function(){
		$http.get('/pelanggan/pemesanan/all').then(
			function(response){
				console.log(response);
			},
			function(response){
				console.log(response);
			}
			);
	}
});




// Controller Sub Navigation

app.controller('subNavigation', function($scope , $location, $auth){
	$scope.isAuthenticated = function() {
		return $auth.isAuthenticated();
	};	

	$scope.logout = function(){
		if($auth.logout()){
			$location.path('/login');
		}
	}
});
