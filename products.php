<?php include_once 'topo.php'; ?>

<link rel="stylesheet" href="assets/css/products.css">

<main class="py-4">
    <div class="container">
        
        <div class="text-center mb-5">
            <h2 class="fw-bold">Nossos Veículos</h2>
            <p class="text-muted">Confira as melhores ofertas do BarbaCar</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
            
            <?php
            require_once 'admin/config.inc.php';
            
            $sql = "SELECT * FROM veiculos";
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultado) > 0) {
                
                while($carro = mysqli_fetch_array($resultado)) {
            ?>
            
            <div class="col">
                <div class="card-container">
                    <div class="card h-100 shadow-sm">
                        
                        <div class="ratio ratio-4x3"> 
                            <?php 
                                $foto = !empty($carro['foto']) ? $carro['foto'] : 'assets/images/logo.jpeg'; 
                            ?>
                            <img src="<?=$foto?>" class="card-img-top object-fit-cover" alt="<?=$carro['modelo']?>">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?=$carro['modelo']?></h5>
                            <p class="card-text text-muted small mb-2"><?=$carro['marca']?> • <?=$carro['ano']?></p>
                            
                            <div class="mt-auto">
                                <p class="price fs-5 fw-bold text-success mb-2">R$ <?=number_format($carro['preco'], 2, ',', '.')?></p>
                                <a href="links.php" class="btn btn-primary w-100">Ver Detalhes</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php 
                } 
            } else {
                echo "<div class='col-12'><p class='alert alert-warning text-center'>Nenhum veículo encontrado no estoque.</p></div>";
            }
            ?>

        </div> 
    </div>
</main>

<?php include_once 'rodape.php'; ?>