--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_ctgry` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_size` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data for table `product`
--

INSERT INTO `product` (`item_id`, `item_ctgry`, `item_name`, `item_price`,`item_size`, `item_image`, `item_register`) VALUES
(1, 'Tetra', 'Rummy Nose Tetra', 50.00, '1.5-2 inch', './assets/products/1.jpg',NOW()),  
(2, 'Molly','Black Molly', 15.00, '1.5-2 inch', './assets/products/2.jpg', NOW()),
(3, 'Discus','Discus', 400.00, '5-6inch', './assets/products/3.jpg', NOW()),
(4, 'Gourami','Dwarf Gourami', 150.00, '4-5inch','./assets/products/4.jpg', NOW()),
(5, 'Betta','OHM Butterfly Betta', 200.00, '2.5-3 inch', './assets/products/5.jpg', NOW()),
(6, 'Goldfish','Black Moor Gold Fish', 40.00, '2.5-3inch', './assets/products/6.jpg', NOW()),
(7, 'Driftwood','Driftwood', 180.00, '12-18inch','./assets/products/7.jpg', NOW()),
(8, 'Koi_Carp', 'Koi Carp', 80.00, '6-7inch','./assets/products/8.jpg', NOW()),
(9, 'Tetra', 'Neon Tetra', 35.00, '1.5-2 inch','./assets/products/9.jpg', NOW()),
(10,  'Guppy','Albino Red Tail Guppy', 25.00,'1.5-2 inch', './assets/products/10.jpg', NOW()),
(11,  'Driftwood','Jungle Driftwood', 350.00,'18-24inch', './assets/products/11.jpg', NOW()),
(12,  'Goldfish','Bubble Eyed Goldfish', 60.00,'2.5-3inch', './assets/products/12.jpg', NOW()),
(13,  'Betta','Dumbo Ear Plakat Betta (Lavendar)', 250.00, '2.5-3 inch','./assets/products/13.jpg', NOW()),
(14,  'Molly','Black Mottled Hi-Fin Lyretail Molly', 75.00, '1.5-2 inch','./assets/products/14.jpg', NOW()),
(15,  'Tiger_Barb','Tiger Barb', 75.00,'1.5-2 inch', './assets/products/15.jpg', NOW()),
(16,  'Betta','Super Delta Tail Betta', 80.00,'2.5-3 inch', './assets/products/16.jpg', NOW());

-- --------------------------------------------------------
--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `pswd`) VALUES
(1, 'Snehasish Mondal', 'abc@xyz.com', '12345678'),
(2, 'Harvy Spector', 'xyz@abc.com', '87654321');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;