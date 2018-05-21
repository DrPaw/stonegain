-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2018 at 09:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stonegain`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_resource`
--

CREATE TABLE `account_resource` (
  `account_resource_id` int(11) NOT NULL,
  `currency` varchar(64) COLLATE utf8_bin NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `value` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `account_resource`
--

INSERT INTO `account_resource` (`account_resource_id`, `currency`, `name`, `value`) VALUES
(1, 'LTC', 'LTC Wallet', '92da5ce8-529d-58bd-8395-85e80745b7c8'),
(2, 'ETH', 'ETH Wallet', 'd5f0d4ac-e282-587c-9022-9c7aebc50de3'),
(3, 'BTC', 'BTC Wallet', '0d3e2eeb-272b-51e4-834f-840aeffec532');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `role_id`, `username`, `password`, `salt`, `deleted`) VALUES
(1, 0, 'lifang', '1d7ca4e94c163abe0442c6aea9a68ead3861d72ee7dc68c7c723a78aa7f6e23f1426c0eb1ceb7ec38162770352da6cf9c02997768048565f3e2ceddd96b69e5b', 697328, 0),
(2, 0, 'emmwee', '951863f4b5d10624feb3c2c88b4c9a6a85ecb6602bf1f2f7c128dae318300b954021973d03cea9868ac41b91e7d56edcc1311833f0fb531bd355e6cfe06b8cea', 402017, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crypto`
--

CREATE TABLE `crypto` (
  `crypto_id` int(11) NOT NULL,
  `crypto` varchar(256) COLLATE utf8_bin NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `marketcap` decimal(20,2) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `volume` decimal(20,2) NOT NULL,
  `circulating_supply` varchar(256) COLLATE utf8_bin NOT NULL,
  `variance` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `crypto`
--

INSERT INTO `crypto` (`crypto_id`, `crypto`, `name`, `marketcap`, `price`, `volume`, `circulating_supply`, `variance`) VALUES
(1, 'BTC', 'Bitcoin', '145899767276.00', '8564.70', '677418000.00', '17,035,012 BTC', '-2.41'),
(2, 'ETH', 'Ethereum', '68344310974.00', '687.14', '2545420000.00', '99,462,568 ETH', '-5.79'),
(3, 'USDT', 'USDT', '68344310974.00', '687.14', '2545420000.00', '99,462,568 USDT', '-5.79'),
(4, 'BCH', 'Bitcoin Cash', '21443553065.00', '1251.80', '988472000.00', '17,130,175 BCH', '-11.79'),
(5, 'LTC', 'Litecoin', '7683399452.00', '135.87', '409353000.00', '56,550,888 LTC	', '-7.15');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE `role_access` (
  `role_access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `model` varchar(256) COLLATE utf8_bin NOT NULL,
  `view_permission` tinyint(1) NOT NULL DEFAULT '0',
  `add_permission` tinyint(1) NOT NULL DEFAULT '0',
  `update_permission` tinyint(1) NOT NULL DEFAULT '0',
  `delete_permission` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crypto_id` int(11) NOT NULL,
  `amount` decimal(20,8) NOT NULL DEFAULT '0.00000000',
  `transaction_type` enum('DEPOSIT','WITHDRAW') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `salt` int(8) NOT NULL,
  `remarks` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `crypto_id`, `amount`, `transaction_type`, `address`, `password`, `salt`, `remarks`, `used`, `completed`, `deleted`, `created_date`) VALUES
(1, 11, 1, '0.00000000', 'DEPOSIT', '0xfb8d64fa118a8a9203a50af841e7a5018debb45d', '4b80a70bc406063123daf4317ccd636db2c83878846728ffcd72ba0293d83ad6d9df85912bdba21dde67321e25c331628028ecc10bae61a6ead6e2cc56828df6', 729418, '', 0, 0, 0, '2018-05-20 16:39:53'),
(2, 11, 1, '0.00000000', 'WITHDRAW', 'sdas', '4a4c6a601138303841ca54130d7a15cdd691abb3d3f63bd2cb66dd1399a1c64f786ca01b42f26a96801396c2cb57d5f1cde27a7decce9176b99fdca1e1b1770d', 399521, '21321312', 0, 0, 0, '2018-05-20 16:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `country` varchar(256) CHARACTER SET utf8 NOT NULL,
  `bank_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `bank_account_number` varchar(256) CHARACTER SET utf8 NOT NULL,
  `preferred_time` time NOT NULL,
  `preferred_threshold` decimal(10,2) NOT NULL,
  `referral_link` varchar(256) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) DEFAULT '0',
  `code` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `salt`, `email`, `country`, `bank_name`, `bank_account_number`, `preferred_time`, `preferred_threshold`, `referral_link`, `deleted`, `verified`, `code`) VALUES
