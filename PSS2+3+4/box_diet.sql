-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Sty 2023, 11:17
-- Wersja serwera: 8.0.31
-- Wersja PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `box_diet`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `calorities`
--
CREATE TABLE `calorities` (
  `CalorityID` int NOT NULL,
  `Weight` int NOT NULL,
  `Height` int NOT NULL,
  `Age` int NOT NULL,
  `PhysicalActivity` int NOT NULL,
  `CaloricRequirement` int NOT NULL,
  `UserID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Struktura tabeli dla tabeli `diets`
--

CREATE TABLE `diets` (
  `DietID` int NOT NULL,
  `DietName` text NOT NULL,
  `DietType` text NOT NULL,
  `CalorificValue` int NOT NULL,
  `NumberOfDishes` int NOT NULL,
  PRIMARY KEY (`DietID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `OrderID` int NOT NULL,
  `Amount` float NOT NULL,
  `DateOfOrder` date NOT NULL,
  `OrderAddress` text NOT NULL,
  `RecordCreator` text NOT NULL,
  `RecordModifier` text NOT NULL,
  `UserID` int NOT NULL,
  `DietID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `RoleID` int NOT NULL,
  `RuleName` int NOT NULL,
  `Permissions` int NOT NULL,
  `RuleDescription` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rolesassignation`
--

CREATE TABLE `rolesassignation` (
  `DateOfRoleAssignation` int NOT NULL,
  `DateOfRoleRemoving` int NOT NULL,
  `RoleAssignationID` int NOT NULL,
  `RecordCreator` int NOT NULL,
  `RecordModifier` int NOT NULL,
  `UserID` int NOT NULL,
  `RoleID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `Password` text NOT NULL,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Adress` text NOT NULL,
  `DateOfCreation` date NOT NULL,
  `DateOfLastModification` date NOT NULL,
  `EmailAddres` text NOT NULL,
  `RecordCreator` text NOT NULL,
  `RecordModifier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `calorities`
--
ALTER TABLE `calorities`
  ADD PRIMARY KEY (`CalorityID`),
  ADD KEY `Index5` (`UserID`);
  ADD FOREIGN KEY (`UserID`) REFERENCES `users`(`UserID`);

--
-- Indeksy dla tabeli `diets`
--
ALTER TABLE `diets`
  ADD PRIMARY KEY (`DietID`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Index1` (`UserID`),
  ADD KEY `Index2` (`DietID`);
  ADD FOREIGN KEY (`UserID`) REFERENCES `users`(`UserID`);
  ADD FOREIGN KEY (`DietID`) REFERENCES `diets`(`DietID`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RuleID`);

--
-- Indeksy dla tabeli `rolesassignation`
--
ALTER TABLE `rolesassignation`
  ADD PRIMARY KEY (`RoleAssignationID`),
  ADD KEY `Index3` (`UserID`),
  ADD KEY `Index4` (`RoleID`);
  ADD FOREIGN KEY (`UserID`) REFERENCES `users`(`UserID`);
  ADD FOREIGN KEY (`RoleID`) REFERENCES `roles`(`RoleID`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
