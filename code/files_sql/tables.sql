CREATE SCHEMA hotel ;
USE hotel;

CREATE TABLE `customers` (
  `nfc_id` int NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `ver_doc_num` varchar(10) NOT NULL,
  `doc_kind` varchar(8) NOT NULL,
  `office` varchar(15) NOT NULL,
  PRIMARY KEY (`nfc_id`)
); 



CREATE TABLE `emails` (
  `nfc_id_emails` int NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`nfc_id_emails`,`email`),
  CONSTRAINT `nfc_id_emails` FOREIGN KEY (`nfc_id_emails`) REFERENCES `customers` (`nfc_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `phones` (
  `nfc_id_phones` int NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`nfc_id_phones`,`phone`),
  CONSTRAINT `nfc_id_phones` FOREIGN KEY (`nfc_id_phones`) REFERENCES `customers` (`nfc_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `rooms` (
  `room_id` int NOT NULL,
  `beds_contain` int NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `descr` varchar(50) NOT NULL,
  PRIMARY KEY (`room_id`)
);



CREATE TABLE `visits` (
  `nfc_id_visits` int NOT NULL,
  `room_id_visits` int NOT NULL,
  `in_date_time` datetime NOT NULL,
  `out_date_time` datetime NOT NULL,
  PRIMARY KEY (`nfc_id_visits`,`room_id_visits`,`in_date_time`),
  KEY `room_idx` (`room_id_visits`),
  CONSTRAINT `nfc` FOREIGN KEY (`nfc_id_visits`) REFERENCES `customers` (`nfc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room` FOREIGN KEY (`room_id_visits`) REFERENCES `rooms` (`room_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
);


CREATE TABLE `has_access` (
  `nfc_id_has_access` int NOT NULL,
  `room_id_has_access` int NOT NULL,
  `starting_datetime` datetime NOT NULL,
  `ending_datetime` datetime NOT NULL,
  PRIMARY KEY (`nfc_id_has_access`,`room_id_has_access`,`starting_datetime`),
  KEY `room_id_has_access_idx` (`room_id_has_access`),
  CONSTRAINT `nfc_id_has_access` FOREIGN KEY (`nfc_id_has_access`) REFERENCES `customers` (`nfc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_id_has_access` FOREIGN KEY (`room_id_has_access`) REFERENCES `rooms` (`room_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
);


CREATE TABLE `services` (
  `service_id` int NOT NULL,
  `descr` varchar(40) NOT NULL,
  `is_reg_needed` tinyint NOT NULL,
  PRIMARY KEY (`service_id`)
);


CREATE TABLE `services_location` (
  `service_id_services_location` int NOT NULL,
  `room_id_services_location` int NOT NULL,
  PRIMARY KEY (`service_id_services_location`,`room_id_services_location`),
  KEY `room_id_services_location_idx` (`room_id_services_location`),
  CONSTRAINT `room_id_services_location` FOREIGN KEY (`room_id_services_location`) REFERENCES `rooms` (`room_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `service_id_services_location` FOREIGN KEY (`service_id_services_location`) REFERENCES `services` (`service_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
);



CREATE TABLE `registered_in` (
  `nfc_id_registered_in` int NOT NULL,
  `service_id_registered_in` int NOT NULL,
  `register_datetime` datetime NOT NULL,
  PRIMARY KEY (`nfc_id_registered_in`,`service_id_registered_in`),
  KEY `service_id_registered_in_idx` (`service_id_registered_in`),
  CONSTRAINT `nfc_id_registered_in` FOREIGN KEY (`nfc_id_registered_in`) REFERENCES `customers` (`nfc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_id_registered_in` FOREIGN KEY (`service_id_registered_in`) REFERENCES `services` (`service_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
);



CREATE TABLE `receives_services` (
  `nfc_id_receives_services` int NOT NULL,
  `service_id_receives_services` int NOT NULL,
  `cost` int NOT NULL,
  `date_of_use` datetime NOT NULL,
  `descr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nfc_id_receives_services`,`service_id_receives_services`,`date_of_use`),
  KEY `service_id_idx` (`service_id_receives_services`),
  CONSTRAINT `nfc_id` FOREIGN KEY (`nfc_id_receives_services`) REFERENCES `customers` (`nfc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_id` FOREIGN KEY (`service_id_receives_services`) REFERENCES `services` (`service_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
);