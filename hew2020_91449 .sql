-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-02-22 08:38:36
-- サーバのバージョン： 10.4.14-MariaDB
-- PHP のバージョン: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `hew2020_91449`
--
CREATE DATABASE IF NOT EXISTS `hew2020_91449` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hew2020_91449`;

-- --------------------------------------------------------

--
-- テーブルの構造 `aquariums`
--

DROP TABLE IF EXISTS `aquariums`;
CREATE TABLE IF NOT EXISTS `aquariums` (
  `aquarium_id` int(11) NOT NULL AUTO_INCREMENT,
  `aquarium_name` varchar(50) NOT NULL,
  `aquarium_image` varchar(255) NOT NULL,
  `aquarium_3D` varchar(255) NOT NULL,
  PRIMARY KEY (`aquarium_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `aquariums`
--

INSERT INTO `aquariums` (`aquarium_id`, `aquarium_name`, `aquarium_image`, `aquarium_3D`) VALUES
(17, 'testUser1\'sAquarium', 'no_image', './csvs/scene_1.csv'),
(18, 'testUser2\'sAquarium', 'no_image', './csvs/scene_2.csv'),
(19, 'testUser5\'sAquarium', 'no_image', './csvs/scene_5.csv'),
(20, 'testUser3\'sAquarium', 'no_image', './csvs/scene_3.csv'),
(21, 'testUser4\'sAquarium', 'no_image', './csvs/scene_4.csv');

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(2) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, '淡水魚'),
(2, '海水魚');

-- --------------------------------------------------------

--
-- テーブルの構造 `fishes`
--

