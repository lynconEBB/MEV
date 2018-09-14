<?php

class Pessoa{
    private $idPessoa;
    private $nomeCompleto;
    private $cidade;
    private $Bairro;
    private $rua;
    private $numero;
    private $cpf;
    private $telefone;
    private $login;
    private $senha;
    private $email;
    private $tipoPessoa;
    private $pis;

    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    public function setIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa;
    }

    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getBairro()
    {
        return $this->Bairro;
    }

    public function setBairro($Bairro)
    {
        $this->Bairro = $Bairro;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }

    public function setTipoPessoa($tipoPessoa)
    {
        $this->tipoPessoa = $tipoPessoa;
    }

    public function getPis()
    {
        return $this->pis;
    }

    public function setPis($pis)
    {
        $this->pis = $pis;
    }

}