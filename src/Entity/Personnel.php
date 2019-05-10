<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnelRepository")
 */
class Personnel
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Fonction", inversedBy="personnelsPrincipaux")
     */
    private $fonctionsPrincipales;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Fonction", inversedBy="personnelsSecondaires")
     */
    private $fonctionsSecondaires;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mail", inversedBy="personnels")
     */
    private $mails;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Telephone", inversedBy="personnels")
     */
    private $Telephones;

    public function __construct()
    {
        $this->fonctionsPrincipales = new ArrayCollection();
        $this->fonctionsSecondaires = new ArrayCollection();
        $this->mails = new ArrayCollection();
        $this->Telephones = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Fonction[]
     */
    public function getFonctionsPrincipales(): Collection
    {
        return $this->fonctionsPrincipales;
    }

    public function addFonctionsPrincipale(Fonction $fonctionsPrincipale): self
    {
        if (!$this->fonctionsPrincipales->contains($fonctionsPrincipale)) {
            $this->fonctionsPrincipales[] = $fonctionsPrincipale;
        }

        return $this;
    }

    public function removeFonctionsPrincipale(Fonction $fonctionsPrincipale): self
    {
        if ($this->fonctionsPrincipales->contains($fonctionsPrincipale)) {
            $this->fonctionsPrincipales->removeElement($fonctionsPrincipale);
        }

        return $this;
    }

    /**
     * @return Collection|Fonction[]
     */
    public function getFonctionsSecondaires(): Collection
    {
        return $this->fonctionsSecondaires;
    }

    public function addFonctionsSecondaire(Fonction $fonctionsSecondaire): self
    {
        if (!$this->fonctionsSecondaires->contains($fonctionsSecondaire)) {
            $this->fonctionsSecondaires[] = $fonctionsSecondaire;
        }

        return $this;
    }

    public function removeFonctionsSecondaire(Fonction $fonctionsSecondaire): self
    {
        if ($this->fonctionsSecondaires->contains($fonctionsSecondaire)) {
            $this->fonctionsSecondaires->removeElement($fonctionsSecondaire);
        }

        return $this;
    }

    /**
     * @return Collection|Mail[]
     */
    public function getMails(): Collection
    {
        return $this->mails;
    }

    public function addMail(Mail $mail): self
    {
        if (!$this->mails->contains($mail)) {
            $this->mails[] = $mail;
        }

        return $this;
    }

    public function removeMail(Mail $mail): self
    {
        if ($this->mails->contains($mail)) {
            $this->mails->removeElement($mail);
        }

        return $this;
    }

    /**
     * @return Collection|Telephone[]
     */
    public function getTelephones(): Collection
    {
        return $this->Telephones;
    }

    public function addTelephone(Telephone $telephone): self
    {
        if (!$this->Telephones->contains($telephone)) {
            $this->Telephones[] = $telephone;
        }

        return $this;
    }

    public function removeTelephone(Telephone $telephone): self
    {
        if ($this->Telephones->contains($telephone)) {
            $this->Telephones->removeElement($telephone);
        }

        return $this;
    }
}
