<?php 
    $nome = $_POST['nomeItem'] ?? '';
    $detalhe = $_POST['descricaoItem'] ?? '';
    $foto = $_POST['fotoItem'] ?? '';
    $categoria = $_POST['categoriaItem'] ?? '';

    if($nome == '' || $detalhe == '' || $foto == '' || $categoria == ''){
            /*?><script>console.log("<?=$nome?>");</script>
            <?php*/
            header('Location: index.php?acao=erro-cadastro');
    }else{ 
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

