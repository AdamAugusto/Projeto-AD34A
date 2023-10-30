<div class="row ms-3">
    <div class="col mb-2" style="padding-left: 0;">
        <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            MEUS DADOS
    </div>
</div>
<div class="row ms-3 me-3 d-flex flex-fill">
        <div class="col ms-2" style="background-color: lightgray; height:auto">
            <img src="../projeto/imagens/carrinho.png" class="" alt="..."  height="30" width="30">
            Dados Básicos
            <form class="row mb-2"  action="index.php?acao=realizarCadastro" method="POST">
                <div class="form-floating mb-2">
                    <input name="nome" type="text" class="form-control" id="floatingNick" placeholder="Name" value="<?=$_SESSION['usuario']?>">
                    <label for="floatingNick" class="form-label ms-1">Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?=$_SESSION['emailUsuario']?>">
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
            <div class="row mb-2 d-flex justify-content-center" >
                <form class="row d-flex justify-content-center"  action="index.php?acao=armazenarEndereco" method="POST">
                    <div class="form-floating mb-2">
                        <a>Adicionar Endereço</a>
                    </div>
                    <select class="form-select mb-2 " name="estado" id="estado" style="width:690px">
                        <option selected>Escolha seu UF</option>
                        <?php foreach($estados as $estados): ?>
                        <option value="1"><?=$estados?></option>
                        <?php endforeach;?>
                    </select>
                    <div class="form-floating mb-2">
                        <input name="cidade" type="text" class="form-control" id="floatingCidade" placeholder="">
                        <label for="floatingCidade" class="form-label ms-1">Cidade</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="bairro" type="text" class="form-control" id="floatingBairro" placeholder="">
                        <label for="floatingBairro" class="form-label ms-1">Bairro</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="rua" type="text" class="form-control" id="floatingRua" placeholder="">
                        <label for="floatingRua" class="form-label ms-1">Rua</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="numero" type="text" class="form-control" id="floatingNumero" placeholder="">
                        <label for="floatingNumero" class="form-label ms-1">Numero</label>
                    </div>
                    
                    <div class="form-floating mb-2">
                        <input name="complemento" type="text" class="form-control" id="floatingComplemento" placeholder="">
                        <label for="floatingComplemento" class="form-label ms-1">Complemento</label>
                    </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
                                
                </form>
            </div>
        </div>
</div>