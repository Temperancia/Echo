var app = angular.module('Echo', [
    'ui.router',
    'ngCookies',
    'ngMaterial',
    'ngMdIcons',
    'ngMessages',
    'ngPassword'
]);
app.controller('MenuController',
function($scope, $http, $cookies, $state) {
    var originatorEv;

    $scope.openMenu = function($mdMenu, ev) {
        originatorEv = ev;
        $mdMenu.open(ev);
    };
    $scope.logout = function() {
        $http.get('/user/logout')
        .then(
            function() {
                $cookies.remove('session');
                $state.go('home');
            },
            function() {
                console.log('something wrong');
            }
        );
    }
});
app.controller('InscriptionController',
function($scope, $http, $cookies, $state, $document, $timeout, $mdDialog) {

    // tricks chelou pour empêcher chrome de troll
    $timeout(function () {
        var elem = angular.element($document[0].querySelector('input[type=password]:-webkit-autofill'));
        if (elem.length) {
            elem.parent().addClass('md-input-has-value');
        }
    }, 150);

    $scope.login = function() {
        $http.post('/user/login', {
            'user': $scope.user
        })
        .then(
            function(response){
                // on a pas trouvé ce noob d'utilisateur ou son mdp a fail
                if (response.data.error) {
                    $scope.unknown = true;
                } else {
                    $cookies.put('session', response.data.session);
                    $state.go('home');
                }
            },
            function() {
                console.log('something wrong');
            }
        );
    };
    // affichage de 2 dialogues , manque l'envoi de mail
    $scope.forgottenPassword = function(ev) {
        var confirm = $mdDialog.confirm()
            .title('Réinitialisation du mot de passe')
            .textContent('Alors on a oublié son mdp. On reset ?')
            .ariaLabel('passwordReset')
            .targetEvent(ev)
            .ok('... ok')
            .cancel('tg jme souviens c bon');
        $mdDialog.show(confirm).then(
            function(ev) {
                var alert = $mdDialog.alert()
                    .title('Confirmation de réinitialisation du mot de passe')
                    .textContent('On t\'a envoyé un email noob')
                    .ariaLabel('passwordResetConfirmation')
                    .targetEvent(ev)
                    .ok('cool');
                    $mdDialog.show(alert).then(function() {
                        // envoi d'un email ici hhh
                    });
            },
            function() {
                console.log('something wrong');
            }
        );
    };
    $scope.register = function() {
        if (!$scope.new_user.population) {
            $scope.errorPopulation = true;
        } else {
            $http.post('/user/create', $scope.new_user)
            .then(
                function(response) {
                    $cookies.put('session', response.data.session);
                    $state.go('home');
                },
                function() {
                    console.log('something wrong');
                }
            );
        }
    };
});
app.controller('HomeController', function($scope, $http, $cookies, $state) {

});
app.controller('StreamSearchController', function($scope) {
    $scope.areas = [
        { id: 1, name: '' },
        { id: 2, name: 'Paris' },
        { id: 3, name: 'Toulouse' }
    ];
    $scope.themes = [
        { id: 1, name: '' },
        { id: 2, name: 'Économie' },
        { id: 3, name: 'Politique' }
    ];
    $scope.schools = [
        { id: 1, name: '' },
        { id: 2, name: 'École St-germain' },
        { id: 3, name: 'École truc machin' }
    ];
    $scope.modes = [
        { id: 1, name: 'rechercher sur tous les posts' },
        { id: 2, name: 'rechercher dans les titres' }
    ];
    $scope.selectedOption = 1;
    $scope.dates = [
        { id: 1, name: "d'hier" },
        { id: 2, name: 'il y a une semaine' },
        { id: 3, name: 'il y a un mois' }
    ];
    $scope.sorts = [
        { id: 1, name: 'ascendant' },
        { id: 2, name: 'descendant' }
    ];
});
app.config(function($stateProvider, $urlRouterProvider) {
    //$urlRouterProvider.otherwise('/');
    $stateProvider
    .state('home', {
        url: '/',
        controller: function ($state, $cookies) {
            if ($cookies.get('session')) {
                $state.go('log');
            } else {
                $state.go('public');
            }
        }
    })
    .state('public', {
        views: {
            '': {
                templateUrl: '/partials/public.jade'
            }
        }
    })
    .state('log', {
        views: {
            '': {
                templateUrl: '/partials/home.jade'
            },
            'menu': {
                templateUrl: '/partials/templates/menu.jade'
            }
        }
    })
    .state('streams', {
        url: '/recherche-flux',
        views: {
            '': {
                templateUrl: '/partials/stream-search.jade'
            },
            'menu': {
                templateUrl: '/partials/templates/menu.jade'
            }
        }
    });
});
app.config(function($locationProvider) {
    $locationProvider.html5Mode(true);
});