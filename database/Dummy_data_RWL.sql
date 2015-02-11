INSERT INTO `Employee`(`emp_id`, `position_id`, `emp_sin`, `emp_first_name`, `emp_last_name`, 
`emp_middle_initial`, `emp_address`, `emp_city`, `emp_postal_code`, `emp_phone`, `emp_email`, `emp_gender`, `emp_dob`, 
 `active`, `deleted`, `modified`, `created`) VALUES
('1', '2', '111111111', 'Testy', 'McTester', 'B', '123 Test lane', 'Testerville', 'C1KK6W', '1234567878', 'iam@home.com',
'0', '12232015',  '1', '0', '12312015', '12052015'),
('2', '1', '222222222', 'John', 'Smith', 'L', '345 Argyle St', 'Summerside', 'C1N1Z6', '9027244477', 'your@myhouse.com',
'1', '01011970', '1', '0', '12122012', '12122013'),
('3', '3', '333333333', 'Debbie', 'Dallas', 'K', '987 sultry lane', 'Tignish', 'c1n1z9', '9029029002', 'iamstarving@buffet.com',
'0', '11111988', '1', '0', '12312012', '12112013'),
('4', '3', '444444444', 'Rocky', 'Balboa', 'P', '125 Deltiod St', 'Summerside', 'c1a1z3', '9029029552', 'iambuff@buff.com',
'0', '11111988', '1', '0', '12312012', '12112013'),
('5', '2', '555555555', 'Liam', 'Neison', 'M', '344 Iwillgetyou Dr', 'Montague', 'c0b1k8', '9024896582', 'ishootguns@bullets.com',
'0', '11111988', '1', '0', '12312013', '12112012'),
('6', '1', '666666666', 'Margo', 'Kidder', 'W', '77 Super St', 'Charlottetown', 'c1p1k2', '9024364411', 'ilovesteel@iron.com',
'1', '11111988', '1', '0', '05061999', '12092014'),
('7', '2', '777777777', 'Vince', 'Neil', 'D', '123 Rocker Ave', 'Rockville', 'c1n1z9', '9025558877', 'irockhard@devilhorns.com',
'0', '11111988', '1', '0', '12312012', '12112013'),
('8', '2', '888888888', 'Johhny', 'Good', 'B', '199 Hicktown', 'Argyle Cr', 'c1n4t5', '9028889966', 'iamstrumming@banjo.com',
'0', '11111988', '1', '0', '12312012', '12112013'),
('9', '1', '101010101', 'Diane', 'Lane', 'H', '444 Some St', 'Somewhereville', 'c0f6u4', '9028959988', 'iamkeen@touchthis.com',
'1', '11111988', '1', '0', '12312014', '09202010'),
('10', '1', '999999999', 'Tommy', 'Chong', 'W', '124 Bigbowl Dr', 'Freetown', 'c1b5y5', '9028888888', 'iamstarvingto@munchies.com',
'0', '11111988','1', '0', '12312012', '12112013'),
('11', '3', '565656565', 'Rick', 'Simpson', 'H', '987 Godmeds', 'Baltic', 'c7uu6t', '9026698888', 'itheals@concentrates.com',
'0', '11111988', '1', '0', '12312012', '12112013');


INSERT INTO `Employee_Emergency_Contact`(`emerg_contact_id`, `emp_id`, `emerg_first_name`, `emerg_last_name`, `emerg_phone`) VALUES
('1', '1', 'henry', 'dobbs', '9021455454'),
('2', '1', 'jenna', 'jamerson', '9023681235'),
('1', '2', 'john', 'wick', '9023679632'),
('2', '2', 'tom', 'clancy', '9028926636'),
('1', '3', 'jason', 'stathem', '9024369874'),
('2', '3', 'harry', 'henderson', '9025666633');


INSERT INTO `Employee_Type`(`emp_type_id`, `type_description`, `type_alt_description`) VALUES
(1, 'Truck driver', 'truckdriver'),
(2, 'Dispatcher', 'dispatcher'),
(3, 'Production', 'production'),                     
(4, 'Sampler', 'sampler'),
(5, 'Line Worker', 'lineworker'),
(6, 'Waterboy', 'waterboy'),
(7, 'Maintenance', 'maintenance'),
(8, 'Accounting', 'accounting'),
(9, 'Admin', 'admin'),
(10, 'Fleet Management', 'fleetmanagement');


