angular.controller('adocoes', function($scope, $http) {
        //
        $scope.dados = [];
        $scope.dados.solicitacoes = [];
        $scope.dados.animais = [];

        var carregarSolicitacoes = function(){
            $http({

                method : "GET",
                url : baseUrl + "/admin/adocao/carregarSolicitacoesAjax ",

            }).then(function mySuccess(reponse){

                $scope.dados.solicitacoes = reponse.data;

            }), function myError(response){
                console.log("Erro");
            };
        };

        //Permite ao ADM aceitar a adoção
        $scope.aceitarSolicitacao = function(adocao){


            $http({
                method: 'POST',
                url: baseUrl + '/admin/adocao/aceitarSolicitacao',
                data: { id_adocao : adocao.ad_id },
                headers: { 'Content-Type': 'application/json; charset=UTF-8'},

             }).then(function mySuccess(response){

                delete $scope.dados.adocoes;
                carregarSolicitacoes();

            }), function myError(error){
                alert("Erro");
            };
        };

        //  ADM recusa a adoção via ajax
        $scope.recusarSolicitacao = function(adocao){

            $http({

                method: 'POST',
                url: baseUrl + '/admin/adocao/recusarSolicitacao',
                data: { id_adocao : adocao.ad_id },
                headers: { 'Content-Type': 'application/json; charset=UTF-8'},

            }).then(function mySuccess(response){

                delete $scope.dados.adocoes;
                carregarSolicitacoes();

            }), function myError(error){
                alert("Erro");
            };
        };

    $scope.solicitarAdocao = function(adocao){

        $http({

            method: 'POST',
            url: baseUrl + '/admin/adocao/recusarSolicitacao',
            data: { id_adocao : adocao.ad_id },
            headers: { 'Content-Type': 'application/json; charset=UTF-8'},

        }).then(function mySuccess(response){

            delete $scope.dados.adocoes;
            carregarSolicitacoes();

        }), function myError(error){
            alert("Erro");
        };
    };

    var carregarAnimais = function(){
        $http({

            method : "GET",
            url : baseUrl + "/admin/adocao/adocaoAnimaisAjax ",

        }).then(function mySuccess(reponse){

            // console.log(reponse.data);
            $scope.dados.animais = reponse.data;

        }), function myError(response){
            console.log("Erro");
        };
    };

    $scope.solicitarAdocao = function(animal){

        $http({

            method: 'POST',
            url: baseUrl + '/admin/adocao/adocaoAnimaisAjax',
            data: { id_animal : animal.id },
            headers: { 'Content-Type': 'application/json; charset=UTF-8'},

        }).then(function mySuccess(response){

            delete $scope.dados.animais;
            carregarAnimais();

        }), function myError(error){
            alert("Erro");
        };
    };






    carregarSolicitacoes();
    carregarAnimais();
});
