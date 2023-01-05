-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 12:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ia19ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `regular_price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `regular_price`, `discount_price`, `description`, `img`, `created_at`) VALUES
(11, 'Nike', 12999, 10999, '<p>Brand Nike shoes</p>', './images/products/0s9XvL63a044da5abd7248638141120250December192022Monday.jpg', '2022-12-19 11:02:50'),
(15, 'Chiruni', 250, 150, '<p>Chiruni ka <strong>chiruni</strong></p>', './images/products/3gdfSO63b28d3040de21775253548085216January022023Monday.jpg', '2023-01-02 07:52:16'),
(17, 'Menz Shoes', 1500, 1200, '<p>Menz Shoes</p>', './images/products/k5Ee2z63b28d727e3362102038785085322January022023Monday.jpg', '2023-01-02 07:53:22'),
(18, 'Badami Shirt', 1500, 800, '<p><strong>Badami </strong>Shirt…</p><p>-Deshi Shirt</p>', './images/products/s7jI6B63b29f68c4e861618839420101000January022023Monday.jpg', '2023-01-02 07:54:01'),
(19, 'Gengi', 600, 400, '<p>Genji ja genji</p><p>-desi genji</p>', './images/products/NtkaTh63b28dc0593ac1424735917085440January022023Monday.png', '2023-01-02 07:54:40'),
(20, 'Money Bag', 800, 550, '<p>Walet…</p><p>Monek bag..</p><p>Low Price</p>', './images/products/JQalvr63b28de7ed7251443824859085519January022023Monday.jpg', '2023-01-02 07:55:19'),
(21, 'Golden Watch', 2000, 1600, '<p>Golden Watch.. Best menz watch in the country</p>', './images/products/HZm9Jk63b28e167c12d1447744463085606January022023Monday.jpg', '2023-01-02 07:56:06'),
(22, 'Hudi', 3000, 2500, '<p>Hudi for men</p>', './images/products/Glw6CN63b28e2c7622b2017211996085628January022023Monday.jpg', '2023-01-02 07:56:28'),
(23, 'Menz Jacket', 2200, 1800, '<p>Best Jacket for men</p>', './images/products/HFC51W63b28e4983fdd966459352085657January022023Monday.jpg', '2023-01-02 07:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` char(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`, `created_at`) VALUES
(1, 'Mohsin', 'mohsin@dti.ac', 'e10adc3949ba59abbe56e057f20f883e', 'user', '2022-12-12 09:58:31'),
(2, 'Asif Abir', 'asif@dti.ac', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2022-12-12 10:54:24'),
(3, 'Syed Sakib', 'sakib@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '2022-12-12 12:04:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
