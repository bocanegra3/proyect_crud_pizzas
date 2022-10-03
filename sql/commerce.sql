-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 01:12:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `commerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'pizzas'),
(2, 'hamburguesas'),
(3, 'picadas'),
(4, 'pancho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `price`, `start_date`, `image`, `id_category`, `description`) VALUES
(7, 'Muzzarella', '1239.30', '2022-08-29 22:49:59', 'img/pizza-muzzarella', 1, NULL),
(8, 'Fugazzeta', '1331.10', '2022-08-29 22:49:59', 'img/fugazzeta', 1, NULL),
(9, 'Napolitana', '1422.90', '2022-08-29 22:49:59', 'img/pizza-napolitana', 1, NULL),
(10, 'Albahaca', '1514.70', '2022-08-29 22:49:59', 'img/pizza-de-albahaca', 1, NULL),
(11, '4 Quesos', '1514.70', '2022-08-29 22:49:59', 'img/pizza-4-quesos', 1, NULL),
(12, 'Rucula y Jamon-Crudo', '1590.44', '2022-08-29 22:49:59', 'img/pizza-rucula-y-jamon-crudo', 1, NULL),
(13, ' Completa Doble', '1459.62', '2022-09-05 23:15:28', 'img/hamburguesa_completa', 2, NULL),
(14, 'Aros de Cebolla', '800.00', '2022-09-07 22:02:54', 'img/aros-de-cebolla-fritos', 3, '18 unidades,incluyen un dip BBQ'),
(17, 'Doble', '500.00', '2022-09-28 22:09:54', 'img/pancho', 4, NULL),
(20, 'Doble con cheddar y parmesano', '1350.00', '2022-09-28 22:50:50', 'img/hamburguesa', 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `products_categories` (`id_category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
