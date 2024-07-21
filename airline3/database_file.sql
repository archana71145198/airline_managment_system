-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 08:17 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_file`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(4) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `Username`, `Password`) VALUES
(100, 'archana', '71145198'),
(102, 'pragathi', '123');

-- --------------------------------------------------------
--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` ( `Username`, `Password`) VALUES
('teju', '355360'),
('sneha', '789'),
('ram', '456'),
('sham', '258');

-- --------------------------------------------------------
--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Name`) VALUES
('Banglore'),
('Delhi'),
('Dubai'),
('Goa'),
('Iceland'),
('Kolkata'),
('London'),
('Mumbai'),
('Nashik'),
('New York'),
('Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Name` text NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Name`, `Contact`, `Email`, `Message`) VALUES
('teju', 6363781704, 'teju@gmail.com', 'Nice Work!!!');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Source` text NOT NULL,
  `Destination` text NOT NULL,
  `Departure` date NOT NULL,
  `Arrival` date NOT NULL,
  `Fair_Economic` int(11) NOT NULL,
  `Fair_Business` int(11) NOT NULL,
  `Fair_VIP` int(11) NOT NULL,
  `Available_seats` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`Id`, `Name`, `Source`, `Destination`, `Departure`, `Arrival`, `Fair_Economic`, `Fair_Business`,`Fair_VIP`,`Available_seats`) VALUES
(101, 'AirIndia', 'Mumbai', 'Goa', '2024-10-01', '2024-10-25', 6700, 10000,1200, 58),
(103, 'JetAirways', 'Delhi', 'Banglore', '2023-09-20', '2023-10-03', 4000, 8000,10000,60),
(104, 'JetAirways', 'Delhi', 'Mumbai', '2021-10-12', '2021-10-31', 7500, 11000,12000, 53),
(105, 'Indigo', 'Mumbai', 'Rajasthan', '2024-08-15', '2024-08-24', 4500, 7500,8000, 60),
(455, 'GoAir', 'Delhi', 'Iceland', '2023-10-01', '2023-10-30', 35000, 60000,70000, 50),
(1001, 'Emirates', 'Dubai', 'Mumbai', '2018-10-14', '2018-10-30', 12000, 24000,30000, 25),
(2120, 'Indigo', 'New York', 'Delhi', '2022-11-01', '2022-11-13', 10000, 30000,34000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(4) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Flight_Id` int(11) NOT NULL,
  `Seats_booked` int(11) NOT NULL,
  `Total_Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `MobileNo`, `Email`, `Flight_Id`, `Seats_booked`, `Total_Cost`) VALUES
(102, 'teju', 'gowda', 6363781704, 'teju@gmail.com', 101, 2, 30000),
(111, 'Omkar', 'Jadhav', 101010101, 'omj@gmail.com', 104, 2, 22000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `Flight_Id` (`Flight_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Flight_Id`) REFERENCES `flights` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
DELIMITER //

CREATE TRIGGER before_insert_users
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    DECLARE available_seats INT;

    -- Get the current available seats for the corresponding flight
    SELECT Available_seats INTO available_seats
    FROM flights
    WHERE Id = NEW.Flight_Id;

    -- Check if there are enough available seats
    IF available_seats < NEW.Seats_booked THEN
        -- Raise an error if there are not enough available seats
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not enough available seats for booking';
    END IF;
END //

DELIMITER ;
DELIMITER //

CREATE PROCEDURE UpdateAvailableSeats(IN FlightID INT, IN BookedSeats INT)
BEGIN
    DECLARE available_seats INT;

    -- Get the current available seats for the corresponding flight
    SELECT Available_seats INTO available_seats
    FROM flights
    WHERE Id = FlightID;

    -- Check if there are enough available seats
    IF available_seats < BookedSeats THEN
        -- Raise an error if there are not enough available seats
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not enough available seats for booking';
    ELSE
        -- Update the available seats if there are enough
        UPDATE flights
        SET Available_seats = available_seats - BookedSeats
        WHERE Id = FlightID;
    END IF;
END //

DELIMITER ;
