<?php

namespace App\Services;

use App\Model\ContasCadastradas;
use App\Core\Database;
use DateTime;
use DateTimeZone;

class UserService
{
    private $db;
    private $repo;

    public function __construct()
    {
        $this->db = Database::getEntityManager();
        $this->repo = $this->db->getRepository(ContasCadastradas::class);

        date_default_timezone_set('America/Sao_Paulo');
    }

    public function cadastrar(string $nome, string $email, string $senha): array
    {
        $erros = [];

        if ($this->repo->findOneBy(['email' => $email])) {
            $erros[] = "Este e-mail já está em uso.";
            return $erros;
        }

        $usuario = new ContasCadastradas();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $usuario->setPerfil("cliente");

        $usuario->setDataCadastro(new DateTime('now', new DateTimeZone('America/Sao_Paulo')));

        $this->db->persist($usuario);
        $this->db->flush();

        return $erros;
    }

    public function login(string $email, string $senha)
    {
        $usuario = $this->repo->findOneBy(['email' => $email]);
        if (!$usuario) {
            return false;
        }

        if (password_verify($senha, $usuario->getSenha())) {
            return $usuario;
        }

        return false;
    }
}
