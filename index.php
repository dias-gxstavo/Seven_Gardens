<?php
require_once __DIR__ . '/helpers/path_helper.php'; // Inclui a função base_url

if (session_status() == PHP_SESSION_NONE) {
  session_start();  // Inicia a sessão apenas se não estiver já iniciada
}

$path = __DIR__ . '/Front-end/PHP/connect.php';
if (!file_exists($path)) {
  die('Arquivo de conexão não encontrado: ' . $path);
}
require $path;

// Verificar se o usuário é um 'Master' ou 'Colaborador'
$isUserMasterOrColaborador = isset($_SESSION['usuario_tipo']) && in_array($_SESSION['usuario_tipo'], ['Master', 'Colaborador']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seven Gardens</title>
  <link rel="stylesheet" href="<?php echo base_url('Front-end/css/header.css'); ?>">
  <link rel="shortcut icon" href="<?php echo s3_image_url('img/logoatual.svg'); ?>" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url('Front-end/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('Front-end/css/Card-produtos.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('Front-end/css/modalEstilos.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
  <script src="<?php echo base_url('Front-end/js/acessibilidade.js'); ?>"></script>
</head>

<body>
  <?php include('header.php'); ?>

  <div class="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo s3_image_url('img/banner1.svg'); ?>" alt="Imagem 1">
      </div>
      <div class="carousel-item">
        <img src="<?php echo s3_image_url('img/banner2.svg'); ?>" alt="Imagem 2">
      </div>
      <div class="carousel-item">
        <img src="<?php echo s3_image_url('img/banner3.svg'); ?>" alt="Imagem 3">
      </div>
    </div>
    <button class="carousel-prev" onclick="prevSlide()"></button>
    <button class="carousel-next" onclick="nextSlide()"></button>
  </div>

  <span class="titulopg">
    <h1>Destaques</h1>
  </span>
  <hr>

  <!-- inicio Bloco de Produtos -->
  <div class="bloco-produtos">
    <?php
    $query = "SELECT idProduto, nome, preco, descricao, categoria, subcategoria, imagem FROM produto";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Exibir os cards dos produtos
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<div class='produto-card'>";
      echo "<img class='imgProduto' src='" . htmlspecialchars($row["imagem"]) . "' alt='Imagem do produto'>";
      echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
      echo "<p class='preco'>Preço: R$ " . number_format($row["preco"], 2, ',', '.') . "</p>";
      echo "<p class='descricao'>" . htmlspecialchars($row["descricao"]) . "</p>";
      echo "<p class='categoria'>Categoria: " . htmlspecialchars($row["categoria"]) . "</p>";
      echo "<p class='subcategoria'>Subcategoria: " . htmlspecialchars($row["subcategoria"]) . "</p>";

      if ($isUserMasterOrColaborador) {
        echo "<div class='organiza_btns'>"; // Container para os botões
        echo "<button class='editar-btn' data-id='" . htmlspecialchars($row["idProduto"]) . "' data-nome='" . htmlspecialchars($row["nome"]) . "' data-preco='" . htmlspecialchars($row["preco"]) . "' data-descricao='" . htmlspecialchars($row["descricao"]) . "' data-categoria='" . htmlspecialchars($row["categoria"]) . "' data-subcategoria='" . htmlspecialchars($row["subcategoria"]) . "'>Editar</button>";
        echo "<button class='excluir-btn' data-id='" . htmlspecialchars($row["idProduto"]) . "'>Excluir</button>";
        echo "</div>"; // Fim do container
      } else {
        echo "<button class='comprar-btn' data-id='" . htmlspecialchars($row['idProduto']) . "' onclick=\"adicionarAoCarrinho(" . htmlspecialchars($row['idProduto']) . ", '" . htmlspecialchars($row['nome']) . "', " . htmlspecialchars($row['preco']) . ", '" . htmlspecialchars($row['imagem']) . "')\">Comprar</button>";
      }

      echo "</div>";
    }
    ?>
  </div>


  <!-- Fim Bloco de Produtos -->


  <!-- Fim do Bloco de Produtos -->

  <div id="itensCarrinho" class="carrinho">
    <!-- Itens do carrinho serão adicionados aqui -->
  </div>

  <!-- ACESSIBILIDADES -->
  <section id="accessibility-section">
    <i class="fas fa-universal-access" id="accessibility-icon"></i>
    <div id="other-things">
      <i class="fas fa-sun" id="light-mode-toggle"></i>
      <i class="fas fa-moon" id="dark-mode-toggle"></i>
      <img class="img_letra" src="<?php echo s3_image_url('img/aumentartext_1.svg'); ?>" alt="" srcset="" id="increase-font">
      <img class="img_letra" src="<?php echo s3_image_url('img/diminuirtext_1.svg'); ?>" alt="" srcset="" id="decrease-font">
    </div>
  </section>
  <!--FIM DA ACESSIBILIDADES -->
  <footer>
    <br>

    <div class="social-icons">
      <p> Siga-nos nas nossas redes sociais:</p>
      <a href="#" class="icon"><i class="fab fa-facebook"></i></a>
      <a href="#" class="icon"><i class="fab fa-instagram"></i></a>
      <a href="#" class="icon"><i class="fab fa-whatsapp"></i></a>
    </div>
  </footer>
  <script src="<?php echo base_url('Front-end/js/script.js'); ?>"></script>
  <script src="<?php echo base_url('Front-end/js/carrinho.js'); ?>"></script>
  <script src="<?php echo base_url('Front-end/js/modal_Edit_Produtos.js'); ?>"></script>
</body>

</html>
