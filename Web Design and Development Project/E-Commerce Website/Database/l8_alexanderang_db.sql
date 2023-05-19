-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 05, 2021 at 04:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l8_alexanderang_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `ccost` float NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `cimage` varchar(255) DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cname`, `ccost`, `qty`, `cimage`, `userid`, `dated`) VALUES
(107, 'WANTON NOODLES \r\n<br>\r\n(also lovingly known as Mee Kia)', 1.5, 1, 'images/shop/Noodles/wantonnoodles.jpg', 1, '2021-08-03 11:40:46'),
(106, 'CUBIE CRISPY NOODLES\r\n', 4.9, 1, 'images/shop/Noodles/CubieCrispyNoodles-247x300.jpg', 1, '2021-08-03 11:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` varchar(25) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `banner` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `active`, `banner`) VALUES
('1', 'NOODLES', 1, 'images/category noodles.jpg'),
('2', 'WRAPPERS', 1, 'images/category wrappers.jpg'),
('3', 'PANTRY', 1, 'images/category pantry.jpg'),
('4', 'KITCHENWARE', 1, 'image/shop/kitchenware/IMG_8420-247x300.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `hpnumber` int(10) NOT NULL,
  `profilepic` varchar(100) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `email`, `name`, `pw`, `address`, `hpnumber`, `profilepic`, `active`) VALUES
