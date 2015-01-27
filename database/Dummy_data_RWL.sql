INSERT INTO `Employee`(`emp_id`, `position_id`, `emp_sin`, `emp_first_name`, `emp_last_name`, 
`emp_middle_initial`, `emp_address`, `emp_city`, `emp_postal_code`, `emp_phone`, `emp_email`, `emp_gender`, `emp_dob`, 
`primary_contact_id`, `secondary_contact_id`, `active`, `deleted`, `modified`, `created`) VALUES
('1', '2', '111111111', 'testy', 'mctester', 'b', '123 Test lane', 'Testerville', 'C1KK6W', '1234567878', 'iam@home.com',
'0', '12232015', '1', '2', '1', '0', '12312015', '12052015'),
('2', '1', '222222222', 'john', 'smith', 't', '345 argyle st', 'summerside', 'C1N1Z6', '9027244477', 'your@myhouse.com',
'1', '01011970', '1', '2', '1', '0', '12122012', '12122013'),
('3', '3', '333333333', 'debbie', 'dallas', 'm', '987 sultry lane', 'tignish', 'c1n1z9', '9029029002', 'iamstarving@buffet.com',
'0', '11111988', '1', '2', '1', '0', '12312012', '12112013');


INSERT INTO `Employee_Emergency_Contact`(`emerg_contact_id`, `emp_id`, `emerg_first_name`, `emerg_last_name`, `emerg_phone`) VALUES
('1', '1', 'henry', 'dobbs', '9021455454'),
('2', '1', 'jenna', 'jamerson', '9023681235'),
('1', '2', 'john', 'wick', '9023679632'),
('2', '2', 'tom', 'clancy', '9028926636'),
('1', '3', 'jason', 'stathem', '9024369874'),
('2', '3', 'harry', 'henderson', '9025666633');


INSERT INTO `Users`(`user_id`, `username`, `password`, `user_last_login`, `active`, `deleted`, `modified`, `created`, `emp_id`, `farm_id`) VALUES
('1', 'test1', 'pass1', '0000-00-00 00:00:00', '1', '0', '01022013', '11122012', '1', ''),
('2', 'test2', 'pass2', '0000-00-00 00:00:00', '1', '0', '12112014', '05042002', '2', ''),
('3', 'test3', 'pass3', '0000-00-00 00:00:00', '1', '0', '04052015', '12122014', '', '1');


INSERT INTO `Farm`(`farm_id`, `farm_name`, `farm_civic_address`, `farm_phone`, `farm_email`, `farm_contact_id`, `active`, `deleted`, `modified`, `created`) VALUES
('1', 'JustAnotherFarm', '3354 Route 2 Hunter River', '9024887788', 'myfarm@patatoe.pe', '1', '1', '0', '00000000', '00000000'),
('2', 'Tom Jones Farm', '4455 Park rd Seaview', '9028885544', 'hisfarm@shoreside.ca', '2', '1', '0', '00000000', '00000000');


INSERT INTO `Warehouse`(`warehouse_id`, `farm_id`, `warehouse_name`, `warehouse_civic_address`, `warehouse_prov`, `warehouse_phone`, `active`, `deleted`, `modified`, `created`) VALUES
('1', '1', 'Warehouse1', '4577 Patato Ln Patatoville', 'PEI', '9023654787', '1', '0', '11111111', '11111111'),
('2', '2', 'Warehouse2', '5211 Spud St Tatertopia', 'NB', '9021235566', '1', '0', '22222222', '22222222');


INSERT INTO `Warehouse_Bin`(`bin_id`, `bin_name`, `warehouse_id`, `bin_marker`, `active`, `deleted`, `modified`, `created`) VALUES
('1', 'Bin1', '1', '10', '1', '0', '22222222', '22222222'),
('2', 'JennysBin', '2', '20', '1', '0', '11111111', '11111111');


INSERT INTO `Destination`(`dest_id`, `dest_name`, `dest_address`, `dest_prov`, `dest_phone`, `dest_contact_name`) VALUES
('1', 'Cavendish Farms', '1234 Route 2 New Annan', 'PEI', '9023336699', 'Johnny McHollowHeart'),
('2', 'We Buy Taters', '3344 WireWorm Rd Tatertown', 'NB', '9025587744', 'Betty Bongos');


INSERT INTO `Truck`(`truck_id`, `truck_num`, `reg_id`, `inspect_id`, `plate_num`, `ins_id`, maintain_id) VALUES
('1', '2554', '1', '1', '365587', '1', '1'),
('2', '3698', '2', '2', '778564', '2', '2');


INSERT INTO `Trailer`(`trailer_id`, `trailer_num`, `reg_id`, `inspect_id`, `plate_num`, `ins_id`, maintain_id) VALUES
('1', '76554', '1', '1', '56443', '1', '1'),
('2', '45456', '2', '2', '33433', '2', '2');