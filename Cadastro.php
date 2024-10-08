<?php 
    require_once('header.php');
    require_once('CursoDAO.php');    
    require_once('Curso.php');
    $cod = isset($_GET['cod']); //cod que ta na tabela do listar e faz referencia a um curso, pra poder verificar se tem codigo e se 
                                //é um update ou insert

    if($cod){
    $cod = $_GET['cod'];  //vereifica se tem codigo e então cria dao e busca um curso para add em $curso
    $cursodao = new CursoDAO();
    $curso = $cursodao->busca(intval($cod));
    }
?>
<h2>Cadastro de cursos</h2>

<form action="cadastrar.php" method="post">

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control form-control-sm" id="nome" name="nome" 
        value="<?php if($cod) echo $curso->getNome();?>" >  <!--verifica se tem ou nao o codigo pra ja preencher ou não o campo-->
    </div>
    <div class="form-group">
        <label>area do curso</label>
        <input  class="form-control form-control-sm" id="area" name="area" placeholder="kitesurf" 
        value="<?php if($cod) echo $curso->getArea();?>">
    </div>
    <div class="form-group">
        <label>Carga horaria</label>
        <input type="text" class="form-control form-control-sm" id="carga" name="carga" placeholder="80" 
        value="<?php if($cod) echo $curso->getCarga();?>">
    </div>
    <div class="form-group">
        <label>data de fundação</label>
        <input type="text" class="form-control form-control-sm" id="date" name="date" placeholder="'10-11-2017'" 
        value="<?php if($cod) echo $curso->getDate();?>">
    </div>
        <?php if($cod){ ?>
        <input type="hidden" name="cod" value="<?php echo $curso->getCod();?>">
        <?php } ?>
    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
        <button type="reset" class="btn btn-sm btn-secondary" >limpar</button>  
    </div>
</form>

<a href="listar.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>