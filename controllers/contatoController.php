<?php
class contatoController extends controller {
    
    public function index() {
        
    }

    public function adicionar() {
        $dados = array();
        
        $this->loadTemplate('adicionar', $dados);
    }

    public function adicionar_submit() {
        if(!empty($_POST["email"])) {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            
            $contato = new Contato();
            if($contato->adicionar($email, $nome)) {
                header("Location: ".BASE_URL);
            }
        } else {
            header("Location: ".BASE_URL."contato/adicionar");
        }

    }

    public function editar($id) {
        $dados = array();

        if(!empty($id)) {
            $contato = new Contato();
            $dados['info'] = $contato->getInfo($id);
        } else {
            header("Location: ".BASE_URL);
            exit;
        }
        
        $this->loadTemplate('editar', $dados);
    }

    public function editar_submit() {
        if(!empty($_POST["id"])) {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $id = $_POST["id"];

            $contato = new Contato();
        
            if(!empty($email)) {
                $contato->editar($nome, $email, $id);
            }
        } 
        header("Location: ".BASE_URL);
    }

    public function excluir($id) {
        if(!empty($id)) {
            $contato = new Contato();
            $contato->excluir($id);
        } 
        header("Location: ".BASE_URL);
    }

}