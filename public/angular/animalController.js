angular.controller('animais', function($scope, $http){

    $scope.dados = []; 
    $scope.dados.animais = [];  
    $scope.dados.filtro = [];        

    var carregarAnimais= function(){            
        $http({
            method: "GET",
            url: baseUrl + "/admin/animais/gradeAjax",
            dataType: 'json'
        }).then(function mySuccess(response) {                 
            response.data.forEach(function(animal){
                animal.dt_registro = new Date(animal.dt_registro);
                $scope.dados.animais.push(animal);
            });                                      
        }, function myError(response) {
            alert('Erro com requisicao');
        });    
        
        return $scope.dados.animais = [];
    }

    var buscarCategoria = function(){   
        
        let animais = {
            '1' : 'raca',
            '2' : 'idade', 
            '3' : 'cor',
            '4' : 'porte'
        };      
        
        $http({
            method: "POST",
            url: baseUrl + '/admin/animais/opcoesAjax',
            data: { info : animais },
            headers: { 'Content-Type': 'application/json; charset=UTF-8'},
        }).then(function mySuccess(response) {                              
            if(response.data.status == 'sucesso'){
                var dados = JSON.parse(response.data.dados);                                          
                $scope.dados.filtro.raca  = dados.raca;
                $scope.dados.filtro.idade = dados.idade;
                $scope.dados.filtro.cor   = dados.cor;
                $scope.dados.filtro.porte = dados.porte;                          
            }
        }, function myError(response) {
            alert('Erro');
        });              
    } 


    var listaFiltroAjax = function(obj){
        $http({
            method: "POST",
            url: baseUrl + '/admin/animais/listaFiltroAjax',
            data: { filtro : obj },
            headers: { 'Content-Type': 'application/json; charset=UTF-8'},
        }).then(function mySuccess(response) {                          
            if(response.data.status == 'sucesso'){
                var dados = JSON.parse(response.data.dados);                
                $scope.dados.animais = dados;
            }
        }, function myError(response) {
            alert('Erro');
        });   
    }
    
    $scope.adicionar = function(animal){
        console.log(animal);
    }

    $scope.atualizar = function(animal){             
        
        $http({
            method: "POST",
            url: baseUrl + '/admin/animais/atualizarAjax',
            data: animal,
            headers: { 'Content-Type': 'application/json; charset=UTF-8'},
        }).then(function mySuccess(response) {            
            delete $scope.dados.animais;            
            carregarAnimais();                      
        }, function myError(response) {
            alert('Erro');
        }); 
    }

    $scope.deletar = function(id){        
        $http({
            method: "POST",
            url: baseUrl + '/admin/animais/deletarAjax',
            data : { id : id },
            headers: { 'Content-Type': 'application/json; charset=UTF-8'},
        }).then(function mySuccess(response) {                        
            delete $scope.dados.animais;
            carregarAnimais();
        }, function myError(response) {
            alert('Erro');
        });
    }    
    
    $scope.atualizaLista = function(obj){
        if(obj === undefined){
            alert('Escolha as categorias!');
        }else{            
            delete $scope.dados.animais;  
            delete $scope.dados.filtro;  
            listaFiltroAjax(obj);                      
            buscarCategoria();
            return $scope.dados.filtro = [];
        }
    }   
    
    carregarAnimais();
    buscarCategoria();    

    

});
