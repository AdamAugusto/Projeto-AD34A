<div class="row ms-3">
    <div class="col mb-2" style="padding-left: 0;">
        <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
         Pedidos
    </div>
</div>
<div class="row ms-3 me-3 d-flex flex-fill">
        <div class="col" style="background-color: lightgray; padding:10px">
            <?php foreach($os_pedidos as $pedido):?>
                        <div class="list-group d-flex flex-sm-fill align-items-center " >
                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item align-middle" style="width: 350px;">
                                    <div class="fw-bold">Número do Pedido</div>
                                        <?=$pedido->id?>
                                    
                                </li>
                                <li class="list-group-item" style="width: 350px;">
                                    <div class="ms-2 me-auto">
                                    <div class="fw-bold">Status</div>
                                        <?=$pedido->status?>
                                    </div>
                                </li>
                                <li class="list-group-item" style="width: 350px;">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Data</div>
                                            <?=$pedido->data?>
                                    </div>
                                </li>
                                <li class="list-group-item" style="width: 350px;">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Pagamento</div>
                                            Cartão
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-center" style="width: 80px; ">
                                    <button onclick="window.location.href='index.php?acao=editarStatusPedido&id=<?=$pedido->id;?>'"
                                    type="submit" class="btn btn-outline d-flex flex-sm-fill justify-content-center" 
                                    style="background-color:white; border-color:orange; color:orange; width: 60px;">
                                        Editar Status
                                    </button>
                                </li>
                            </ul>
                        </div>
            <?php endforeach?>
        </div>
</div>