-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2023 at 05:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `UID` varchar(256) NOT NULL,
  `customerUID` varchar(256) NOT NULL,
  `consultantUID` varchar(256) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` int(11) NOT NULL,
  `UID` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `UID`, `name`, `email`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, '646d895ceecb63c1f8447106', 'Test Account', 'test@email.com', '$2y$10$VbOUOJrQihPzKldHYvz5huhg6KQ1MPMqKJYFkI7VER/sDxxno.BT2', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, '3o963snvSE3DlQLuzrZKkcB7WI8J6qot4I5zMmA3L4h6lirIWNcx0mh7wY1v', '2023-05-24 03:49:48', '2023-05-24 03:49:48'),
(24, '646d8a56eecb6312903f32c', 'Amelia Smith', 'test1@email.com', '$2y$10$f2LMyJj8pxUigmnhpf463OmTcoSPYCzwY9CTK3dTZOnPy99Ovzzwy', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:53:59', '2023-05-24 03:53:59'),
(25, '646d8a62eecb63129df8365d', 'John Doe', 'test1@email.com', '$2y$10$KYVnHToJXAJjBsqziyA/p.68vqOZ.V7uwXQmz6jL1CKmOrMoMAxPK', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:10', '2023-05-24 03:54:10'),
(26, '646d8a62eecb63129db18f8b', 'John Doe', 'test1@email.com', '$2y$10$oTpvG.8auYn25V9B9qopve1PxhUwilhPJvGbmDXLPHJhG920Vt8ae', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:10', '2023-05-24 03:54:10'),
(27, '646d8a63eecb63129d4d6b2e', 'Amelia Smith', 'test1@email.com', '$2y$10$ADQTONy8w4mQVF/o80VS2ekknSh6uIyOYHZ2M2bufaA9TnRqkPAV2', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:11', '2023-05-24 03:54:11'),
(28, '646d8a63eecb63129d6c3217', 'John Smith', 'test1@email.com', '$2y$10$R1acHnmpvWu7sASSDOg5.esrSXUlWRqCekWVsVcLBdFeNNajKe63.', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:11', '2023-05-24 03:54:11'),
(29, '646d8a63eecb63129d2a0ced', 'Vanessa Doe', 'test1@email.com', '$2y$10$gw65rwjuc5xiZLFcXGTBvuCZh8E0Wz7H3SEI7FXJB3sDVL4E2/HcG', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:11', '2023-05-24 03:54:11'),
(30, '646d8a63eecb63129d688df7', 'Amelia Richard', 'test1@email.com', '$2y$10$15whsqb8OwlAd.mRkBnpceIn515maXAXv3QK4KV59MYmZ/z.Yetpi', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:11', '2023-05-24 03:54:11'),
(31, '646d8a63eecb63129d86699c', 'Vanessa Doe', 'test1@email.com', '$2y$10$cfM.PnpIHtKDOhMYqrZyUO1U4jd3Y2AnNT31HoAD9sZm3WNIjpDWC', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:11', '2023-05-24 03:54:11'),
(32, '646d8a63eecb63129d3e6567', 'John Smith', 'test1@email.com', '$2y$10$fx/VXCE0LTePDV/DKtJMuu5Hpm0hp6rri4EjB/mjSCrztWfFix43C', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:11', '2023-05-24 03:54:11'),
(33, '646d8a63eecb63129d15b091', 'Vanessa Richard', 'test1@email.com', '$2y$10$VCIsl/dzASMTIXXbzej.a.Nr8J01P6vJyPBWOK6ZZBZ0s7HhQSu/2', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:11', '2023-05-24 03:54:11'),
(34, '646d8a64eecb63129d39cede', 'Amelia Richard', 'test1@email.com', '$2y$10$FsCII45CudzDdhsI9mMAHOR/Uo9jJQAGUkDSet/ZnIv77egJ1f28i', 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png', 0, NULL, '2023-05-24 03:54:12', '2023-05-24 03:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `UID` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `image` text NOT NULL DEFAULT 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png',
  `remember_token` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
