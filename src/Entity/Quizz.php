<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\QuizzRepository")
 */
class Quizz
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Question;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Answer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->Question;
    }

    public function setQuestion(?string $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->Answer;
    }

    public function setAnswer(?string $Answer): self
    {
        $this->Answer = $Answer;

        return $this;
    }
}