(1, 'alex@gmail.com', 'Alex123', '111', '180 Ang Mo Kio Ave 8', 12345678, 'profilepics/85473_jaysontatum.png', 1),
(3, 'bill@gmail.com', 'Bill Gates', '222', '123 happy ave', 12344444, 'profilepics/8878_jaysontatum.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orddetails`
--

DROP TABLE IF EXISTS `orddetails`;
CREATE TABLE IF NOT EXISTS `orddetails` (
  `id` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `prid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unitprice` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `reqdate` datetime DEFAULT NULL,
  `deliverdate` datetime DEFAULT NULL,
  `canceldate` datetime DEFAULT NULL,
  `orderstatus` enum('O','D','C') DEFAULT 'O',
  `totalquantity` int(11) DEFAULT NULL,
  `totalprice` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `memberid`, `orderdate`, `reqdate`, `deliverdate`, `canceldate`, `orderstatus`, `totalquantity`, `totalprice`) VALUES
(1, 1, '2021-07-28 16:26:31', '2021-08-05 16:26:00', NULL, '2021-07-28 16:27:36', 'C', 1, 12.8),
(2, 1, '2021-07-28 16:27:49', '2021-08-05 16:27:00', NULL, '2021-07-30 10:51:26', 'C', 1, 12.8),
(3, 1, '2021-07-28 20:59:28', '2021-08-07 20:59:00', NULL, NULL, 'D', 2, 14.7),
(4, 1, '2021-07-30 10:47:16', '2021-08-07 10:47:00', NULL, NULL, 'O', 2, 44.6),
(5, 1, '2021-07-30 10:47:26', '2021-08-07 10:47:00', NULL, NULL, 'O', 1, 4.2),
(6, 3, '2021-07-30 20:17:56', '2021-08-05 20:17:00', NULL, NULL, 'O', 1, 4.9),
(7, 1, '2021-08-01 02:35:54', '2021-09-09 02:35:00', NULL, NULL, 'O', 1, 8.8);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `ccost` float NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `cimage` varchar(255) DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `cname`, `ccost`, `qty`, `cimage`, `userid`, `dated`, `orderid`) VALUES
(1, 'SPICY CHAR SIEW KOLO NOODLES', 12.8, 1, 'images/shop/Noodles/charsiew_kolo.jpg', 1, '2021-07-28 08:26:31', 1),
(2, 'SPICY CHAR SIEW KOLO NOODLES', 12.8, 1, 'images/shop/Noodles/charsiew_kolo.jpg', 1, '2021-07-28 08:27:49', 2),
(3, 'GREEN CHILLI (SAMBAL HIJAU - INDONESIAN STYLE)', 8.8, 1, 'images/shop/Pantry/green_chilli.jpg', 1, '2021-07-28 12:59:28', 3),
(4, 'EMERALD WRAPPER', 5.9, 1, 'images/shop/wrapper/emerald_wrapper.jpg', 1, '2021-07-28 12:59:28', 3),
(5, 'GREEN CHILLI (SAMBAL HIJAU - INDONESIAN STYLE)', 8.8, 1, 'images/shop/Pantry/green_chilli.jpg', 1, '2021-07-30 02:47:16', 4),
(6, 'Mini Grinder with Ceramic Burr for Spices', 35.8, 1, 'images/shop/kitchenware/IMG_8420-247x300.jpg', 1, '2021-07-30 02:47:16', 4),
(7, 'Assam Seafood Sauce', 4.2, 1, 'images/shop/Pantry/assam_sauce.jpg', 1, '2021-07-30 02:47:26', 5),
(8, 'CUBIE CRISPY NOODLES\r\n', 4.9, 1, 'images/shop/Noodles/CubieCrispyNoodles-247x300.jpg', 3, '2021-07-30 12:17:56', 6),
(9, 'GREEN CHILLI (SAMBAL HIJAU - INDONESIAN STYLE)', 8.8, 1, 'images/shop/Pantry/green_chilli.jpg', 1, '2021-07-31 18:35:54', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(255) NOT NULL,
  `productdescrip` varchar(1000) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unitprice` float NOT NULL,
  `qty` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `productdescrip`, `productimage`, `category_id`, `unitprice`, `qty`, `active`) VALUES
(1, 'EMERALD NOODLES', '<br>\r\n360gm / 4 pcs\r\n<br>\r\nShelf life\r\n<br>\r\n2 days stored in room temperature, 30 days chilled (4 degree c)', 'images/shop/Noodles/emeraldnoodles.jpg', 1, 1.55, 100, 1),
(2, 'WANTON NOODLES \r\n<br>\r\n(also lovingly known as Mee Kia)', '<br>\r\nShelf life<br>\r\n2 days stored in room temperature, 30 days chilled (4 degree c)', 'images/shop/Noodles/wantonnoodles.jpg', 1, 1.5, 100, 1),
(3, 'YEE-FU NOODLES', '<br>\r\nEstimate 315gm<br>\r\nShelf life<br>\r\n9 months', 'images/shop/Noodles/yeefunoodles.jpg', 1, 9.9, 100, 1),
(4, 'EMERALD WRAPPER', '<br>\r\n200gm / approx. 45pcs<br>\r\nShelf life\r\n2 days stored in room temperature, 30 days chilled', 'images/shop/wrapper/emerald_wrapper.jpg', 2, 5.9, 100, 1),
(5, 'GREEN CHILLI (SAMBAL HIJAU - INDONESIAN STYLE)', '<br>\r\n220g\r\n<br>\r\nGreen chili can be used as desired for stir-fry dishes or noodle sauce.\r\n<br>\r\nIt is made with fresh ingredients, do not contain any unnecessary artificial flavorings, colorings, preservatives and additives.', 'images/shop/Pantry/green_chilli.jpg', 3, 8.8, 100, 1),
(6, 'RED SAMBAL (SAMBAL MERAH-INDONESIA STYLE)', '<br>\r\n220g\r\n<br>\r\nRed Sambal can be used as desired for stir-fry dishes or noodle sauce.\r\n<br>\r\nIt is made with fresh ingredients, do not contain any unnecessary artificial flavorings, colorings, preservatives and additives.', 'images/shop/Pantry/red_sambal.jpg', 3, 9.9, 100, 1),
(7, 'XO SAUCE', '<br>\r\n220g\r\n<br>\r\nClassic Oriental fusion of conpoy scallops, dried pearl ebi and dehydrated red curly red chili in a spicy chili oil.', 'images/shop/Pantry/xo_sauce.jpg', 3, 15.9, 100, 1),
(8, 'Assam Seafood Sauce', '<br>\r\n200g\r\n<br>\r\nNo added preservatives.\r\n<br>\r\nCountry of Origin: Malaysia\r\n<br>\r\nHalal Certified\r\n', 'images/shop/Pantry/assam_sauce.jpg', 3, 4.2, 100, 1),
(9, 'Mini Grinder with Ceramic Burr for Spices', '<br>\r\nCeramic grinders are best for manual grinding because it helps ensure the blades don’t get damaged, making them last longer.\r\n<br>\r\nBurr grinders use two blades that come together to produce a perfectly uniform grind size. ', 'images/shop/kitchenware/IMG_8420-247x300.jpg', 4, 35.8, 100, 1),
(10, 'CUBIE CRISPY NOODLES\r\n', 'Thinner version of our Cubie Noodles.\r\nSimply toss a couple of cubes into boiling \r\nbroth for 40 seconds to enjoy their springy \r\ntexture and rich flavours. \r\n<br>\r\nWeight\r\n240gm, 8 cubes\r\n<br>\r\nShelf life\r\nRefer to packaging', 'images/shop/Noodles/CubieCrispyNoodles-247x300.jpg', 1, 4.9, 100, 1),
(11, 'SPICY CHAR SIEW KOLO NOODLES', 'All sauces are slow cooked gently for optimum texture.\r\n\r\nSpicy Char Siew Kolo Noodles comes with blend of sweet and savoury that is distinctive of \r\na well-loved char siew sauce, made even better with \r\na dash of chili padi to add a kick of spiciness.', 'images/shop/Noodles/charsiew_kolo.jpg', 1, 12.8, 100, 1),
(12, 'HK - STYLE WANTON WRAPPER (TRANSLUCENT)', '<p><strong>Weight<br />\r\n</strong>250gm (approx. 35pcs)</p>\r\n<p><strong>Size</strong><strong><br />\r\n</strong>Square Size: 100mm x 100mm</p>\r\n<p><strong>Shelf life<br />\r\n</strong>2 days stored in room temperature, 30 days chilled</p>\r\n\r\n<p>&nbsp;</p>											<h2 class=\"yikes-custom-woo-tab-title yikes-custom-woo-tab-title-ingredients\">INGREDIENTS </h2><ul style=\"color: #777777;\">\r\n<li>High Protein Wheat Flour</li>\r\n<li>Pasteurized Liquid Egg</li>\r\n<li>Salt</li>\r\n<li>Water</li>\r\n<li>Lemon yellow</li>\r\n<li>Tapioca Starch</li>\r\n<li>Potassium Carbonate</li>\r\n</ul>', 'images/shop/wrapper/hkwrapper.jpg', 2, 6.9, 100, 1),
(13, 'GYOZA WRAPPER', '<p>Thin and velvety smooth, the thin edges of these wrappers are well-suited for pleating, and crisp perfectly after frying.  </p>\r\n<p><strong>Weight</strong><br />\r\n200g (app 25-30 pcs)</p>\r\n<p><strong>Size</strong><br />\r\nRound Size: 80mm x 80mm</p>\r\n<p><strong>Shelf life</strong><br />\r\n8 hours stored in room temperature, 7 days chilled</p>											\r\n										<h2>Cooking Methods</h2><p>Heat oil in a frying pan, place gyoza flat side down and cook for 3 minutes over medium high heat. Next, add enough water to cover just the pan base. Cover immediately and steam until most of the water evaporates. Remove the lid, add a dash of sesame oil around the pan and cook uncovered till the gyoza is crisp on the bottom.</p>\r\n\r\n																	<h2>Ingredients</h2><ul>\r\n<li>High Protein Wheat Flour</li>\r\n<li>Salt</li>\r\n<li>Water</li>\r\n<li>Tapioca Starch</li>\r\n<li>Potassium Carbonate</li>\r\n</ul>', 'images/shop/wrapper/gyoza1.jpg', 2, 6.2, 100, 1),
(14, 'U-SHAPE BAMBOO STRAINER', 'Length 20cm, Width 20cm', 'images/shop/kitchenware/IMG_7330-2.jpg', 4, 4.8, 100, 1),
(15, 'LESONG WOODEN PESTLE', 'Using sustainable palm wood from Cambodia, it is designed specifically for grinding whole peppercorns, rather than pounding with a normal pestle and mortar. Grinding releases the peppercorns’ flavor, and best ground just before using.', 'images/shop/kitchenware/IMG_4563_edited.jpg', 4, 18, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipecategory`
--

DROP TABLE IF EXISTS `recipecategory`;
CREATE TABLE IF NOT EXISTS `recipecategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipecategory`
--

INSERT INTO `recipecategory` (`id`, `catname`, `banner`) VALUES
(1, 'Noodles', 'images/dishes/Wanton-Tossed-In-Oyster-Sauce-1-1500px.jpg'),
(2, 'Wrappers', 'images/dishes/Gyoza-2-1500px.jpg'),
(3, 'Using Condiments', 'images/dishes/Sticky-Nyinya-Five-Spice-Chicken.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipename` varchar(255) NOT NULL,
  `recipeinfo` varchar(255) NOT NULL,
  `recipeingredients` varchar(1000) NOT NULL,
  `recipemethod` varchar(3000) NOT NULL,
  `recipepic` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `recipename`, `recipeinfo`, `recipeingredients`, `recipemethod`, `recipepic`, `category_id`) VALUES
(1, 'FISH BALL MEE POK', 'Serves 1\r\n<br>\r\n10 minutes cooking time\r\n<br>\r\n15 minutes total', '<h2>Ingredients</h2> <ul> <li> <p>Noodle sauce</p> </li> <li> <p>1-2 Tbsp Handpicked Old School Chili</p> </li> <li> <p>2-3 Tbsp Fish Sauce (Use chinese fish sauce)</p> </li> <li> <p>1-2 Tbsp Black Vinegar</p> </li> <li> <p>1 Tbsp Onion or Lard Oil</p> </li> </ul> <ul> <li> <p> serving of Handpicked Thick Egg Noodles (Mee Pok)</p> </li> <li> <p>2-3 fish balls and fish cakes slices</p> </li> <li> <p>2 prawns</p> </li> <li> <p>1-2 leaf of lettuce</p> </li> <li> <p>Spring onions as garnish</p> </li> </ul>', '<h2>Method</h2> <ol> <li>Mix red onions and lady\'s finger with Assam Seafood Sauce in a bowl.</li> <li>Tap dry the fish with kitchen towels. Lay on steam plate.</li> <li>Spread Assam mixture on top of the fish.</li> <li>Steam for 7mins.</li> <li>Serve immediately with calamansi juice over the fish.</li> </ol>', 'images/dishes/fish-ball-mee-pok.jpg', 1),
(2, 'PRAWN LA MIAN SOUP', 'A convenient meal prepared in less than 15 mins.\r\n <br>The prawn soup is made from not one but two types of wild caught shrimp. It boasts a clean, sharp and shrimp-y flavour.', '<h2>Ingredients</h2> <ul> <li>50g Prawn Mee Paste</li> <li>1 serving of Handpicked La Mian</li> <li>2-3 medium prawns</li> <li>3-5 slices of fish cakes</li> <li>1/2 handful of beansprout</li> <li>2 stalks of kangkong</li> <li>Fried onions (optional)</li> <li>1 Hard boiled egg (optional)</li> <li>Red cut chili (optional) </li> </ul>', '<h2>Method</h2> <ol> <li>In a pot of 450ml boiling water, blanched beansprout and kangkong. Set aside.</li> <li>In the same pot, cook 1 serving of La Mian (refer to pack for timing) Remove and strain.</li> <li>Using another pot, boil 300ml water, add in 50g prawn mee paste.</li> <li>Meantime, you can cook your ingredients like prawns and fish cakes in the prawn mee soup to further enhance the sweetness.</li> <li>Pour prawn mee soup into your cooked La Mian. Serve immediately.</li> </ol>', 'images/dishes/Prawn-La-Mian-Soup-1-800x600.jpg', 1),
(3, 'SIU MAI TOPPED WITH TOBIKO', 'Add into your Dim Sum assortment. Easy to achieve, good for snacks and morning breakfast. Tobiko adds an additional bite with the fun pop in your mouth.', '<h2>Ingredients</h2> <ul> <li>1 packet of Handpicked Dumpling Wrapper</li> <li>40 g of prawn meat, coarsely chopped</li> <li>1 Chinese dried mushrooms, rehydrated and diced</li> <li>100 g of pork belly, coarsely chopped</li> <li>1/4 teaspoon ground white pepper</li> <li>1 teaspoon Shaoxing wine</li> <li>1/2 teaspoon sesame oil</li> <li>1/2 teaspoon caster sugar</li> <li>1 teaspoon oyster sauce</li> <li>1/4 teaspoon cornflour</li> <li>1/4 teaspoon of salt</li> <li>1 teaspoon Tobiko </li> </ul>', '<h2>Method</h2> <ol> <li>Marinate the prawn meat with 1 teaspoon of salt for 5 minutes. Wash away the salt under running water until the water runs clear.</li> <li>Place the prawn in a colander to drain away as much water as possible.</li> <li>Combined all the ingredients and pound it on the plate repeatedly under it forms a firm mass, like a meatloaf or burger patty.</li> <li>Place the filling on the Handpicked Dumpling Wrapper. Rotate the siu mai and squeeze it at the waist. Press down the meat with a metal spoon to level it. Flatten the base of the siu mai so that it can sit steadily on the steamer.</li> <li>Steam over high heat, lid on for 10 minutes.</li> <li>Remove from steamer, topped with Tobiko. Ready to serve.</li> </ol>', 'images/dishes/Siu-Mai-2-510x383.jpg', 2),
(4, 'LAKSA LA MIAN', 'Laksa, with its spicy, fragrant coconut-milk gravy, is a firm local favourite in Singapore. Served with choice noodles, fish cake, taupok and prawns, this rich savoury-spicy noodle dish makes a delightful treat.', '<h2>Ingredients</h2> <ul> <li>1 box of Family Recipe Noodles in Laksa Soup</li> <li>1 hard boil egg</li> <li>6pcs of medium prawns</li> <li>2 tau pok (beancurd skin)</li> <li>1 fish cake, sliced</li> <li>Sambal chili (optional)</li> <li>Laksa leaf (optional)</li> </ul>', '<h2>Method</h2> <ol> <li>Cook 1 serving of noodle in a pot of 450ml boiling water for 50 seconds. Remove and cook the 2<sup>nd</sup> Place noodles in 2 serving bowls.</li> <li>Bring 700ml water to boil.</li> <li>Add 2 packets of laksa and coconut powder, stir well.</li> <li>Cook prawns, tau pok, fish cake in the laksa soup.</li> <li>Pour laksa soup into bowl of noodles. Add sambal chili for extra heat. Laksa leaf as garnish. Ready to serve.</li> </ol>', 'images/dishes/Laksa-510x383.jpg', 1),
(5, 'WOLF BERRY NOODLES WITH SPINACH SOUP', 'All you need is just 30 minutes to have a sumptuous homecooked meal.\r\n\r\n', '<h2>Ingredients</h2> <ul> <li>90g Wolf Berry Noodles</li> <li>1 bunch Chinese spinach</li> <li>2-3 cloves garlic, roughly chopped</li> <li>1 handful wolfberries</li> <li>1 handful dried anchovies</li> <li>3 soup bowls of water</li> <li>light soy sauce</li> <li>white pepper</li> </ul>', '<h2>Method</h2> <ol> <li> <div>Place dried anchovies in a saucepan with the water and bring to a boil for 10-15 minutes.</div> </li> <li> <div>Remove the spinach leaves from the stems, and rinse leaves well. Do not include the thick stems.</div> </li> <li> <div>Remove dried anchovies from the broth when done.</div> </li> <li>Add wolfberries &amp; garlic into the saucepan and bring to a boil.</li> <li>Add spinach leaves and bring the broth to a boil again. Do not over boil the vegetables or they will turn yellowish.Season with white pepper and light soy sauce to taste.</li> <li>Bring a large pot of water to the boil. Add in one serving of noodles, using a pair of chopsticks to separate the noodle strands. Cook for 50 seconds, remove and strain off any excess water.</li> <li>Place noodles in a bowl, add in the hot broth. Serve immediately. <div></div> </li> </ol>', 'images/dishes/wolfberry1_1500px-800x600.jpg\r\n', 1),
(6, 'HOMEMADE WANTONS', 'There are many wanton recipes out there, this is one of our favourite, passionately shared by our homecook-friend, Taff. The meat filling is packed with layers of taste. There is no turning back after you try this recipe.', '<h2>Ingredients</h2> <ul> <li>1 pack Handpicked Wanton Wrappers (square or round)</li> <li>500g Minced Pork (mixture of lean and fatty pork)</li> <li>8 pc Prawns, washed and deveined</li> <li>3 large pc Dried Mushrooms, soak and finely chopped</li> <li>10 pc Water Chestnuts, finely chopped</li> <li>2 large pc Dried Flatfish (do not wash)</li> <li>Pinch of White Pepper</li> <li>Pinch of Salt</li> <li> 1/4 tsp Light Soya Sauce</li> <li>1 tsp Corn Flour</li> </ul>', '<h2>Method</h2>\r\n<ol>\r\n<li>Marinate minced pork with pepper, salt and light soya sauce.</li>\r\n<li>Roughly chop the prawns and add to the minced pork, along with the mushrooms and water chestnut. Set the filling mixture aside.</li>\r\n<li>Roast dried flatfish in the oven at 180C for 5-7 minutes, until the dried flatfish is crispy and fragrant. Make sure it does not burnt or it will taste bitter.</li>\r\n<li>Grind roasted flatfish into powder, and add to the filling mixture.</li>\r\n<li>Next, add corn flour to the filling and stir to mix evenly.</li>\r\n<li>Using your Handpicked wanton wrappers, fill and wrap into desired shape. You can choose to serve these wantons deep fried, steamed or in a serving broth, together with your favourite Handpicked noodles.</li>\r\n</ol>\r\n', 'images/dishes/Handmade-Wantons-1500px.jpg', 2),
(8, 'STEAM ASSAM FISH', 'A classic Malay and Minangkabau dish, Assam Pedas (literally translated to ‘sour spicy’), is tangy, spicy, appetizing and best served with rice.', '<h2>Ingredients</h2>\r\n<ul>\r\n<li>1 packet of Handpicked Assam Seafood Sauce</li>\r\n<li>600-800g fresh produced fish</li>\r\n<li>1 medium red onion - cut into wedges &nbsp;</li>\r\n<li>2-3 lady\'s finger/ okra - cut into pieces</li>\r\n<li>1 calamansi lime</li>\r\n</ul>', '<h2>Method</h2>\r\n<ol>\r\n<li>Mix red onions and lady\'s finger with Assam Seafood Sauce in a bowl.</li>\r\n<li>Tap dry the fish with kitchen towels. Lay on steam plate.</li>\r\n<li>Spread Assam mixture on top of the fish.</li>\r\n<li>Steam for 7mins.</li>\r\n<li>Serve immediately with calamansi juice over the fish.</li>\r\n</ol>', 'images/dishes/Steam-Assam-Fish-1.jpg', 3),
(7, 'GYOZA', 'The making of gyoza requires a bit more time. So, we would advise you to make enough to last you for a while. You just need to freeze them, whenever you feel like eating it, boil the gyoza as a healthier option or pan fry them for a tastier servings.', '<h2>Ingredients</h2> <ul> <li>2 packs Handpicked Gyoza Wrappers</li> <li>300g Round cabbage, finely chopped</li> <li>1 tsp Salt</li> <li>500g Minced Pork</li> <li>50g Chinese Chives, finely chopped (optional)</li> <li>50g Spring Onions/Scallions, finely chopped</li> <li>1 tbsp Young Ginger, minced</li> <li>1 tbsp Garlic, minced</li> <li>2½ tsp Light Soy Sauce</li> <li>1 tbsp Cooking Sake</li> <li>2 tbsp Sesame Oil</li> <li>1 tbsp Chilli Bean Paste (Dou Ban Jiang)</li> </ul> <p><em><strong>Serving dip:</strong></em></p> <ul> <li>Young Ginger, julienned</li> <li>Rice Vinegar</li> <li>Light Soy Sauce</li> <li>Chilli Oil (optional)</li> </ul>', '<h2>Method</h2> <ol> <li>Toss the chopped cabbage in a bowl with the salt. Set aside for 30 minutes then squeeze the cabbage to extract water. Discard the water.</li> <li>Combine the cabbage, minced pork, chives (if using), spring onions, ginger, garlic, light soy sauce, sake, sesame oil and chilli bean paste in a large bowl. Mix well and refrigerate for 30 minutes.</li> <li>Using your Handpicked gyoza wrappers, fill and wrap into desired shape. (link to gyoza wrapping video)</li> <li>To cook the gyoza, preheat a shallow pan filled with just enough oil to thinly coat its base. Use a pan that has a lid. A non-stick surface also makes the whole process much easier.</li> <li>Place the gyoza in the pan (frozen ones go in frozen). Be careful not to overcrowd the pan or they will stick together. Fry them until they develop a crisp, golden brown base.</li> <li>Drizzle some water into the pan and cover it immediately. (Add just enough water to cover the base of the pan, and be sure to drizzle some onto the gyoza themselves so that the crimped edges don’t get crispy.)</li> <li>Let the dumplings steam until their skins become somewhat translucent. Uncover the pan and continue to cook until the water has evaporated.</li> <li>Serve immediately with julienned ginger, rice vinegar, soy sauce and chilli bean paste (if using) combined to taste.</li> </ol> <div></div> <div><em><strong>Note: </strong></em></div> <ul> <li>To prevent your gyozas from sticking together, sprinkle a thin layer of flour onto a baking tray or line a baking tray with baking paper. Place the gyozas individually onto the tray, taking care not to overlap.</li> <li>It’s always lovely to keep a batch of goyzas in the freezer for a quick, fuss-free meal. To store, place the tray of gyozas into the freezer until the gyozas are frozen. Next, transfer the frozen gyozas into a ziplock bag and store in the freezer until it’s time to eat!</li> <li>When cooking frozen gyoza, there’s no need to bring the gyozas to room temperature before cooking. Simply add to the pan frozen as cook as per the instructions above.</li> </ul>', 'images/dishes/Gyoza-1-1500px-510x383.jpg', 2),
(9, 'SPICED CURRY CAULIFLOWER', 'Using Nyonya Curry Powder', '<h2>Ingredients</h2>\r\n<ul>\r\n<li>12g Nyonya Curry Powder</a></li>\r\n<li>1 large head cauliflower, chopped into 1 1/2&#8243; florets</li>\r\n<li>1 tbsp hot sauce</li>\r\n<li>2 tsp maple syrup / honey</li>\r\n<li>1 tbsp cooking oil</li>\r\n<li>2 tbsp nutritional yeast (more for a cheesier flavour)</li>\r\n<li>1 tbsp cornstarch</li>\r\n<li>1/4 tsp sea salt</li>\r\n</ul>', '<h2>Method</h2>\r\n<ol>\r\n<li>Preheat oven to 204°C/400°F. Line a baking sheet with nonstick parchment paper.</li>\r\n<li>Add all ingredients except cauliflower to a large mixing bowl. Whisk to combine thoroughly. Add cauliflower and toss to coat evenly.</li>\r\n<li>Spread cauliflower evenly on baking sheet. Roast for 40 minutes, turning halfway through, or until cauliflower is tender with dark golden brown edges.</li>\r\n<li>Cauliflower will keep tightly sealed in the refrigerator up to 4 days. To reheat, add to a 204°C/400°F oven for 5 minutes, or until warmed through and slightly crispy. Enjoy!</li>\r\n</ol>', 'images/dishes/Spiced-Curry-Cauliflower-1.jpg', 3),
(10, 'STICKY NYONYA FIVE SPICE CHICKEN', 'A good marinate for your next chicken dish. It has a nice 5 spice fragrant and yet not overpowering.', '<h2>Ingredients</h2>\r\n<p>4 skin-on, boneless chicken thighs (or any skin-on chicken pieces)</p>\r\n<p><strong>MARINATE</strong></p>\r\n<ul>\r\n<li>12g Nyonya Five Spice Powder</a></li>\r\n<li>1 tbsp hoisin sauce</li>\r\n<li>1 tbsp oyster sauce</li>\r\n<li>2 tbsp honey</li>\r\n<li>1 tbsp dark soy sauce</li>\r\n<li>1 tbsp light soy sauce</li>\r\n<li>3 garlic cloves, finely grated</li>\r\n</ul>\r\n<p><strong>BASTING SAUCE</strong></p>\r\n<ul>\r\n<li>2 tbsp honey</li>\r\n<li>1 tbsp dark soy sauce</li>\r\n</ul>\r\n<p><strong>GARNISHING</strong></p>\r\n<ul>\r\n<li>1 lime</li>\r\n<li>1 red chilly</li>\r\n<li>15g black sesame seeds</li>\r\n<li>parsley</li>\r\n</ul>', '<h2>Method</h2>\r\n<ol>\r\n<li>In a large bowl, combine the hoisin, honey, oyster sauce, dark soy sauce, light soy sauce, garlic and Nyonya Five Spice Powder. Add the chicken pieces and mix until well coated. Marinate for at least 6 hours and up to overnight.</li>\r\n<li>Preheat oven to 180°C/356°F (fan-forced). Line a large baking tray or roasting dish with foil to ease cleaning later. Place the chicken pieces onto the baking rack. Cook in the oven for 10 minutes.</li>\r\n<li>Mix the basting sauce ingredients together in a small bowl. Remove the chicken from the oven and brush the top of the pieces with the basting sauce. Place back into the oven to cook for a further 5 minutes or until cooked through.</li>\r\n<li>Sprinkle black sesame seeds onto chicken. Garnish with lime, red chilly and parsley. Good to enjoy with rice!</li>\r\n</ol>', 'images/dishes/Sticky-Nyinya-Five-Spice-Chicken.jpg', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
