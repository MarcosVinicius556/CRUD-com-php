<?php 
    function findAll(){
        include('./model/config.php');
        $query_clientes = 'SELECT * FROM cliente';
       
        return $conn->query($query_clientes);
    }

    function findById($id){
        include('./model/config.php');
        $query_cliente = 'SELECT * FROM cliente WHERE codigo='.$id;
        $cliente = $conn->query($query_cliente);
       
        return $cliente->fetch_object();
    }

    /**
     * Se possuir um cliente com o mesmo cpf existente
     * no banco retorna true
     */
    function cpfExists($cpf){
        include('./model/config.php');
        $query_cpf = "SELECT * FROM cliente WHERE cpf = '".$cpf."'";

        $res = $conn->query($query_cpf);
        return $res->num_rows > 0;
    }

    function save($nome, $email, $cpf, $tel, $data_nasc){
        include('./model/config.php');
        $sql_insert = "INSERT INTO
                            cliente (nome, email, cpf, telefone, data_nascimento) 
                       VALUES
                         ('{$nome}',
                          '{$email}',
                          '{$cpf}',
                          '{$tel}',
                          '{$data_nasc}')";
        return $conn->query($sql_insert);
    }

    function update($id, $nome, $email, $cpf, $tel, $data_nasc){
        include('./model/config.php');
        $sql_update = "UPDATE
                         cliente 
                    SET 
                        nome='{$nome}',
                        email='{$email}', 
                        cpf='{$cpf}', 
                        telefone='{$tel}', 
                        data_nascimento= '{$data_nasc}'
                    WHERE codigo=".$id;

        return $conn->query($sql_update);
    }

    function remove($id){
        include('./model/config.php');
        $sql_delete = "DELETE FROM
                            cliente 
                       WHERE 
                            codigo=".$id;

        return $conn->query($sql_delete); 
    }
?>