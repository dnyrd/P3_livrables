<?php

class Contact
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $phone_number = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone_number(): ?string
    {
        return $this->phone_number;
    }

    public function setPhone_number(?string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function __toString(): string
    {
        return "{$this->id} | {$this->name} | {$this->email} | {$this->phone_number}  ";
    }
}
