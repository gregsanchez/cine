<?php

namespace Troiswa\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * acteurs
 *
 * @ORM\Table(name="acteur")
 * @ORM\Entity(repositoryClass="Troiswa\BackBundle\Entity\acteursRepository")
 */
class acteurs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="attention")
     * @ORM\Column(name="prenom", type="string", length=70)
     *
     */
    private $prenom;

    /**
     * @var string
     * @Assert\NotBlank(message="attention")
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="boolean")
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="biographie", type="text")
     */
    private $biographie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="datetime")
     */
    private $dateDeNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    private $fichier;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return acteurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return acteurs
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return acteurs
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set biographie
     *
     * @param string $biographie
     * @return acteurs
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * Get biographie
     *
     * @return string 
     */
    public function getBiographie()
    {
        return $this->biographie;
    }

    /**
     * Set dateDeNaissance
     *
     * @param \DateTime $dateDeNaissance
     * @return acteurs
     */
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get dateDeNaissance
     *
     * @return \DateTime 
     */
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }
    /**
     * Set image
     *
     * @param string $image
     * @return films
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set fichier
     *
     * @param string $fichier
     * @return fichier
     */

    public function setFichier($newFichier)
    {
        $this->fichier = $newFichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }


    public function upload()
    {
        $nomImage=$this->fichier->getClientOriginalName();
        $this->fichier->move(
            $this->getUploadRootDir(),
            $nomImage);
        $this->image=$nomImage;
    }

    private function getUploadRootDir()


    {
        return __DIR__."/../../../../web/img/acteurs";
    }
}