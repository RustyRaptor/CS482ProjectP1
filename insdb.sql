/* Brianna Moffett
   Ziad Arafat
   Brandon Lujan
   CS482
   09.18.2020
 */

/*insertion for Administrator table, 5 records*/
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (9, 'Francesco Hickle I', 'o');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (75, 'Miss Alycia Okuneva III', 'o');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (383, 'Nyasia Toy', 'f');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (1947, 'Joshua Friesen IV', 'm');
INSERT INTO `Administrator` (`empId`, `name`, `gender`) VALUES (211673, 'Ms. Jodie Blanda DDS', 'f');

/*insertion for AdmWorkHours, 5 records*/
INSERT INTO `AdmWorkHours` (`empID`, `day`, `hours`) VALUES (8378, '09.18.2020', 35.8);
INSERT INTO `AdmWorkHours` (`empID`, `day`, `hours`) VALUES (38478, '09.17.2020', 36);
INSERT INTO `AdmWorkHours` (`empID`, `day`, `hours`) VALUES (394739, '09.16.2020', 37);
INSERT INTO `AdmWorkHours` (`empID`, `day`, `hours`) VALUES (304930, '09.18.2020', 35.8);
INSERT INTO `AdmWorkHours` (`empID`, `day`, `hours`) VALUES (57383, '09.10.2020', 38.5);

/*insertion for Adminsters, 5 records*/

INSERT INTO `Adminsters` (`empID`, `siteCode`) VALUES (292398, 387489);
INSERT INTO `Adminsters` (`empID`, `siteCode`) VALUES (3904, 293939);
INSERT INTO `Adminsters` (`empID`, `siteCode`) VALUES (23255, 30840);
INSERT INTO `Adminsters` (`empID`, `siteCode`) VALUES (0266, 383083);
INSERT INTO `Adminsters` (`empID`, `siteCode`) VALUES (12555, 291723);

/*insertion for Broadcasts, 5 records*/
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (567789, 798980);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (85779, 009982);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (8477, 573463);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (012556, 508876);
INSERT INTO `Broadcasts` (`videoCode`, `siteCode`) VALUES (62377, 383733);

/*insertion for Client table, 5 records*/
INSERT INTO `Client` (`clientID`, `name`, `phone`, `address`) VALUES (83, 'Malvina Moore DVM', '898-059-9975x443', '107 Lupe Row Apt. 881\nDarrylhaven, NH 16311-7486');
INSERT INTO `Client` (`clientID`, `name`, `phone`, `address`) VALUES (88051, 'Carolanne Dare', '944.769.2722', '74422 Zachery Skyway Suite 109\nLednerfurt, WV 48359');
INSERT INTO `Client` (`clientID`, `name`, `phone`, `address`) VALUES (12865073, 'Cassidy Koepp', '107.739.6706x614', '7697 Ima Divide Apt. 245\nLoweville, CO 44641-9943');
INSERT INTO `Client` (`clientID`, `name`, `phone`, `address`) VALUES (43675339, 'Cecile Reynolds', '03087472738', '40674 West Tunnel\nNorth Brauliostad, ID 09475-8669');
INSERT INTO `Client` (`clientID`, `name`, `phone`, `address`) VALUES (648587653, 'Mrs. Natalie Schumm', '(329)593-1989', '541 Schroeder Light Suite 060\nNorth Janessatown, MI 97039');

/*insertion for DigitalDisplay table, 5 records*/
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (8220, 564783, 67840);
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (9577, 927735, 82779);
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (5786, 982377, 98823);
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (0967, 508238, 76089);
INSERT INTO `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`) VALUES (1433, 847732, 03278);

/*insertion for Model table, 5 records*/
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES (24081, 8068.00, 209.00, 9999.99, 4966.00, 7.00);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES (31326, 9999.99, 9999.99, 26.00, 9999.99, 979.00);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES (473907, 9999.99, 9999.99, 9999.99, 315.00, 9999.99);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES (78065, 0.00, 0.00, 643.00, 9999.99, 9999.99);
INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`) VALUES (9194, 9999.99, 9999.99, 1.00, 9999.99, 9999.99);

/*insertion for Salesman table, 5 records*/
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (4, 'Frederic Graham', 'o');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (89, 'Ryley Mosciski', 'f');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (92, 'Delmer Russel', 'o');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (475, 'Amari Hartmann', 'f');
INSERT INTO `Salesman` (`empId`, `name`, `gender`) VALUES (4507, 'Prof. Robbie Halvorson II', 'm');

/*insertion for TechnicalSupport table, 5 records*/
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (8, 'Arno Hyatt', 'm');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (27, 'Prof. Alison Cartwright', 'f');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (3652, 'Kenny Jaskolski II', 'f');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (3874, 'Lonny Murazik', 'f');
INSERT INTO `TechnicalSupport` (`empId`, `name`, `gender`) VALUES (77301, 'Elyssa Walter', 'f');

/*insertion for Video table, 5 records*/
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (0, 22);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (1, 37);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (2, 25);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (3, 26);
INSERT INTO `Video` (`videoCode`, `videoLength`) VALUES (4, 28);
