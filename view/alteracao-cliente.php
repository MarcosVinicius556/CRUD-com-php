<div class="p-3">
    <h3 class="mb-3">Alteração de Cliente</h3>

    <?php 
        include('./controller/cliente-controller.php');
        $cliente = findById($_REQUEST['codigo']);
    ?>

    <form action="?page=cliente-controller" method="POST">
    <input type="hidden" name="acao" value="editar"> 
  <input type="hidden" name="inputCodigo" value="<?php print $cliente->codigo; ?>"> 
    <div class="mb-3">
        <label for="inputNome">Nome</label>
        <input type="text" name="inputNome" value="<?php print $cliente->nome; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="inputEmail">E-mail</label>
        <input type="email" name="inputEmail" value="<?php print $cliente->email; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="inputSenha">Cpf</label>
        <input type="text" name="inputCpf" value="<?php print $cliente->cpf; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="inputTelefone">Telefone</label>
        <input type="tel" name="inputTelefone" value="<?php print $cliente->telefone; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="inputDataNasc">Data de Nascimento</label>
        <input type="date" name="inputDataNasc" value="<?php print $cliente->data_nascimento; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> 
        Enviar
        </button>
    </div>
    </form>
</div>