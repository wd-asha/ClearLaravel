-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2023 г., 21:24
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clear`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/category/empty-image.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `caption`, `about`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Стекло', 'glass', 'Чистящие средства для стекла и зеркал', '<p>Помыть стекла в доме так, чтобы они сверкали чистотой? Наши современные средства для мойки и чистки стекол позволяют «навести красоту» просто и быстро. Но теперь главной проблемой для хозяек стало найти лучшее средство среди множества предложений</p>', 'media/category/glass.jpg', NULL, NULL),
(2, 'Камень', 'stone', 'Моющие средства для натурального камня', '<p>Гранитная и мраморная облицовка очень практичны, однако правильный уход все же необходим, чтобы поддержать безупречный вид камня долгие годы. Выбрать средство для ухода за рабочей стенкой на кухне или столешницей не сложно: мы предлагаем качественные товары, которые отлично справляются с поставленной задачей</p>', 'media/category/stone.jpg', NULL, NULL),
(3, 'Дерево', 'wood', 'Чистящие средства для дерева', '<p>Сохранить внешний вид изделий из древесины несложно, если их правильно чистить и мыть специальными средствами для деревянных материалов. Мы предлагает большое количество средств для очистки. Однако, важно знать, как применяются подобные вещества</p>', 'media/category/wood.jpg', NULL, NULL),
(4, 'Инвентарь', 'inventory', 'Инвентарь для мойки полов и окон', '<p>Инвентарь для мытья полов подбирается исходя из поставленной задачи, с учетом общей площади, вида напольного покрытия, загрязненности пола, удаленности источника воды и многого другого. А также множество предметов, которые могут потребоваться при мытье пластиковых или деревянных окон снаружи и изнутри квартиры</p>', 'media/category/floo.jpg', NULL, NULL),
(5, 'Хозтовары', 'goods', 'Хозяйственные товары', '<p>Хозтовары для уборки помещений требуются в любом доме, учреждении или компании. У нас можно подобрать любые товары для уборки (мешки, освежители воздуха, метлы, ведра и многое другое), а также бытовую и профессиональную химию. Уборка может производиться своими силами, либо с помощью специальных компаний, оказывающих клининговые услуги</p>', 'media/category/goods.jpg', NULL, NULL),
(6, 'Стирка', 'wash', 'Средства для стирки', '<p>Современная химическая промышленность предлагает несколько видов средств для стирки белья: жидкие, порошковые и брикетированные. Они отличаются стоимостью, дозировкой, скоростью растворения и другими важными характеристиками. Чтобы текстильное изделие, одежда, постельное или обувь, отстиралось качественнее и безопаснее, необходимо оптимально подобрать моющий состав по типу и цвету ткани</p>', 'media/category/wash.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_21_102343_create_roles_table', 1),
(8, '2023_11_21_181709_create_categories_table', 2),
(13, '2023_11_22_062641_create_products_table', 3),
(14, '2023_11_24_084846_add_filds_to_products_table', 4),
(15, '2023_11_25_192520_create_wishlists_table', 5),
(16, '2023_11_26_164902_add_fields_to_users_table', 6),
(17, '2023_11_28_112256_create_subscribers_table', 7),
(22, '2023_11_29_064732_create_order_items_table', 8),
(23, '2023_11_29_064927_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int NOT NULL DEFAULT '0',
  `order_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `slug`, `user_id`, `user_name`, `order_email`, `order_delivery`, `order_date`, `order_phone`, `order_status`, `order_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 'Admin', 'admin@gmail.com', 'Челябинская обл, Аша, Ленина, 48-60', '4444', '89043000734', 0, '85', '2023-12-01 04:37:30', '2023-12-01 04:37:30', NULL),
(2, NULL, 1, 'Admin', 'admin@gmail.com', 'Челябинская обл, Аша, Ленина, 48-60', '666', '89043000734', 0, '510', '2023-12-01 04:40:23', '2023-12-01 04:40:23', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int UNSIGNED DEFAULT NULL,
  `product_qty` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_title`, `product_price`, `product_qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 18, 'Мешки для мусора биоразлагаемые, 60 л., зеленые, в рулоне, 20 шт.', 85, 1, '2023-12-01 04:37:30', '2023-12-01 04:37:30', NULL),
(2, 2, 18, 'Мешки для мусора биоразлагаемые, 60 л., зеленые, в рулоне, 20 шт.', 85, 6, '2023-12-01 04:40:23', '2023-12-01 04:40:23', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int UNSIGNED DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aroma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pack` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news` int UNSIGNED DEFAULT NULL,
  `hits` int UNSIGNED DEFAULT NULL,
  `promo` int UNSIGNED DEFAULT NULL,
  `density` int UNSIGNED DEFAULT NULL,
  `ph` int UNSIGNED DEFAULT NULL,
  `image1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/product/empty-image.png',
  `image2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/product/empty-image.png',
  `weight` int UNSIGNED DEFAULT NULL,
  `volume` int UNSIGNED DEFAULT NULL,
  `quantity` int UNSIGNED DEFAULT NULL,
  `amount` int UNSIGNED DEFAULT NULL,
  `status` int UNSIGNED NOT NULL DEFAULT '1',
  `price` int UNSIGNED DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `forma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `washing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `machine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bracing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `country`, `brand`, `aroma`, `release`, `pack`, `model`, `series`, `news`, `hits`, `promo`, `density`, `ph`, `image1`, `image2`, `weight`, `volume`, `quantity`, `amount`, `status`, `price`, `desc`, `about`, `created_at`, `updated_at`, `deleted_at`, `forma`, `material`, `color`, `purpose`, `washing`, `depth`, `arm`, `machine`, `bracing`, `mop`) VALUES
