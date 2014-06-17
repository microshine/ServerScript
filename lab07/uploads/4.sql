SELECT 
  `dvd`.* 
FROM 
  `dvd`, `offer` 
WHERE
  `offer`.`dvd_id` = `dvd`.`dvd_id` AND
   `offer`.`return_date` IS NULL;