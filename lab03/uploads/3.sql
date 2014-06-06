	SELECT
  `customer`.*,
  `dvd`.*
FROM
  `dvd`,
  `customer`,
  `offer`
WHERE
  `customer`.`customer_id` = `offer`.`customer_id` AND
  `dvd`.`dvd_id` = `offer`.`dvd_id` AND
  year(`offer`.`offer_date`) = year(now())
ORDER BY
  `customer`.`customer_id`;