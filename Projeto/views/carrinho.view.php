<div class="row">

    <div class="col">
        <div style="width:1110px; background-color:lightgrey;">
            <form class="row g-3 ms-3 mt-3 align-items-start" >
                <div>cep</div>
                <div class="form-floating mb-2 col-auto" style="padding-left: 0;">
                    <input name="senha" type="text" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword" class="form-label ms-1">Insira o CEP</label>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn " style="min-height:60px; min-width:60px; background-color:orange;">OK</button>
                </div>
            </form>
        </div>

        <div class=" mt-3" style=" background-color:lightgrey; width:1110px;">
            <div class="d-flex justify-content-between mt-3 ms-3 me-3 mb-3 pt-1">
                    <b>Carrinho</b>
                    <div class=" ">
                        <button type="submit" 
                                onclick="window.location.href='index.php?acao=excluirCarrinho'"
                                class="btn btn-outline  justify-content-center" 
                                style="background-color:white; border-color:red; color:red">
                        Excluir Carrinho
                        </button>
                    </div>
            </div>

        
            <div class="list-group d-flex flex-sm-fill align-items-center" >
                <?php 
                    $totalTotal=0;
                    $totalItens=0;
                    foreach($osProdutos as $oProduto):
                        $total=$oProduto['preco']*$oProduto['quantidade'];
                        $totalTotal+=$total;
                        $totalItens+=$oProduto['quantidade'];
                ?>
                <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item d-flex justify-content-center align-middle" style="width: 90px">
                        <?=$oProduto['nome']?>
                    </li>
                    <li class="d-flex list-group-item " style="width: 575px">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Preço</div>
                                R$ <?=number_format($oProduto['preco'],2,',',"")?>
                        </div>
                    </li>
                    <li class="list-group-item align-middle" style="width: 130px">
                        <div class="mt-3">
                            <div class="d-flex justify-content-center"><?=$oProduto['quantidade']?></div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline  justify-content-center" 
                                        onclick="window.location.href='index.php?acao=removerItem&id=<?=$oProduto['id']?>'"
                                        style="background-color:white; border-color:red; color:red">
                                    remover
                                </button>
                        </div>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 280px">
                        <div class="ms-2 me-auto">
                            <div class="">preço total a vista no pix <br>R$ <?=number_format($total*0.9,2,',',"")?></div>
                                preço total <br>R$ <?=number_format($total,2,',',"")?>
                        </div>
                    </li>
                </ul>
                <?php endforeach?>
                <ul class="list-group list-group-horizontal-sm mb-3">
                    <li class="list-group-item align-middle " style="width: 90px">
                    Final
                    </li>
                    <li class="list-group-item d-flex justify-content-between" style="width: 705px">
                        <div class="ms-2 me-auto">
                            total de itens: <?=$totalItens?>
                        </div>
                        <div>
                            Frete: R$ 00,00
                        </div>
                    </li>

                    <li class="list-group-item" style="width: 280px">
                        <div class="ms-2 me-auto">
                        valor total: R$ <?=number_format($totalTotal,2,',',"")?>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>

        <div class="d-flex justify-content-center col  mt-3 sticky-top" style=" background-color:lightgrey; padding:0px; height:450px; top:15px;">
     
            <ul class="list-group list-group-flush mt-3" style="width: 320px;" >
                <li class="list-group-item align-items-start" style=" background-color:lightgrey!important">Resumo</li>
                <li class="list-group-item mt-2 d-flex justify-content-between" style=" background-color:lightgrey!important"><a>Valor dos produtos:</a> R$ <?=number_format($totalTotal,2,',',"")?></li>
                <li class="list-group-item d-flex justify-content-between" style=" background-color:lightgrey!important"><a>Frete:</a> R$ 00,00</li>
                <li class="list-group-item d-flex justify-content-between" style=" background-color:lightgrey!important"><a>Total a prazo:</a> R$ <?=number_format($totalTotal,2,',',"")?></li>
                <li class="list-group-item d-flex justify-content-center" style=" background-color:lightgrey!important">(tantas vezes sem juros)</li>
                <li class="list-group-item d-flex justify-content-center mt-3" style=" background-color:lightgreen!important; padding:0px;">
                    <ul style="padding:0px">
                        <li class=" d-flex justify-content-center">valor a vista no pix:</li>
                        <li class=" d-flex justify-content-center">R$ <?=number_format($totalTotal*0.9,2,',',"")?></li>
                        <li class=" d-flex justify-content-center">Economize R$ <?=number_format($totalTotal*0.1,2,',',"")?></li>
                    </ul>
                </li>
                <li class="d-flex justify-content-center mt-3">
                    <div class=" d-flex flex-sm-fill">
                        <button type="button" 
                                class="btn d-flex flex-sm-fill justify-content-center" 
                                style=" background-color:orange;"
                                onclick="window.location.href='index.php?acao=armazenarPedido'">Finalizar Compra</button>
                    </div>
                </li>
                <li class="d-flex justify-content-center mt-3">
                    <div class=" d-flex flex-sm-fill">
                        <button type="button" 
                                class="btn btn-outline d-flex flex-sm-fill justify-content-center"
                                style="background-color:white; border-color:orange; color:orange"
                                onclick="window.location.href='index.php?acao=home'">Continuar Comprando</button>
                    </div>
                </li>
            </ul>
            
        </div>

</div>