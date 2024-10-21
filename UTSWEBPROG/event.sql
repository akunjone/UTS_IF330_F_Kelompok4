-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 12:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `NamaEvent` varchar(100) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `Lokasi` varchar(100) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Kapasitas` int(11) NOT NULL,
  `Foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `NamaEvent`, `Tanggal`, `Waktu`, `Lokasi`, `Deskripsi`, `Kapasitas`, `Foto`) VALUES
(204, 'Eras Tour', '0004-04-04', '16:32:00', 'UMN', 'qa', 88, ''),
(224, 'Eras Tour', '2024-10-01', '20:13:00', 'UMN', 's', 4444, ''),
(225, 'Eras Tour', '2024-10-02', '20:54:00', 'UMN', 'A', 3, ''),
(226, 'Eras Tour', '2024-10-21', '16:13:00', 'UMN', 'A', 55, ''),
(227, 'Eras Tour', '2024-10-21', '16:13:00', 'UMN', 'A', 55, ''),
(228, 'Eras Tour', '2024-10-21', '16:13:00', 'UMN', 'A', 55, ''),
(229, 'Eras Tour', '2024-10-02', '16:28:00', 'UMN', 'a', 7555, ''),
(230, 'Eras Tour', '2024-10-09', '16:39:00', 'Binus', 'a', 2, ''),
(231, 'Eras Tour', '2024-10-09', '16:39:00', 'Binus', 'a', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `regist`
--

CREATE TABLE `regist` (
  `EventID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regist`
--

INSERT INTO `regist` (`EventID`, `Username`) VALUES
(204, 'RicTzy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('ad','us') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'RicTzy', 'jdjdj@dj', '$2y$10$eiWDarRYunwmuag.dBIKrughm2CjABNdGK1sRLEsp9v07lXL6wTyy', 'ad', '2024-10-20 06:23:26'),
(2, 'RicTzy', 'a@gmail', '$2y$10$JTTphcAWksb/QSah//1muumUb0xJ/Y/WDcErGoHWnxMh5zuVyE84e', 'ad', '2024-10-20 07:47:47'),
(3, 'RicTzy', 'af@gmail', '$2y$10$v0fnDQ.xb2LxM2QF4gwXdeghuAma3eDnjvSAvWyuaF1yQrxStJvs6', 'ad', '2024-10-20 08:20:48'),
(5, 'RicTzy', 'aaaa@gmail', '$2y$10$W2XrKoCxqqVwWZB1tU2OGO5jxYCXj4Sqc5ezx5ti0boUYU60K1jYy', 'ad', '2024-10-20 09:31:09'),
(8, 'RicTzy', 'aaha@gmail', '$2y$10$fRWRajMErB6tJW3gp8I6h.EH8QvHvjruejPZP7EntQFhqoDSwD7qi', 'ad', '2024-10-20 12:05:14'),
(10, 'RicTzy', 'aafha@gmail', '$2y$10$QIzcdV42gIUjNGmQxXRXHOCByRIiIK9EAABjGs1kdyvFZJ15jOnti', 'us', '2024-10-20 12:05:24'),
(12, 'RicTzy', 'eafha@gmail', '$2y$10$WPsVFXhvI4P.xHm0yN5Ah./9IiALSbS8lFOLFgr4dhWk/IXRhqaMC', 'ad', '2024-10-20 13:12:53'),
(13, 'RicTzy', 'eafaha@gmail', '$2y$10$N5VxsuX9H4ByLx4P7b7HCeSs8CXU6/z.hyc0jBdPS7RzswFMNZt0.', 'us', '2024-10-20 13:13:31'),
(14, 'RicTzy', 'ajaj@gam', '$2y$10$jhxrcEFMP9ikiyRs0xHg3O/XOnJ6EnUo1Ijnx5xdqABYhmx7rI7Zi', 'us', '2024-10-20 13:33:44'),
(15, 'Ricaja', 'i@a', '$2y$10$Hq8rppXPFo1QaV49YIA3me4CY0Eudrtbin3Ijv/dVgZoo0IZ.0Lz2', 'us', '2024-10-20 13:38:13'),
(16, 'Ricaja', 'iA@a', '$2y$10$m9ekTkTOeTpH2VPbNVqujuQkVzgVU1YDA6yOiuavNP8BTJJ2OsbPS', 'ad', '2024-10-20 13:50:24'),
(17, 'Ricaja', 'iAa@a', '$2y$10$OOBSydodCkAlVsT4YCfq/.prDqTRxpTVaTWO3hHN4CJwfRdxAbmrW', 'us', '2024-10-20 13:53:09'),
(18, 'Ricaja', 'as@gmail', '$2y$10$pXnxtxhxn8EdK2WHhKnCrubF4LBmzTJk9YXqlxIy/eCrB3jn36X5u', 'us', '2024-10-20 15:02:31'),
(19, 'RicTzy', 'aaaha@gmail', '$2y$10$hwM.hgF5jx4cZd2/MIA8ROix1bONnsESzR8AIA9pEoLn4vTqwgVmC', 'us', '2024-10-20 15:03:15'),
(20, 'RicTzy', 'jdjadj@dj', '$2y$10$tnCLo7VhNbvedW4WS9tcIemrkNIBhzIYjq5YIt0WLm5fS5NrUrGdq', 'us', '2024-10-20 15:06:55'),
(21, 'RicTzy', 'Dya@gmail', '$2y$10$7.Qn32sxr3Jt20YoLGoWs.a4IV2qj0tgBmbFlHNKdnpASPAW7TLZ2', 'us', '2024-10-21 00:33:27'),
(22, 'Dora', 'Dora@gmail', '$2y$10$uVVDTjzz5Q1vHR6y.I4kcOeuetvqhTLmuJuniuDuc5x5tMBn46A8i', 'us', '2024-10-21 00:54:28'),
(23, 'Ahay', 'jdjsdj@dj', '$2y$10$zOmYb18N4QY.8zh3Dj2FCuT3pI8mfLAKJMhjRWtn0QS9Df12n0eBC', 'ad', '2024-10-21 02:17:23'),
(24, 'Ricaja', 'jdjdasdj@dj', '$2y$10$kQysgyWk9zb1fEP/03cAOeDuqsFr2guAwusIzLHAwWdC.N9NR/7Su', 'ad', '2024-10-21 03:46:11'),
(25, 'Ricaja', 'jdjdasadj@dj', '$2y$10$UUQFr17wGP8hCZcodHneJu/RtfLAe9eCFeZNrNEmo4o/g7ox.09P6', 'us', '2024-10-21 04:35:45'),
(26, 'sero', 'sero@a', '$2y$10$.8ozmdScveRq3rktEEkpAOhWxhSJws152Cs82yUCKFOyH39FR4i3G', 'us', '2024-10-21 06:22:57'),
(27, 'Admin1', 'admin1@gmail.com', '$2y$10$GpG3mS6/oiZe9jViwG/3yesen0iQdYGtTpgKQwR.H.rIWdSaLfICK', 'ad', '2024-10-21 08:31:48'),
(28, 'Dora', 'doralagi@a', '$2y$10$fuEHzzi9w2A.SeBEJlMR1enQeWbNT/truousoBkAJvkbTGRIfUF.u', 'ad', '2024-10-21 09:11:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `regist`
--
ALTER TABLE `regist`
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `regist`
--
ALTER TABLE `regist`
  ADD CONSTRAINT `regist_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
