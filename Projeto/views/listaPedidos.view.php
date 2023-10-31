<div class="row ms-3">
    <div class="col mb-2" style="padding-left: 0;">
        <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
         Meus Pedidos
    </div>
</div>
<div class="row ms-3 me-3 d-flex flex-fill">
        <div class="col" style="background-color: lightgray;">
        <?php foreach($array as $array):?>
            <div class="accordion mt-2 mb-2">
                <div class="accordion-item">
                    <div class="accordion-header" style="background-color: lightgray;">
                        <div class="list-group" >
                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item" style="width: 350px;">
                                    <div class="fw-bold">Número do Pedido</div>
                                        <?=$array['pedido']->id?>
                                    
                                </li>
                                <li class="list-group-item" style="width: 350px;">
                                    <div class="ms-2 me-auto">
                                    <div class="fw-bold">Status</div>
                                        <?=$array['pedido']->status?>
                                    </div>
                                </li>
                                <li class="list-group-item" style="width: 350px;">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Data</div>
                                        <?=$array['pedido']->data?>
                                    </div>
                                </li>
                                <li class="list-group-item" style="width: 350px;">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Pagamento</div>
                                            Cartão
                                    </div>
                                </li>
                                <li class="list-group-item" style="width: 80px;">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                </li>
                            </ul>
                            
                            
                        </div>
                        

                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="padding: 0; background-color: lightgray;">
                            <ul class="list-group list-group-horizontal-sm">
                                <li class="list-group-item align-middle" style="width: 740px;">
                                    <div class="fw-bold">Endereço </div>
                                    <?=$array['endereco']->bairro?>
                                    <?=$array['endereco']->rua?>
                                    <?=$array['endereco']->numero?>,
                                    <?=$array['endereco']->cidade?>
                                    <?=$array['endereco']->estado?>
                                </li>
                                <li class="list-group-item" style="width: 740px;">
                                    <div class="ms-2 me-auto">
                                    <div class="fw-bold">Transportadora </div>
                                        <?=$array['pedido']->transportadora?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        <?php endforeach?>       
        </div>
</div>