-- query to find nfc_id of given name (used for questions 9 and 10)
select nfc_id
from customers
where first_name = 'argument from user'
    and last_name = 'argument from user';






-- query to find customer info from defined view (used for question 8)
select nfc_id, first_name, last_name, date_of_birth, phone, email 
from customer_info;







-- query to find most frequently visited rooms in the last month, from ages 20 to 40 (used for question 11)
-- in php file "freq_rooms.php" it can be modified to look for most frequently visited rooms in the last year, according to given arguments, and also for other age groups
-- temp contains all visits at the given timeslot from the given ages to all rooms except bedrooms and floors
-- temp2 contains the rooms we are interested in but with no duplicates (unlike temp)
-- finally we count the occurences of the rooms in temp2 inside temp
with temp(room_id, room_name, descr) as
    (select room_id_visits, room_name, descr
    from ((visits inner join customers on visits.nfc_id_visits = customers.nfc_id) inner join rooms on visits.room_id_visits = rooms.room_id)
    where year(in_date_time) = year(current_timestamp()) and month(in_date_time) = 3 and beds_contain = 0 and room_name != 'ground level' and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) >= 20  and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) <= 40 ),
temp2(room_id, room_name, descr) as
    (select distinct room_id, room_name, descr
    from temp)
select temp2.room_name, temp2.descr, temp2.room_id,
(select count(*)
from temp
where temp2.room_id = temp.room_id) as freq
from temp2
order by freq desc;






-- query to find most frequently used services in the last month, from ages 20 to 40 (used for question 11)
-- in php file "freq_serv.php" it can be modified to look for most frequently used services in the last year, according to given arguments, and also for other age groups
-- temp contains all uses of services at the given timeslot from the given ages 
-- temp2 contains the services we are interested in, but with no duplicates (unlike temp)
-- finally we count the occurences of the services uses in temp2 inside temp
with temp(service_id, descr, cost) as
    (select service_id_receives_services, descr, cost
    from (receives_services inner join customers on receives_services.nfc_id_receives_services = customers.nfc_id)
    where year(date_of_use) = year(current_timestamp()) and month(date_of_use) = 3 and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) >= 20 and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) <= 40 ),
temp2(service_id, descr, cost) as
    (select distinct service_id, descr, cost
    from temp)
select service_id, descr, cost,
(select count(*)
from temp
where temp2.service_id = temp.service_id) as freq
from temp2
order by freq desc;





-- query to find most popular services (choosed from most customers) in the last month, from ages 20 to 40 (used for question 11)
-- in php file "pop_serv.php" it can be modified to look for most popular services in the last year, according to given arguments, and also for other age groups
-- temp contains all distinct pairs of service_id and nfc_id that correspond to a customer using that service at least once (satisfying the given criteria regarding age and time range)
-- afterwards we count how many different nfc_ids appear with each service, so as to find the most popular one
-- finally we sort on popularity
with temp(nfc, serid) as
    (select distinct nfc_id_receives_services, service_id_receives_services
    from receives_services inner join customers on receives_services.nfc_id_receives_services = customers.nfc_id
    where year(date_of_use) = year(current_timestamp()) and month(date_of_use) = 3 and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) >= 20 and TIMESTAMPDIFF(year, date_of_birth, CURRENT_TIMESTAMP()) <= 40)
select services.service_id, services.descr,
(select count(*)
from temp
where temp.serid = services.service_id) as cust_freq
from services
order by cust_freq desc;






-- query to find all potentialy infected customers from another customer that contracted covid-19 (used for question 10)
-- dangerous contains all the rooms that the covid case has visited including the time slots of these visits
-- infected contains the nfc_ids of all customers (except for the covid case) that have visited at least one of the infected rooms
-- at some time inside the sick persons time slot or in the next hour
with dangerous(room_id, startt, endd) as
    (select room_id_visits, in_date_time, out_date_time
    from visits
    where nfc_id_visits = 'covid case nfc_id' ),
infected_nfc_ids(nfc) as
    (select distinct visits.nfc_id_visits
    from visits inner join dangerous on visits.room_id_visits = dangerous.room_id
    where visits.nfc_id_visits != 'covid case nfc_id' and TIMESTAMPDIFF(minute, visits.out_date_time, dangerous.startt) <= 0 and TIMESTAMPDIFF(minute, dangerous.endd, visits.in_date_time) <= 60)
select nfc_id, first_name, last_name
from infected_nfc_ids inner join customers on infected_nfc_ids.nfc = customers.nfc_id
order by nfc_id; 








-- query to find infected rooms from customer sick with covid-19 (used for question 9)
select room_id_visits, room_name, descr, in_date_time, out_date_time
from visits inner join rooms on visits.room_id_visits = rooms.room_id
where nfc_id_visits = 'covid case nfc_id'
order by in_date_time desc;







-- query to find services uses per service category from the accordingly defined view (used for question 8)
select * from sales_per_service_category;








-- query to find uses of the service named "bar" in the cost range of 5 to 40, and the date range from 2021-01-15 to 2021-02-24 (used for question 8)
-- in php file "services_use.php" this query is modified according to user given arguments
-- all of these arguments are optional and can be omitted in the user inteface
-- if one of them is omitted then there is no contraint in the corresponding field (for example if no service name is given, then the query is done on all services) 
select service_id_receives_services, descr, cost, date_of_use
from receives_services
where cost >= 5 and cost <= 40 and descr= "bar" and date_of_use >= '2021-01-15 00:00:00' and date_of_use <= '2021-02-24 17:00:00'
order by date_of_use desc;