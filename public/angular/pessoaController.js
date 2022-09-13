angular.controller('pessoas', function ($scope, $http) {

    // $scope.dados = [];
    //
    // function carregarPessoas(){
    //     var resposta = [];
    //     $http({
    //         method: "GET",
    //         url: baseUrl + "/admin/pessoa/gradeAjax",
    //         dataType: 'json'
    //     }).then(function mySuccess(response) {
    //         // console.log(response.data);
    //         $scope.dados.pessoas = response.data;
    //         resposta = response;
    //     }, function myError(response) {
    //         alert('Erro com requisicao');
    //     });
    //
    //     return $scope.dados.pessoas;
    // }
    //
    // $scope.adicionar = function(pessoa){
    //     console.log(pessoa);
    // }
    //
    // $scope.atualizar = function(pessoa){
    //
    //     $http({
    //         method: "POST",
    //         url: baseUrl + '/admin/pessoa/atualizarAjax',
    //         data: pessoa,
    //         headers: { 'Content-Type': 'application/json; charset=UTF-8'},
    //     }).then(function mySuccess(response) {
    //         delete $scope.dados.pessoas;
    //         carregarPessoas();
    //     }, function myError(response) {
    //         alert('Erro');
    //     });
    // }
    //
    // $scope.deletar = function(id){
    //
    //     $http({
    //         method: "POST",
    //         url: baseUrl + '/admin/pessoa/deletarAjax',
    //         data : { id : id },
    //         headers: { 'Content-Type': 'application/json; charset=UTF-8'},
    //     }).then(function mySuccess(response) {
    //         delete $scope.dados.pessoas;
    //         carregarPessoas();
    //     }, function myError(response) {
    //         alert('Erro');
    //     });
    //
    // }
    //
    // carregarPessoas();

});


