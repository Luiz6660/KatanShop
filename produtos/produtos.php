<?php
// variaveis de controle
$paginaAtual = 'Produtos';

include_once './includes/_functions.php';
//include_once './includes/_dados.php'; #inclui arquivo de dados

include_once './includes/_banco.php';
include_once './includes/_head.php'; #inclui o arquivo com o head em html
include_once './includes/_header.php'; #inclui o header da pagina
// conteudo da pagina

//executar comando SQL = linguagem de banco de dados
$sql = mysqli_query($conn,"SELECT * FROM produtos") or die ("Error");


?>

    <section id="produtos">
        <div class="row">
    <?php
    // laco de repeticao 
    while ($dados = mysqli_fetch_assoc($sql)) {
    ?>
        <div class="card col-3" style="width: 18rem;">
            <a href="./produto-detalhe.php?id=<?php echo $dados{ProdutosID};?>">
                <img class="card-img-top" src="./produtos/<?php echo $dados['Imagem']?>" alt="<?php echo $dados['Nome'];?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $dados['Nome']?></h4>
                    <span class="card-price">R$ <?php echo ConverterEmMoeda($dados['Preco']);?></span>
                </div>
            </a>
        </div>
    <?php
    }
    ?>
        </div>
    </section>

<?php
include_once './includes/_footer.php'; #inclui o footer da pagina
?>