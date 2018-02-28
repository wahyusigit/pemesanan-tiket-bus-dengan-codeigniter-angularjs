angular.module('app', ['permission', 'permission.ui', 'ngResource', 'ngMessages', 'ngAnimate', 'toastr', 'ui.router', 'satellizer'])

  .value('appAuth', {
    isUserAuthorized: false,
    isAdminAuthorized: false
  })

  .run(function(PermRoleStore, $auth, appAuth) {
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

  .config(function($stateProvider, $urlRouterProvider, $authProvider) {

    /**
     * Helper auth functions
     */
    var skipIfLoggedIn = function($q, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.reject();
      } else {
        deferred.resolve();
      }
      return deferred.promise;
    };

    var loginRequired = function($q, $location, $auth) {
      var deferred = $q.defer();
      if ($auth.isAuthenticated()) {
        deferred.resolve();
      } else {
        $location.path('/login');
      }
      return deferred.promise;
    };

    /**
     * App routes
     */
    $stateProvider
      .state('home', {
        url: '/',
        controller: 'HomeCtrl',
        templateUrl: 'partials/home.html'
      })
      .state('login', {
        url: '/login',
        templateUrl: 'partials/login.html',
        controller: 'LoginCtrl',
        resolve: {
          skipIfLoggedIn: skipIfLoggedIn
        }
      })
      .state('signup', {
        url: '/signup',
        templateUrl: 'partials/signup.html',
        controller: 'SignupCtrl',
        resolve: {
          skipIfLoggedIn: skipIfLoggedIn
        }
      })
      .state('logout', {
        url: '/logout',
        template: null,
        controller: 'LogoutCtrl'
      });

      // User authorized states
      $stateProvider.state('profile', {
        url: '/profile',
        templateUrl: 'partials/profile.html',
        controller: 'ProfileCtrl',
        data: {
          permissions: {
            only: ['PELANGGAN'],
            redirectTo: function() {
              return {
                state: 'signup',
                options: {
                  reload: true
                }
              };
            }
          }
        }
      });

      // Admin authorized state
      $stateProvider.state('admin', {
        url: '/admin',
        templateUrl: 'partials/admin.html',
        controller: 'Admin',
        data: {
          permissions: {
            only: ['ADMIN'],
            redirectTo: function() {
              return {
                state: 'signup',
                options: {
                  reload: true
                }
              };
            }
          }
        }
      });

    $urlRouterProvider.otherwise('/');
  });