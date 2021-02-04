-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-02-02 09:11:03
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
-- データベース: `hew`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `aquariums`
--

CREATE TABLE `aquariums` (
  `aquarium_id` int(11) NOT NULL,
  `aquarium_name` varchar(50) NOT NULL,
  `aquarium_image` varchar(255) NOT NULL,
  `aquarium_3D` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `fishes` (
  `fish_id` int(11) NOT NULL,
  `fish_name` varchar(50) NOT NULL,
  `fish_image` varchar(255) NOT NULL,
  `fish_3D` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `freight_companies`
--

CREATE TABLE `freight_companies` (
  `freight_company_id` int(11) NOT NULL,
  `freight_company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_subject` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inquiry_mail_address` varchar(255) NOT NULL,
  `inquiry_category_id` int(11) NOT NULL,
  `inquiry_content` varchar(2000) NOT NULL,
  `inquiry_status_id` int(11) NOT NULL,
  `inquiry_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `inquiry_categories`
--

CREATE TABLE `inquiry_categories` (
  `inquiry_category_id` int(11) NOT NULL,
  `inquiry_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `inquiry_status`
--

CREATE TABLE `inquiry_status` (
  `inquiry_status_id` int(11) NOT NULL,
  `inquiry_status_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `my_aquariums`
--

CREATE TABLE `my_aquariums` (
  `my_aquarium_id` int(11) NOT NULL,
  `my_aquarium_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aquarium_id` int(11) NOT NULL,
  `my_aquarium_created_at` datetime NOT NULL,
  `my_aruarium_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `my_aquarium_accessories`
--

CREATE TABLE `my_aquarium_accessories` (
  `my_aquarium_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `accessory_number` int(11) NOT NULL,
  `accessory_coordinate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `my_aquarium_fish`
--

CREATE TABLE `my_aquarium_fish` (
  `fish_id` int(11) NOT NULL,
  `my_aquarium_id` int(11) NOT NULL,
  `my_fish_name` varchar(50) NOT NULL,
  `fish_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `accessory_3D` varchar(255) DEFAULT NULL,
  `product_created_at` datetime NOT NULL,
  `product_deleted_at` datetime DEFAULT NULL,
  `product_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `product_images` (
  `product_image_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_image`, `product_id`) VALUES
(1, './images/グッピー.jpg', 1),
(2, './images/カージナルテトラ.jpg', 2),
(3, './images/ベタ.jpg', 3),
(4, './images/ハチェット.jpg', 4),
(5, './images/アフリカンランプアイ.jpg', 5),
(6, './images/カクレクマノミ.jpeg', 6),
(7, './images/ルリスズメダイ.jpg', 7),
(8, './images/ウズマキヤッコ.jpg', 8),
(9, './images/ナンヨウハギ.jpg', 9),
(10, './images/シマキンチャクフグ.jpg', 10);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_details`
--

CREATE TABLE `purchase_details` (
  `purchase_history` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(2) NOT NULL,
  `product_unit_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `purchase_details`
--

INSERT INTO `purchase_details` (`purchase_history`, `product_id`, `product_quantity`, `product_unit_price`) VALUES
(1, 1, 5, 1300),
(1, 6, 3, 2700),
(2, 2, 20, 2700),
(2, 3, 1, 800),
(2, 5, 10, 1000);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_history`
--

CREATE TABLE `purchase_history` (
  `purchase_history` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment` enum('?????????','?N???W?b?g?J?[?h????','?R???r?j????') NOT NULL,
  `purchase_datetime` datetime NOT NULL,
  `freight_company_id` int(11) NOT NULL,
  `tracking_id` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `purchase_history`
--

INSERT INTO `purchase_history` (`purchase_history`, `user_id`, `payment`, `purchase_datetime`, `freight_company_id`, `tracking_id`) VALUES
(1, 1, '?????????', '2021-02-02 16:22:07', 1, NULL),
(2, 1, '?????????', '2021-02-02 16:22:07', 1, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
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
  `user_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `mail_address`, `user_name`, `password`, `last_name`, `first_name`, `postal_code`, `address`, `birthday`, `phone_number`, `question_id`, `answer`, `user_created_at`, `user_deleted_at`) VALUES
(1, 'test1@test.com', 'testUser1', '$2y$10$CMQhLatxxMBEc8hszH3hs.b9fkWTAemTm0qw9qob1pd9.OCp1fZH.', 'test1', 'user1', '0001111', '東京都新宿区', '2020-01-01', '000-1111-2222', 1, 'testAnswer', '2021-02-02 00:00:00', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `wish`
--

CREATE TABLE `wish` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `wish_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `aquariums`
--
ALTER TABLE `aquariums`
  ADD PRIMARY KEY (`aquarium_id`);

--
-- テーブルのインデックス `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- テーブルのインデックス `fishes`
--
ALTER TABLE `fishes`
  ADD PRIMARY KEY (`fish_id`);

--
-- テーブルのインデックス `freight_companies`
--
ALTER TABLE `freight_companies`
  ADD PRIMARY KEY (`freight_company_id`);

--
-- テーブルのインデックス `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `inquiry_category_id` (`inquiry_category_id`),
  ADD KEY `inquiry_status_id` (`inquiry_status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `inquiry_categories`
--
ALTER TABLE `inquiry_categories`
  ADD PRIMARY KEY (`inquiry_category_id`);

--
-- テーブルのインデックス `inquiry_status`
--
ALTER TABLE `inquiry_status`
  ADD PRIMARY KEY (`inquiry_status_id`);

--
-- テーブルのインデックス `my_aquariums`
--
ALTER TABLE `my_aquariums`
  ADD PRIMARY KEY (`my_aquarium_id`),
  ADD KEY `aquarium_id` (`aquarium_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `my_aquarium_accessories`
--
ALTER TABLE `my_aquarium_accessories`
  ADD PRIMARY KEY (`my_aquarium_id`,`product_id`,`accessory_number`),
  ADD UNIQUE KEY `accessory_number` (`accessory_number`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `my_aquarium_fish`
--
ALTER TABLE `my_aquarium_fish`
  ADD PRIMARY KEY (`fish_id`,`my_aquarium_id`,`my_fish_name`),
  ADD KEY `my_aquarium_id` (`my_aquarium_id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- テーブルのインデックス `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`purchase_history`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`purchase_history`),
  ADD KEY `freight_company_id` (`freight_company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mail_address` (`mail_address`),
  ADD KEY `question_id` (`question_id`);

--
-- テーブルのインデックス `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `aquariums`
--
ALTER TABLE `aquariums`
  MODIFY `aquarium_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `fishes`
--
ALTER TABLE `fishes`
  MODIFY `fish_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `freight_companies`
--
ALTER TABLE `freight_companies`
  MODIFY `freight_company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルのAUTO_INCREMENT `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `inquiry_categories`
--
ALTER TABLE `inquiry_categories`
  MODIFY `inquiry_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `inquiry_status`
--
ALTER TABLE `inquiry_status`
  MODIFY `inquiry_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `my_aquariums`
--
ALTER TABLE `my_aquariums`
  MODIFY `my_aquarium_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `my_aquarium_accessories`
--
ALTER TABLE `my_aquarium_accessories`
  MODIFY `accessory_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `product_images`
--
ALTER TABLE `product_images`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `purchase_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルのAUTO_INCREMENT `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
