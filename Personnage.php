<?php

/**
 * Class Personnage
 */
class Personnage
{
    private $id;
    private $nom;
    private $degat;
    private $niveau;
    private $xp;
    private $forcePerso;

    public function hydrate (array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }


    /**
     * @param $id
     * @return int
     */
    public function setId ($id) : int
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom ()
    {
        return $this->nom;
    }


    /**
     * @param $nom
     * @return string
     */
    public function setNom ($nom) : string
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDegat ()
    {
        return $this->degat;
    }

    /**
     * @param mixed $degat
     * @return int
     */
    public function setDegat ($degat) : int
    {
        $this->degat = $degat;
    }

    /**
     * @return mixed
     */
    public function getNiveau ()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     * @return int
     */
    public function setNiveau ($niveau): int
    {
        $this->niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function getXp ()
    {
        return $this->xp;
    }

    /**
     * @param mixed $xp
     * @return int
     */
    public function setXp ($xp) : int
    {
        $this->xp = $xp;
    }

    /**
     * @return mixed
     */
    public function getForcePerso ()
    {
        return $this->forcePerso;
    }

    /**
     * @param mixed $forcePerso
     */
    public function setForcePerso ($forcePerso): void
    {
        $this->forcePerso = $forcePerso;
    }

}