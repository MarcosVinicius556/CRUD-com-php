<?php 
    include('./model/cliente.php');

    switch (@$_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST['inputNome'];
            $email = $_POST['inputEmail'];
            $cpf = $_POST['inputCpf'];
            $tel = $_POST['inputTelefone'];
            $data_nasc = $_POST['inputDataNasc'];

            createCliente($nome, $email, $cpf, $tel, $data_nasc);
            break;
        case 'editar':
            $id = $_REQUEST['id'];
            $nome = $_POST['inputNome'];
            $email = $_POST['inputEmail'];
            $cpf = $_POST['inputCpf'];
            $tel = $_POST['inpuTelefone'];
            $data_nasc = $_POST['inputDataNasc'];

            updateCliente($id, $nome, $email, $cpf, $tel, $data_nasc);
            break;
        case 'excluir':
               deleteCliente($_REQUEST['id']);
            break;
    }

    function findAllClientes(){
        return findAll();
    }

    function findClienteById($id){
        return findById($id);
    }

    function createCliente($nome, $email, $cpf, $tel, $data_nasc){
        $res = save($nome, $email, $cpf, $tel, $data_nasc);
        
        if($res == true){
            print "<script>alert('Cadastrado com sucesso');</script>";
            print "<script>location.href='?page=listar-view';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar-view';</script>";
        }
    }

    function updateCliente($id, $nome, $email, $cpf, $tel, $data_nasc){
       

        $res = update($id, $nome, $email, $cpf, $tel, $data_nasc);
        if($res == true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar-view';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar-view';</script>";
        }
    }

    function deleteCliente($id){
        $res = remove($id); 
        if($res == true){
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
    }
?>