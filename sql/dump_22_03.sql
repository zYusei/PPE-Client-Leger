-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: autoecole
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cours_conduite`
--

DROP TABLE IF EXISTS `cours_conduite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cours_conduite` (
  `id_cc` int(11) NOT NULL AUTO_INCREMENT,
  `prixseance_cc` decimal(8,2) NOT NULL,
  `id_v` int(11) NOT NULL,
  `id_f` int(11) NOT NULL,
  PRIMARY KEY (`id_cc`),
  KEY `id_v` (`id_v`),
  KEY `id_f` (`id_f`),
  CONSTRAINT `cours_conduite_ibfk_1` FOREIGN KEY (`id_v`) REFERENCES `vehicule` (`id_v`),
  CONSTRAINT `cours_conduite_ibfk_2` FOREIGN KEY (`id_f`) REFERENCES `formule` (`id_f`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cours_conduite`
--

LOCK TABLES `cours_conduite` WRITE;
/*!40000 ALTER TABLE `cours_conduite` DISABLE KEYS */;
INSERT INTO `cours_conduite` VALUES (89,50.00,1,9),(90,50.00,1,9),(91,50.00,1,9),(93,50.00,3,29);
/*!40000 ALTER TABLE `cours_conduite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eleve` (
  `id_u` bigint(20) NOT NULL,
  `id_formation` int(11) DEFAULT NULL,
  `dateinscription` date DEFAULT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleve`
--

LOCK TABLES `eleve` WRITE;
/*!40000 ALTER TABLE `eleve` DISABLE KEYS */;
INSERT INTO `eleve` VALUES (10,29,'2023-02-10'),(18,29,'2023-02-16'),(26,NULL,'2023-02-24'),(27,9,'2023-03-17'),(28,NULL,'2023-03-11');
/*!40000 ALTER TABLE `eleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formule`
--

DROP TABLE IF EXISTS `formule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formule` (
  `id_f` int(11) NOT NULL AUTO_INCREMENT,
  `nom_f` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `prix_f` decimal(15,2) NOT NULL,
  `nb_heures` float(4,2) DEFAULT NULL,
  `type_boite` enum('Manuelle','Automatique') CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id_f`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formule`
--

LOCK TABLES `formule` WRITE;
/*!40000 ALTER TABLE `formule` DISABLE KEYS */;
INSERT INTO `formule` VALUES (1,'Code de la route',9.99,NULL,NULL),(2,'Permis B',599.00,20.00,'Manuelle'),(3,'Pack 5h conduite',200.00,NULL,NULL),(4,'Pack 10h conduite',350.00,NULL,NULL),(5,'Pack 20h conduite',600.00,NULL,NULL),(6,'1h évaluation',35.00,NULL,NULL),(7,'Conduite accompagné',999.00,NULL,NULL),(8,'Code Réussite',29.99,NULL,NULL),(9,'Permis B',749.00,25.00,'Manuelle'),(10,'Permis B',1059.00,30.00,'Manuelle'),(11,'Permis A1',560.00,20.00,NULL),(12,'Permis A2',560.00,20.00,NULL),(13,'Passerelle A2 vers A',225.00,7.00,NULL),(14,'Permis AM / BSR',243.00,8.00,NULL),(15,'Permis B',899.00,20.00,'Automatique'),(16,'Permis B',1049.00,25.00,'Automatique'),(17,'Permis B',1359.00,30.00,'Automatique'),(18,'Permis B accompagné',739.00,20.00,'Manuelle'),(19,'Permis B accompagné',889.00,25.00,'Manuelle'),(20,'Permis B accompagné',1199.00,30.00,'Manuelle'),(21,'Permis B accompagné',1039.00,20.00,'Automatique'),(22,'Permis B accompagné',1189.00,25.00,'Automatique'),(23,'Permis B accompagné',1499.00,30.00,'Automatique'),(24,'Permis B acceléré',899.00,20.00,'Manuelle'),(25,'Permis B acceléré',1049.00,25.00,'Manuelle'),(26,'Permis B acceléré',1359.00,30.00,'Manuelle'),(27,'Permis B acceléré',1199.00,20.00,'Automatique'),(28,'Permis B acceléré',1349.00,25.00,'Automatique'),(29,'Permis B acceléré',1659.00,30.00,'Automatique');
/*!40000 ALTER TABLE `formule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moniteur`
--

DROP TABLE IF EXISTS `moniteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moniteur` (
  `id_u` bigint(20) NOT NULL,
  `dateembauche` date NOT NULL,
  `dateobtentionbafm` date NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moniteur`
--

LOCK TABLES `moniteur` WRITE;
/*!40000 ALTER TABLE `moniteur` DISABLE KEYS */;
INSERT INTO `moniteur` VALUES (15,'2021-02-10','2020-01-01'),(21,'2023-01-04','2021-02-11'),(24,'2020-01-01','2019-01-01');
/*!40000 ALTER TABLE `moniteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_f` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_status` text NOT NULL,
  `payment_amount` text NOT NULL,
  `payment_currency` text NOT NULL,
  `payment_date` datetime NOT NULL,
  `payer_email` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_f` (`id_f`),
  CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_f`) REFERENCES `formule` (`id_f`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiement`
--

LOCK TABLES `paiement` WRITE;
/*!40000 ALTER TABLE `paiement` DISABLE KEYS */;
/*!40000 ALTER TABLE `paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photoeleve`
--

DROP TABLE IF EXISTS `photoeleve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photoeleve` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `type_photo` varchar(25) NOT NULL,
  `desc_photo` varchar(100) DEFAULT NULL,
  `taille_photo` varchar(25) NOT NULL,
  `nom_photo` varchar(50) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `id_eleve` (`id_eleve`),
  CONSTRAINT `photoeleve_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleve2` (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photoeleve`
--

LOCK TABLES `photoeleve` WRITE;
/*!40000 ALTER TABLE `photoeleve` DISABLE KEYS */;
/*!40000 ALTER TABLE `photoeleve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planning`
--

DROP TABLE IF EXISTS `planning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planning` (
  `id_cc` int(11) NOT NULL,
  `id_e` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `datehd` datetime NOT NULL,
  `datehf` datetime DEFAULT NULL,
  `etat` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `motifAnnulation` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `NbkmStatus` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_cc`,`id_e`,`id_m`,`datehd`),
  KEY `id_e` (`id_e`),
  KEY `id_m` (`id_m`),
  CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `user` (`id_u`),
  CONSTRAINT `planning_ibfk_2` FOREIGN KEY (`id_m`) REFERENCES `user` (`id_u`),
  CONSTRAINT `planning_ibfk_3` FOREIGN KEY (`id_cc`) REFERENCES `cours_conduite` (`id_cc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planning`
--

LOCK TABLES `planning` WRITE;
/*!40000 ALTER TABLE `planning` DISABLE KEYS */;
INSERT INTO `planning` VALUES (89,27,15,'2023-03-30 09:00:00','2023-03-30 10:00:00','Valider',NULL,0),(90,27,15,'2023-03-30 16:30:00','2023-03-30 17:30:00','En attente user',NULL,0),(91,27,15,'2023-03-31 11:00:00','2023-03-31 12:00:00','En attente user',NULL,0),(93,10,15,'2023-03-30 09:00:00','2023-03-30 10:00:00','En attente user',NULL,0);
/*!40000 ALTER TABLE `planning` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER AFFECTATION_MONITEUR BEFORE INSERT ON 
PLANNING FOR EACH ROW BEGIN 
	DECLARE id_moniteur INT;
	SELECT id_m INTO id_moniteur
	FROM planning
	WHERE id_e = NEW.id_e
	ORDER BY datehd ASC
	LIMIT 1;
	IF id_moniteur IS NULL THEN
	SELECT id_u INTO id_moniteur
	FROM USER
	WHERE
	    role_u = 'moniteur'
	    AND id_u NOT IN (
	        SELECT id_m
	        FROM planning
	    )
	LIMIT 1;
	END IF;
	IF id_moniteur IS NULL THEN
	SELECT id_m INTO id_moniteur
	FROM (
	        SELECT
	            id_m,
	            COUNT(*) AS nb_heures
	        FROM planning
	        GROUP BY id_m
	        ORDER BY
	            nb_heures ASC
	    ) AS t
	LIMIT 1;
	END IF;
	SET NEW.id_m = 15;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER AFFECTATION_VEHICULE AFTER INSERT ON 
PLANNING FOR EACH ROW BEGIN 
	declare idvehicule, x int;
	select count(*) into x
	from planning
	where
	    id_e = new.id_e
	    and id_cc != new.id_cc;
	if x > 0 then
	select id_v into idvehicule
	from
	    cours_conduite c,
	    planning p
	where
	    p.id_cc = c.id_cc
	    and datehf = (
	        select min(datehf)
	        from planning
	        where
	            id_e = new.id_e
	            and id_cc != new.id_cc
	    );
	ELSE
	select id_v into idvehicule
	from vehicule
	order by RAND()
	limit 1;
	END IF;
	IF idvehicule in (
	    select id_v
	    from
	        cours_conduite c,
	        planning p
	    where
	        c.id_cc = p.id_cc
	        and c.id_cc != new.id_cc
	        and (
	            new.datehd >= datehd
	            and new.datehd <= datehf
	            or new.datehf >= datehd
	            and new.datehf <= datehf
	        )
	) then (
	    select
	        id_v into idvehicule
	    from vehicule
	    where id_v not in (
	            select id_v
	            from
	                cours_conduite c,
	                planning p
	            where
	                c.id_cc = p.id_cc
	                and c.id_cc != new.id_cc
	                and (
	                    new.datehd >= datehd
	                    and new.datehd <= datehf
	                    or new.datehf >= datehd
	                    and new.datehf <= datehf
	                )
	        )
	    order by RAND()
	    limit 1
	);
	END IF;
	update cours_conduite
	set id_v = idvehicule
	where id_cc = new.id_cc;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `questions_quiz`
--

DROP TABLE IF EXISTS `questions_quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions_quiz` (
  `id_qq` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `choix` json NOT NULL,
  `reponse` json NOT NULL,
  `explication` longtext,
  `subTitre` varchar(250) DEFAULT NULL,
  `subChoix` json DEFAULT NULL,
  `subReponse` json DEFAULT NULL,
  `subExplication` longtext,
  PRIMARY KEY (`id_qq`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions_quiz`
--

LOCK TABLES `questions_quiz` WRITE;
/*!40000 ALTER TABLE `questions_quiz` DISABLE KEYS */;
INSERT INTO `questions_quiz` VALUES (1,'./images/Quiz/Question-1878.jpg','Le feu est vert depuis longtemps :','{\"A\": \"Je passe\", \"B\": \"Je ralentis\", \"C\": \"J\'accelere\"}','{\"A\": \"Je passe\"}','Le feu est vert depuis longtemps donc il pourrait passer à l\'orange. Il est préférable de ralentir au cas où celui-ci change de couleur. Je ralentis en lâchant l\'accélérateur et je mets mon pied devant le frein.',NULL,NULL,NULL,NULL),(2,'./images/Quiz/Question-2907.jpg','Parmi les enfants tués lors d\'un accident mortel, quel est le pourcentage sur des trajets inférieurs à 3 km :','{\"A\": \"10%\", \"B\": \"20%\", \"C\": \"30%\", \"D\": \"40%\"}','{\"D\": \"40%\"}','L\'excès de confiance est l\'une des grandes causes des accidents. La plupart des tués sur la route le sont à proximité de leur domicile (80 % des accidents mortels ont lieu dans le département du conducteur).Cette tendance se retrouve chez les enfants: 40 % des accidents mortels des enfants passagers ont lieu au cours de trajets de moins de 3 km, donc le plus souvent très près de la où ils habitent.',NULL,NULL,NULL,NULL),(3,'./images/Quiz/Question-4741.jpg','Je sors mon enfant endormi de la voiture :','{\"A\": \"Quel que soit le temps\", \"B\": \"L\'été quand il fait chaud\", \"C\": \"L\'hiver quand il fait froid\"}','{\"A\": \"Quel que soit le temps\"}','Je sors mon enfant endormi de la voiture par tous les temps car je ne dois jamais laisser un enfant seul dans la voiture.',NULL,NULL,NULL,NULL),(4,'./images/Quiz/Question-4752.jpg','Mon véhicule connait un problème mécanique. J\'allume mes feux de détresse et circule à allure réduite :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','J\'allume mes feux de détresse si je dois circuler à allure réduite à cause d\'un problème mécanique. Certains problèmes mécaniques (signale au tableau de bord par un voyant rouge) imposent un arrêt immédiat. Dans les autres cas, si je choisis de continuer de rouler, je dois le faire très prudemment (donc a allure réduite), et pour ne pas risquer de surprendre les autres usagers j\'allume mes feux de détresse.',NULL,NULL,NULL,NULL),(5,'./images/Quiz/Question-4764.jpg','La position de cette conductrice est :','{\"A\": \"Idéale\", \"B\": \"Conseillée\", \"C\": \"Dangereuse\", \"D\": \"Sécuritaire\"}','{\"C\": \"Dangereuse\"}','La position de cette conductrice est dangereuse car il ne faut surtout pas avoir les deux bras tendus jusqu\'au volant. Une bonne position de conduite permet d\'avoir les bras semi-fléchis quand les mains sont positionnées à 10h10.',NULL,NULL,NULL,NULL),(6,'./images/Quiz/Question-4778.jpg','Cette molette permet d\'effectuer des appels lumineux :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Cette molette sert à régler la hauteur des feux de croisement et non à effectuer des appels lumineux.',NULL,NULL,NULL,NULL),(7,'./images/Quiz/Question-4779.jpg','Mon contrôle technique a été jugé défavorable pour au moins une défaillance majeure, je dois effectuer les réparations dans un délai de :','{\"A\": \"1 mois\", \"B\": \"2 mois\"}','{\"B\": \"2 mois\"}','Mon contrôle technique a ete juge défavorable pour au moins une défaillance majeure;\nje dois effectuer les réparations dans un délai de 2 mois. Le contrôle technique est valide pendant 2 mois pendant lesquels je dois effectuer la contre-visite après avoir realise les réparations.',NULL,NULL,NULL,NULL),(8,'./images/Quiz/Question-4780.jpg','La principale zone d\'incertitude se trouve en zone :','{\"A\": \"A\", \"B\": \"B\", \"C\": \"C\"}','{\"C\": \"C\"}','La principale zone d\'incertitude se trouve en zone C car je ne sais pas si les piétons qui marchent déjà sur la chaussée vont traverser. Je ralentis fortement et analyse leur comportement.',NULL,NULL,NULL,NULL),(9,'./images/Quiz/Question-4782.jpg','Une femme enceinte peut être dispensée du port de la ceinture de sécurité sur certificat médical d\'un médecin agréé.','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Même si cela demeure dangereux pour le bébé et la maman en cas d\'accident (blessures plus graves), il est en effet possible d\'être dispensé du port de la ceinture de sécurité sur certificat médical. Cette dispense ne concerne pas que les femmes enceintes : n\'importe quelle raison médicale peut amener un médecin à délivrer un certificat de dispense. La personne concernée doit se déplacer avec le certificat pour pouvoir le présenter aux forces de l\'ordre.',NULL,NULL,NULL,NULL),(10,'./images/Quiz/Question-4781.jpg','J\'ai oublié mon certificat d\'immatriculation lors d\'un contrôle routier, je risque une amende.','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Je risque en effet une amende de 11 euros si je présente le document dans les 5 jours au commissariat ou à la gendarmerie, et 135 euros si je dépasse ce délai.','Mon véhicule est immobilisé :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Mon véhicule n\'est pas immobilisé même si je ne peux pas présenter le certificat d\'immatriculation.'),(11,'./images/Quiz/Question-4793.jpg','Par ce temps, j\'utilise :','{\"A\": \"Les feux de position seuls\", \"B\": \"Les feux de croisement\", \"C\": \"Les feux de route\", \"D\": \"Les feux de brouillard arriere\"}','{\"B\": \"Les feux de croisement\"}','Par temps de pluie (comme chaque fois que la visibilité est dégradée), j\'utilise les feux de croisement. Je n\'utilise pas les feux de position seuls, qui ne me permettent pas de mieux voir. Surtout, je n\'utilise pas les feux de route et feux de brouillard arrière qui éblouissent par temps de pluie et sont donc interdits.',NULL,NULL,NULL,NULL),(12,'./images/Quiz/Question-4794.jpg','Téléphoner au volant perturbe la recherche visuelle d\'indices par le conducteur.','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Téléphoner au volant perturbe la recherche d\'indices de tous types (visuels, auditifs...) par le conducteur. Le conducteur analyse aussi moins bien les situations car son cerveau réalise plusieurs tâches à la fois. C\'est la raison pour laquelle l\'usage du téléphone au volant est interdit et sanctionné par une amende forfaitaire de 135 euros et un retrait de 3 points.',NULL,NULL,NULL,NULL),(13,'./images/Quiz/Question-4797.jpg','Sur un trajet de 500 km, rouler à 120 km/h au lieu de 130 km/h sur autoroute permet d\'économiser jusqu\'à :','{\"A\": \"2 litres de carburant\", \"B\": \"3 litres de carburant\", \"C\": \"4 litres de carburant\", \"D\": \"5 litres de carburant\"}','{\"D\": \"5 litres de carburant\"}','On estime que rouler 10 km/h moins vite permet d\'économiser 1L tous les 100 km. Donc sur un trajet de 500 km (ce qui fait 5 fois 100 km), cela permet d\'économiser jusqu\'à 5 litres de carburant.',NULL,NULL,NULL,NULL),(14,'./images/Quiz/Question-4799.jpg','Lorsque je change une roue, je finis de serrer les écrous quand la roue est au sol.','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Lorsque je change une roue, je serre les écrous légèrement quand la roue est en l\'air, mais pas à fond. Pour finir le serrage, je dois descendre la voiture jusqu\'à ce que la roue soit au sol, et seulement ensuite je finis de serrer complètement les écrous.',NULL,NULL,NULL,NULL),(15,'./images/Quiz/Question-4796.jpg','Des conditions idéales de circulation peuvent :','{\"A\": \"Diminuer mon attention\", \"B\": \"Augmenter mon attention\"}','{\"A\": \"Diminuer mon attention\"}','Des conditions idéales de circulation peuvent paradoxalement diminuer mon attention car celle-ci n\'est pas maintenue en éveil par l\'arrivée de nouveaux éléments sur la route.','Le risque de fatigue :','{\"A\": \"Diminue\", \"B\": \"Augmente\"}','{\"B\": \"Augmente\"}','Le risque de fatigue augmente à cause de la monotonie du trajet.'),(16,'./images/Quiz/Question-4805.jpg','Au STOP, je m\'arrête :','{\"A\": \"A hauteur du panneau\", \"B\": \"À la limite de la chaussée abordée\"}','{\"B\": \"À la limite de la chaussée abordée\"}','On s\'arrête toujours au niveau de la ligne d\'effet du Stop, si elle est matérialisée par un marquage au sol. A défaut de ligne de Stop, on s\'arrête à la limite de la chaussée abordée, de façon à pouvoir vérifier qu\'aucun véhicule n\'arrive sans pour autant dépasser sur la voie sur laquelle il circulerait.',NULL,NULL,NULL,NULL),(17,'./images/Quiz/Question-4806.jpg','Le stationnement du véhicule blanc est autorisé :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Il est strictement interdit de s\'arrêter ou de stationner à proximité d\'une intersection.','Son conducteur risque un retrait de 3 points :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Un arrêt ou un stationnement à proximité des intersections est sanctionné d\'une amende de 135 euros, d\'un retrait de 3 points et d\'une suspension maximale de 3 ans du permis de conduire. Notez bien que c\'est le conducteur et non pas le propriétaire du véhicule qui encourt le retrait de points et la suspension.'),(20,'./images/Quiz/Question-4809.jpg','Certaines villes développent des modes de transport différents pour limiter l\'utilisation de la voiture :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Certaines villes développent des modes de transport différents pour limiter l\'utilisation de la voiture en créant des lignes de tramway, de bus et en offrant des services de vélos et de voitures en autopartage.',NULL,NULL,NULL,NULL),(21,'./images/Quiz/Question-4811.jpg','Ce motocycliste a allumé ses feux. Je klaxonne :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Les motocyclistes ont l\'obligation de circuler avec leurs feux de croisement, même de jour donc je ne klaxonne pas. De plus, l\'usage du klaxon en agglomération est interdit, sauf danger immédiat.','J\'effectue un appel lumineux :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Je n\'effectue pas non plus d\'appel lumineux.'),(22,'./images/Quiz/Question-4812.jpg','Lorsque je ralentis, je diminue mon temps de réaction :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Ralentir ne diminue pas mon temps de réaction car ce temps dépend de l\'état du conducteur. Seule une anticipation accrue de la part du conducteur peut diminuer le temps de réaction.','Je diminue ma distance d\'arrêt :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','En revanche, ralentir permet de diminuer la distance d\'arrêt car cette distance dépend de notre vitesse.'),(23,'./images/Quiz/Question-4813.jpg','Conduire en ayant consommé de l\'alcool accentue le risque d\'éblouissement :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Dès le premier verre d\'alcool, des effets dangereux se font sentir, qui affectent notamment la vision : celle-ci peut se doubler, se troubler, le champ de vision est réduit, et les yeux sont plus sensibles à l\'éblouissement.','Cela risque de rendre le regard fixe :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','La consommation d\'alcool rend en effet le regard fixe.'),(24,'./images/Quiz/Question-4800.jpg','Les usagers en fauteuil roulant ont le droit de circuler sur la chaussée :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Les usagers en fauteuil roulant ont en effet le droit de circuler sur la chaussée. Il faut faire très attention à eux car leur vitesse est réduite.',NULL,NULL,NULL,NULL),(25,'./images/Quiz/Question-4814.jpg','Les remorques sont équipées de dispositifs réfléchissants :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Les remorques sont équipées de dispositifs réfléchissants afin de mieux les percevoir.','Je me prépare à effectuer un dépassement plus long :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Je me prepare a effectuer un depassement plus long car le vehicule + la remorque sont plus longs qu\'un vehicule leger normal sans remorque.'),(26,'./images/Quiz/Question-4801.jpg','Sur autoroute a 130 km/h, je parcours en 1 seconde :','{\"A\": \"13 m\", \"B\": \"26 m\", \"C\": \"30 m\", \"D\": \"39 m\"}','{\"D\": \"39 m\"}','À 130 km/h, je parcours en 1 seconde 39 mètres. Pour calculer, je multiplie le chiffre des dizaines par 3 soit 13 x 3 = 39 m.',NULL,NULL,NULL,NULL),(27,'./images/Quiz/Question-4802.jpg','Dans cette agglomération, j\'allume :','{\"A\": \"Mes feux de croisement\", \"B\": \"Mes feux de route\"}','{\"B\": \"Mes feux de route\"}','Lorsque la route n\'est pas éclairée et que je suis seul, j\'allume les feux de route même en agglomération !',NULL,NULL,NULL,NULL),(28,'./images/Quiz/Question-4804.jpg','Grâce au radar de recul, je n\'ai pas besoin de regarder derrière moi en me retournant :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Même si je dispose d\'un radar de recul, je dois toujours regarder derrière moi en me retournant pour voir en vision directe ce qu\'il se passe.',NULL,NULL,NULL,NULL),(29,'./images/Quiz/Question-4803.jpg','Je vérifie l\'épaisseur du disque de frein :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Je vérifie l\'épaisseur du disque de frein en cas de dysfonctionnement des freins ou de perte de freinage. Cette vérification se fait chez un garagiste.','Je vérifie l\'épaisseur des garnitures des plaquettes de frein :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Je vérifie également l\'épaisseur des garnitures des plaquettes de frein car ce sont elles qui assurent une bonne qualité de freinage.'),(30,'./images/Quiz/Question-4784.jpg','En présence de ce panneau, je peux dépasser :','{\"A\": \"Des voitures\", \"B\": \"Des motos sans side car\", \"C\": \"Des motos avec side car\"}','{\"B\": \"Des motos sans side car\"}','En présence de ce panneau, je peux dépasser uniquement des motos sans side-car.',NULL,NULL,NULL,NULL),(31,'./images/Quiz/Question-4783.jpg','Je surveille la trajectoire de ce cycliste :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Je surveille ce cycliste car il regarde à sa gauche comme s\'il voulait tourner.','Je surveille le regard de ce cycliste :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Je surveille donc particulièrement son regard pour savoir la où il va tourner.'),(33,'./images/Quiz/Question-4785.jpg','Le non-respect des distances de sécurité entraine une perte de :','{\"A\": \"2 points\", \"B\": \"3 points\"}','{\"B\": \"3 points\"}','Le non-respect des distances de sécurité entraine une perte de 3 points. Le Code de la route prévoit aussi une amende forfaitaire de 135 euros, et la possibilité d\'une suspension de permis pour 3 ans maximum.','En période probatoire, cette sanction entraine l\'obligation de suivre un stage pedagogique :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','En période probatoire, cette sanction entraine en effet l\'obligation de suivre un stage pédagogique car ce dernier est obligatoire dès qu\'une perte de 3 points est enregistrée.'),(34,'./images/Quiz/Question-4787.jpg','La principale zone d\'incertitude se trouve en zone :','{\"A\": \"A\", \"B\": \"B\", \"C\": \"C\"}','{\"C\": \"C\"}','La principale zone d\'incertitude se trouve en zone C car le bus masque les usagers qui pourraient être présents à droite du passage piétons.',NULL,NULL,NULL,NULL),(35,'./images/Quiz/Question-4789.jpg','Dans cette situation, les feux adaptatifs permettent de mieux voir :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','À l\'approche des virages, les feux adaptatifs améliorent la visibilité car ils suivent le tracé de la route dans le virage. Vous avez ainsi une bonne visibilité tout au long de la courbe du virage.',NULL,NULL,NULL,NULL),(36,'./images/Quiz/Question-4788.jpg','Un motocycliste se plaint de ne pas bien respirer aprés son accident :','{\"A\": \"Je retire son casque\", \"B\": \"J\'ouvre l\'écran ou visiere du casque\"}','{\"B\": \"J\'ouvre l\'ecran ou visiere du casque\"}','Je ne dois surtout pas retirer son casque car cela pourrait causer des blessures irréversibles. Je peux en revanche ouvrir la visière ou l\'écran de son casque afin qu\'il respire mieux.','Il se plaint également de maux de dos. Je le déplace pour l\'asseoir :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Je ne dois surtout pas le déplacer car cela pourrait causer des blessures irréversibles. Je peux en revanche le couvrir car un blessé en état de choc a froid.'),(37,'./images/Quiz/Question-4791.jpg','J\'utilise ce constat lors d\'un accident survenu en voyage en Europe :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Les constats européens d\'accident sont faits selon un modèle qui est le même dans tous les pays : les informations sont les mêmes, demandées dans le même ordre, la page est identique. Ils peuvent donc être utilisés dans tous les pays européens, peu importe la langue dans laquelle ils ont été imprimés.',NULL,NULL,NULL,NULL),(38,'./images/Quiz/Question-4792.jpg','Lorsque j\'anticipe une situation, je réduis mon temps de réaction :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Lorsque j\'anticipe les situations et les zones à risque, je réduis mon temps de réaction car ma décision sera plus rapide.',NULL,NULL,NULL,NULL),(39,'./images/Quiz/Question-4790.jpg','Pour emprunter la voie tout à gauche, je dois être abonné au télépéage :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Pour emprunter la voie tout à gauche, je dois en effet être abonné au télépéage.','Je paierai par carte bancaire :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Je ne paierai pas par carte bancaire justement grâce au télépéage. J\'ai un bipeur dans ma voiture qui permet l\'ouverture de la barrière automatiquement.'),(40,'./images/Quiz/Question-4697.jpg','Dans cette position :','{\"A\": \"Je suis correctement installé\", \"B\": \"Je peux dormir en toute sécurité\", \"C\": \"Je risque des blessures en cas d\'ouverture de l\'airbag\"}','{\"C\": \"Je risque des blessures en cas d\'ouverture de l\'airbag\"}','Dans cette position, je risque des blessures en cas d\'ouverture de l\'airbag. Il ne faut surtout pas adopter ce genre d\'installation très dangereuse quoique très répandue sur les routes de vacances.',NULL,NULL,NULL,NULL),(41,'./images/Quiz/Question-4701.jpg','Je vérifie régulierement la pression de la roue de secours :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Je dois en effet vérifier régulièrement la pression de la roue de secours pour ne pas avoir de mauvaise surprise en cas de panne.',NULL,NULL,NULL,NULL),(42,'./images/Quiz/Question-4704.jpg','Le niveau d\'huile moteur est suffisant :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Le niveau d\'huile n\'est pas suffisant car il n\'y a pas d\'huile entre les deux témoins d\'indication du niveau. Il faut bien comprendre comment lire l\'indication du niveau d\'huile : il y a deux indications sur la tige : min et max (ici symbolisées par les 2 triangles). Il faut regarder attentivement la photo pour les repérer. Ensuite, il faut regarder jusqu\'où l\'huile moteur est montée à partir du bas de la tige. Si le niveau d\'huile se situe proche (ou pire : en dessous) du niveau minimal, il vous faudra alors ajouter de l\'huile. Si le niveau se situe juste en dessous de la graduation maximale, tout va bien !','Je dois rajouter de l\'huile :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Il faut donc rajouter de l\'huile moteur au plus vite pour éviter une casse moteur.'),(43,'./images/Quiz/Question-4706.jpg','Ce panneau indique :','{\"A\": \"Un virage\", \"B\": \"Une voie de détresse\"}','{\"B\": \"Une voie de détresse\"}','Ce panneau indique une voie de détresse se situant à droite. La voie de détresse se rencontre dans les pentes descendantes, pour les véhicules dont les freins sont défaillants, elles sont repérées par un panneau particulier (représenté sur la photo) et se finissent par un bac à sable pour freiner le véhicule. Souvent, il y a un marquage au sol (damier rouge et blanc).',NULL,NULL,NULL,NULL),(44,'./images/Quiz/Question-4723.jpg','L\'autopartage désigne :','{\"A\": \"Une aide à la conduite\", \"B\": \"Un mode de location de véhicules\"}','{\"B\": \"Un mode de location de véhicules\"}','L\'autopartage designe un mode de location de vehicules. L\'autopartage est la mise en commun d\'une flotte de vehicules a moteur au profit d\'abonnes, dans lequel chaque abonne peut utiliser un vehicule pour le trajet de son choix et pour une duree limitee. Ainsi, les abonnes n\'ont pas besoin d\'avoir un vehicule individuel.',NULL,NULL,NULL,NULL),(45,'./images/Quiz/Question-4726.jpg','Les enfants de moins de 8 ans peuvent circuler en velo sur les trottoirs :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Les enfants de moins de 8 ans peuvent en effet circuler sur les trottoirs. C\'est pourquoi il faut faire tres attention quand on conduit une voiture en ville. Au-dela de 8 ans, cela devient une infraction passible d\'une amende.',NULL,NULL,NULL,NULL),(46,'./images/Quiz/Question-4739.jpg','J\'ai bien fixe le siege enfant. Il est inutile d\'attacher mon bebe','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Meme si le bebe est installe dans le siege bebe, il est obligatoire de l\'attacher avec la ceinture de securite du siege ou celle de la voiture selon la taille du siege enfant. C\'est une question de bon sens : ce qui importe pour assurer la securite des passagers, c\'est d\'avoir un systeme pour les retenir en cas de choc, pour qu\'ils ne soient pas ejectes.',NULL,NULL,NULL,NULL),(47,'./images/Quiz/Question-4742.jpg','Dans ces conditions climatiques, je roule a 50 km/h :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"A\": \"Oui\"}','Lorsqu\'il y a un brouillard epais sur la route, je dois rouler a 50 km/h, meme sur autoroute.',NULL,NULL,NULL,NULL),(48,'./images/Quiz/Question-4755.jpg','Le voyant du bas entoure correspond au :','{\"A\": \"Regulateur de vitesse\", \"B\": \"Limiteur de vitesse\"}','{\"B\": \"Limiteur de vitesse\"}','Le voyant du bas entoure correspond au limiteur de vitesse, on le reconnait au petit picto representant un panneau de limitation de vitesse sur la droite du dessin. Le voyant juste au-dessus est le regulateur de vitesse, on le reconnait a la fleche a gauche qui symbolise la vitesse-cible que le regulateur va s\'efforcer de viser et maintenir.',NULL,NULL,NULL,NULL),(49,'./images/Quiz/Question-4756.jpg','Les principales commandes utiles a la conduite sont situees :','{\"A\": \"Sur le tableau de bord\", \"B\": \"Sur des commodos autour du volant\"}','{\"B\": \"Sur des commodos autour du volant\"}','Les principales commandes utiles a la conduite sont situees sur des commodos autour du volant.',NULL,NULL,NULL,NULL),(50,'./images/Quiz/Question-4760.jpg','En commettant un delit de fuite, je risque une suspension de mon permis de conduire pour une duree maximum de :','{\"A\": \"3 ans\", \"B\": \"5 ans\"}','{\"B\": \"5 ans\"}','En commettant un delit de fuite, je risque une suspension de mon permis de conduire pour une duree maximum de 5 ans. A noter : cette suspension ne peut pas etre limitee a la conduite hors activite professionnelle (en d\'autres termes : la suspension est totale, pour les activites privees ET pour les activites professionnelles).','Je pourrais conduire dans le cadre de mon activite professionnelle :','{\"A\": \"Oui\", \"B\": \"Non\"}','{\"B\": \"Non\"}','Je ne pourrais pas conduire dans le cadre de mon activite professionnelle.');
/*!40000 ALTER TABLE `questions_quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roule`
--

DROP TABLE IF EXISTS `roule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roule` (
  `id_v` int(11) NOT NULL,
  `annee_mois` year(4) NOT NULL,
  `nb_km_mois` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id_v`),
  CONSTRAINT `roule_ibfk_1` FOREIGN KEY (`id_v`) REFERENCES `vehicule` (`id_v`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roule`
--

LOCK TABLES `roule` WRITE;
/*!40000 ALTER TABLE `roule` DISABLE KEYS */;
/*!40000 ALTER TABLE `roule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom_u` varchar(255) NOT NULL,
  `prenom_u` varchar(255) NOT NULL,
  `datenaissance_u` date NOT NULL,
  `email_u` varchar(255) NOT NULL,
  `tel_u` char(10) NOT NULL,
  `adresse_u` varchar(255) NOT NULL,
  `ville_u` varchar(255) NOT NULL,
  `codepos_u` varchar(5) NOT NULL,
  `sexe_u` char(1) DEFAULT NULL,
  `role_u` enum('eleve','moniteur','admin') NOT NULL,
  `mdp_u` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id_u`),
  UNIQUE KEY `UNIQUE_EMAIL` (`email_u`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (10,'Tdzdzest','tdzdzest','2023-01-04','a@gmail.com','0612345678','12 rue du portail','Montfermeil','93370','M','eleve','40bd001563085fc35165329ea1ff5c5ecbdbbeef','',''),(15,'285852','485584','2023-01-04','monit@gmail.com','0612345678','12 rue rue','Clivhy','52752','M','moniteur','40bd001563085fc35165329ea1ff5c5ecbdbbeef','',''),(16,'admin','admin','2023-01-04','admin@gmail.com','0612345678','12 rue rue','grgr','52752',NULL,'admin','40bd001563085fc35165329ea1ff5c5ecbdbbeef','rrr','rrr'),(18,'Lamouche','Louis','2023-02-15','louis.lamouche2204@gmail.com','0679564775','53 Avenue des Palmiers','Montfermeil','93370','M','eleve','40bd001563085fc35165329ea1ff5c5ecbdbbeef','Quelle est votre couleur préférée ?','rouge'),(21,'test','test','2023-02-08','test@test.fr','test','test','test','test','M','moniteur','51eac6b471a284d3341d8c0c63d0f1a286262a18','Quelle est votre couleur pr?f?r?e ?','rouge'),(24,'zdqz','qdz','2000-01-01','email','tel','adresse','ville','cp','M','moniteur','40bd001563085fc35165329ea1ff5c5ecbdbbeef','question','reponse'),(26,'testeee','testeee','2023-02-15','d@gmail.com','testeee','testeee','testeee','teste','M','eleve','40bd001563085fc35165329ea1ff5c5ecbdbbeef','Quelle est votre couleur pr?f?r?e ?','rouge'),(27,'Lamouche','Louis','2004-04-22','louis.lamouche2@gmail.com','0679564775','53 Avenue des Palmiers','Montfermeil','93370','M','eleve','40bd001563085fc35165329ea1ff5c5ecbdbbeef','Quelle est votre couleur préférée ?','rouge');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER HASH_PASSWORD BEFORE INSERT ON USER 
FOR EACH ROW BEGIN 
SET NEW.mdp_u = SHA1(NEW.mdp_u);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER INSERT_ELEVE AFTER INSERT ON USER FOR 
EACH ROW BEGIN 
IF NEW.role_u = 'eleve' THEN
INSERT INTO eleve
VALUES (NEW.id_u, null, curdate());
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER HASH_PASSWORD_UPDATE before update on user for each row begin IF NEW.mdp_u <> OLD.mdp_u THEN
SET NEW.mdp_u = SHA1(NEW.mdp_u);
END IF; END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicule` (
  `id_v` int(11) NOT NULL AUTO_INCREMENT,
  `type_v` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `model_v` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `marque_v` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `annneimmatri_v` year(4) NOT NULL,
  `anneachat_v` year(4) NOT NULL,
  PRIMARY KEY (`id_v`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicule`
--

LOCK TABLES `vehicule` WRITE;
/*!40000 ALTER TABLE `vehicule` DISABLE KEYS */;
INSERT INTO `vehicule` VALUES (1,'4 roue diesel','206','renault',2019,2020),(2,'4 roue diesel','Civic','Honda',2020,2021),(3,'hybride','308','peugeot',2019,2021),(4,'4 roue diesel','C4','citroën',2018,2020);
/*!40000 ALTER TABLE `vehicule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'autoecole'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `mettre_a_jour_etat` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = cp850 */ ;;
/*!50003 SET character_set_results = cp850 */ ;;
/*!50003 SET collation_connection  = cp850_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `mettre_a_jour_etat` ON SCHEDULE EVERY 1 MINUTE STARTS '2023-03-01 17:24:02' ON COMPLETION NOT PRESERVE ENABLE DO CALL verifier_et_mettre_a_jour_etat() */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'autoecole'
--
/*!50003 DROP PROCEDURE IF EXISTS `verifier_et_mettre_a_jour_etat` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `verifier_et_mettre_a_jour_etat`()
BEGIN
  UPDATE planning SET etat = 'Effectuer'
  WHERE datehf < NOW() AND etat = 'Valider';

  UPDATE planning SET etat = 'Annuler', motifAnnulation = 'Date de validation d?pass?e'
  WHERE datehf < NOW() AND etat IN ('En attente user', 'En attente moniteur');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-22 19:46:27
