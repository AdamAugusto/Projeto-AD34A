<div class="row ms-3">
    <div class="col mb-2" style="padding-left: 0;">
        <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            MEUS DADOS
    </div>
</div>
<div class="row ms-3 me-3 d-flex flex-fill">
        <div class="col ms-2" style="background-color: lightgray;">
            <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            Dados Básicos
            <form class="row mb-2"  action="index.php?acao=realizarCadastro" method="POST">
                <div class="form-floating mb-2">
                    <input name="nome" type="text" class="form-control" id="floatingNick" placeholder="Name" value="aaaa">
                    <label for="floatingNick" class="form-label ms-1">Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput" class="form-label ms-1">Email address</label>
                </div>
                <div class="d-grid gap-2 col">
                        <button class="btn btn-primary" type="submit">Excluir Minha Conta</button>
                </div>
                <div class="d-grid gap-2 col">
                        <button class="btn btn-primary" type="submit">Salvar Alterações</button>
                </div>               
            </form>
        </div>
        <div class="col ms-3" style="background-color: lightgray;">
            <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            Endereços
            <div class="row me-2">
                <div class="card ms-2 mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Endereço 1</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">rua</h6>
                        <p class="card-text">numero</p>
                        <a href="#" class="card-link" style="color: orange; text-decoration: none;">editar</a>
                        <a href="#" class="card-link" style="color: orange; text-decoration: none;">excluir</a>
                    </div>
                </div>
            </div>
        </div>
</div>