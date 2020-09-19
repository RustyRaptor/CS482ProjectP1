/* Brianna Moffett
   Ziad Arafat
   Brandon Lujan
   CS482
   09.18.2020
 */


/*insertion for Video table, 5 records*/
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (2001, 22);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (2002, 37);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (2003, 25);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (2004, 26);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (2005, 28);

/*insertion for Model table, 5 records*/
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES ('1001', 8068.00, 209.00, 9999.99, 4966.00, 7.00);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES ('1002', 9999.99, 9999.99, 26.00, 9999.99, 979.00);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES ('1003', 9999.99, 9999.99, 9999.99, 315.00, 9999.99);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES ('1004', 0.00, 0.00, 643.00, 9999.99, 9999.99);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES ('1005', 9999.99, 9999.99, 1.00, 9999.99, 9999.99);

/*insertion for Site, 5 records*/
INSERT INTO `Site` (`siteCode`, `type`, `address`, `phone`) VALUES (3001, 'bar', '7 Nicholls Ave. Muskogee, OJ 74403', '(711) 265-9193');
INSERT INTO `Site` (`siteCode`, `type`, `address`, `phone`) VALUES (3002, 'bar', '963 Lees Creek St. Streamwood, IL 60107', '(675) 844-7400');
INSERT INTO `Site` (`siteCode`, `type`, `address`, `phone`) VALUES (3003, 'restaurant', '8436 Warren Street Middletown, CT 06457', '(266) 855-0710');
INSERT INTO `Site` (`siteCode`, `type`, `address`, `phone`) VALUES (3004, 'bar', '7916 S. Marvon St. Dracut, MA 01826', '(514) 531-8471');
INSERT INTO `Site` (`siteCode`, `type`, `address`, `phone`) VALUES (3005, 'restaurant', '219 North Dunabr St. Fremont, OH 43420', '(966) 291-5045');

/*insertion for DigitalDisplay table, 5 records*/
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (9001, 'Random', '1002');
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (9002, 'Random', '1001');
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (9003, 'Smart', '1003');
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (9004, 'Virtue', '1004');
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (9005, 'Virtue', '1005');

/*insertion for Client table, 5 records*/
INSERT INTO `Client` (`clientId`, `name`, `phone`, `address`) VALUES (4001, 'Malvina Moore DVM', '898-059-9975x443', '107 Lupe Row Apt. 881\nDarrylhaven, NH 16311-7486');
INSERT INTO `Client` (`clientId`, `name`, `phone`, `address`) VALUES (4002, 'Carolanne Dare', '944.769.2722', '74422 Zachery Skyway Suite 109\nLednerfurt, WV 48359');
INSERT INTO `Client` (`clientId`, `name`, `phone`, `address`) VALUES (4003, 'Cassidy Koepp', '107.739.6706x614', '7697 Ima Divide Apt. 245\nLoweville, CO 44641-9943');
INSERT INTO `Client` (`clientId`, `name`, `phone`, `address`) VALUES (4004, 'Cecile Reynolds', '03087472738', '40674 West Tunnel\nNorth Brauliostad, ID 09475-8669');
INSERT INTO `Client` (`clientId`, `name`, `phone`, `address`) VALUES (4005, 'Mrs. Natalie Schumm', '(329)593-1989', '541 Schroeder Light Suite 060\nNorth Janessatown, MI 97039');

/*insertion for TechnicalSupport table, 5 records*/
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (6, 'Arno Hyatt', 'm');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (7, 'Prof. Alison Cartwright', 'f');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (8, 'Kenny Jaskolski II', 'f');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (9, 'Lonny Murazik', 'f');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (10, 'Elyssa Walter', 'f');

/*insertion for Administrator table, 5 records*/
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (1, 'Francesco Hickle I', 'o');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (2, 'Miss Alycia Okuneva III', 'o');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (3, 'Nyasia Toy', 'f');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (4, 'Joshua Friesen IV', 'm');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (5, 'Ms. Jodie Blanda DDS', 'f');

/*insertion for Salesman table, 5 records*/
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (5001, 'Frederic Graham', 'o');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (5002, 'Ryley Mosciski', 'f');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (5003, 'Delmer Russel', 'o');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (5004, 'Amari Hartmann', 'f');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (5005, 'Prof. Robbie Halvorson II', 'm');

