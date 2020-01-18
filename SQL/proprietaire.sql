  --  
 -- Table structure for table `tbl_employee`  
 --  
 CREATE TABLE IF NOT EXISTS `tbl_proprietaire` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `name` varchar(50) NOT NULL,  
  `email` varchar(50) NOT NULL UNIQUE,  
  `cellphone` int(50) NOT NULL UNIQUE,  
  `type_propriete` varchar(50) NOT NULL,  
  `address` text NOT NULL,  
  `gender` varchar(10) NOT NULL,  
  `age` int(11) NOT NULL,  
  `image` varchar(100) NOT NULL,  
  PRIMARY KEY (`id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;  
 --  
 -- Dumping data for table `tbl_employee`  
 --  


 INSERT INTO `tbl_proprietaire` (`id`, `name`, `email`, `cellphone`, `type_propriete`, `address`, `gender`, `age`, `image`) VALUES  

 (1, 'Bruce Tom', 'tom@gmail.com', 5142545654, '3 et demi', '656 Edsel Road\r\nSherman Oaks, CA 91403', 'Male', 36, '');  
 