var app = angular.module('app',['ngMaterial','ngRoute']).config(function ($logProvider) {$logProvider.debugEnabled(false);});

// Route Configs
app.config(function ($routeProvider,$locationProvider) {
	$routeProvider
	.when('/pelanggan/pemesanan', {
		templateUrl: 'pages/pelanggan/pemesanan.html',
		controller: 'pelanggan-pemesanan'
	})
	// .otherwise({ redirectTo: '/' });
	$locationProvider.html5Mode({
		enabled: true,
		// requireBase: false
	});
});