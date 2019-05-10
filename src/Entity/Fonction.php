<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FonctionRepository")
 */
class Fonction
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $structure;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnel", mappedBy="fonctionsPrincipales")
     */
    private $personnelsPrincipaux;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnel", mappedBy="fonctionsSecondaires")
     */
    private $personnelsSecondaires;

    public function __construct()
    {
        $this->personnelsPrincipaux = new ArrayCollection();
        $this->personnelsSecondaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(?string $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * @return Collection|Personnel[]
     */
    public function getPersonnelsPrincipaux(): Collection
    {
        return $this->personnelsPrincipaux;
    }

    public function addPersonnelsPrincipaux(Personnel $personnelsPrincipaux): self
    {
        if (!$this->personnelsPrincipaux->contains($personnelsPrincipaux)) {
            $this->personnelsPrincipaux[] = $personnelsPrincipaux;
            $personnelsPrincipaux->addFonctionsPrincipale($this);
        }

        return $this;
    }

    public function removePersonnelsPrincipaux(Personnel $personnelsPrincipaux): self
    {
        if ($this->personnelsPrincipaux->contains($personnelsPrincipaux)) {
            $this->personnelsPrincipaux->removeElement($personnelsPrincipaux);
            $personnelsPrincipaux->removeFonctionsPrincipale($this);
        }

        return $this;
    }

    /**
     * @return Collection|Personnel[]
     */
    public function getPersonnelsSecondaires(): Collection
    {
        return $this->personnelsSecondaires;
    }

    public function addPersonnelsSecondaire(Personnel $personnelsSecondaire): self
    {
        if (!$this->personnelsSecondaires->contains($personnelsSecondaire)) {
            $this->personnelsSecondaires[] = $personnelsSecondaire;
            $personnelsSecondaire->addFonctionsSecondaire($this);
        }

        return $this;
    }

    public function removePersonnelsSecondaire(Personnel $personnelsSecondaire): self
    {
        if ($this->personnelsSecondaires->contains($personnelsSecondaire)) {
            $this->personnelsSecondaires->removeElement($personnelsSecondaire);
            $personnelsSecondaire->removeFonctionsSecondaire($this);
        }

        return $this;
    }
}
