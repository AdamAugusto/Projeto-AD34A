 <div class="row ms-3 me-3">
    <div class="col me-3 mb-3 mt-3">
        <div class="row" style="background-color: lightgray;">
            <div class="col">
                <img src="../projeto/imagens/discord.png" class="" alt="..."  height="70">
            </div>
            <div class="col mt-2">
                Bem-vindo, Usuario
            </div>
            <div class="col d-flex justify-content-end mt-3">
                <img onclick="window.location.href='index.php?acao=configurarConta'" src="../projeto/imagens/engrenagem.png" class="" alt="..."  height="40" width="40">
            </div>

        </div>
        
        

    </div>
    <div class="col  mb-3 mt-3" style="background-color: lightgray;">
       <div class="row">
            <div class="col mt-2">
                Crédito disponível
                <br>
                R$ 0,00
            </div>
            <div class="col mt-3 d-flex justify-content-end">
                <button type="submit" class="btn d-flex justify-content-center" style=" background-color:orange; width:200px;">Adicionar Crédito</button>
            </div>
            <?php if(sizeof($o_cartao)==0):?>
            <div class="col mt-3 d-flex justify-content-end">
                <button onclick="window.location.href='index.php?acao=adicionarCartao'" type="submit" class="btn d-flex justify-content-center" style=" background-color:orange; width:200px;">Adicionar Cartão</button>
            </div>
            <?php else: 
                    foreach($o_cartao as $o_cartao_item):
            ?>
       </div>
       <div class="row">
            <div class="col mt-2 mb-2">
                <div class="cardz1">
                    <div class="intern">
                        <img class="approximation" src="../projeto/imagens/aprox.png" alt="aproximation">
                        <div class="card-number">
                            <div class="number-vl"><?=$o_cartao_item->numero?></div>
                        </div>
                        <div class="card-holder">
                            <label> </label>
                            <div class="name-vl"><?=$o_cartao_item->titular?></div>
                        </div>
                        <div class="card-infos">
                            <div class="exp">
                                <label>VALIDADE</label>
                                <div class="expiration-vl"><?=$o_cartao_item->validade?></div>
                            </div>
                            <div class="cvv">
                                <label>CVV</label>
                                <div class="cvv-vl"><?=$o_cartao_item->codigo?></div>
                            </div>
                        </div>
                        <img class="chip" src="../projeto/imagens/chip.png" alt="chip">
                    </div>
                </div>
            </div>
            <?php
                    endforeach; 
                endif;
            ?>
       </div>
    </div>
</div>

<div class="row ms-3">
    <div class="col mb-2" style="padding-left: 0;">
        <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
         Resumo do seu último pedido
    </div>
</div>
<?php if(sizeof($o_pedido)==0):
    
else:
foreach($o_pedido as $o_pedido):
?>
<div class="row ms-3 me-3 d-flex flex-fill">
        <div class="col" style="background-color: lightgray;">
            <div class="list-group d-flex flex-sm-fill align-items-center mt-2 mb-2" >
                <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item align-middle" style="width: 370px;">
                        <div class="fw-bold">Número do Pedido</div>
                            <?=$o_pedido->id?>
                        
                    </li>
                    <li class="list-group-item" style="width: 370px;">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Status</div>
                            <?=$o_pedido->status?>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 370px;">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Data</div>
                                <?=$o_pedido->data?>
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 370px;">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Pagamento</div>
                                Cartão
                        </div>
                    </li>
                </ul>
                <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item align-middle" style="width: 740px;">
                    <div class="fw-bold">Endereço</div>
                        
                        <?=$o_endereco->bairro?>
                        <?=$o_endereco->rua?>
                        <?=$o_endereco->numero?>,
                        
                        <?=$o_endereco->cidade?>
                        <?=$o_endereco->estado?>
                    </li>
                    <li class="list-group-item" style="width: 740px;">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Transportadora </div>
                            <?=$o_pedido->transportadora?>
                        </div>
                    </li>
                </ul>
                <div class="container-fluid d-flex justify-content-end mt-2" style="padding:0;">
                    <button onclick="window.location.href='index.php?acao=listaPedidos'" type="submit" class="btn btn-outline d-flex  justify-content-center" style="background-color:white; border-color:orange; color:orange">Ver Todos os Pedidos</button>
                </div>
            </div>
        </div>
</div>
<?php 
endforeach;
endif;
?>
