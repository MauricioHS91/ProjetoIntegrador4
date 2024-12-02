<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script type="text/javascript" src="/js/script.js"></script>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feira de Produtores</title>
    <style>

        
        /* Estilizando a navbar para um visual mais rústico */
        .navbar {
            background-color: #4A8C4A; /* Cor marrom rústica */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-family: 'Georgia', serif!important; /* Fonte elegante e rústica */
            font-weight: bold!important;
            color: #f8f1e4!important; /* Cor clara para contraste */
            display: flex;
            align-items: center; /* Centraliza a logo e o texto verticalmente */
        }
        .navbar-brand img {
            height: 40px; /* Ajuste o tamanho da logo conforme necessário */
            margin-right: 10px; /* Espaço entre a logo e o texto */
        }
        .navbar-nav .nav-link {
            color: #f8f1e4;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #c9ab79; /* Efeito de hover com tom dourado suave */
        }
        /* Botão de toggle */
        .navbar-toggler {
            border-color: #f8f1e4;
        }
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath stroke="rgba%28248, 241, 228, 1%29" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E');
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand branco" href="index.php">
                <img src="img/logo.png" alt="Logo"> <!-- Substitua "path/to/your/logo.png" pelo caminho da sua logo -->
                Feira dos Produtores
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Barracas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato.php">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
