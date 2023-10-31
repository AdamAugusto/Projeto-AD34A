<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <?php 
        $acao = $_GET['acao'] ?? 'index';

        switch($acao){

            case 'login':
                require('controllers/loginPage.controller.php');
                break;

            case 'cadastro':
                require('controllers/cadastroPage.controller.php');
                break;

            case 'configurarConta':
                require('controllers/configurarConta.controller.php');
                break;

            case 'adicionarCartao':
                require('controllers/adicionarCartao.controller.php');
                break;

            case 'esqueciSenha':
                require('controllers/esqueciSenha.controller.php');   
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

            case 'adicionarEndereco':
                require('controllers/adicionarEndereco.controller.php');
                break;

            case 'cadastrar':
                require('controllers/cadastrarItemPage.controller.php');
                break;

            #Lógica de Login

            case 'logout':
                require('controllers/logout.controller.php');
                break;

            case 'fazerLogin':
                require('controllers/fazerLogin.controller.php');
                break;

            #Exclusão

            case 'excluirEndereco':
                require('controllers/excluirEndereco.controller.php');
                break;

            case 'excluirItem':
                require('controllers/excluirItem.controller.php');
                break;

            case 'removerItem':
                require('controllers/carrinho.controller.php');
                break;

            case 'excluirCarrinho':
                require('controllers/carrinho.controller.php');
                break;

            case 'excluirConta':
                require('controllers/excluirConta.controller.php');
                break;

            #Armazenar

            case 'cadastrarCartao':
                require('controllers/armazenarCartao.controller.php');
                break;

            case 'cadastrarItem':
                    require('controllers/armazenarItem.controller.php');
                    break;

            case 'realizarCadastro':
                    require('controllers/armazenarCadastro.controller.php');
                    break;

            case 'armazenarEndereco':
                require('controllers/armazenarEndereco.controller.php');
                break;

            case 'armazenarPedido':
                require('controllers/armazenarPedido.controller.php');
                break;

            #Edição de propriedades

            case 'editarStatusPedido':
                require('controllers/editarStatusPedido.controller.php');
                break;

            case 'editarEndereco':
                require('controllers/editarEndereco.controller.php');
                break;
    
            case 'editarCadastro':
                require('controllers/editarCadastro.controller.php');
                break;

            #tratamento de Erros

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

            case 'erro-usuarioJaExiste':
                require('controllers/cadastroPage.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert" style="max-height:30px; max-width:300px;">
                        Já Existe uma Conta com este e-mail!
                    </div>
                </div>
                <?php
                break;

            case 'erro-cadastroItem':
                require('controllers/cadastrarItemPage.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert" style="max-height:30px; max-width:300px;">
                        Preencha todos os campos!
                    </div>
                </div>
                <?php
                break;

            case 'erro-cadastro':
                require('controllers/cadastroPage.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert" style="max-height:30px; max-width:300px;">
                        Preencha todos os campos!
                    </div>
                </div>
                <?php
                break;

            case 'erro-cadastro-cartao':
                require('controllers/adicionarCartao.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        Preencha todos os campos!
                    </div>
                </div>
                <?php
                break;

            case 'erro-cadastro-endereco':
                require('controllers/adicionarEndereco.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        Preencha todos os campos!
                    </div>
                </div>
                <?php
                break;

            case 'erro-editar-cadastro':
                require('controllers/configurarConta.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        Preencha pelo menos um dos Campos
                    </div>
                </div>
                <?php
                break;

            case 'erro-finalizar-compra':
                require('controllers/carrinho.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        Adicione Pelo Menos um Item ao Carrinho
                    </div>
                </div>
                <?php
                break;

            case 'erro-finalizar-compra-quantidade':
                require('controllers/carrinho.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        O item <?=$_GET['produto']?> não tem a quantidade desejada em estoque
                    </div>
                </div>
                <?php
                break;


            case 'erro-cadastro-cartao-admin':
                require('controllers/adicionarCartao.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        Administradores Não podem Cadastrar um Cartão
                    </div>
                </div>
                <?php
                break;

            case 'erro-editar-cadastro-admin':
                require('controllers/configurarConta.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        Administradores Não podem Editar seus Dados
                    </div>
                </div>
                <?php
                break;

            case 'erro-cadastro-endereco-admin':
                require('controllers/adicionarEndereco.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                        Administradores Não podem Cadastrar um Endereço
                    </div>
                </div>
                <?php
                break;

            case 'erro-cadastroSenha':
                require('controllers/cadastroPage.controller.php');                
                ?>
                <div class="justify-content-center d-flex mt-3">
                    <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert" style="max-height:30px; max-width:300px;">
                        As senhas devem serem iguais!
                    </div>
                </div>
                <?php
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