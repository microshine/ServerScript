USE `rental`;

INSERT INTO `dvd` 
(
  `title`, 
  `production_year`)
VALUES 
  ('Фильм 1', 1980),
  ('Фильм 2', 1985),
  ('Фильм 3', 1989),
  ('Фильм 4', 2010),
  ('Фильм 5', 1994),
  ('Фильм 6', 1995),
  ('Фильм 7', 1997),
  ('Фильм 8', 1999),
  ('Фильм 9', 2000),
  ('Фильм 10', 2005),
  ('Фильм 11', 2010),
  ('Фильм 12', 2010),
  ('Фильм 13', 1995)
;


INSERT INTO `customer` 
(
  `first_name`, 
  `last_name`,
  `passport_code`,
  `regitration_date`
)
VALUES 
  (
    'Иван', 
    'Иванов', 
    12345678, 
    STR_TO_DATE('2004-11-24', '%Y-%m-%d')
  ),
  (
    'Петр', 
    'Петров', 
    87654321, 
    STR_TO_DATE('1990-01-15', '%Y-%m-%d')
  ),
  (
    'Семен', 
    'Семенович', 
    11223344, 
    STR_TO_DATE('2000-03-30', '%Y-%m-%d')
  )  
;

INSERT INTO `offer`
(
  dvd_id,
  customer_id,
  offer_date,
  return_date
)
VALUES
  (
    1,
    1,
    STR_TO_DATE('2013-05-05', '%Y-%m-%d'),
    STR_TO_DATE('2013-05-10', '%Y-%m-%d')
  ),
  (
    4,
    1,
    STR_TO_DATE('2014-05-10', '%Y-%m-%d'),
    STR_TO_DATE('2014-05-15', '%Y-%m-%d')
  ),
  (
    8,
    1,
    STR_TO_DATE('2014-05-10', '%Y-%m-%d'),
    NULL
  ),
  (
    2,
    2,
    STR_TO_DATE('2013-05-01', '%Y-%m-%d'),
    STR_TO_DATE('2013-05-06', '%Y-%m-%d')
  ),
  (
    3,
    2,
    STR_TO_DATE('2013-05-01', '%Y-%m-%d'),
    STR_TO_DATE('2013-05-10', '%Y-%m-%d')
  ),
  (
    10,
    2,
    STR_TO_DATE('2014-05-16', '%Y-%m-%d'),
    NULL
  ),
  (
    11,
    2,
    STR_TO_DATE('2014-05-16', '%Y-%m-%d'),
    NULL
  ),
  (
    7,
    3,
    STR_TO_DATE('2014-05-10', '%Y-%m-%d'),
    STR_TO_DATE('2014-05-15', '%Y-%m-%d')
  ),
  (
    12,
    3,
    STR_TO_DATE('2013-05-15', '%Y-%m-%d'),
    STR_TO_DATE('2013-05-20', '%Y-%m-%d')
  )
;