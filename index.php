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
    </head>
    <body >


        <div ng-show="true">
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

        <script>
            var miapp = angular.module('mitienda', []);
            miapp.controller('controler1', ['$scope', function($scope) {
                    $scope.calcularPrecio=function (){
                        var precio = 4;
                        
                        $scope.resultado = $scope.cantidad * precio;
                    }
                    
                    
                }])
        </script>
    </body>
</html>