(1, 'Средство для мытья стекол Mr Muscle Профессионал, спрей, 500 мл', 1, 'Россия', 'Mr Muscle', NULL, 'Спрей', '105 x 50 x 270 мм', NULL, NULL, 1, 0, 0, NULL, NULL, 'media/product/1783377427255339.jpg', 'media/product/1783377427255893.jpg', 586, 500, NULL, 10, 1, 175, '<p>Средство для мытья стекол очень быстро и эффективно удаляет любые загрязнения, делая поверхность сияющей и чистой. Благодаря наличию в составе нашатырного спирта продукт не оставляет разводов</p>', '<p>Средство также подходит для мытья кафеля, внешних частей различных \r\nэлектрических приборов, витрин, стекол и зеркал автомобиля, \r\nхромированных и стальных изделий.</p><p>Содержит нашатырный спирт для кристального блеска без разводов. Идеально\r\n подходит для мытья оконного, витринного, автомобильного стекла, зеркал,\r\n кафеля, внешних панелей бытовых злектроприборов, хромированных \r\nповерхностей, поверхностей из нержавеющей стали</p><p>Не рекомендуется использовать для очистки полированных и лакированных деревянных поверхностях</p><p>При попадании в глаза вызывает раздражение. Беречь от детей. Не вдыхать \r\nпары средства. Использовать только в хорошо проветриваемых помещениях. \r\nНе смешивать с другими чистящими средствами. После применения вымыть  \r\nвымыть и высушить руки. При попадании в глаза незамедлительно промыть их\r\n большим количеством воды и обратиться за медицинской помощью. Не \r\nглотать! При случайном проглатывании не вызывать рвоту, выпить 1-2 \r\nстакана воды и при необходимости обратиться за медицинской помощью</p><p>Состав: вода, 5% 2-гексилоксиэтанол, изопропаноламин, отдушка, гидроксид аммония, а-ПАВ, амфотерное ПАВ, красители</p><p>Срок хранения 2 года<br></p>', '2023-11-23 06:25:18', '2023-11-23 15:16:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Средство для мытья стекол и поверхностей Mr Muscle со спиртом, спрей, 500 мл', 1, 'Нидерланды', 'Mr Muscle', NULL, 'Спрей', '105 x 50 x 270 мм', NULL, NULL, 0, 1, 0, NULL, NULL, 'media/product/1783377648618127.jpg', 'media/product/1783377648618707.jpg', 560, 500, NULL, 10, 1, 130, '<p>Идеально подходит для окон, зеркал, кафеля, автомобильных стекол, панелей бытовых электроприборов, поверхности холодильника. Не используйте на полированных и лакированных деревянных поверхностях</p>', '<p>При попадании в глаза вызывает раздражение. Беречь от детей. Не вдыхать \r\nпары средства. Использовать только в хорошо проветриваемых помещениях. \r\nНе смешивать с другими чистящими средствами. После применения вымыть и \r\nвысушить руки</p><p>При попадании в глаза незамедлительно промыть их большим количеством \r\nводы и обратиться за медицинской помощью. Не глотать! При случайном \r\nпроглатывании не вызывать рвоту, выпить 1-2 стакана воды и при \r\nнеобходимости обратиться за медицинской помощью</p><p>Состав: вода, органические растворители, изопропиловый спирт, гидроксид \r\nаммония, а-ПАВ менее 5%, консервант, отдушка, эмульгатор, краситель</p><p>Хранить при температуре от -5 до +25\'C в сухом, недоступном для детей месте</p><p>Срок хранения 2 года<br></p>', '2023-11-23 06:25:18', '2023-11-23 23:08:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Средство для мытья окон и зеркал Clin, яблоко, спрей, 500 мл', 1, 'Австрия', 'Clin', 'Яблоко', 'Спрей', '102 x 50 x 255 мм', NULL, NULL, 0, 0, 1, NULL, NULL, 'media/product/1783377669404801.jpg', 'media/product/1783377669410440.jpg', 550, 500, NULL, 10, 1, 185, '<p>Средство для мытья окон, зеркал и стеклянных поверхностей, обеспечивает блеск и сияние без разводов. Отталкивает воду и грязь. Имеет два режима: спрей – для широких поверхностей, пена – для стойких загрязнений</p>', '<p>Состав: более или менее 30% воды, более 5% изопропилового спирта, более \r\n5% анионных ПАВ, более 5% моноэфиров гликолей, более 5% полимера, более \r\n5% консерванта, более 5% отдушки, более 5% красителя, более 5% битрекса</p><p>Хранить в хорошо вентилируемом месте при температуре от +5 до +40С</p><p>По окончании срока годности утилизировать, как бытовые отходы</p><p>Срок годности 1095 дней<br></p>', '2023-11-23 06:25:18', '2023-11-23 23:11:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Очиститель Bravo Pavimenti, нейтральный, 1 л., TENAX', 2, 'Италия', 'Tenax', NULL, NULL, NULL, NULL, 'Bravo', 1, 0, 0, 1, 1, 'media/product/1783385609397485.jpg', 'media/product/1783385609398118.jpg', NULL, 1000, NULL, 10, 1, 1030, '<p>Нейтральное моющее средство (мыло для камня), которое можно использовать на мраморе, граните, керамической плитке, резине, пластике и дереве. Тщательно очищает и удаляет жир, не повреждая даже самые деликатные поверхности</p>', '<p>Препарат может также наноситься автоматически с помощью машины для мойки полов/полотера</p><p>Развести от 10 до 30 граммов продукта в 1 литре теплой воды. Нанести \r\nполученный раствор при помощи ткани, губки или специальных щеток для \r\nочистки. Нет необходимости смывать</p><p>Расход зависит от разбавления<br></p>', '2023-11-23 06:25:18', '2023-11-23 23:14:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Очиститель Bravo Sgrassatore, щелочной, 1л., TENAX', 2, 'Италия', 'Tenax', NULL, NULL, NULL, NULL, 'Bravo', 0, 1, 0, 1, 12, 'media/product/1783385649246555.jpg', 'media/product/1783385649246994.jpg', NULL, 1000, NULL, 10, 1, 1300, '<p>Сильноконцентрированное щелочное моющее средство на водной основе для удаления загрязнений синтетической природы (воск, краски, смолы, синтетические масла и чернила) и маслянистой природы (масла, животные и растительные жиры, мыло)</p>', '<p>Благодаря своей особой формуле, продукт тщательно очищает и удаляет жир, не повреждая даже самые деликатные поверхности</p><p>Препарат может также наноситься автоматически с помощью машины для мойки\r\n полов/полотера для ухода за каменными полами в больших помещениях, \r\nтаких как супермаркеты, кинотеатры, торговые центры, аэропорты и т.д.</p><p>Используйте от 10 до 50 граммов продукта на 1 литр теплой воды, в случае\r\n особо стойких загрязнений необходимо увеличить количество продукта. \r\nНанести на поверхность, равномерно распределить продукт тканью, оставить\r\n действовать в течение  нескольких минут, а затем смыть водой. В случае \r\nособо стойких загрязнений нанесите в чистом виде продукт локально</p><p>Расход зависит от разбавления<br></p>', '2023-11-23 06:25:18', '2023-11-23 23:17:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Очиститель Bravo Disincrostante, кислотный, 1 л., TENAX', 2, 'Италия', 'Tenax', NULL, NULL, NULL, NULL, 'Bravo', 0, 0, 1, 1, 2, 'media/product/1783385669667760.jpg', 'media/product/1783385669669054.jpg', NULL, 1000, NULL, 10, 1, 1250, '<p>Сильнодействующий кислотосодержащий очиститель на водной основе. Эффективно удаляет высолы, известковый налет, строительную грязь, следы краски и пятен ржавчины</p>', '<p>Благодаря специальной формуле, очиститель эффективно удаляет высолы, \r\nизвестковый налет, строительные загрязнения, следы краски и пятен \r\nржавчины. Быстро и эффективно действует при очистке тяжелых \r\nнеорганических загрязнений. Идеален для очистки входных групп и фасадов.\r\n Легко смывается, не оставляет разводов</p><p>Не применяйте продукт на полированном мраморе, оцинкованных поверхностях, керамике, меди или латуни</p><p>Перед началом работы необходимо защитить поверхности от возможности \r\nповреждений кислотой. Если поверхность очень абсорбирующая, перед \r\nначалом работы она должна быть смочена очень хорошо водой . Нанесите \r\nразведенный продукт на поверхность, оставьте его как минимум на 2-3 \r\nминуты, в зависимости от уровня загрязнения. Максимум через 30 минут \r\nпромыть водой. В случае очень стойких загрязнений повторите обработку \r\nтаким же образом. Для небольших поверхностей можно применять средство \r\nвручную, без использования специального оборудования</p><p>Рекомендуем протестировать на образце материала, если поверхность обрабатывается впервые</p><p>Расход зависит от разбавления<br></p>', '2023-11-23 06:25:18', '2023-11-23 23:19:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Средство для мытья пола Mr.Proper, лимон, жидкое, 1.5 л.', 3, 'Россия', 'Mr.Proper', 'Лемон', 'Гель', '130 x 55 x 330 мм', NULL, NULL, 1, 0, 0, NULL, NULL, 'media/product/1783418352655497.jpg', 'media/product/1783418352662805.jpg', 1600, NULL, NULL, 10, 1, 225, '<p>Жидкость удаляет до 100% грязи, жира и въевшихся пятен, придает свежесть\r\n и невероятный блеск. Очищает даже в холодной воде. Можно использовать \r\nкак в разбавленной, так и в чистой форме<br></p>', '<p>Подробные инструкции по применению указаны на упаковке. После очищения \r\nповерхностей, соприкасающихся с пищевыми продуктами, необходимо промыть \r\nих водой</p><p>Состав: менее 5% анионные ПАВ, неионогенные ПАВ; консерванты, \r\nароматизирующие добавки, цитраль, цитронеллол, гераниол, гексилкоричный \r\nальдегид, лимонен, линаноол</p><p>Срок годности 548 дней<br></p>', '2023-11-23 23:31:18', '2023-11-24 09:10:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Средство для мытья пола Mr.Proper, лавандовое спокойствие, жидкое, 1 л.', 3, 'Россия', 'Mr.Proper', 'Лаванда', 'Гель', '130 x 55 x 280 мм', NULL, NULL, 0, 1, 0, NULL, NULL, 'media/product/1783418920099186.jpg', 'media/product/1783418920105627.jpg', 1000, NULL, NULL, 10, 1, 200, '<p>Жидкость предназначена для мытья полов, стен и других твердых \r\nповерхностей с любым покрытием. Входящие в состав активные вещества \r\nделикатно очищают даже сложные и въевшиеся пятна<br></p>', '<p>Подробные инструкции по применению указаны на упаковке. После очищения \r\nповерхностей, соприкасающихся с пищевыми продуктами, необходимо промыть \r\nих водой</p><p>Можно использовать как в разбавленной, так и в чистой форме</p><p>Состав: менее 5% неионогенные ПАВ; консерванты, ароматизирующие добавки,\r\n амилциннамал, бутилфенил метилпропионал, гераниол, гексилкоричный \r\nальдегид, лимонен, линаноол</p><p>Срок годности 18 месяцев<br></p>', '2023-11-23 23:40:19', '2023-11-23 23:48:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Средство для мытья пола Mr.Proper, горный ручей и прохлада, жидкое, 1 л.', 3, 'Россия', 'Mr.Proper', 'Свежесть', 'Гель', '130 x 55 x 280 мм', NULL, NULL, 0, 0, 1, NULL, NULL, 'media/product/1783419079932003.jpg', 'media/product/1783419079940135.jpg', 1000, NULL, NULL, 10, 1, 200, '<p>Состав легко справляется с налетом и въевшимися пятнами на пластике, \r\nдереве и крашеных металлических изделиях. В особо сложных случаях \r\nжидкость можно применять в не разведенном виде<br></p>', '<p>Подробные инструкции по применению указаны на упаковке. После очищения \r\nповерхностей, соприкасающихся с пищевыми продуктами, необходимо промыть \r\nих водой</p><p>Можно использовать как в разбавленной, так и в чистой форме</p><p>Состав: менее 5% неионогенные ПАВ; консерванты, ароматизирующие добавки,\r\n амилциннамал, бутилфенил метилпропионал, гераниол, гексилкоричный \r\nальдегид, лимонен, линаноол</p><p>Срок годности 18 месяцев<br></p>', '2023-11-23 23:42:51', '2023-11-24 09:14:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Ariel Pods Всё-в-1 Color Капсулы для стирки, 23 шт.', 6, 'Франция', 'Ariel', NULL, 'Капсулы', '11.3 х 11.3 х 25.7 см', NULL, NULL, 1, 0, 0, NULL, NULL, 'media/product/1783457506158339.jpg', 'media/product/1783457506158896.jpg', 835, NULL, 23, 10, 1, 900, '<p>Жидкое средство для автоматической стирки с тремя раздельными секциями \r\nкомпонентов, каждый из которых находится в отдельной капсуле. До начала \r\nпроцесса стирки они не смешиваются благодаря водорастворимой пленке, что\r\n обеспечивает прекрасный результат<br></p>', '<p>Средство успешно справляется с пятнами от еды и сохраняет яркость \r\nтканей. При этом расходуется только требуемое количество средства</p><p>Капсулы для стирки ARIEL обладают высококонцентрированными моющими \r\nсвойствами. Их очень просто использовать — просто положите капсулу в \r\nбарабан стиральной машины</p><p>Можно также добавить кондиционер для дополнительной мягкости</p><p>Хранить капсулы следует в сухом месте во избежание склеивания их между собой</p><p>Гарантия производителя — 2 года<br></p>', '2023-11-24 09:53:38', '2023-11-24 09:53:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Гель для стирки Frosch для цветного белья, 2 л', 6, 'Германия', 'Frosch', NULL, 'Гель', NULL, NULL, NULL, 0, 1, 0, NULL, NULL, 'media/product/1783469357936188.jpg', 'media/product/1783469357936737.jpg', NULL, 2000, NULL, 10, 1, 700, '<p>Изготавливается из натуральных компонентов, которые бережно ухаживают за\r\n тканями, не давая им выгорать на солнце или выстирываться. Средство \r\nпредназначено для ручной и машинной стирки. 2 литра хватает на 20 стирок\r\n белья средней загрязненности<br></p>', '<p>Купить его можно для обеспечения чистоты детской, взрослой одежды. \r\nСредство предназначено для ручной и машинной стирки (необходимо \r\nсоблюдать рекомендации производителя).</p><p>Не содержит фосфатов и формальдегидов, полностью соответствует требованиям ЕЭС</p><p>Специальные компоненты защищают цветные ткани от выгорания или выстирывания цвета, не повреждают структуру материала</p><p>Гель эффективен в холодной и теплой воде (30-60°), что позволяет стирать разные по составу вещи, сохраняя их внешний вид</p><p>Состав: 5-15% неионогенные пав, мыло, 5% анионные пав, фосфонатов, \r\nэнзимы (протеаза, амилаза), ароматизирующие добавки (лимонен, линалоол, \r\nцитронеллол, амилциннамаль, гексилциннамаль, бензилсалицилат, \r\nароматизирующие добавки). прочие компоненты: соль яблочной кислоты, в \r\nнебольшом количестве пищевые красители<br></p>', '2023-11-24 13:02:00', '2023-11-24 13:02:00', NULL, NULL, NULL, NULL, 'Для цветных тканей', 'Авто и ручная', NULL, NULL, NULL, NULL, NULL),
(12, 'Гель-концентрат для стирки Frosch, морские минералы, 2 л', 6, 'Германия', 'Frosch', NULL, 'Гель', NULL, NULL, NULL, 0, 0, 1, NULL, NULL, 'media/product/1783469641099701.jpg', 'media/product/1783469641100268.jpg', NULL, 2000, NULL, 10, 1, 540, '<p>Концентрированное жидкое средство Frosch \"Морские минералы\" эффективно \r\nотстирывает белье и выводит пятна благодаря натуральным экстрактам \r\nморских минералов. Подходит для предварительной обработки \r\nтрудно выводимых пятен<br></p>', '<p>С ПАВ возобновляемого растительного происхождения, с высоким и быстрым биологическим расщеплением</p><p>Отсутствие опасных химикатов, таких как фосфаты, бораты, формальдегиды, галоген органические компоненты, ПВХ</p><p>Безопасные для кожи формулы, протестированные дерматологами. Минимальное\r\n использование мягких консервантов и тщательно отобранных ароматизаторов\r\n или полный отказ от них</p><p>Действующие вещества: мыло, морские минералы, отбеливатель</p><p>Состав: 5-15% анионные ПАВ, нПАВ, &lt;5% амфотерные ПАВ, неионогенные \r\nПАВ, консервант (молочная кислота), ароматизирующие добавки<br></p><p><br></p>', '2023-11-24 13:06:30', '2023-11-24 13:06:30', NULL, NULL, NULL, NULL, 'Универсальное', 'Авто и ручная', NULL, NULL, NULL, NULL, NULL),
(13, 'Флаундер пластиковый механический складной, 40х11', 4, 'Турция', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, NULL, 'media/product/1783556642728029.jpg', 'media/product/1783556642728569.jpg', NULL, NULL, NULL, 10, 1, 600, '<p>Удобное приспособление для мытья пола под мебелью, витринами и т.д. Обеспечивает наиболее качественную уборку за счет равномерного прилегания к убираемой поверхности всей площади флаундера</p>', '<p>МОП на флаундер крепится при помощи специальных зажимов, что позволяет отжимать МОП не вручную, а в механическом отжиме</p><p>Центральный шарнир дает возможность мыть не только горизонтальную, но и \r\nвертикальную поверхности, например, вертикальную часть лестниц, стены и \r\nт.д.<br></p>', '2023-11-25 12:09:22', '2023-11-25 12:09:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Аллюминий', 'Ножной', 'Зажимы', '40 и 50 см.'),
(14, 'МОП плоский из хлопка петлевой, 50х15, с ушками и кармашками', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, 'media/product/1783556914624381.jpg', 'media/product/1783556914624918.jpg', NULL, NULL, NULL, 10, 1, 337, '<p>Для влажной уборки, из хлопка. Предназначен для уборки твердых поверхностей: плитка, кафель, ламинат, паркет и др.<br></p>', '<p>Состоит из хлопка и имеет форму плоского прямоугольника, такая форма \r\nпозволяет удобно собрать грязь по углам и захватить большую площадь \r\nубираемой поверхности, что в свою очередь уменьшает временные затраты на\r\n уборку больших площадей<br></p><p>Уход за изделием: стирка при температуре до 60 градусов, не допускается сушка в барабане стиральной машины, не отбеливать</p><p>Сфера применения: гостиницы, рестораны, кафе, бары, здравоохранение, повседневная уборка, промышленность<br></p>', '2023-11-25 12:13:41', '2023-11-25 12:13:41', NULL, '50 х 15 см.', '100% хлопок', 'Бежевый', 'Повседневная уборка', NULL, NULL, NULL, NULL, 'Ушки и кармашки', NULL),
(15, 'Держатель для шубки с поворотным механизмом, 35 см', 4, 'Турция', 'Euromop', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, 'media/product/1783558631667813.jpg', 'media/product/1783558631668346.jpg', NULL, NULL, NULL, 10, 1, 430, '<p>Пластиковый держатель шубки для мытья окон с вращающимся положением. \r\nпредназначен для использования с ручкой-удлинителем при мытье стекол на \r\nвысоте<br></p>', '<p>Предназначен для использования с ручкой-удлинителем при мытье стекол на \r\nвысоте, но может, при необходимости, применяться и без ручки-удлинителя.\r\n Имеет поворотный механизм для более комфортного мытья труднодоступных \r\nмест</p><p>Специальная облегчённая конструкция корпуса держателя выполняет 2 \r\nфункции: уменьшение веса держателя и увеличение количества воды, \r\nудерживаемого шубкой. Оба аспекта особенно важны при мытье стекол на \r\nвысоте с использованием ручек-удлинителей большой длины<br></p>', '2023-11-25 12:40:58', '2023-11-25 12:40:58', NULL, '350 мм', 'Ударопрочный пластик', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Ведро 9.5 л для уборки с отжимом (сетчатый), пластик, зеленое', 5, 'Россия', NULL, NULL, '27 x 35 21.5 см.', NULL, NULL, NULL, 1, 0, 0, NULL, NULL, 'media/product/1783558918641458.jpg', 'media/product/1783558918647467.jpg', 400, 9500, NULL, 10, 1, 350, '<p>Прямоугольное ведро с отжимом. Используется для мытья полов в комплекте с\r\n насадкой МОП. Благодаря специальной выемке слив воды производится \r\nаккуратно, без разбрызгивания<br></p>', '<p>Подходит для уборки небольших площадей<br></p>', '2023-11-25 12:45:32', '2023-11-25 12:45:32', NULL, 'Прямоугольная', 'Полипропилен', 'Зеленый', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Салфетки универсальные, плотная микрофибра, 30х30 см., комплект', 5, 'Китай', NULL, NULL, '30 x 30 см.', NULL, NULL, NULL, 0, 1, 0, NULL, NULL, 'media/product/1783559177185252.jpg', 'media/product/1783559177187906.jpg', 100, NULL, 3, 8, 1, 246, '<p>Универсальные салфетки в комплекте из 3 штук (розовая, зеленая, желтая),\r\n из плотной микрофибры. Предназначены для ухода за различными видами \r\nповерхностей. Могут использоваться как в сухом, так и во влажном виде<br></p>', NULL, '2023-11-25 12:49:39', '2023-12-01 04:21:54', NULL, NULL, 'Микрофибра', 'Вариативный', 'Универсальное', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Мешки для мусора биоразлагаемые, 60 л., зеленые, в рулоне, 20 шт.', 5, 'Россия', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, 'media/product/1783559469204709.jpg', 'media/product/1783559469207099.jpg', 128, 6000, 20, 5, 1, 85, '<p>Предназначены для сбора, хранения, транспортировки и утилизации бытовых \r\nотходов. Широко используются в офисах, дома, в строительной, медицинской\r\n сфере, супермаркетах или на улице, в специальных урнах для мусора<br></p>', NULL, '2023-11-25 12:54:17', '2023-12-01 04:39:36', NULL, '60 x 70 см.', 'Полиэтилен', 'Зеленый', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `user_name`, `user_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Михаил', 'szn-asha@bk.ru', '2023-11-28 06:58:21', '2023-11-28 06:58:21', NULL),
(2, NULL, NULL, 'wd-asha@bk.ru', '2023-11-28 07:02:16', '2023-11-28 23:47:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `shipping` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `shipping`, `phone`) VALUES
(1, 'Admin', 1, 'admin@gmail.com', NULL, '$2y$10$n0m/3xPGScH.eSJT3yCSSed8KkGj.3FTgiQ5bw4U13mYZsyMo5FSW', NULL, '2023-11-21 05:31:44', NULL, NULL, 'Челябинская обл, Аша, Ленина, 48-60', '89043000734'),
(2, 'Author', 2, 'author@gmail.com', NULL, '$2y$10$J4v8Vyc5dJz5g0vG7KaJ4.rY198BxuBhdp9XNyJEzbXE8NSHMScrS', NULL, '2023-11-21 05:31:45', '2023-11-22 12:38:00', NULL, NULL, NULL),
(4, 'Михаил', 2, 'szn-asha@bk.ru', NULL, '$2y$10$y7JpnuvBCPtAsCEXneBWMOoUonq9i29VygYT6CpVZV40D/REJetUq', 'go6aaK6pkxlUWkpL0Ne2tjG9Y0PrzyEBJH4kHNXCNydGdMybjBfDZyCBXwbp', '2023-11-27 14:26:46', '2023-11-28 05:12:05', NULL, 'Челябинская обл, Аша, Ленина, 48-60', '89043000734');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
