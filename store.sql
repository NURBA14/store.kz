-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 12 2024 г., 19:49
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `count` int NOT NULL,
  `dev_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Nike', '2024-03-12 02:40:21', '2024-03-12 02:40:21', 'nike'),
(2, 'Adidas', '2024-03-12 02:40:27', '2024-03-12 02:40:27', 'adidas');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2024_03_10_063043_create_categories_table', 1),
(18, '2024_03_10_063126_create_products_table', 1),
(19, '2024_03_10_063720_create_carts_table', 1),
(20, '2024_03_10_064012_create_orders_table', 1),
(21, '2024_03_10_101116_add_views_col_products_table', 2),
(22, '2024_03_10_105552_add_slug_col_categories_table', 3),
(23, '2024_03_10_123742_delete_is_dev_col', 4),
(24, '2024_03_11_174755_add_price_col_carts', 5),
(25, '2024_03_11_180702_add_price_col', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `count` int NOT NULL,
  `dev_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_delivere` tinyint NOT NULL DEFAULT '0',
  `received` tinyint NOT NULL DEFAULT '0',
  `delivere_date` timestamp NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` int DEFAULT NULL,
  `price` int NOT NULL,
  `count` int NOT NULL,
  `category_id` int NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `slug`, `name`, `description`, `old_price`, `price`, `count`, `category_id`, `active`, `img_1`, `img_2`, `img_3`, `created_at`, `updated_at`, `views`) VALUES
