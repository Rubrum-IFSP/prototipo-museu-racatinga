<?php
    class AmigoDoMuseu extends Conexao{

        public function cadastrar($nome, $senha, $cpf, $rg):bool
        {
            $cadastrado = false;
            $items = true;
            $resultNome = mysqli_query($this->conectar(), "SELECT * FROM Pessoa where nome='$nome'");
            if(mysqli_num_rows($resultNome)>0)
            {
                echo '<script>alert("Já existe uma pessoa com este nome!")</script>'; 
                $items =false;
            }
            $resultCpf = mysqli_query($this->conectar(), "SELECT * FROM Pessoa where cpf='$cpf'");
            if(mysqli_num_rows($resultCpf)>0)
            {
                echo '<script>alert("Já existe uma pessoa com este CPF!")</script>'; 
                $items =false;
            }
            $resultRg = mysqli_query($this->conectar(), "SELECT * FROM Pessoa where nome='$rg'");
            if(mysqli_num_rows($resultNome)>0)
            {
                echo '<script>alert("Já existe uma pessoa com este RG!")</script>'; 
                $items =false;
            }
            if($items)
            {
            $query = "INSERT INTO `Pessoa`(`tipoUser`, `nome`, `cpf`, `senha`, `rg`) VALUES('amg','$nome','$cpf','$senha','$rg')";
            $request = mysqli_query($this->conectar(),$query);
            $cadastrado= true;
            }
            return $cadastrado;
        }

        public function logar($user, $pass): bool
        {
            $mysqli = $this->conectar();
            $querySenha = "SELECT senha from Pessoa where senha='$pass'";
            $queryUser = "SELECT nome from Pessoa where nome='$user'";
            $resultUser= mysqli_query($mysqli,$queryUser)->fetch_assoc();
            $resultSenha = mysqli_query($mysqli,$querySenha)->fetch_assoc();
            if($resultUser!=null && $resultSenha!=null)
            {
                    $resultUser =current($resultUser);
                    $resultSenha = current($resultSenha);
                    if($user==$resultUser && $pass ==$resultSenha) return true;
                    else return false;
            }
            else return false;
            
        }

        public function mudarSenha($cpf, $rg, $senha) :bool
        {   
            $query = "SELECT * FROM Pessoa WHERE cpf ='$cpf' AND rg = $rg";
            $resultQuery = mysqli_query($this->conectar(), $query);
            if(mysqli_num_rows($resultQuery)>0)
            {
                $queryUpdate = "UPDATE `Pessoa` SET `senha`='$senha' WHERE rg='1' AND cpf ='1'";
                mysqli_query($this->conectar(), $queryUpdate);
                return true;
            }
            else
            {
                echo "<script>alert('RG ou CPF não encontrados')</script>";
                return false;
            }

        }
    }
?>