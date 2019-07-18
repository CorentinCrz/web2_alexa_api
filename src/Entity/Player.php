<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"lastname": "exact", "male": "exact", "lastResult": "exact"})
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $birth;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $img;

    /**
     * @ORM\Column(type="boolean")
     */
    private $male;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastResult;

    /**
     * @ORM\Column(type="integer")
     */
    private $victories;

    /**
     * @ORM\Column(type="integer")
     */
    private $participation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirth(): ?\DateTimeInterface
    {
        return $this->birth;
    }

    public function setBirth(\DateTimeInterface $birth): self
    {
        $this->birth = $birth;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getMale(): ?bool
    {
        return $this->male;
    }

    public function setMale(bool $male): self
    {
        $this->male = $male;

        return $this;
    }

    public function getLastResult(): ?string
    {
        return $this->lastResult;
    }

    public function setLastResult(string $lastResult): self
    {
        $this->lastResult = $lastResult;

        return $this;
    }

    public function getVictories(): ?int
    {
        return $this->victories;
    }

    public function setVictories(int $victories): self
    {
        $this->victories = $victories;

        return $this;
    }

    public function getParticipation(): ?int
    {
        return $this->participation;
    }

    public function setParticipation(int $participation): self
    {
        $this->participation = $participation;

        return $this;
    }
}
