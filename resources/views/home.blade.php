<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkin park</title>
    <link rel="stylesheet" href="{{URL::asset('css/app.css') }}">
    

    <style>
        #container-img{
            background:url("{{ asset('img/linkin-park.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100vw;
            background-position: center;
            position: relative;
        }
     
    </style>
</head>
<body>
    
    <div id="container-img">

        <div id="container">
           <nav>
               <ul class="logo">
                   <li><img src="{{ asset('img/logo.png') }}"></li>
               </ul>

               <ul class="Discografia">
                   <li>Discografia</li>
               </ul>
           </nav>

           <main class="main">

                 <form action="{{route('pesquisa')}}" method="post" class="form">
                   @csrf
                   <div class="campos">          
                        <input  name="pesquisa" id="pesquisa" type="text" placeholder="Pesquisar por album" >
                   </div>
                  
                  
                   <div class="submit">
                        <button type='submit'>Procurar</button>
                   </div>
                                    
                 </form>

                 <section class="albums">

                    <!-- Modal do Album -->
                    <a href="#abrirModal" class="Criar_album">Criar album</a>

                        <div id="abrirModal" class="modal">

                            <div>
                                <a href="#fechar" title="Fechar" class="fechar">x</a>
                                <h2>Criar novo album</h2>
                                
                                <form action="CreateAlbum" method="post">
                                    @csrf
                                    <p>
                                        <label for="name">Nome do album:</label>
                                        <input type="text" name="name" id="name">
                                    </p>
                                 

                                    <p>
                                        <label for="DataLancamento">Data de lançamento:</label>
                                        <input type="number" name="DataLancamento" id="DataLancamento">
                                    </p>

                                   

                                    <button type="submit">Salvar album</button>
                                </form>
                            
                            </div>
                       
                        </div>
                   

                    

                      <div class="album">
                          
                            @forelse($albums as $album)
                                <table>

                                <caption>Álbum: {{$album->name}}, {{$album->DataLancamento}}</caption>

                                    <tr>
                                        <th class="menorcampo">Nº</th><th>Faixa</th><th class="centralizar_td" >Duração</th>
                                    </tr>

                                    @forelse($album->faixa()->get() as $faixa)
                                        <tr>
                                            <td class="menorcampo">{{$faixa->numero}}</td><td >{{$faixa->name}}</td> <td  width="15vw" class="centralizar_td" >{{$faixa->duracao}}</td> <td width="4%" class="centralizar_td">  <form action="DeleteFaixa/{{$faixa->id}}" method="post">@csrf<input type="hidden" name="id" value="{{$faixa->id}}" ><button class="icone-trash" type="submit"><img src="{{ asset('trash-regular-24.png') }}"></button>  </td>
                                        </tr>
                                    @empty

                            
                                    <tr>
                                            <td class="menorcampo"></td><td>Album vazio</td> <td  width="15vw" class="centralizar_td" ></td> <td width="4%" class="centralizar_td"></td>
                                    </tr>
                               
                                    @endforelse

                                    <tr>
                                        <td colspan="2">
                                            
                                            <form action="DeleteAlbum/{{$album->id}}" method="post">

                                            @csrf
                                                <input type="hidden" name="id" value="{{$album->id}}" >
                                                <button class="BottonExcluir"  type="submit">Excluir Album</button>  
                                            </form>

                                        </td>
                                     
                                        <td colspan="2"class="centralizar_td">
                                            
                                            <!-- Modal do faixa --> 
                                            <a href="#abrirModalFaixa{{$album->id}}" class="BottonAdicionarfaixa" id="FaixaButton" >Nova Faixa</a> 
                                         
                                            <div id="abrirModalFaixa{{$album->id}}" class="modal"> 
                                            
                                                <div> 
                                                    <a href="#fechar" title="Fechar" class="fechar">x</a> 

                                                    <h2>Adicionar nova faixa ao album</h2> 

                                                     <form action="CreateFaixa" method="post">
                                                        @csrf
                                                        
                                                        <p>
                                                            <label for="name">Nome:</label>
                                                            <input type="text" name="name" id="name" required>
                                                        </p>
                                                       
                                                        <p>
                                                            <label for="numero">Nº:</label>
                                                            <input type="number" name="numero" id="numero" required>
                                                        </p>
                                                        
                                                        <p>
                                                            <label for="duracao">Duração:</label>
                                                            <input type="text" name="duracao" id="duracao" required>
                                                        </p>

                                                        <input value="{{$album->id}}" type="hidden" name="album_id" id="album_id">

                                                        <button type="submit">Salvar faixa</button>
                                                     </form>
                                                </div> 

                                            </div>


                                        </td>
   
                                    </tr>
                                
                                    
                                    
                                </table>

                            
                                @empty
                                <h1 class="AvisoVazio">Nenhum album encontrado</h1>
                                @endforelse
                         </div>
                   
                 </section>
           </main>

               
               
        </div>

      </div>

        </div>

                        

    </div>
    
    
    
 
</form>
   


</body>
</html>