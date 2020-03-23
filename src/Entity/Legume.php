<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;


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
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $img;



    /**
     * @Vich\UploadableField(mapping="legume_image", fileNameProperty="img")
     */
    private $imgFile;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=3,max=30,minMessage ="nom trop court",maxMessage="30 caractére maxi")
     */

    private $type;

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

    public function setImg(?string $img): self
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

    public function setImgFile(?File $imgFile = null): self
    {
        $this->imageFile = $imgFile;

        // if (null !== $imgFile) {
        //     // It is required that at least one field changes if you are using doctrine
        //     // otherwise the event listeners won't be called and the file is lost
        //     $this->updatedAt = new \DateTimeImmutable();
        // }
        return $this;
    }

    public function getImgFile(): ?File
    {
        return $this->imgFile;
    }
}
