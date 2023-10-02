<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <?php 
        $acao = $_GET['acao'] ?? 'index';

        switch($acao){
            case 'cadastrar':
                require('controllers/cadastrarItemPage.controller.php');
                break;
            
            case 'login':
                require('controllers/loginPage.controller.php');
                break;

            case 'cadastro':
                require('controllers/cadastroPage.controller.php');
                break;

            case 'erro-cadastro':
                require('controllers/cadastrarItemPage.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert" style="max-height:30px; max-width:300px;">
                        Preencha todos os campos!
                    </div>
                </div>
                <?php
                break;

            case 'cadastrarItem':
                require('controllers/armazenarItem.controller.php');
                break;

            case 'esqueciSenha':
                require('controllers/esqueciSenha.controller.php');   
                break;

            case 'logout':
                require('controllers/logout.controller.php');
                break;

            case 'loginErro':
                require('controllers/loginPage.controller.php');
                ?>
                    <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert" style="max-height:30px; max-width:300px;">
                        Login ou senha incorretos!
                    </div>
                </div>
                <?php 
                break;

            case 'fazerLogin':
                require('controllers/fazerLogin.controller.php');
                break;

            case 'comprar':
                require('controllers/comprarItem.controller.php');
                break;

            case 'carrinho':
                require('controllers/carrinho.controller.php');
                break;
                
            case 'minhaConta':
                require('controllers/minhaConta.controller.php');
                break;

            case 'listaPedidos':
                require('controllers/listaPedidos.controller.php');
                break;

            default:
                require('controllers/homePage.controller.php');
                break;
        }
    ?>
    
    


    


    
    <?php require('templates/footer.php')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>