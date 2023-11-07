<?php
    require('models/produto.model.php');
    $nome = $_POST['nomeItem'] ?? '';
    $detalhe = $_POST['descricaoItem'] ?? '';
    $foto = $_POST['fotoItem'] ?? '';
    $categoria = $_POST['categoriaItem'] ?? '';
    $preco = $_POST['precoItem'] ?? '';
    $quantidade = $_POST['quantidadeItem'] ?? '';


    if($nome == '' || $detalhe == '' || $foto == '' || $categoria == '' || $quantidade == '' || $preco == ''){
            /*?><script>console.log("<?=$nome?>");</script>
            <?php*/
            header('Location: index.php?acao=erro-cadastroItem');
    }else{ 
            $teste = new Produto();
            $teste->armazenaProduto($nome, $preco, $quantidade, $detalhe, $categoria);
            require('templates/headerCadastroItemLogado.php');
            require('views/cadastroItem.view.php');
            ?>
            <div class="justify-content-center d-flex mt-3 ">
                <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert" style="max-height:auto; max-width:auto;">
                    O item: <?=$nome ?> foi cadastrado com sucesso!
                </div>
            </div>
            <?php 
    }

