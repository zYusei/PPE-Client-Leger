<?php
require_once("model/modele.class.php");

class Controleur
{
    private $unModele;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->unModele = new Modele($serveur, $bdd, $user, $mdp);
    }

    public function setTable($uneTable)
    {
        $this->unModele->setTable($uneTable);
    }

    public function insert($tab)
    {
        return $this->unModele->insert($tab);
    }

    public function update($tab, $colonne, $valeur)
    {
        $this->unModele->update($tab, $colonne, $valeur);
    }

    public function delete($tab)
    {
        return $this->unModele->delete($tab);
    }

    public function lastInsertId()
    {
        return $this->unModele->lastInsertId();
    }

    public function selectAll($table)
    {
        return $this->unModele->selectAll($table);
    }

    /****************************LES USERS****************************/
    public function verifConnection($email, $mdp)
    {
        return $this->unModele->verifConnection($email, $mdp);
    }

    public function verifConnectionMoniteur($email, $mdp)
    {
        return $this->unModele->verifConnectionMoniteur($email, $mdp);
    }

    public function selectWhere($table, $colonne, $valeur)
    {
        return $this->unModele->selectWhere($table, $colonne, $valeur);
    }

    public function selectAllWhere($table, $colonne, $valeur)
    {
        return $this->unModele->selectAllWhere($table, $colonne, $valeur);
    }

    public function selectWhere2($table, $colonne, $valeur, $colonne2, $valeur2)
    {
        return $this->unModele->selectWhere2($table, $colonne, $valeur, $colonne2, $valeur2);
    }

    public function selectHeuresMonit($table, $colonne, $valeur, $colonne2, $valeur2, $mois, $annee)
    {
        return $this->unModele->selectHeuresMonit($table, $colonne, $valeur, $colonne2, $valeur2, $mois, $annee);
    }

    public function selectAllHeuresMois($table, $valeur, $mois, $annee)
    {
        return $this->unModele->selectAllHeuresMois($table, $valeur, $mois, $annee);
    }

    public function selectAllHeuresAll($table, $valeur)
    {
        return $this->unModele->selectAllHeuresAll($table, $valeur);
    }

    public function selectAllHeuresMonit($table, $valeur)
    {
        return $this->unModele->selectAllHeuresMonit($table, $valeur);
    }

    public function selectAllHeuresEffectuees($table, $valeur)
    {
        return $this->unModele->selectAllHeuresEffectuees($table, $valeur);
    }

    public function Register($tab)
    {
        return $this->unModele->Register($tab);
    }

    public function addFormuleToUser($id_e, $typeFormule, $prix_f, $typeBoite)
    {
        $this->unModele->addFormuleToUser($id_e, $typeFormule, $prix_f, $typeBoite);
    }
}
