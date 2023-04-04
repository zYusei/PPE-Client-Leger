<?php
class Modele
{
    private $unPDO;
    private $table; //table générique du modele

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->unPDO = null;
        try {
            $url = "mysql:host=" . $serveur . ";dbname=" . $bdd;
            $this->unPDO = new PDO(
                $url,
                $user,
                $mdp,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch (PDOException $exp) {
            echo "<br> Erreur de connexion à la BDD!";
            echo $exp->getMessage();
        }
    }

    public function setTable($uneTable)
    {
        $this->table = $uneTable;
    }

    public function verifConnection($email, $mdp)
    {
        if ($this->unPDO != null) {
            $requete = "select * from user where EMAIL_U=:email and MDP_U=:mdp;";
            $donnees = array(
                ":email" => $email,
                ":mdp" => $mdp
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetch();
            return $unUser;
        } else {
            return null;
        }
    }

    public function verifConnectionMoniteur($email, $mdp)
    {
        if ($this->unPDO != null) {
            $requete = "select * from moniteur where email_m=:email and mdp_m=:mdp;";
            $donnees = array(
                ":email" => $email,
                ":mdp" => $mdp
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetch();
            return $unUser;
        } else {
            return null;
        }
    }

    public function insert($tab)
    {
        if ($this->unPDO != null) {
            $chaineChamps = array();
            foreach ($tab as $cle => $valeur) {
                $tabChamps[] = ":" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(",", $tabChamps);
            $requete = "insert into " . $this->table . " values (" . $chaineChamps . ");";
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
        }
    }

    public function update($tab, $colonne, $valeur)
    {
        if ($this->unPDO != null) {
            $chaineChamps = array();
            foreach ($tab as $cle => $value) {
                $tabChamps[] = $cle . "=:" . $cle;
                $donnees[":" . $cle] = $value;
            }
            $chaineChamps = implode(",", $tabChamps);
            $requete = "update " . $this->table . " set " . $chaineChamps . " where " . $colonne . "=:valeur;";
            $donnees[":valeur"] = $valeur;
            $update = $this->unPDO->prepare($requete);
            $update->execute($donnees);
        }
    }

    public function delete($tab)
    {
        if ($this->unPDO != null) {
            $chaineChamps = array();
            foreach ($tab as $cle => $valeur) {
                $tabChamps[] = $cle . "=:" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(" and ", $tabChamps);
            $requete = "delete from " . $this->table . " where " . $chaineChamps . ";";
            $delete = $this->unPDO->prepare($requete);
            $delete->execute($donnees);
        }
    }

    public function lastInsertId()
    {
        return $this->unPDO->lastInsertId();
    }

    public function selectWhere($table, $colonne, $valeur)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where " . $colonne . "=:valeur;";
            $donnees = array(
                ":valeur" => $valeur
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetch();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllWhere($table, $colonne, $valeur)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where " . $colonne . "=:valeur;";
            $donnees = array(
                ":valeur" => $valeur
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectWhere2($table, $colonne, $valeur, $colonne2, $valeur2)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where " . $colonne . "=:valeur and " . $colonne2 . "=:valeur2;";
            $donnees = array(
                ":valeur" => $valeur,
                ":valeur2" => $valeur2
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectHeuresMonit($table, $colonne, $valeur, $colonne2, $valeur2, $mois, $annee)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where " . $colonne . "=:valeur and " . $colonne2 . "!=:valeur2 and month(datehd)=:mois and year(datehd)=:annee order by datehd desc;";
            $donnees = array(
                ":valeur" => $valeur,
                ":valeur2" => $valeur2,
                ":mois" => $mois,
                ":annee" => $annee
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAll($table)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . ";";
            $select = $this->unPDO->prepare($requete);
            $select->execute();
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllHeuresMois($table, $valeur, $mois, $annee) //Toutes les heures d'un mois
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where id_e=:valeur and month(datehd)=:mois and year(datehd)=:annee order by datehd desc;";
            $donnees = array(
                ":valeur" => $valeur,
                ":mois" => $mois,
                ":annee" => $annee
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllHeuresAll($table, $valeur) //Toutes les heures
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where id_e=:valeur order by datehd asc;";
            $donnees = array(
                ":valeur" => $valeur,
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllHeuresMonit($table, $valeur)
    {
        if ($this->unPDO != null) {
            $requete = "select * from " . $table . " where id_m=:valeur order by datehd desc;";
            $donnees = array(
                ":valeur" => $valeur,
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function selectAllHeuresEffectuees($table, $valeur)
    {
        if ($this->unPDO != null) {
            $requete = "select datehd, datehf from " . $table . " where id_e=:valeur and etat='Effectuer'";
            $donnees = array(
                ":valeur" => $valeur,
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetchAll();
            return $unUser;
        } else {
            return null;
        }
    }

    public function Register($tab)
    {
        if ($this->unPDO != null) {
            $requete = "insert into user values (null, :nom, :prenom, :date, :email, :tel, :adr, :ville, :cp, :sexe, :role, :mdp, :security_question, :security_answer);";
            $donnees = array(
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":date" => $tab['date'],
                ":email" => $tab['email'],
                ":tel" => $tab['tel'],
                ":adr" => $tab['adr'],
                ":ville" => $tab['ville'],
                ":cp" => $tab['cp'],
                ":sexe" => $tab['sexe'],
                ":role" => 'eleve',
                ":mdp" => $tab['mdp'],
                ":security_question" => $tab['security_question'],
                ":security_answer" => $tab['security_answer']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees);
            $unUser = $this->verifConnection($tab['email'], sha1($tab['mdp']));
            return $unUser;
        } else {
            return null;
        }
    }

    public function addFormuleToUser($id_u, $typeFormule, $prix_f, $typeBoite)
    {
        if ($this->unPDO != null) {

            $requete = "";
            $donnees = array();



            switch ($typeFormule) { //On prépare les requettes et les valeurs en fonction du type de formule
                case "PermisB":
                    $requete = "select id_f from formule where nom_f like '%Permis B%' and prix_f = :prix_f and type_boite = :typeBoite ;";
                    $donnees = array(
                        ":prix_f" => $prix_f,
                        ":typeBoite" => $typeBoite
                    );
                    break;
                case "PermisA":
                    $requete = "select id_f from formule where nom_f like '%Permis A%' and prix_f = :prix_f ;";
                    $donnees = array(
                        ":prix_f" => $prix_f
                    );
                    break;
                case "Code":
                    $requete = "select id_f from formule where nom_f like '%Code%' and prix_f = :prix_f ;";
                    $donnees = array(
                        ":prix_f" => $prix_f
                    );
                    break;
            }



            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $idFormule = $select->fetch(); //On récupère l'id de la formule que l'utilisateur a choisi

            $requete = "update eleve set id_formation = :idFormule where id_u = :id_u;"; //On ajoute l'id de la formule à l'utilisateur
            $donnees = array(
                ":id_u" => $id_u,
                ":idFormule" => $idFormule['id_f']
            );
            $insert = $this->unPDO->prepare($requete);
            $insert->execute($donnees); //On ajoute l'id de la formule à l'utilisateur
        }
    }
}