(11, 'emmwee', '7526588ac8a32101bea83135218d19339f1fb62c10cf4774811f673852a1e6fb2e65a439949f5d8ce432bd3ec3b5e61fb381b038c50721af1932db3b7c58d553', 685544, 'emmwee96@gmail.com', 'Malaysia', 'Maybank', '12321321', '12:30:08', '10000.00', '', 0, 1, 75253361),
(12, 'test', '901079045af767a8e1eb2bdec33eee65d457dd78d2ea6b6f2dafbd15d1e47839fda3e19ffcb6a7ba7b17bd01b4448fe57088ef9ae226466b0a6f029fefe72729', 977358, 'test@gmail.com', 'asda', 'asd', 'asd', '12:31:00', '21321.00', '12321', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_crypto`
--

CREATE TABLE `user_crypto` (
  `user_crypto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crypto_id` int(11) NOT NULL,
  `amount` decimal(20,8) NOT NULL,
  `btc_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `usdt_price` decimal(12,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_crypto`
--

INSERT INTO `user_crypto` (`user_crypto_id`, `user_id`, `crypto_id`, `amount`, `btc_price`, `usdt_price`) VALUES
(1, 11, 1, '0.31000000', '50000.00', '45000.00'),
(2, 11, 1, '0.60000000', '10000.00', '800.00'),
(4, 11, 2, '0.42200000', '2133.00', '2132.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_crypto_wallet`
--
CREATE TABLE `user_crypto_wallet` (
`user_id` int(11)
,`crypto_id` int(11)
,`username` varchar(256)
,`crypto` varchar(256)
,`total_amount` decimal(42,8)
,`locked_amount` decimal(42,8)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_listing`
--

CREATE TABLE `user_listing` (
  `user_listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crypto_id` int(11) NOT NULL,
  `user_listing_status_id` int(11) NOT NULL,
  `markup` decimal(12,2) NOT NULL DEFAULT '0.00',
  `threshold` decimal(12,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(20,8) NOT NULL DEFAULT '0.00000000',
  `price_before` decimal(12,2) NOT NULL DEFAULT '0.00',
  `price_after` decimal(20,2) NOT NULL DEFAULT '0.00',
  `message` text COLLATE utf8_bin,
  `payment_method` enum('Bank Transfer') COLLATE utf8_bin NOT NULL,
  `limit_from` decimal(12,2) NOT NULL DEFAULT '0.00',
  `limit_to` decimal(12,2) NOT NULL DEFAULT '0.00',
  `time_of_payment` int(11) NOT NULL,
  `quick_sell` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_listing`
--

INSERT INTO `user_listing` (`user_listing_id`, `user_id`, `crypto_id`, `user_listing_status_id`, `markup`, `threshold`, `amount`, `price_before`, `price_after`, `message`, `payment_method`, `limit_from`, `limit_to`, `time_of_payment`, `quick_sell`, `created_date`) VALUES
(5, 11, 1, 1, '13.00', '2132.00', '0.12321000', '8564.70', '9677.00', '', 'Bank Transfer', '21321.00', '21321.00', 40, 0, '2018-05-21 04:35:28'),
(6, 11, 1, 1, '12.00', '2132.00', '0.21000000', '8564.70', '9591.00', '', 'Bank Transfer', '213.00', '312321.00', 32, 1, '2018-05-21 04:39:12'),
(7, 11, 2, 1, '21.00', '321.00', '0.00000001', '687.14', '831.00', '', 'Bank Transfer', '3.00', '321.00', 123, 0, '2018-05-21 04:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_listing_status`
--

CREATE TABLE `user_listing_status` (
  `user_listing_status_id` int(11) NOT NULL,
  `user_listing_status` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_listing_status`
--

INSERT INTO `user_listing_status` (`user_listing_status_id`, `user_listing_status`) VALUES
(1, 'Pending'),
(2, 'Pending Payment'),
(3, 'Payment Received'),
(4, 'Completed'),
(5, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `user_trade_info`
--

CREATE TABLE `user_trade_info` (
  `user_trade_info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trades` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0',
  `average_time` int(11) NOT NULL DEFAULT '0',
  `trusted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` decimal(9,2) NOT NULL,
  `currency_code` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `user_crypto_wallet`
--
DROP TABLE IF EXISTS `user_crypto_wallet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_crypto_wallet`  AS  select `user_crypto`.`user_id` AS `user_id`,`user_crypto`.`crypto_id` AS `crypto_id`,`user`.`username` AS `username`,`crypto`.`crypto` AS `crypto`,(select sum(`sum_crypto`.`amount`) from `user_crypto` `sum_crypto` where ((`sum_crypto`.`crypto_id` = `crypto`.`crypto_id`) and (`sum_crypto`.`user_id` = `user`.`user_id`))) AS `total_amount`,(select sum(`user_listing`.`amount`) from `user_listing` where ((`user_listing`.`crypto_id` = `crypto`.`crypto_id`) and (`user_listing`.`user_id` = `user`.`user_id`))) AS `locked_amount` from ((`user_crypto` left join `user` on((`user_crypto`.`user_id` = `user`.`user_id`))) left join `crypto` on((`user_crypto`.`crypto_id` = `crypto`.`crypto_id`))) group by `user_crypto`.`user_id`,`user_crypto`.`crypto_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_resource`
--
ALTER TABLE `account_resource`
  ADD PRIMARY KEY (`account_resource_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `crypto`
--
ALTER TABLE `crypto`
  ADD PRIMARY KEY (`crypto_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`role_access_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `crypto_id` (`crypto_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_crypto`
--
ALTER TABLE `user_crypto`
  ADD PRIMARY KEY (`user_crypto_id`),
  ADD KEY `crypto_id` (`crypto_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_listing`
--
ALTER TABLE `user_listing`
  ADD PRIMARY KEY (`user_listing_id`),
  ADD KEY `user_listing_status_id` (`user_listing_status_id`) USING BTREE,
  ADD KEY `crypto_id` (`crypto_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `user_listing_status`
--
ALTER TABLE `user_listing_status`
  ADD PRIMARY KEY (`user_listing_status_id`);

--
-- Indexes for table `user_trade_info`
--
ALTER TABLE `user_trade_info`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_resource`
--
ALTER TABLE `account_resource`
  MODIFY `account_resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `crypto`
--
ALTER TABLE `crypto`
  MODIFY `crypto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_crypto`
--
ALTER TABLE `user_crypto`
  MODIFY `user_crypto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_listing`
--
ALTER TABLE `user_listing`
  MODIFY `user_listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_listing_status`
--
ALTER TABLE `user_listing_status`
  MODIFY `user_listing_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_crypto`
--
ALTER TABLE `user_crypto`
  ADD CONSTRAINT `user_crypto_ibfk_1` FOREIGN KEY (`crypto_id`) REFERENCES `crypto` (`crypto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_crypto_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_listing`
--
ALTER TABLE `user_listing`
  ADD CONSTRAINT `user_listing_ibfk_2` FOREIGN KEY (`user_listing_status_id`) REFERENCES `user_listing_status` (`user_listing_status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_listing_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_listing_ibfk_4` FOREIGN KEY (`crypto_id`) REFERENCES `crypto` (`crypto_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_trade_info`
--
ALTER TABLE `user_trade_info`
  ADD CONSTRAINT `user_trade_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
