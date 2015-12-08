<?php
include (dirname(__FILE__) . './header.php');
include (dirname(__FILE__) . './footer.php');
require_once  dirname(__FILE__).'/BeanAdminProduto.class.php';
require_once(dirname(__DIR__) . "/model/Produto.class.php");


$admprod = new BeanAdminProduto();
$itens = $admprod->listarProdutos();
$produto = new Produto();
if (isset($_GET['alterar'])) {
    echo "foi";
    foreach ($itens as $key => $value) {
        if ($value['codigo'] == $_GET['alterar'] ) {
            echo "foi2";
            $produto->setCodigo($value['codigo']);
            $produto->setDescricao($value['descricao']);
            $produto->setEstoque($value['estoque']);
            $produto->setImagem($value['imagem']);
            $produto->setPreco($value['preco']);
        }
    }
    
}else{
    echo " asdas das ";
}
//print_r($_FILES['arquivo']['name']);

if (isset($_POST['gravar'])) {
    $item = $_POST;
    $item['imagem'] = $_FILES['imagem']['name'];
    $destino = '../imagens/produtos/' . $_FILES['imagem']['name'];
    $arquivo_tmp = $_FILES['imagem']['tmp_name'];
    move_uploaded_file( $arquivo_tmp, $destino  );
    unset($item['gravar']);
    print_r($item);
    
    
    if ($item['codigo'] != '') {
        $admprod->alterar($item);
    }else{
       
        //echo 'inserir';
        $item['codigo'] = null;
        
        $admprod->inserir($item);
        echo "<script>alert('Produto registrado com sucesso !!!');</script>";
    }
}

//print_r($itens);
?>



<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" method="Post" action="produto.php" enctype='multipart/form-data'>
            <fieldset>

                <!-- Form Name -->
                <legend>Cadastro de Produto</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Codigo:</label>  
                    <div class="col-md-2">
                        <input type="hidden" name="codigo" value="<?php echo $produto->getCodigo(); ?>"/>
                        <input id="textinput" name="textinput" placeholder="" class="form-control input-md" type="text" value="<?php echo $produto->getCodigo(); ?>" disabled="true">
                        <span class="help-block">Codigo do Produto</span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Descrição:</label>  
                    <div class="col-md-5">
                        <input id="textinput" name="descricao" placeholder="" class="form-control input-md" type="text" value="<?php echo $produto->getDescricao(); ?>">
                        <span class="help-block">Nome do Produto</span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Preço:</label>  
                    <div class="col-md-4">
                        <input id="textinput" name="preco" placeholder="" class="form-control input-md" type="text" value="<?php echo $produto->getPreco(); ?>">
                        <span class="help-block">Valor de venda</span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Text estoque">Estoque:</label>  
                    <div class="col-md-2">
                        <input id="Text estoque" name="estoque" placeholder="" class="form-control input-md" type="text" value="<?php echo $produto->getEstoque(); ?>">
                        <span class="help-block">Valor no estoque</span>  
                    </div>
                </div>

                <!-- File Button --> 
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Imagem</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="imagem" class="input-file" type="file" value="">
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id">Ações</label>
                    <div class="col-md-8">
                        <button id="button1id" type="submit"  class="btn btn-success" name="gravar" value="true">Salvar</button>
                        <button id="button2id" type="reset"  class="btn btn-danger">Cancelar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>

</div>
<div class="row">
    <div class="col-md-12">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                   Codigo
                                </th>
                                <th>
                                    Descricao
                                </th>
                                <th>
                                    Preço
                                </th>
                                <th>
                                    Estoque
                                </th>
                                <th>
                                    Imagem
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($itens as $key => $value) {
                                echo"<tr class = 'active'>";
                                echo"<td>{$value['codigo']}</td>";
                                echo"<td><a href='?alterar={$value['codigo']}'>{$value['descricao']}</a></td>";
                                echo"<td>{$value['preco']}</td>";
                                echo"<td>{$value['estoque']}</td>";
                                echo"<td> <img src='../imagens/produtos/{$value['imagem']}' alt='...' height='30px' width='32px'></td>";
                            }
                            
                            ?>
                            <tr>
                                
                            </tr>
                            <tr class="active">
                                
                            </tr>
                            <tr class="success">
                               
                            </tr>
                            <tr class="warning">
                               
                            </tr>
                            <tr class="danger">
                               
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li>
                            <a href="#">Prev</a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>