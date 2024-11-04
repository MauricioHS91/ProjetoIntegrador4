<?php
session_start();
include 'db.php'; // Arquivo que faz a conexão com o banco de dados

if (!isset($_SESSION['produtor_id'])) {
    header("Location: login.php");
    exit();
}

$produtor_id = $_SESSION['produtor_id'];

// Adiciona um novo produto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adicionar_produto'])) {
    $nome_produto = $_POST['nome_produto'];
    $descricao_produto = $_POST['descricao_produto'];

    // Upload de imagem do produto
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagem_produto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica se o arquivo é uma imagem real ou falsa
    $check = getimagesize($_FILES["imagem_produto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Verifica se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    // Verifica o tamanho do arquivo
    if ($_FILES["imagem_produto"]["size"] > 500000) {
        echo "Desculpe, o seu arquivo é muito grande.";
        $uploadOk = 0;
    }

    // Permite certos formatos de arquivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verifica se $uploadOk é 0 devido a um erro
    if ($uploadOk == 0) {
        echo "Desculpe, o seu arquivo não foi enviado.";
    // Se tudo estiver ok, tenta fazer o upload do arquivo
    } else {
        if (move_uploaded_file($_FILES["imagem_produto"]["tmp_name"], $target_file)) {
            // Insere o produto no banco de dados com o caminho da imagem
            $query = "INSERT INTO produtos (produtor_id, nome, descricao, imagem) VALUES ('$produtor_id', '$nome_produto', '$descricao_produto', '$target_file')";
            if (mysqli_query($conn, $query)) {
                echo "Produto adicionado com sucesso.";
            } else {
                echo "Erro ao adicionar o produto. Tente novamente.";
            }
        } else {
            echo "Desculpe, houve um erro ao enviar seu arquivo.";
        }
    }
}

// Obtém os produtos do produtor
$query = "SELECT * FROM produtos WHERE produtor_id = '$produtor_id'";
$result = mysqli_query($conn, $query);
$produtos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos - Feira dos Produtores Rurais</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Editar Produtos</h2>

        <form method="post" action="editar.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome_produto">Nome do Produto</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
            </div>
            <div class="form-group">
                <label for="descricao_produto">Descrição do Produto</label>
                <textarea class="form-control" id="descricao_produto" name="descricao_produto" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagem_produto">Imagem do Produto</label>
                <input type="file" class="form-control" id="imagem_produto" name="imagem_produto" required>
            </div>
            <button type="submit" name="adicionar_produto" class="btn btn-primary">Adicionar Produto</button>
        </form>

        <hr>

        <h3>Seus Produtos</h3>
        <div class="row">
            <?php foreach ($produtos as $produto): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo $produto['nome']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                            <p class="card-text"><?php echo $produto['descricao']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
