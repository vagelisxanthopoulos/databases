-- an i ypiresia thelei eggrafi kai to to service_id den anikei sta service_ids pou exei graftei o pelatis (nfc_id) tote akirose to insert
-- an to service_id den anikei sta service_ids pou antistoixoun stous xwrous pou exoume kanei visit tis teleutaies 4 wres (oxi pio meta) tote akirose to insert
DELIMITER $$ 

CREATE TRIGGER is_registered_on_service_and_has_visited_some_corresponding_room BEFORE INSERT ON receives_services FOR EACH ROW 
BEGIN
    IF ((NEW.service_id_receives_services) IN (
	    	SELECT service_id
        FROM services
        WHERE is_reg_needed = 1)) THEN
            IF ((NEW.service_id_receives_services) NOT IN (
                SELECT service_id_registered_in
                FROM registered_in
                WHERE nfc_id_registered_in = NEW.nfc_id_receives_services)) 
                THEN
                    signal sqlstate '20000' set message_text = 'Customer not registered in that service';
            END IF ;
    END IF ;
    IF ((NEW.service_id_receives_services) NOT IN (
			SELECT service_id_services_location
			FROM visits inner join services_location on visits.room_id_visits = services_location.room_id_services_location
			WHERE NEW.nfc_id_receives_services = nfc_id_visits and TIMESTAMPDIFF(hour, out_date_time, NEW.date_of_use) < 4 and TIMESTAMPDIFF(hour, in_date_time, NEW.date_of_use) >= 0
			))
	 THEN
			signal sqlstate '20000' set message_text = 'Customer has not visited a corresponding room for that service in the last 4 hours';
   END IF;
END $$

DELIMITER ;





-- ama to room_id antistoixei se ipiresia pou thelei eggrafi kai to room_id den anikei sta room_ids pou antistoixoun stis ypiresies pou exei ginei eggrafi tote akirose to insert
DELIMITER $$ 

CREATE TRIGGER is_reg_to_service_before_gain_access_to_corr_room BEFORE INSERT ON has_access FOR EACH ROW 
BEGIN
    IF ((NEW.room_id_has_access) IN (
	    	SELECT room_id_services_location
        FROM services inner join services_location on services.service_id = services_location.service_id_services_location
        WHERE is_reg_needed = 1)) THEN
            IF ((NEW.room_id_has_access) NOT IN (
                SELECT room_id_services_location
                FROM registered_in inner join services_location on registered_in.service_id_registered_in = services_location.service_id_services_location
                WHERE NEW.nfc_id_has_access = nfc_id_registered_in
                ))
				        THEN
                    signal sqlstate '20000' set message_text = 'Customer is not registered in the corresponding service for this room';
            END IF ;
    END IF;
END $$

DELIMITER ;






-- an to room_id den anikei sta room_ids pou exei prosvasi o pelatis sto sygekrimeno time_slot tote akirose to insert
DELIMITER $$ 

CREATE TRIGGER has_access_in_room BEFORE INSERT ON visits FOR EACH ROW 
BEGIN
    IF ((NEW.room_id_visits) NOT IN (
        SELECT room_id_has_access
		    FROM has_access
        WHERE nfc_id_has_access = NEW.nfc_id_visits and starting_datetime <= NEW.in_date_time and ending_datetime >= NEW.out_date_time)) 
	  THEN
        signal sqlstate '20000' set message_text = 'Customer does not have access in that room at this time slot';
    END IF ;
END $$

DELIMITER ;







-- an i prosvasi sto dwmatio elikse argotera apo 4 mines (120 meres) prin tote akirwse tin diagrafi
DELIMITER $$ 

CREATE TRIGGER delete_customer BEFORE DELETE ON customers FOR EACH ROW 
BEGIN
    IF EXISTS (SELECT ending_datetime
		          FROM has_access
              WHERE nfc_id_has_access = OLD.nfc_id and room_id_has_access > 999 and room_id_has_access < 1400 and DATEDIFF(CURRENT_TIMESTAMP(), ending_datetime) < 120) 
              THEN
                  signal sqlstate '20000' set message_text = 'Entry too recent to delete';
    END IF;
END $$

DELIMITER ;




-- an to telos tou visits egine argotera apo 4 mines (120 meres) prin tote akirose tin diagrafi
DELIMITER $$ 

CREATE TRIGGER delete_visits BEFORE DELETE ON visits FOR EACH ROW 
BEGIN
    IF (DATEDIFF(CURRENT_TIMESTAMP(), OLD.out_date_time) < 120) 
              THEN
                  signal sqlstate '20000' set message_text = 'Entry too recent to delete';
    END IF;
END $$

DELIMITER ;