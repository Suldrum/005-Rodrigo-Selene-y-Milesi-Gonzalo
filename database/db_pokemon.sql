-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 24-05-2021 a las 19:57:55
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pokemon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  PRIMARY KEY (`id_administrador`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `apellido`, `email`, `contraseña`) VALUES
(1, 'admin1', 'admin1', 'admin1@administracion.com', '1234'),
(2, 'admin2', 'admin2', 'admin2@administracion.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

DROP TABLE IF EXISTS `entrenador`;
CREATE TABLE IF NOT EXISTS `entrenador` (
  `id_entrenador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `apodo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  PRIMARY KEY (`id_entrenador`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`id_entrenador`, `nombre`, `apellido`, `apodo`, `email`, `contraseña`) VALUES
(1, 'juan', 'perez', 'Papo123', 'juan_perez@gmail.com', 'Papo123'),
(2, 'Maria', 'Magdalena', 'MotherOfGod', 'prayGod@heaven.com.ar', 'MotherOfGod'),
(3, 'Ash', 'Ketchum', 'ultimateTrainer', 'ultimateTrainer@entrenador.es', 'ultimateTrainer'),
(4, 'Misty', 'Waterflower', 'tropicalWaterfall', 'aquatic@aqua.mar', 'tropicalWaterfall'),
(5, 'Gary', 'Oak', 'ChampionBlue', 'ViridianCity@gymleader.kan', 'ChampionBlue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id_pokemon` smallint(6) NOT NULL,
  `id_region` tinyint(4) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `imagen_pokemon` longblob NOT NULL,
  `imagen_tipo1` longblob NOT NULL,
  `imagen_tipo2` longblob,
  PRIMARY KEY (`id_pokemon`),
  KEY `id_region` (`id_region`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id_region` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(11) NOT NULL,
  `imagen_region` varchar(150) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Esta tabla refiere a las regiones que existen en el juego';

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `nombre`, `imagen_region`) VALUES
(1, 'Kanto', 'https://static.wikia.nocookie.net/pokemongo/images/4/40/Kanto_Platinum.png/revision/latest?cb=20201123000915'),
(2, 'Johto', 'https://static.wikia.nocookie.net/pokemongo/images/a/a6/Johto_Platinum.png/revision/latest?cb=20201122235234'),
(3, 'Hoenn', 'https://static.wikia.nocookie.net/pokemongo/images/e/e9/Hoenn_Platinum.png/revision/latest?cb=20201122235242'),
(4, 'Sinnoh', 'https://static.wikia.nocookie.net/pokemongo/images/8/8c/Sinnoh_Platinum.png/revision/latest?cb=20201122235355'),
(5, 'Teselia', 'https://static.wikia.nocookie.net/pokemongo/images/1/16/Unova_Platinum.png/revision/latest?cb=20201122235451'),
(6, 'Kalos', 'https://static.wikia.nocookie.net/pokemongo/images/d/d2/Kalos_Platinum.png/revision/latest?cb=20210109134638'),
(7, 'Alola', 'https://www.pinpng.com/pngs/m/2-25787_9-768-000-exp-unknown-pokemon-question-mark.png'),
(8, 'Galar', 'https://static.wikia.nocookie.net/pokemongo/images/f/ff/Galar_Platinum.png/revision/latest?cb=20201122235610');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_elemental`
--

DROP TABLE IF EXISTS `tipo_elemental`;
CREATE TABLE IF NOT EXISTS `tipo_elemental` (
  `id_tipo_elemental` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(11) NOT NULL,
  `imagen_tipo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_tipo_elemental`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_elemental`
--

INSERT INTO `tipo_elemental` (`id_tipo_elemental`, `nombre`, `imagen_tipo`) VALUES
(1, 'Acero', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/2/2c/Type_Acero.png/revision/latest?cb=20161221101508'),
(2, 'Agua', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/b/b7/Type_Agua.png/revision/latest?cb=20161221101702'),
(3, 'Bicho', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/9/91/Type_Bicho.png/revision/latest?cb=20161221101714'),
(4, 'Dragón', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/d/d4/Type_Drag%C3%B3n.png/revision/latest?cb=20161221101725'),
(5, 'Eléctrico', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/c/c7/Type_El%C3%A9ctrico.png/revision/latest?cb=20161221101739'),
(6, 'Fantasma', 'https://pokemongo.fandom.com/es/wiki/Archivo:Type_Fantasma.png'),
(7, 'Fuego', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/38/Type_Fuego.png/revision/latest?cb=20161221101820'),
(8, 'Hada', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/49/Type_Hada.png/revision/latest?cb=20161221101821'),
(9, 'Hielo', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/35/Type_Hielo.png/revision/latest?cb=20161221101836'),
(10, 'Lucha', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/6/66/Type_Lucha.png/revision/latest?cb=20161221101900'),
(11, 'Normal', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/2/23/Type_Normal.png/revision/latest?cb=20161221101619'),
(12, 'Planta', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/6/60/Type_Planta.png/revision/latest?cb=20161221101938'),
(13, 'Psíquico', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/7/72/Type_Ps%C3%ADquico.png/revision/latest?cb=20161221101950'),
(14, 'Roca', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/b/b3/Type_Roca.png/revision/latest?cb=20161221101959'),
(15, 'Siniestro', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/39/Type_Siniestro.png/revision/latest?cb=20161221102014'),
(16, 'Tierra', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/49/Type_Tierra.png/revision/latest?cb=20161221102022'),
(17, 'Veneno', 'https://static.wikia.nocookie.net/pokemongo_gamepedia_en/images/9/90/Type_Poison.png/revision/latest?cb=20161105173232'),
(18, 'Volador', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/8/80/Type_Volador.png/revision/latest?cb=20161221102041');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
