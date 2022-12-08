/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.4.21-MariaDB : Database - db_prodi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_prodi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_prodi`;

/*Table structure for table `mahasiswas` */

DROP TABLE IF EXISTS `mahasiswas`;

CREATE TABLE `mahasiswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mahasiswas` */

insert  into `mahasiswas`(`id`,`nim`,`nama`,`alamat`,`created_at`,`updated_at`) values 
(17,'2004505002','I Made Glencuk','Tabanan, Bali','2022-10-14 03:05:30','2022-10-14 03:05:30'),
(18,'2004505003','I Nyoman Gencok','Denpasar, Bali','2022-10-14 03:05:52','2022-10-14 03:05:52'),
(19,'2004505004','I Ketut Nyamprut','Jembrana, Bali','2022-10-14 03:06:08','2022-10-14 03:06:08'),
(27,'2204505287','Emmie Dare','8080 Crystal Burgs\nLake Unatown, WA 80107','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(28,'2204505042','Coty Ritchie','46296 Gaylord Club Suite 949\nClementinamouth, CA 59893','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(29,'2204505633','Mikayla Tillman','50872 Huel Summit Suite 699\nNorth Harrisonville, NV 59884-4759','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(30,'2204505610','Coty McKenzie','69503 Terence Mountain\nMedhurstshire, FL 20117-2555','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(31,'2204505187','Dr. Caleigh Veum II','101 Becker Junction Apt. 938\nPort Ethylberg, KY 21992','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(32,'2204505366','Wilbert Purdy III','51565 Block Avenue\nEast Toreyland, ND 87442','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(33,'2204505523','Dr. Brice Funk DDS','3346 Valentine Inlet\nClairland, AK 07937','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(34,'2204505072','Miss Daija Stroman Sr.','39708 Norval Path Suite 714\nHomenickchester, NY 39928','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(35,'2204505067','Olin Mayert','11332 Waters Heights\nPort Joyceburgh, SD 58676','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(36,'2204505028','Geraldine Luettgen','710 Hagenes Road Suite 673\nEast Syblestad, ID 06947-2448','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(37,'2204505467','Prof. Adelle Larkin','43527 Katherine River\nNew Thalia, IL 34878-0437','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(38,'2204505495','Carroll Lubowitz','391 Boyer Gateway Suite 668\nNew Reed, AR 98295','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(39,'2204505029','Dr. Eric Graham I','11427 Rosalind Lock\nPort Sonyabury, KY 74799-2337','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(40,'2204505356','Kian Hane','31868 Champlin Centers\nAxelland, FL 85004-1311','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(41,'2204505259','Alfred Ernser','713 Conroy Court Suite 991\nPetrabury, MO 01363-3505','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(42,'2204505469','Dr. Krystina Stiedemann','73394 Christiansen Crest\nLake Jed, UT 16288','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(43,'2204505195','Xavier Adams','438 Reichel Squares\nJacobsonstad, PA 80727','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(44,'2204505747','Jenifer Reichert','3222 Golden Well\nGonzalostad, MO 08191-2735','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(45,'2204505723','Mr. Trace Dicki','47148 Lily Land\nPagacville, WV 33971-8182','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(46,'2204505326','Jodie Streich','991 Verona Roads\nNew Traceyland, TX 39250-8950','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(47,'2204505869','Susan Renner','80567 Kyler Shore Suite 857\nEast Glennie, MT 07201-0167','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(48,'2204505413','Sylvan Howell','6425 Wilma Stream Apt. 432\nMarilouhaven, HI 97709','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(49,'2204505809','Titus Hahn','1554 Nicolette Lake Apt. 071\nEvanfort, NC 58718','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(50,'2204505137','Kane Casper','3521 Stehr Mission Suite 172\nNew Gerardbury, MA 82000-4479','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(51,'2204505945','Prof. Florencio Lakin','462 Effertz Squares\nLake Deonte, ND 67083-9736','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(52,'2204505025','Prof. Lenore Fritsch III','82897 Cecilia Forest Apt. 895\nPort Shyann, WV 69201-5851','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(53,'2204505725','Annamae McGlynn','1976 Wiegand Turnpike\nKaylahland, MO 67661-2119','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(54,'2204505104','Mohammad Bruen','1733 Lenore Street Apt. 080\nLake Shaneview, MI 07707-5464','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(55,'2204505577','Gaylord Collier','356 Hettinger Estate Suite 374\nConnellymouth, SD 69878-4968','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(56,'2204505575','Elvera Koepp','35872 Britney Circle\nPort Pinkie, CA 68933-9674','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(57,'2204505820','Judy Spinka','571 Jasmin Lake\nNew Malvina, NM 04620-3962','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(58,'2204505692','Dr. America Schultz II','3334 Lysanne Valley Apt. 936\nDellhaven, KY 21777','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(59,'2204505825','Kristy Bogisich PhD','288 Heathcote Cliff Suite 704\nVivastad, MS 13537','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(60,'2204505900','Russ O\'Conner','1814 Breitenberg Rapid Suite 914\nSchillerburgh, NV 89317-4184','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(61,'2204505256','Dr. Liliane Keebler','728 Tiffany Track Apt. 905\nAufderharfort, NJ 90742','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(62,'2204505280','Dr. Gene Von','4505 Keith View Apt. 145\nNew Chelseaberg, KY 09178','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(63,'2204505308','Sadie Pfeffer','7324 Golda Plains\nGerdaport, NJ 90798','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(64,'2204505813','Bo Hahn','640 Leuschke Bypass Suite 257\nLuciobury, WV 43383','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(65,'2204505940','Prof. Ryder Wuckert','217 Leone Throughway Suite 348\nHesselbury, NY 09206','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(66,'2204505523','Darwin Hamill','197 Felicia Stravenue Apt. 372\nJanisbury, MA 74502','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(67,'2204505457','Bryana Corkery Sr.','81944 Bahringer Street\nNorth Aracelyfort, ND 27713','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(68,'2204505728','Diamond D\'Amore','893 Hoppe Branch Suite 286\nPeteton, NH 19061','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(69,'2204505286','Mya Greenholt','94800 Ahmed Grove\nSantinomouth, OR 23027-2441','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(70,'2204505457','Willa Treutel','48642 Winona Ranch\nPort Augustuschester, SC 98546-4259','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(71,'2204505562','Mr. Clement Haley','45624 Davis Key Suite 312\nHermannfort, FL 64518','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(72,'2204505379','Nichole Marks','955 Verlie Street\nPort Stefanie, NM 28242-3213','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(73,'2204505851','Doug Bosco II','9127 Ortiz Pine\nBartonmouth, MI 87212-0228','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(74,'2204505547','Wilma Pouros','437 Simeon Courts Apt. 075\nNew Emiliebury, NC 15064-3184','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(75,'2204505740','Zula Block','24115 Schimmel Ferry Apt. 503\nLake Halle, SC 30273-9750','2022-11-23 14:38:51','2022-11-23 14:38:51'),
(76,'2204505935','Ibrahim Watsica','115 Daniela Circle\nIzabellabury, NE 22913-0289','2022-11-23 14:38:51','2022-11-23 14:38:51');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
