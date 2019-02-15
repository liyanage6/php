<?php
/**
 * Created by PhpStorm.
 * User: lnicholas
 * Date: 15/02/2019
 * Time: 21:38
 */

class PersonnageManager
{
    private $db;

    public function __construct ($db)
    {
        $this->db = $this->setDb($db);
    }

    /**
     * @param $db
     */
    public function setDb (PDO $db)
    {
        $this->db = $db;
    }

    public function add (Personnage $perso)
    {
        $query = $this->db->prepare('INSERT INTO personnages(nom, degat, niveau, xp, forcePerso) VALUE (:nom, :degat, :niveau, :xp, :forcePerso)');

        $query->bindValue(':nom', $perso->getNom());
        $query->bindValue(':degat', $perso->getDegat());
        $query->bindValue(':niveau', $perso->getNiveau());
        $query->bindValue(':xp', $perso->getXp());
        $query->bindValue(':xp', $perso->getForcePerso());

        $query->execute();
    }

    public function delete (Personnage $perso)
    {
        $this->db->prepare('DELETE FROM personnage WHERE id = '.$perso->getId());
    }

    public function getOne ($id)
    {
        $q = $this->db->prepare('SELECT * FROM personnage WHERE id = '.$id);
        $data = $q->fecth(PDO::FETCH_ASSOC);

        return new Personnage($data);
    }

    public function getAll ()
    {
        $perso = [];

        $q = $this->db->prepare('SELECT * FROM personnage ORDER BY nom');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $perso[] = new Personnage($data);
        }

        return $perso;
    }

    public function update(Personnage $perso)
    {
        $q = $this->_db->prepare('UPDATE personnages SET nom = :nom, forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

        $q->bindValue(':nom', $perso->getNom(), PDO::PARAM_STR);
        $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
        $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

        $q->execute();
    }

}