(1, 'campus-90s', 'Campus 90s', 'Adidas Campus 90s', 25999, 20000, 9, 2, 1, 'image/2024-03-12/dXrzoCFTXW4e8XkH47HhuByL9gfoYFr9lWSTjC1w.jpg', 'image/2024-03-12/lOPx2L3VRAPcEpV2p5aldGqkwupiFX6EezG88SGf.jpg', 'image/2024-03-12/PuxEUC2wllFWWixXIwZdJanWaz7tn4KdqFGdjUd6.jpg', '2024-03-12 02:41:20', '2024-03-12 12:58:57', 0),
(2, 'jarritos', 'Jarritos', 'Nike dunk low Jarritos', 29990, 24999, 25, 1, 1, 'image/2024-03-12/mtFfe2eHJgP8jT9AvYJKhnmFn5pM6VMHeESxDmt8.jpg', 'image/2024-03-12/uxkK1Q05OlNABE6xJsjkOCC7nys3MHCBvGQLtxaT.webp', 'image/2024-03-12/7qcIGUWMXMYKscweSjMcxMsT6L41HQKemo73okgL.jpg', '2024-03-12 02:42:30', '2024-03-12 12:58:55', 0),
(3, 'cactus-jack', 'Cactus Jack', 'Nike jordan 1 low Cactus Jack', 29990, 21000, 15, 1, 1, 'image/2024-03-12/C0TR0klJG6P7s1fHEoyRwnodHAlpavMsG16Tidtf.jpg', 'image/2024-03-12/Tr4z3OrdFfls0HkGLGdm29UHTeHjPgZVeLfc4L0D.jpg', 'image/2024-03-12/KrYUBbkA1n9GnQChcpQLeM0s8AgMTPkmbv2F32Am.jpg', '2024-03-12 02:43:35', '2024-03-12 12:58:53', 0),
(4, 'club-58-gulf', 'Club 58 Gulf', 'Nike dunk low Club 58 Gulf', 29990, 24000, 25, 1, 1, 'image/2024-03-12/LgzNgK04okzQUqCNRe5ZviPrsDKHBOCz7y5xrLmI.jpg', 'image/2024-03-12/q3Vx1k4L8B57s0UQy4m1QqVyQezegU7jycnoxoQU.jpg', 'image/2024-03-12/eCNev4KBhXuWq19AyiQPOysFvRWQdivFnHi6gAdI.jpg', '2024-03-12 02:45:06', '2024-03-12 12:58:51', 1),
(5, 'green-apple', 'Green apple', 'Nike dunk low green apple', 24990, 23000, 10, 1, 1, 'image/2024-03-12/VarwUNvEsCcCe6OTR9npCP20gIIkF0fm0IgfOiEX.jpg', 'image/2024-03-12/T7tsMCZlol6e9Zz7sjOvRsGk4CJkXdatYQPdljFy.jpg', 'image/2024-03-12/Z7gCQ9H46d2LGOW5pvNFIVC3vLqOKnxuzjgYH3BM.jpg', '2024-03-12 02:46:03', '2024-03-12 12:58:48', 28),
(6, 'year-of-the-rabbit', 'Year of the Rabbit', 'Nike dunk low Year of the Rabbit', 29000, 25000, 22, 1, 1, 'image/2024-03-12/jMMOVvWVxf70gfNNDYkVSebgKtZpAUGfFgfCLzye.jpg', 'image/2024-03-12/v0OP8dLr4RsPMH6Na38Aw1gALJkEwtZqiTI8wPBX.jpg', 'image/2024-03-12/MyGp7Kh9HWEngesniBzW2BWieUL8CSIgImPiEUnn.jpg', '2024-03-12 02:47:20', '2024-03-12 12:58:46', 4),
(7, 'lemon-ice', 'Lemon Ice', 'Nike dunk low Lemon Ice', 24000, 22000, 16, 1, 1, 'image/2024-03-12/ibwHWMXbCAXuUDuCFxHTp0olX43C4m23bGi60D73.webp', 'image/2024-03-12/E8lXq3MNRYH2yZdXR6aW2Io6QVbTlf5k0HQFEKrv.webp', 'image/2024-03-12/Ruc0FjyL4TUDHyBKecJM8JMfUCNSziixA5u7HHCw.webp', '2024-03-12 02:48:06', '2024-03-12 12:58:43', 0),
(8, 'voodoo', 'Voodoo', 'Nike dunk Low Voodoo', 27000, 23000, 15, 1, 1, 'image/2024-03-12/TmPecbvhV81Wi3T843libpIc0rr7AOA7ERobJfug.webp', 'image/2024-03-12/LUrwk0zhy3q7h7Bx5TLkT8SO2O1bsUdkDLyr2z5X.jpg', 'image/2024-03-12/QrQb375Ni9eeC42Od2gEIQTzvC1UHUIRBH2dreC2.jpg', '2024-03-12 02:48:52', '2024-03-12 09:35:01', 5),
(9, 'chunky-dunky', 'Chunky Dunky', 'Nike Dunk Low Chunky-Dunbky', 25000, 22000, 9, 1, 1, 'image/2024-03-12/I6cU4PgF0FDtw963MMWvBkB9LpMpBbNg0XPhACRq.jpg', 'image/2024-03-12/mRfi0AhR2SlQPlHZJV4vWi5wuzsvKgFocTCW9z4s.webp', 'image/2024-03-12/36EAp6Lz9LjmN6yQoZoHnrKvU0SymsVxOGOOPOEv.jpg', '2024-03-12 02:49:46', '2024-03-12 12:58:40', 35),
(10, 'blue-sky', 'Blue Sky', 'Nike Dunk Low Blue Sky', 23000, 20000, 23, 1, 1, 'image/2024-03-12/NGjXivtn4hcGg9Zusl5TaeVmKRyuLonkiqaxD3Ua.webp', 'image/2024-03-12/yIpbw9ZcrdOwpAgbsSyvLcki1OS3Ml0wZayow9tS.jpg', 'image/2024-03-12/Aax9e0nJJSMYjYhK5X7WQiBsTEU3RBsqCbHhYp6K.webp', '2024-03-12 06:45:46', '2024-03-12 13:30:53', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '1',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_cart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_cart_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_token_unique` (`token`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
