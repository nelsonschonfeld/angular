<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html ng-app='mitienda'>
    <head>
        <meta charset="UTF-8">
        <title>Prueba de Angular</title>
        <script src="includes/angular/angular.min.js" ></script>
        <script src="includes/angular/angular-route.min.js" ></script>
    </head>
    <body >
        <p>incluimos el menu</p>
        <div ng-include src=" 'menu.php' ">

        </div>

        <div ng-show="true" >
            <h1>Curso Angular</h1>
            <p>{{ "Mi tienda con Angular"}}</p>
            <ul>
                <li>manzana {{ 4 | currency}} importada desde mi {{ 'casa' | uppercase    }}</li>

            </ul>
        </div>
        <div ng-show="true" ng-controller="controler1">
            <label>Ingrese una cantidad:</label>
            <input type="text" ng-model="cantidad">
            <button type="button" title="Calcular el precio total de la compra" ng-click="calcularPrecio()">Calcular Total</button>
            <p>
                <label>El total de la compra es: {{ resultado | currency}}</label>
            </p>
        </div>
        <ul ng-controller="controlerLista">
            <li  ng-repeat="nombre in nombreLista">{{ nombre}}</li>
        </ul>

        <ul ng-controller="controlerLista">
            <li  ng-repeat="personas in objetosLista">{{ personas.nombre}} - {{ personas.edad}}</li>
        </ul>

        <div ng-controller="controlerBusqueda">
            <h2> agenda </h2>
            <label> buscar:</label>
            <input type="search" ng-model="busqueda">
            <ul >
                <li  ng-repeat="busq in objetosBusqueda| filter: busqueda">{{ busq.nombre}} - {{ busq.telefono}}</li>
            </ul>
        </div>

        <div ng-controller="controlerEventos">
            <button type="button" ng-click="clickSimple()">Click</button>
            <button type="button" ng-dblclick="clickDoble()">Doble Click</button>
            <img src="includes/imagnes/Desert.jpg" ng-mouseleave="mouseDejaLaImagen()" ng-mouseenter="mouseEntraLaImagen()" >
            {{ evento}}
        </div>

        <div ng-controller="controlerEstilos">

            <p ng-style="estil">Este es un parrafo con CSS</p>

            <button type="button" ng-click="clickEstiloNuevo()">Estilo</button>
            <button type="button" ng-click="clickSinEstilo()">Sin Estilo</button>

        </div>

        <div ng-controller="controlerMostrar">
            <h1  ng-show="visible">Mostrar Angular</h1>
            <p  ng-show="visible">{{ "Mi texto mostradp con Angular"}}</p>
            <button type="button" ng-click="mostrar()">mostrar</button>
            <button type="button" ng-click="ocultar()">ocultar</button>
        </div>

        <div ng-controller="controlerCambiarImagen">
            <img src="includes/imagnes/Desert.jpg" ng-src="includes/imagnes/{{ imagenActual}}">
            <button type="button" ng-click="mostrarImagen('Desert.jpg')">imag 1</button>
            <button type="button" ng-click="mostrarImagen('Lighthouse.jpg')">imag 2</button>
        </div>

        <div ng-view>

        </div>
        <script>
            var miapp = angular.module('mitienda', ['ngRoute']);

            miapp.config(['$routeProvider', function($routeProvider) {
                    $routeProvider
                            .when('/uno', {
                                templateUrl: 'route1.html'
                            })
                            .when('/dos', {
                                templateUrl: 'route2.html'
                            })
                            .otherwise({
                                redirecTo: '/',
                                templateUrl: 'route3.html'
                            });
                }]);

            miapp.controller('controler1', ['$scope', function($scope) {
                    $scope.calcularPrecio = function() {
                        var precio = 4;
                        $scope.resultado = $scope.cantidad * precio;
                    }


                }]);
            miapp.controller('controlerLista', ['$scope', function($scope) {
                    $scope.nombreLista = ["ana", "mario", "luis"]; //lista comun

                    $scope.objetosLista = [//lista de objetos
                        {nombre: "pedro", edad: 29},
                        {nombre: "jose", edad: 33},
                        {nombre: "julia", edad: 32}
                    ];
                }]);

            miapp.controller('controlerBusqueda', ['$scope', function($scope) {

                    $scope.objetosBusqueda = [//lista de objetos
                        {nombre: "pedro", telefono: 5552263},
                        {nombre: "jose", telefono: 1245555},
                        {nombre: "julia", telefono: 855596},
                        {nombre: "maria", telefono: 8554881},
                        {nombre: "fede", telefono: 8552552},
                        {nombre: "josefina", telefono: 8552222},
                        {nombre: "julio", telefono: 851255}
                    ];
                }]);

            miapp.controller('controlerEventos', ['$scope', function($scope) {
                    $scope.clickSimple = function() {
                        $scope.evento = "Click";
                    };

                    $scope.clickDoble = function() {
                        $scope.evento = "Doble Click";
                    };

                    $scope.mouseDejaLaImagen = function() {
                        $scope.evento = "deja la imagen";
                    };

                    $scope.mouseEntraLaImagen = function() {
                        $scope.evento = "entra a la imagen";
                    };


                }]);

            miapp.controller('controlerEstilos', ['$scope', function($scope) {

                    $scope.clickEstiloNuevo = function() {
                        $scope.estil = {background: "blue", color: "red"};
                    };

                    $scope.clickSinEstilo = function() {
                        $scope.estil = "";
                    };

                }]);

            miapp.controller('controlerMostrar', ['$scope', function($scope) {
                    $scope.ocultar = function() {
                        $scope.visible = false;
                    };

                    $scope.mostrar = function() {
                        $scope.visible = true;
                    };


                }]);

            miapp.controller('controlerCambiarImagen', ['$scope', function($scope) {
                    $scope.mostrarImagen = function(imagen) {
                        $scope.imagenActual = imagen;
                    };
                }]);
        </script>
    </body>
</html>