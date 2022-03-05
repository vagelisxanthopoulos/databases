CREATE VIEW customer_info
AS
SELECT nfc_id, first_name, last_name, date_of_birth, phone, email 
FROM customers left join phones on customers.nfc_id = phones.nfc_id_phones left join emails on customers.nfc_id = emails.nfc_id_emails;



CREATE VIEW sales_per_service_category
AS
SELECT service_id_receives_services AS service_id, descr, cost, date_of_use
FROM receives_services
ORDER BY service_id, date_of_use DESC;