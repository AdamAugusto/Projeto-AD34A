<div class="container-fluid">
    <div class="row justify-content-center align-items-end col-auto mt-5" style="min-height: 370px;">
        <div class="col" style="max-width: 450px;">
            <form class="row mt-5"  action="index.php?acao=realizarCadastro" method="POST">
                <div class="form-floating mb-2 mt-5">
                    <a>Cadastro</a>
                </div>
                <div class="form-floating mb-2">
                    <input name="nome" type="text" class="form-control" id="floatingNick" placeholder="Name">
                    <label for="floatingNick" class="form-label ms-1">Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput" class="form-label ms-1">Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input name="senha1" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword" class="form-label ms-1">Password</label>
                </div>
                <div class="form-floating mb-2">
                    <input name="senha2" type="password" class="form-control" id="floatingConfirmPassword" placeholder="Confirm Password">
                    <label for="floatingConfirmPassword" class="form-label ms-1">Confirm password</label>
                </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>
                               
            </form>
        </div>
    </div>
</div>