DROP TABLE IF EXISTS `fishes`;
CREATE TABLE IF NOT EXISTS `fishes` (
  `fish_id` int(11) NOT NULL AUTO_INCREMENT,
  `fish_name` varchar(50) NOT NULL,
  `fish_image` varchar(255) NOT NULL,
  `fish_3D` varchar(255) NOT NULL,
  PRIMARY KEY (`fish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `freight_companies`
--

DROP TABLE IF EXISTS `freight_companies`;
CREATE TABLE IF NOT EXISTS `freight_companies` (
  `freight_company_id` int(11) NOT NULL AUTO_INCREMENT,
  `freight_company_name` varchar(50) NOT NULL,
  PRIMARY KEY (`freight_company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `freight_companies`
--

INSERT INTO `freight_companies` (`freight_company_id`, `freight_company_name`) VALUES
(1, 'クロネコヤマト'),
(2, '佐川急便');

-- --------------------------------------------------------

--
-- テーブルの構造 `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `inquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `inquiry_subject` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inquiry_mail_address` varchar(255) NOT NULL,
  `inquiry_category_id` int(11) NOT NULL,
  `inquiry_content` varchar(2000) NOT NULL,
  `inquiry_status_id` int(11) NOT NULL,
  `inquiry_datetime` datetime NOT NULL,
  PRIMARY KEY (`inquiry_id`),
  KEY `inquiry_category_id` (`inquiry_category_id`),
  KEY `inquiry_status_id` (`inquiry_status_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `inquiry_categories`
--

DROP TABLE IF EXISTS `inquiry_categories`;
CREATE TABLE IF NOT EXISTS `inquiry_categories` (
  `inquiry_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `inquiry_category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`inquiry_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `inquiry_status`
--

DROP TABLE IF EXISTS `inquiry_status`;
CREATE TABLE IF NOT EXISTS `inquiry_status` (
  `inquiry_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `inquiry_status_name` varchar(25) NOT NULL,
  PRIMARY KEY (`inquiry_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `my_aquariums`
--

DROP TABLE IF EXISTS `my_aquariums`;
CREATE TABLE IF NOT EXISTS `my_aquariums` (
  `my_aquarium_id` int(11) NOT NULL AUTO_INCREMENT,
  `my_aquarium_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aquarium_id` int(11) NOT NULL,
  `my_aquarium_created_at` datetime NOT NULL,
  `my_aruarium_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`my_aquarium_id`),
  KEY `aquarium_id` (`aquarium_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `my_aquariums`
--

INSERT INTO `my_aquariums` (`my_aquarium_id`, `my_aquarium_name`, `user_id`, `aquarium_id`, `my_aquarium_created_at`, `my_aruarium_updated_at`) VALUES
(17, 'testUser1\'sAquarium', 1, 17, '2021-02-22 15:25:40', '2021-02-22 16:21:35'),
(18, 'testUser2\'sAquarium', 2, 18, '2021-02-22 15:27:42', '2021-02-22 15:28:37'),
(19, 'testUser5\'sAquarium', 5, 19, '2021-02-22 15:30:17', '2021-02-22 15:33:54'),
(20, 'testUser3\'sAquarium', 3, 20, '2021-02-22 15:46:49', '2021-02-22 15:47:20'),
(21, 'testUser4\'sAquarium', 4, 21, '2021-02-22 15:48:30', '2021-02-22 15:48:44');

-- --------------------------------------------------------

--
-- テーブルの構造 `my_aquarium_accessories`
--

DROP TABLE IF EXISTS `my_aquarium_accessories`;
CREATE TABLE IF NOT EXISTS `my_aquarium_accessories` (
  `my_aquarium_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `accessory_number` int(11) NOT NULL AUTO_INCREMENT,
  `accessory_coordinate` varchar(50) NOT NULL,
  PRIMARY KEY (`my_aquarium_id`,`product_id`,`accessory_number`),
  UNIQUE KEY `accessory_number` (`accessory_number`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `my_aquarium_fish`
--

DROP TABLE IF EXISTS `my_aquarium_fish`;
CREATE TABLE IF NOT EXISTS `my_aquarium_fish` (
  `fish_id` int(11) NOT NULL,
  `my_aquarium_id` int(11) NOT NULL,
  `my_fish_name` varchar(50) NOT NULL,
  `fish_created_at` datetime NOT NULL,
  PRIMARY KEY (`fish_id`,`my_aquarium_id`,`my_fish_name`),
  KEY `my_aquarium_id` (`my_aquarium_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `accessory_3D` varchar(255) DEFAULT NULL,
  `product_created_at` datetime NOT NULL,
  `product_deleted_at` datetime DEFAULT NULL,
  `product_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `accessory_3D`, `product_created_at`, `product_deleted_at`, `product_updated_at`) VALUES
(1, 1, 'グッピー', 1300, '条鰭綱カダヤシ目カダヤシ科グッピー属に分類される魚類。\r\n\r\n1858年頃、イギリスの植物学者グッピーによって発見され、1859年に学名がつけられた。全長は約5cmで、雄のほうが雌に比べて色も形も派手。卵胎生を行う。古くから熱帯魚として広く親しまれている。日本にも帰化している外来種で、沖縄県や、温泉街の用水路で見ることができる。', NULL, '2021-02-02 15:35:55', NULL, NULL),
(2, 1, 'カージナルテトラ', 2700, '成魚の体長は約4cm。身体上半分の頭部から尾びれの付け根近くにかけてメタリックブルーのラインが入り、下半分は全体が赤色となる。\r\n\r\nネオンテトラに酷似した容姿であり、相違点は下腹部全体が赤く青帯より面積が広いことと、ネオンテトラに比べてやや大柄である点（ネオンテトラは本種より1cmほど小さい）のみで、当初はネオンテトラの亜種または一部変種と考えられていたが、1956年に正式に別種として区別された。 アマゾンのブラックウォーターに住んでおり、生息地域はブラジル北部からコロンビアやベネズエラにかけてのネグロ川上流から中流域、バウペス川やオリノコ川流域の水草が多く浅い小川である。', NULL, '2021-02-02 15:45:44', NULL, NULL),
(3, 1, 'ベタ', 800, 'スズキ目 キノボリウオ亜目オスフロネムス科（かつてはゴクラクギョ科）ゴクラクギョ亜科ベタ属（別名トウギョ属）の淡水魚。\r\n\r\n広義には、ベタ属に含まれる50種ほどの魚をベタ、ベタ類と総称する。「ベタ」は属の学名 Betta で、タイの方言に由来する。\r\n\r\n特に、その中の1種であるベタ・スプレンデンス Betta splendens が、古くから特に観賞魚として世界中で広く親しまれており、狭義には、この種のことだけを指してベタと呼ぶ場合も多い。ただし、他種との繁殖行為がおこなわれることもあり、区別は曖昧である。\r\n\r\n和名が同じタイワンキンギョおよびチョウセンブナとは近縁種である。', NULL, '2021-02-02 15:46:47', NULL, NULL),
(4, 1, 'ハチェット', 1500, 'ハチェットフィッシュとは、アマゾン川や、ペルー、ギアナに棲息する小型カラシン類のガステロペレクス科に分類される淡水魚の総称である。しばしば単に、ハチェットとも略称される。英語で、小型の斧のこと（Hatchet）。', NULL, '2021-02-02 15:48:00', NULL, NULL),
(5, 1, 'アフリカンランプアイ', 1000, '観賞用の卵生メダカの一種である。ナイジェリアやカメルーンに分布している。全長3.5cm程度と小ぶりで、複数匹で飼うと群れをなす。体色は半透明で深みのあるグレーで、目の上部が青い蛍光色に染まる。その上品な体色と群れをなす習性から、水草水槽によく映える。弱酸性の水質を好み、飼育は容易であり、人気が高く、安価に流通している。', NULL, '2021-02-02 15:49:24', NULL, NULL),
(6, 2, 'カクレクマノミ', 2700, '雄性先熟の雌雄同体魚であり、生涯中にオスがメスに性転換する。 ふ化後、群れの中で1番大きい個体がメスに、2番目に大きい個体がオスに性転換し、その他は繁殖能力を持たない未成熟個体に留まる。 群れのメスが死亡するなどして不在になると、オスはメスに、1番大きい未成熟個体がオスに性転換する。\r\n\r\n近縁種のペルクラと同様、センジュイソギンチャクなどのイソギンチャクと共生の関係にあり、住みかとして、また捕食者からの避難のために利用している。イソギンチャクの触手には刺胞（毒針）があるのだが、クマノミ類の魚はそれに耐性があるため、そのようなことが可能である。一般的に、カクレクマノミはペルクラよりも丈夫で、性格は若干大人しい。カクレクマノミは、彼らが住みかとしているイソギンチャクが食べ残したものを餌としている。', NULL, '2021-02-02 15:50:40', NULL, NULL),
(7, 2, 'ルリスズメダイ', 1700, '浅いサンゴ礁や岩礁、タイドプールなどにいる。本州ではあまり見られない。本州でよくみられる「青い魚」は本種ではなく、別の「ソラスズメダイ」である。（よく、間違えられているが、尾が黄色であるのがソラスズメダイである。）沖縄では主にタイドプールで普通に見られる。特に見られる種としては、本種と「ミヤコキセンスズメダイ」、「オヤビッチャ」、「ネズスズメダイ」が多い。', NULL, '2021-02-02 15:51:49', NULL, NULL),
(8, 2, 'ウズマキヤッコ', 5500, '前の由来になった渦巻き模様が非常に特徴的で、「皇帝」を意味する学名の通り、魅力一杯の大型ヤッコ、タテジマキンチャクダイの幼魚時の呼び名です。 成長につれてまるでウズマキだった模様が縦じまに激変する成長振りは　幼魚と成魚の模様が異なる大型ヤッコのなかでも突出しています！ 丈夫なヤッコなので飼育は容易で餌も何でもよく食べます。ヤッコ類は本種に違わず植物質の餌を好んで食べますので　植物質を多く含んだ人工餌を必ず副食として与えましょう。良い餌を食べて育った成魚はとても綺麗になりますが　逆の場合は褐色してしまったりします。性格は比較的温和なので　他魚との混泳もさほど問題なくこなしてくれます。 フィリピンやマニラからコンスタントに入荷があり、入手は容易です。また、体型と色合いが若干異なるインド洋産の地域変異も認められています。', NULL, '2021-02-02 15:58:24', NULL, NULL),
(9, 2, 'ナンヨウハギ', 4000, '成魚は全長20cmほどで、30cmに達するものもいる。体の大部分は青いが、目-体側-尾鰭にを細長くしたような黒い曲線が入る。また、背鰭・臀鰭、尾鰭の上下も黒で縁取られる。尾柄・尾鰭は黄色の三角を描く他、胸鰭の先端も黄色である。胸ビレを激しく上下に動かしてよく泳ぐ。似た配色の魚はおらず、他種との区別は容易である。  体形は他のニザダイ科魚類に似て楕円形でよく側扁するが、口は極端に前に突き出ず、頭部の輪郭は丸い。背鰭の9棘条・臀鰭の3棘条はどれも太く頑丈である。 アフリカ東岸・南日本・オーストラリア北部・キリバスまで、インド太平洋の熱帯海域に広く分布する。日本では高知県以南で記録がある。', NULL, '2021-02-02 16:00:53', NULL, NULL),
(10, 2, 'シマキンチャクフグ', 900, '全長10cm前後の小型種。体側に大きな鞍状斑があるが、橙色の縁取りがないことでハナキンチャクフグと、吻に暗色横帯がなくクマドリキンチャクフグと区別できる。', NULL, '2021-02-02 16:02:38', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`product_image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_image`, `product_id`) VALUES
(1, './images/グッピー.jpg', 1),
(2, './images/カージナルテトラ.jpg', 2),
(3, './images/ベタ.jpg', 3),
(4, './images/ハチェット.jpg', 4),
(5, './images/アフリカンランプアイ.jpg', 5),
(6, './images/カクレクマノミ.jpg', 6),
(7, './images/ルリスズメダイ.jpg', 7),
(8, './images/ウズマキヤッコ.jpg', 8),
(9, './images/ナンヨウハギ.jpg', 9),
(10, './images/シマキンチャクフグ.jpg', 10);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_details`
--

DROP TABLE IF EXISTS `purchase_details`;
CREATE TABLE IF NOT EXISTS `purchase_details` (
  `purchase_history` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(2) NOT NULL,
  `product_unit_price` int(10) NOT NULL,
  PRIMARY KEY (`purchase_history`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_history`
--

DROP TABLE IF EXISTS `purchase_history`;
CREATE TABLE IF NOT EXISTS `purchase_history` (
  `purchase_history` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment` enum('?????????','?N???W?b?g?J?[?h????','?R???r?j????') NOT NULL,
  `purchase_datetime` datetime NOT NULL,
  `freight_company_id` int(11) NOT NULL,
  `tracking_id` int(25) DEFAULT NULL,
  PRIMARY KEY (`purchase_history`),
  KEY `freight_company_id` (`freight_company_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(25) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `questions`
--

INSERT INTO `questions` (`question_id`, `question`) VALUES
(1, '母の旧姓'),
(2, '好きな食べ物'),
(3, '自分の母校');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_address` varchar(255) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `postal_code` char(7) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(25) NOT NULL,
  `user_created_at` datetime NOT NULL,
  `user_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `mail_address` (`mail_address`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `mail_address`, `user_name`, `password`, `last_name`, `first_name`, `postal_code`, `address`, `birthday`, `phone_number`, `question_id`, `answer`, `user_created_at`, `user_deleted_at`) VALUES
(1, 'test1@test.com', 'testUser1', '$2y$10$CMQhLatxxMBEc8hszH3hs.b9fkWTAemTm0qw9qob1pd9.OCp1fZH.', 'test1', 'user1', '0001111', '東京都新宿区西新宿五丁目', '2020-01-01', '000-1111-2222', 1, 'testAnswer', '2021-02-02 00:00:00', NULL),
(2, 'test2@test.com', 'testUser2', '$2y$10$E/oCWfgGmiTEYRQIvY52fu3TN/8aX/sGO5JWqYgcO6uPGnpYOHbLe', 'test2', 'user2', '0002222', '東京都新宿区西新宿', '2000-02-02', '000-2222-2222', 1, '清水', '2021-02-16 00:00:00', NULL),
(3, 'test3@test.com', 'testUser3', '$2y$10$3maLT5Bw5qX7TNGo7wkWS.pcyglALL20j4TJpTegV51kBoi0ceOq6', 'test3', 'user3', '0002222', '東京都新宿区', '2020-03-03', '000-3333-3333', 1, '清水', '2021-02-08 00:00:00', NULL),
(4, 'test4@test.com', 'testUser4', '$2y$10$1yxTJ.N6T0xsFh3m0aMo7uDO1Gh/C.MFVBQdaizWG8bKPe1h2ztMC', 'test4', 'user4', '0004444', '東京都新宿区', '2000-04-04', '000-4444-4444', 1, '清水', '2021-02-22 00:00:00', NULL),
(5, 'test5@test.com', 'testUser5', '$2y$10$aviDV4bt4daOiznwPnLAUehxGzp3vfwLJwLF6ye.TOGvqUCKqQTIu', 'test5', 'user5', '0005555', '東京都新宿区', '2000-05-05', '000-5555-5555', 1, '清水', '2021-02-22 00:00:00', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `wish`
--

DROP TABLE IF EXISTS `wish`;
CREATE TABLE IF NOT EXISTS `wish` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `wish_created_at` datetime NOT NULL,
  PRIMARY KEY (`wish_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_ibfk_1` FOREIGN KEY (`inquiry_category_id`) REFERENCES `inquiry_categories` (`inquiry_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inquiries_ibfk_2` FOREIGN KEY (`inquiry_status_id`) REFERENCES `inquiry_status` (`inquiry_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inquiries_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `my_aquariums`
--
ALTER TABLE `my_aquariums`
  ADD CONSTRAINT `my_aquariums_ibfk_1` FOREIGN KEY (`aquarium_id`) REFERENCES `aquariums` (`aquarium_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `my_aquariums_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `my_aquarium_accessories`
--
ALTER TABLE `my_aquarium_accessories`
  ADD CONSTRAINT `my_aquarium_accessories_ibfk_1` FOREIGN KEY (`my_aquarium_id`) REFERENCES `my_aquariums` (`my_aquarium_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `my_aquarium_accessories_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `my_aquarium_fish`
--
ALTER TABLE `my_aquarium_fish`
  ADD CONSTRAINT `my_aquarium_fish_ibfk_1` FOREIGN KEY (`fish_id`) REFERENCES `fishes` (`fish_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `my_aquarium_fish_ibfk_2` FOREIGN KEY (`my_aquarium_id`) REFERENCES `my_aquariums` (`my_aquarium_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `purchase_details_ibfk_2` FOREIGN KEY (`purchase_history`) REFERENCES `purchase_history` (`purchase_history`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `purchase_history_ibfk_1` FOREIGN KEY (`freight_company_id`) REFERENCES `freight_companies` (`freight_company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `purchase_history_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `wish_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wish_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