/*insertion for AirTimePackage, 5 records*/
INSERT INTO `AirtimePackage` (`packageId`, `class`, `startDate`, `lastDate`, `frequency`, `videoCode`) VALUES (6001, 'economy', '2019-11-29', '2020-02-18', 1287.77, 29734);
INSERT INTO `AirtimePackage` (`packageId`, `class`, `startDate`, `lastDate`, `frequency`, `videoCode`) VALUES (6002, 'whole day', '2016-03-31', '2018-04-25', 120387.8, 102378);
INSERT INTO `AirtimePackage` (`packageId`, `class`, `startDate`, `lastDate`, `frequency`, `videoCode`) VALUES (6003, 'golden hours', '2016-04-25', '2020-12-29', 1978.79, 3408);
INSERT INTO `AirtimePackage` (`packageId`, `class`, `startDate`, `lastDate`, `frequency`, `videoCode`) VALUES (6004, 'economy', '1978-07-02', '2020-05-22', 2378.23, 302822);
INSERT INTO `AirtimePackage` (`packageId`, `class`, `startDate`, `lastDate`, `frequency`, `videoCode`) VALUES (6005, 'economy', '1999-11-25', '2020-08-19', 91783.02, 209709);

/*insertion for AdmWorkHours, 5 records*/
INSERT INTO `AdmWorkHours` (`empId`, `day`, `hours`) VALUES (1, '2020.08.18', 35.8);
INSERT INTO `AdmWorkHours` (`empId`, `day`, `hours`) VALUES (2, '2020.09.18', 36);
INSERT INTO `AdmWorkHours` (`empId`, `day`, `hours`) VALUES (3, '2020.05.22', 37);
INSERT INTO `AdmWorkHours` (`empId`, `day`, `hours`) VALUES (4, '2020.09.16', 35.8);
INSERT INTO `AdmWorkHours` (`empId`, `day`, `hours`) VALUES (5, '2020.02.23', 38.5);

/*insertion for Broadcasts, 5 records*/
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (2001, 3001);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (2002, 3002);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (2003, 3003);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (2004, 3004);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (2005, 3005);

/*insertion for Administers, 5 records*/

INSERT INTO `Administers` (`empId`, `siteCode`) VALUES (1, 3001);
INSERT INTO `Administers` (`empId`, `siteCode`) VALUES (2, 3002);
INSERT INTO `Administers` (`empId`, `siteCode`) VALUES (3, 3003);
INSERT INTO `Administers` (`empId`, `siteCode`) VALUES (4, 3004);
INSERT INTO `Administers` (`empId`, `siteCode`) VALUES (5, 3005);

/*insertion for Specializes table, 5 records*/
INSERT INTO `Specializes` (`empId`, `modelNo`) VALUES ( 6, '1001');
INSERT INTO `Specializes` (`empId`, `modelNo`) VALUES ( 7, '1002');
INSERT INTO `Specializes` (`empId`, `modelNo`) VALUES ( 8, '1003');
INSERT INTO `Specializes` (`empId`, `modelNo`) VALUES ( 9, '1004');
INSERT INTO `Specializes` (`empId`, `modelNo`) VALUES ( 10, '1005');

/*insertion for Purchases table, 5 records*/
INSERT INTO `Purchases` (`clientId`, `empId`, `packageId`, `commissionRate`) VALUES ( 4001, 5001, 6001, 27.87 );
INSERT INTO `Purchases` (`clientId`, `empId`, `packageId`, `commissionRate`) VALUES ( 4002, 5002, 6002, 63.87 );
INSERT INTO `Purchases` (`clientId`, `empId`, `packageId`, `commissionRate`) VALUES ( 4003, 5003, 6003, 69.56 );
INSERT INTO `Purchases` (`clientId`, `empId`, `packageId`, `commissionRate`) VALUES ( 4004, 5004, 6004, 55.45 );
INSERT INTO `Purchases` (`clientId`, `empId`, `packageId`, `commissionRate`) VALUES ( 4005, 5005, 6005, 87.87 );

/*insertion for Locates table, 5 records*/
INSERT INTO `Locates` (`serialNo`, `siteCode`) VALUES ( 9001, 3001 );
INSERT INTO `Locates` (`serialNo`, `siteCode`) VALUES ( 9002, 3002 );
INSERT INTO `Locates` (`serialNo`, `siteCode`) VALUES ( 9003, 3003 );
INSERT INTO `Locates` (`serialNo`, `siteCode`) VALUES ( 9004, 3004 );
INSERT INTO `Locates` (`serialNo`, `siteCode`) VALUES ( 9005, 3005 );

