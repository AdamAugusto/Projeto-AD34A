<head>
    <title>Página</title>
    <!-- Compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style type="text/css">
        .nav-link{
            color: black !important;
        }
        .dropdown-menu{
            background-color: orange;
        }
        .nav-underline{
            background-color: orange;
            color: black !important;
        }
    </style>

</head>
    <body>

        <nav class="navbar justify-content-center" style = "background-color: #ffa500;" >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?acao=home">
                    foto
                </a>
                <form class="d-flex flex-sm-fill " role="search" style='max-width: 950px;'>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit" >Search</button>
                </form>
                <div class="">
                    <ul class="nav nav-underline flex-sm-fill">
                        <li class="nav-item flex-sm-fill">foto</li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#"><?= $_SESSION['usuario']?></a>
                            
                        </li class="nav-item flex-sm-fill">
                        <li><a class="nav-link" href="index.php?acao=logout">Logout</a></li>
                    </ul>
                </div>
                
            </div>
            <ul class="nav nav-underline flex-sm-fill text-sm-center">
                <li class="nav-item flex-sm-fill text-sm-center">
                    <a class="nav-link " href="#">Active</a>
                </li>
                <li class="nav-item flex-sm-fill text-sm-center">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item flex-sm-fill text-sm-center">
                    <a class="nav-link" href="index.php?acao=cadastrar">Cadastrar Item</a>
                </li>
                <li class="nav-item flex-sm-fill text-sm-center">
                    <a class="nav-link nav-link-color:black" >Disabled</a>
                </li>
                <li class="nav-item dropdown flex-sm-fill text-sm-center" style="color:black">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        

        