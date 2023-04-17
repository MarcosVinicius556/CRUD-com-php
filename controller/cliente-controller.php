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
            $id = $_REQUEST['codigo'];
            $nome = $_POST['inputNome'];
            $email = $_POST['inputEmail'];
            $cpf = $_POST['inputCpf'];
            $tel = $_POST['inputTelefone'];
            $data_nasc = $_POST['inputDataNasc'];

            updateCliente($id, $nome, $email, $cpf, $tel, $data_nasc);
            break;
        case 'excluir':
               deleteCliente($_REQUEST['codigo']);
            break;
    }

    function findAllClientes(){
        return findAll();
    }

    function findClienteById($id){
        return findById($id);
    }

    function createCliente($nome, $email, $cpf, $tel, $data_nasc){
        $res = save($nome, $email, $cpf, formatTel($tel), $data_nasc);
        
        if(validateCliente($cpf)){
            if($res == true){
                print "<script>alert('Cadastrado com sucesso');</script>";
                print "<script>location.href='?page=listar-view';</script>";
            } else {
                print "<script>alert('Não foi possível cadastrar');</script>";
                print "<script>location.href='?page=listar-view';</script>";
            }
        } else {
            print "<script>location.href='?page=cadastrar-view';</script>";
        }
    }

    function updateCliente($id, $nome, $email, $cpf, $tel, $data_nasc){
       if(validateCliente($cpf)){
           $res = update($id, $nome, $email, $cpf, formatTel($tel), $data_nasc);
           if($res == true){
               print "<script>alert('Editado com sucesso');</script>";
               print "<script>location.href='?page=listar-view';</script>";
           } else {
               print "<script>alert('Não foi possível editar');</script>";
               print "<script>location.href='?page=listar-view';</script>";
           }
       } else {
        print "<script>location.href='?page=editar-view';</script>";
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

    function validateCliente($cpf){
        $valid = true;
        if(cpfExists($cpf)){
            print "<p class='alert alert-danger'> Cpf Já cadastrado no banco!</p>";
            return false;
        }
        else{
            return true; 
        }
    }

    function formatTel($n) {
        $tam = strlen(preg_replace("/[^0-9]/", "", $n));
        if ($tam == 13) {
            /** COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos */ 
            return "+".substr($n, 0, $tam-11)." (".substr($n, $tam-11, 2).") ".substr($n, $tam-9, 5)."-".substr($n, -4);
        }
        if ($tam == 12) {
            /** COM CÓDIGO DE ÁREA NACIONAL E DO PAIS */
            return "+".substr($n, 0, $tam-10)." (".substr($n, $tam-10, 2).") ".substr($n, $tam-8, 4)."-".substr($n, -4);
        }
        if ($tam == 11) {
            /** COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos */
            return " (".substr($n, 0, 2).") ".substr($n, 2, 5)."-".substr($n, 7, 11);
        }
        if ($tam == 10) {
            /** COM CÓDIGO DE ÁREA NACIONAL */
            return " (".substr($n, 0, 2).") ".substr($n, 2, 4)."-".substr($n, 6, 10);
        }
        if ($tam <= 9) {
            /** SEM CÓDIGO DE ÁREA */
            return substr($n, 0, $tam-4)."-".substr($n, -4);
        }
    }
?>