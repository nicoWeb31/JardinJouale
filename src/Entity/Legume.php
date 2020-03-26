<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LegumeRepository")
 * @Vich\Uploadable
 */

class Legume
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,max=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="legumeImg", fileNameProperty="img")
     * 
     */
    private $imageFile;

    public function setImageFile(File $imageFile = null)
    {
        $this->imageFile = $imageFile;
        return $this;

        if ($this->imageFile instanceof UploadedFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updated_at = new \DateTime('now');
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=3,max=30,minMessage ="nom trop court",maxMessage="30 caractére maxi")
     */

    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Variete", mappedBy="legume")
     */
    private $varietes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mois", inversedBy="legumes")
     */
    private $mois;

    public function __construct()
    {
        $this->varietes = new ArrayCollection();
        $this->updated_at = New DateTime('now');
        $this->mois = new ArrayCollection();
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self    // set image doit etre null
    {
        $this->img = $img;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Variete[]
     */
    public function getVarietes(): Collection
    {
        return $this->varietes;
    }

    public function addVariete(Variete $variete): self
    {
        if (!$this->varietes->contains($variete)) {
            $this->varietes[] = $variete;
            $variete->setLegume($this);
        }

        return $this;
    }

    public function removeVariete(Variete $variete): self
    {
        if ($this->varietes->contains($variete)) {
            $this->varietes->removeElement($variete);
            // set the owning side to null (unless already changed)
            if ($variete->getLegume() === $this) {
                $variete->setLegume(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mois[]
     */
    public function getMois(): Collection
    {
        return $this->mois;
    }

    public function addMois(Mois $mois): self
    {
        if (!$this->mois->contains($mois)) {
            $this->mois[] = $mois;
            $mois->addLegume($this);
        }

        return $this;
    }

    public function removeMois(Mois $mois): self
    {
        if ($this->mois->contains($mois)) {
            $this->mois->removeElement($mois);
            $mois->removeLegume($this);
        }

        return $this;
    }
}