INSERT INTO `equiptment_list`(`equip_id`, `equip_name`) VALUES
(1,'Evenflow 1'), (2,'Evenflow 2'), (3,'310'), (4,'315'), (5,'320'), (6,'Spudnik'), (7,'590'), (8,'411'), (9,'412'), (10,'Flume'), (11,'Rock Chain 580'), (12,'Barrel Washer'), 
(13,'Trenches'), (14,'Drying table'), (15,'455'), (16,'Odenburg'), (17,'510'), (18,'512'), (19,'514'), (20,'516'), (21,'520'),(22,'530'), (23,'535'), (24,'Bin 611'), (25,'Bin 621'), 
(26,'600'), (27,'610'), (28,'810'), (29,'820'), (30,'Bin Piler'), (31,'Bunker Water'), (32,'Bunker Solid 1'), (33,'Bunker Solid 2'), (34,'Floors recieving'), (35,'Floors grading room'), 
(36,'Floors shipping'), (37,'Floors other'), (38,'Brushes and Brooms'), (39,'Brooms');



INSERT INTO `Job_type`(`emp_type_id`,`emp_id`) VALUES
(1, 1),(2, 2),(3, 3),(4, 4),(5, 5),(6, 6),(7, 7),(8, 8),(9, 9),(10, 10),(1, 1),(2, 1),(3, 1),(4, 1),(5, 1),(6, 1),(7, 1),(8, 1),(9, 1),(10, 1);



INSERT INTO `Users`(`user_id`, `username`, `password`, `user_last_login`, `active`, `deleted`, `modified`, `created`, `emp_id`, `farm_id`) VALUES
('2', 'test1', 'pass1', '0000-00-00 00:00:00', '1', '0', '01022013', '11122012', '1', ''),
('3', 'test2', 'pass2', '0000-00-00 00:00:00', '1', '0', '12112014', '05042002', '2', ''),
('4', 'test3', 'pass3', '0000-00-00 00:00:00', '1', '0', '04052015', '12122014', '', '');


INSERT INTO `Farm`(`farm_id`, `farm_name`, `farm_civic_address`, `farm_phone`, `farm_email`, `farm_contact_id`, `active`, `deleted`, `modified`, `created`) VALUES
('1', 'JustAnotherFarm', '3354 Route 2 Hunter River', '9024887788', 'myfarm@patatoe.pe', '1', '1', '0', '00000000', '00000000'),
('2', 'Tom Jones Farm', '4455 Park rd Seaview', '9028885544', 'hisfarm@shoreside.ca', '2', '1', '0', '00000000', '00000000');


INSERT INTO `Potato`(`potato_id`, `potato_name`) VALUES
(1, 'Russet Burbank'),
(2, 'Russet Goldrush'),
(3, 'Ranger Russet'),
(4, 'Russet Norkotah'),
(5, 'Superior(White)'),
(6, 'Kennebec(White)'),
(7, 'Atlantic(White)'),
(8, 'Dakota Pearl(White)'),
(9, 'Shepody(White)'),
(10, 'Red Norland(Red)'),
(11, 'Chieftain(Red)'),
(12, 'Yukon Gold(Yellow)'),
(13, 'Innovator(Yellow)'),
(14, 'Prospect');


INSERT INTO `Warehouse`(`warehouse_id`, `farm_id`, `warehouse_name`, `warehouse_civic_address`, `warehouse_prov`, `warehouse_phone`, `active`, `deleted`, `modified`, `created`) VALUES
('1', '1', 'Warehouse1', '4577 Patato Ln Patatoville', 'PEI', '9023654787', '1', '0', '11111111', '11111111'),
('2', '2', 'Warehouse2', '5211 Spud St Tatertopia', 'NB', '9021235566', '1', '0', '22222222', '22222222');


INSERT INTO `Warehouse_Bin`(`bin_id`, `bin_name`, `warehouse_id`, `bin_marker`, `active`, `deleted`, `modified`, `created`) VALUES
('1', 'Bin1', '1', '10', '1', '0', '22222222', '22222222'),
('2', 'JennysBin', '2', '20', '1', '0', '11111111', '11111111');


INSERT INTO `Destination`(`dest_id`, `dest_name`, `dest_address`, `dest_prov`, `dest_phone`, `dest_contact_name`) VALUES
('1', 'Cavendish Farms', '1234 Route 2 New Annan', 'PEI', '9023336699', 'Johnny McHollowHeart'),
('2', 'We Buy Taters', '3344 WireWorm Rd Tatertown', 'NB', '9025587744', 'Betty Bongos');


INSERT INTO `Truck`(`truck_id`, `truck_num`, `reg_id`, `inspect_id`, `plate_num`, `ins_id`) VALUES
('1', '2554', '1', '1', '365587', '1'),
('2', '3698', '2', '2', '778564', '2');


INSERT INTO `Trailer`(`trailer_id`, `trailer_num`, `reg_id`, `inspect_id`, `plate_num`, `ins_id`) VALUES
('1', '76554', '1', '1', '56443', '1'),
('2', '45456', '2', '2', '33433', '2');