<h3 class="mb-3">Clientes</h3>
<?php 
include('./controller/cliente-controller.php');
$clientes = findAllClientes();
if($clientes->num_rows > 0){
    print '<table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>'; 
    while($cliente = $clientes->fetch_object()) {
        print '<tr>';
            print '<td>'.$cliente->codigo.'</td>';
            print '<td>'.$cliente->nome.'</td>';
            print '<td>'.$cliente->data_nascimento.'</td>';
            print '<td>'.$cliente->cpf.'</td>';
            print '<td>'.$cliente->telefone.'</td>';
            print '<td>'.$cliente->email.'</td>';
            print "<td>
                    <button class='btn btn-success' onClick=\"location.href='?page=editar-view&codigo=".$cliente->codigo."';\">Editar</button>
                    <button class='btn btn-danger' onClick=\"if( confirm('Tem certeza que deseja excluir? '))
                                                            { location.href='?page=cliente-controller&acao=excluir&codigo=".$cliente->codigo."';} \"
                                                            else 
                                                            { false; }\">Excluir</button>
                   </td>";
        print '</tr>';
    }
    print '</table>';
} else {
    print "<p class='alert alert-danger'> Não encontrou resultados!</p>";
}
?>