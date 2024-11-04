<?php
include "template/header.php";
include "db.php"; // Arquivo que faz a conexão com o banco de dados

$query = "SELECT * FROM produtores";
$result = mysqli_query($conn, $query);
$produtores = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feira de Produtores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            transition: transform 0.3s;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Feira de Produtores</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($produtores as $produtor): ?>
                <div class="col">
                    <div class="card h-100">
                        <a href="produtor.php?produtor_id=<?php echo $produtor['id']; ?>">
                            <img src="<?php echo $produtor['imagem']; ?>" class="card-img-top" alt="<?php echo $produtor['nome']; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produtor['nome']; ?></h5>
                            <p class="card-text"><?php echo $produtor['descricao']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include "template/footer.php"; ?>
