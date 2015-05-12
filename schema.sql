DROP TABLE IF EXISTS USER;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `USER` (
  `UID` varchar(100) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `P1_ID` varchar(100),
  `P2_ID` varchar(100),
  `P3_ID` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CURRENT_TEACHING`
--

INSERT INTO `USER` (`UID`, `USER_NAME`, `PASSWORD`) VALUES
('12345', 'fanshicomic', 'sdfsdfsdfsdfsdf');

ALTER TABLE `USER`
ADD PRIMARY KEY (`UID`);