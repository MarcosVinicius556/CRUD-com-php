<div class="p-3">
    <h3 class="mb-5">Cadastro de Cliente</h3>
    <form action="?page=cliente-controller" method="POST">
    <input type="hidden" name="acao" value="cadastrar">  <!-- Esconde a URL -->
    <div class="mb-3 col-md-6">
        <label for="inputNome">Nome</label>
        <input type="text" name="inputNome" class="form-control" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="inputEmail">E-mail</label>
        <input type="email" name="inputEmail" class="form-control">
    </div>
    <div class="mb-3 col-md-4">
        <label for="inputCpf">Cpf</label>
        <input type="text" name="inputCpf" class="form-control CPF" required>
    </div>
    <div class="mb-3 col-md-4">
        <label for="inputTelefone">Telefone</label>
        <input type="tel" name="inputTelefone" class="form-control TELEFONE">
    </div>
    <div class="mb-3 col-md-4">
        <label for="inputDataNasc">Data de Nascimento</label>
        <input type="date" name="inputDataNasc" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> 
        Enviar
        </button>
    </div>
</form>