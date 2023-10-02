 <div class="row ms-3 me-3">
    <div class="col me-3 mb-3 mt-3" style="background-color: lightgray;">
        <div class="row">
            <div class="col">
                <img src="../imagens/discord.png" class="" alt="..."  height="70">
            </div>
            <div class="col mt-2">
                Bem-vindo, Usuario
            </div>
            <div class="col d-flex justify-content-end mt-3">
                <img src="../imagens/engrenagem.png" class="" alt="..."  height="40" width="40">
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
       </div>
    </div>
</div>

<div class="row ms-3">
    <div class="col mb-2" style="padding-left: 0;">
        <img src="../imagens/carrinho.png" class="" alt="..."  height="30" width="30">
         Resumo do seu último pedido
    </div>
</div>
<div class="row ms-3 me-3 d-flex flex-fill">
        <div class="col" style="background-color: lightgray;">
            <div class="list-group d-flex flex-sm-fill align-items-center mt-2 mb-2" >
                <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item align-middle" style="width: 370px;">
                        <div class="fw-bold">Número do Pedido</div>
                            #000000
                        
                    </li>
                    <li class="list-group-item" style="width: 370px;">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Status</div>
                                Concluido
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 370px;">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Data</div>
                                13/04/2021
                        </div>
                    </li>
                    <li class="list-group-item" style="width: 370px;">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Pagamento</div>
                                Pix
                        </div>
                    </li>
                </ul>
                <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item align-middle" style="width: 740px;">
                        Endereço
                    </li>
                    <li class="list-group-item" style="width: 740px;">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Transportadora </div>
                            Código do envio
                        </div>
                    </li>
                </ul>
                <div class="container-fluid d-flex justify-content-end mt-2" style="padding:0;">
                    <button onclick="window.location.href='index.php?acao=listaPedidos'" type="submit" class="btn btn-outline d-flex  justify-content-center" style="background-color:white; border-color:orange; color:orange">Ver Todos os Pedidos</button>
                </div>
            </div>
        </div>
</div>
