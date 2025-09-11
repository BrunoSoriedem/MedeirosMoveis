<?php

namespace App\Services;

class ValidarSenhaEspecifica
{
    private string $password;
    private array $errors = [];

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function validate(): bool
    {
        $this->errors = [];

        if (strlen($this->password) < 8 || strlen($this->password) > 16) {
            $this->errors[] = "A senha deve ter entre 8 e 16 caracteres.";
        }
        if (!preg_match('/[A-Z]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos uma letra maiúscula.";
        }
        if (!preg_match('/[a-z]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos uma letra minúscula.";
        }
        if (!preg_match('/[0-9]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos um número.";
        }
        if (!preg_match('/[\W_]/', $this->password)) {
            $this->errors[] = "A senha deve conter ao menos um caractere especial.";
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
