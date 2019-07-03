<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipoRepository")
 */
class Equipo
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
    private $categoria;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexo;

    /**
     * @ORM\Column(type="integer")
     */
    private $numJugadores;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultado", mappedBy="equipolocal", orphanRemoval=true)
     */
    private $resultadoslocales;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultado", mappedBy="Equipo")
     */
    private $resultadosvisitante;

    public function __construct()
    {
        $this->resultadoslocales = new ArrayCollection();
        $this->resultadosvisitante = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getNumJugadores(): ?int
    {
        return $this->numJugadores;
    }

    public function setNumJugadores(int $numJugadores): self
    {
        $this->numJugadores = $numJugadores;

        return $this;
    }

    /**
     * @return Collection|Resultado[]
     */
    public function getResultadoslocales(): Collection
    {
        return $this->resultadoslocales;
    }

    public function addResultadoslocale(Resultado $resultadoslocale): self
    {
        if (!$this->resultadoslocales->contains($resultadoslocale)) {
            $this->resultadoslocales[] = $resultadoslocale;
            $resultadoslocale->setEquipolocal($this);
        }

        return $this;
    }

    public function removeResultadoslocale(Resultado $resultadoslocale): self
    {
        if ($this->resultadoslocales->contains($resultadoslocale)) {
            $this->resultadoslocales->removeElement($resultadoslocale);
            // set the owning side to null (unless already changed)
            if ($resultadoslocale->getEquipolocal() === $this) {
                $resultadoslocale->setEquipolocal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Resultado[]
     */
    public function getResultadosvisitante(): Collection
    {
        return $this->resultadosvisitante;
    }

    public function addResultadosvisitante(Resultado $resultadosvisitante): self
    {
        if (!$this->resultadosvisitante->contains($resultadosvisitante)) {
            $this->resultadosvisitante[] = $resultadosvisitante;
            $resultadosvisitante->setEquipo($this);
        }

        return $this;
    }

    public function removeResultadosvisitante(Resultado $resultadosvisitante): self
    {
        if ($this->resultadosvisitante->contains($resultadosvisitante)) {
            $this->resultadosvisitante->removeElement($resultadosvisitante);
            // set the owning side to null (unless already changed)
            if ($resultadosvisitante->getEquipo() === $this) {
                $resultadosvisitante->setEquipo(null);
            }
        }

        return $this;
    }

    //esto lo ponemos porque al renderizar nos da un error
    public function __toString()
    {
        return $this->categoria;
    }
}
