@include('inclusao/cabecalho')
@include('inclusao/barra_navegacao')


<!--Inicio de todos os quadros e filtros -->
<body ng-controller="animais">   

    <div class="page-content-wrapper">
        <div class="content ">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                <div class="gallery">
                    <div class="gallery-filters p-t-20 p-b-10">  
                        
                        <div class="row">

                            <div class="container">    

                                    <div class="col-md-2">
                                        <div class="form-group">                                   
                                            <select class="form-control" ng-model="animal.raca" name="raca" id="raca">
                                                <option value="" selected>Raça</option>
                                                <option value="@{{ raca }}" ng-repeat="raca in dados.filtro.raca"selected> @{{ raca }} </option>                                            
                                            </select>
                                        </div>  
                                    </div>              

                                    <div class="col-md-2">
                                        <div class="form-group">                                    
                                            <select class="form-control" ng-model="animal.idade" name="idade" id="idade">
                                                <option value="" selected>Idade</option>   
                                                <option value="@{{ idade }}" ng-repeat="idade in dados.filtro.idade"> @{{ idade }}  </option>                                                
                                            </select>
                                        </div>                                                                       
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">                                        
                                            <select class="form-control" ng-model="animal.cor" name="cor" id="cor">
                                                <option value="" selected> Cor </option>
                                                <option value="@{{ cor }}" ng-repeat="cor in dados.filtro.cor"> @{{ cor }} </option>                                                                                            
                                            </select>
                                        </div>                                                                        
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">                                    
                                            <select class="form-control" ng-model="animal.porte" name="porte" id="porte">
                                                <option value="" selected>Porte</option> 
                                                <option value=" @{{ porte }}" ng-repeat="porte in dados.filtro.porte"> @{{ porte }} </option>   
                                            </select>
                                        </div>                                                                        
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">                                        
                                            <select class="form-control" ng-model="animal.deficiencia" name="deficiencia" id="deficiencia">
                                                <option value="" selected>Deficiência</option>                                            
                                                <option value="S"selected>Sim</option>                                            
                                                <option value="N"selected>Não</option>                                            
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">                                        
                                            <select class="form-control col-md-12" ng-model="animal.vacinado" name="vacinado" id="vacinado">
                                                <option value="" selected>Vacinado</option>
                                                <option value="S">Sim</option>
                                                <option value="N">Não</option>
                                            </select>
                                        </div>         
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <button type="button" ng-click="atualizaLista(animal)" class="btn btn-block" style="background-color: red; color: white;">
                                            <span class="fas fa-search"></span>
                                            Pesquisar
                                        </button>
                                    </div>                                   
                                    
                                </form>
                            </div>                     
                            
                        </div>
                        <!-- Fim do Filtro -->
                </div>
            </div>
        </div>
    </div>

    <br/>

    <!-- Card animais-->
    <div class="card-group">
        <div class="container">
            
            <div class="card" ng-repeat="animal in dados.animais">
                <div class="col-md-3 col-sm-6" >
                    <div class="thumbnail">
                        <img src="{{ asset('storage/imagens')}}/@{{ animal.imagem }}" alt="Card image cap">
                        <div class="caption">

                            <h3> @{{ animal.nome }} </h3>                            

                            <button type="button" data-toggle="modal" data-target="" href="#abriranimal@{{animal.id}}" class="btn btn-info btn-block">
                                <span class="fas fa-info"></span>
                                Verificar Informações
                            </button>

                        </div>
                    </div>
                </div>

            </div>           
            
            <!-- Inicio da Página de Numeração -->
            {{-- <div class="container" align="center">
                <nav aria-label="Page navigation example" align="center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> --}}
            <!-- Fim da Página de Numeração -->
            
            <!-- Modal das Informação dos Animal -->
            <div class="modal fade" id="abriranimal@{{ animal.id }}" tabindex="-1" ng-repeat="animal in dados.animais" role="dialog" aria-labelledby="abriranimal@{{ animal.id }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title font-weight-bold" id="myModalLabel">@{{ animal.nome }}</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Informações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">Nome:</th>
                                        <td>@{{ animal.nome }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Idade:</th>
                                        <td>@{{ animal.idade }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Raça:</th>
                                        <td>@{{ animal.raca }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cor:</th>
                                        <td>@{{ animal.cor }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Porte:</th>
                                        <td>@{{ animal.porte }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Deficiência:</th>
                                        <td>@{{ animal.deficiencia == 'S'? 'Sim' : 'Não'}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sexo:</th>
                                        <td>@{{ animal.sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>                                    
                                    </tr>                                    
                                    <tr>
                                        <th scope="row">Patologia:</th>
                                        <td>@{{ animal.patologia == 'S'? 'Sim' : 'Não'}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Situação do Animal:</th>
                                        <td>@{{ animal.situacao }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Vacinado:</th>
                                        <td>@{{ animal.vacinado == 'S' ? 'Sim' : 'Não' }}</td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="far fa-times-circle" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
@include('inclusao/js')
<script type="text/javascript" src="{{ asset('angular/animalController.js') }}"></script>
<script type="text/javascript" src="{{ asset('jquery/animais.js') }}"></script>
