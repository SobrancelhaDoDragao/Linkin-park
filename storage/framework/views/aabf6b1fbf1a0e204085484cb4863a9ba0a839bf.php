<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tião Carreiro e Pardinho</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    

    <style>
        #container-img{
            background:url("<?php echo e(asset('img/background.png')); ?>");
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
                   <li><img src="<?php echo e(asset('img/logo.png')); ?>"></li>
               </ul>

               <ul class="Discografia">
                   <li>Discografia</li>
               </ul>
           </nav>

           <main class="main">

                 <form action="" method="get" class="form">
                
                   <div class="campos">          
                        <input  id="pesquisa-input" type="text" placeholder="Digite uma palavra chave:" >
                   </div>
                  
                  
                   <div class="submit">
                        <button type='submit'>Procurar</button>
                   </div>
                                    
                 </form>

                 <section class="albums">

                    <!-- Modal do Album -->
                    <a href="#abrirModal">Criar album</a>

                        <div id="abrirModal" class="modal">

                            <div>
                                <a href="#fechar" title="Fechar" class="fechar">x</a>
                                <h2>Criar novo album</h2>
                                
                                <form action="CreateAlbum" method="post">
                                    <?php echo csrf_field(); ?>

                                    <label for="name">Nome do album:</label>
                                    <input type="text" name="name" id="name">

                                    <label for="DataLancamento">Data de lançamento:</label>
                                    <input type="number" name="DataLancamento" id="DataLancamento">

                                    <button type="submit">Salvar album</button>
                                </form>
                            
                            </div>
                       
                        </div>
                   

                    

                      <div class="album">
                          
                            <?php $__empty_1 = true; $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <table>

                                <caption>Álbum: <?php echo e($album->name); ?>, <?php echo e($album->DataLancamento); ?></caption>

                                    <tr>
                                        <th class="menorcampo">Nº</th><th>Faixa</th><th class="centralizar_td" >Duração</th>
                                    </tr>

                                    <?php $__empty_2 = true; $__currentLoopData = $album->faixa()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faixa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <tr>
                                            <td class="menorcampo"><?php echo e($faixa->numero); ?></td><td ><?php echo e($faixa->name); ?></td> <td  width="15vw" class="centralizar_td" ><?php echo e($faixa->duracao); ?></td> <td width="4%" class="centralizar_td">  <form action="DeleteFaixa/<?php echo e($faixa->id); ?>" method="post"><?php echo csrf_field(); ?><input type="hidden" name="id" value="<?php echo e($faixa->id); ?>" ><button type="submit"><img src="<?php echo e(asset('trash-regular-24.png')); ?>"></button>  </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

                            
                                    <tr>
                                            <td class="menorcampo"></td><td>Album vazio</td> <td  width="15vw" class="centralizar_td" ></td> <td width="4%" class="centralizar_td"></td>
                                    </tr>
                               
                                    <?php endif; ?>

                                    <tr>
                                        <td colspan="2">
                                            
                                            <form action="DeleteAlbum/<?php echo e($album->id); ?>" method="post">

                                            <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($album->id); ?>" >
                                                <button class="BottonExcluir"  type="submit">Excluir Album</button>  
                                            </form>

                                        </td>
                                     
                                        <td colspan="2"class="centralizar_td">
                                            
                                            <!-- Modal do faixa --> 
                                            <a href="#abrirModalFaixa<?php echo e($album->id); ?>" class="BottonAdicionarfaixa" id="FaixaButton" >Nova Faixa</a> 
                                         
                                            <div id="abrirModalFaixa<?php echo e($album->id); ?>" class="modal"> 
                                            
                                                <div> 
                                                    <a href="#fechar" title="Fechar" class="fechar">x</a> 

                                                    <h2>Adicionar nova faixa ao album</h2> 

                                                     <form action="CreateFaixa" method="post">
                                                        <?php echo csrf_field(); ?>

                                                        <label for="name">Nome:</label>
                                                        <input type="text" name="name" id="name">

                                                        <label for="numero">Nº</label>
                                                        <input type="number" name="numero" id="numero">

                                                        <label for="duracao">Duração</label>
                                                        <input type="text" name="duracao" id="duracao">

                                                        <input value="<?php echo e($album->id); ?>" type="hidden" name="album_id" id="album_id">

                                                        <button type="submit">Salvar faixa</button>
                                                     </form>
                                                </div> 

                                            </div>


                                        </td>
   
                                    </tr>
                                
                                    
                                    
                                </table>

                            
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h1 class="AvisoVazio">Não há nenhum album, por favor crie um.</h1>
                                <?php endif; ?>
                         </div>
                   
                 </section>
           </main>

               
               
        </div>

      </div>

        </div>

                        

    </div>
    
    
    
 
</form>
   


</body>
</html><?php /**PATH /opt/lampp/htdocs/Teste-Supliu/Tiao-Carreiro-e-Pardinho/resources/views/home.blade.php ENDPATH**/ ?>