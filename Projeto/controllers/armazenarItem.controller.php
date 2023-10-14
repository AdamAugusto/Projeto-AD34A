<?php
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
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
            $query = $bd->prepare("INSERT INTO produto (nome, preco, quantidade, descricao, categoria) VALUES(:nome, :preco, :quantidade, :descricao, :categoria)");
            $query->bindParam(':nome', $nome);
            $query->bindParam(':preco', $preco);
            $query->bindParam(':quantidade', $quantidade);
            $query->bindParam(':descricao', $detalhe);
            $query->bindParam(':categoria', $categoria);
            $query->execute();

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

