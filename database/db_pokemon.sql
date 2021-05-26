-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 26-05-2021 a las 22:11:59
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
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `contraseña` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_entrenador`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`id_entrenador`, `nombre`, `apellido`, `apodo`, `email`, `contraseña`) VALUES
(1, 'juan', 'perez', 'Papo123', 'juan_perez@gmail.com', 'Papo123'),
(2, 'Maria', 'Magdalena', 'MotherOfGod', 'prayGod@heaven.com.ar', 'MotherOfGod'),
(3, 'Ash', 'Ketchum', 'ultimateTrainer', 'ultimateTrainer@entrenador.es', 'ultimateTrainer'),
(4, 'Misty', 'Waterflower', 'tropicalWaterfall', 'aquatic@aqua.mar', 'tropicalWaterfall'),
(5, 'Gary', 'Oak', 'ChampionBlue', 'ViridianCity@gymleader.kan', 'ChampionBlue'),
(6, 'hola', 'hola', 'hola', 'hola@hola', '$2y$10$mx9GQGGXkoasFn7EEHrRZOpmwj/ZU1Dx1mIUA29Z.g81arnq4LhnW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id_pokemon` int(11) NOT NULL AUTO_INCREMENT,
  `id_region` tinyint(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `imagen_pokemon` varchar(150) NOT NULL,
  `id_tipo_elemental` tinyint(4) NOT NULL,
  `id_tipo_elemental2` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_pokemon`),
  KEY `id_region` (`id_region`),
  KEY `id_tipo_elemental` (`id_tipo_elemental`,`id_tipo_elemental2`) USING BTREE,
  KEY `id_tipo_elemental2` (`id_tipo_elemental2`)
) ENGINE=InnoDB AUTO_INCREMENT=817 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id_pokemon`, `id_region`, `nombre`, `imagen_pokemon`, `id_tipo_elemental`, `id_tipo_elemental2`) VALUES
(1, 1, 'Bulbasaur', '/imagenes/Pokemon/Bulbasaur.png', 12, 17),
(2, 1, 'Yvysaur', 'https://static.wikia.nocookie.net/espokemon/images/8/86/Ivysaur.png/revision/latest?cb=20140207202404', 12, 17),
(4, 1, 'Charmander', 'https://static.wikia.nocookie.net/espokemon/images/5/56/Charmander.png/revision/latest?cb=20140207202456', 7, NULL),
(5, 1, 'Charmeleon', 'https://static.wikia.nocookie.net/espokemon/images/f/fb/Charmeleon.png/revision/latest?cb=20140207202536', 7, NULL),
(7, 1, 'Squirtle', 'https://static.wikia.nocookie.net/espokemon/images/e/e3/Squirtle.png/revision/latest?cb=20160309230820', 2, NULL),
(8, 1, 'Wartortle', 'https://static.wikia.nocookie.net/espokemon/images/d/d7/Wartortle.png/revision/latest?cb=20140207202657', 2, NULL),
(18, 1, 'Pidgeot', 'https://static.wikia.nocookie.net/espokemon/images/a/a9/Pidgeot.png/revision/latest?cb=20141214190416', 11, 18),
(19, 1, 'Rattata', 'https://static.wikia.nocookie.net/espokemon/images/c/c4/Rattata.png/revision/latest?cb=20080723091810', 11, NULL),
(25, 1, 'Pikachu', 'https://static.wikia.nocookie.net/espokemon/images/7/77/Pikachu.png/revision/latest?cb=20150621181250', 5, NULL),
(37, 1, 'Vulpix', 'https://static.wikia.nocookie.net/espokemon/images/8/8d/Vulpix.png/revision/latest?cb=20080909115229', 7, NULL),
(52, 1, 'Meowth', 'https://static.wikia.nocookie.net/espokemon/images/9/99/Meowth.png/revision/latest?cb=20160904210550', 11, NULL),
(54, 1, 'Psyduck', 'https://static.wikia.nocookie.net/espokemon/images/3/32/Psyduck.png/revision/latest?cb=20080909114656', 2, NULL),
(66, 1, 'Machop', 'https://static.wikia.nocookie.net/espokemon/images/2/2b/Machop.png/revision/latest?cb=20080909112724', 10, NULL),
(104, 1, 'Cubone', 'https://static.wikia.nocookie.net/espokemon/images/6/65/Cubone.png/revision/latest?cb=20170615210232', 16, NULL),
(111, 1, 'Rhyhorn', 'https://static.wikia.nocookie.net/espokemon/images/3/36/Rhyhorn.png/revision/latest?cb=20080909114734', 16, 14),
(133, 1, 'Eevee', 'https://static.wikia.nocookie.net/espokemon/images/f/f2/Eevee.png/revision/latest?cb=20150621181400', 11, NULL),
(148, 1, 'Dragonair', 'https://static.wikia.nocookie.net/espokemon/images/5/5a/Dragonair.png/revision/latest?cb=20170617010659', 4, NULL),
(152, 2, 'Chikorita', 'https://static.wikia.nocookie.net/espokemon/images/4/4e/Chikorita.png/revision/latest?cb=20140206203521', 12, NULL),
(155, 2, 'Cyndaquil', 'https://static.wikia.nocookie.net/espokemon/images/9/99/Cyndaquil.png/revision/latest?cb=20140206203643', 7, NULL),
(158, 2, 'Totodile', 'https://static.wikia.nocookie.net/espokemon/images/e/e7/Totodile.png/revision/latest?cb=20140206203727', 2, NULL),
(172, 2, 'Pichu', 'https://static.wikia.nocookie.net/espokemon/images/9/9d/Pichu.png/revision/latest?cb=20150620210539', 5, NULL),
(196, 2, 'Espeon', 'https://static.wikia.nocookie.net/espokemon/images/e/ef/Espeon.png/revision/latest?cb=20140207194902', 13, NULL),
(197, 2, 'Umbreon', 'https://static.wikia.nocookie.net/espokemon/images/9/9f/Umbreon.png/revision/latest?cb=20140208131643', 15, NULL),
(231, 2, 'Phanpy', 'https://static.wikia.nocookie.net/espokemon/images/9/9f/Phanpy.png/revision/latest?cb=20140210190631', 16, NULL),
(300, 3, 'Skitty', 'https://static.wikia.nocookie.net/espokemon/images/f/f0/Skitty.png/revision/latest?cb=20080910101925', 11, NULL),
(311, 3, 'Pusle', 'https://static.wikia.nocookie.net/espokemon/images/b/b0/Plusle.png/revision/latest?cb=20150317214730', 5, NULL),
(312, 3, 'Minum', 'https://static.wikia.nocookie.net/espokemon/images/f/f5/Minun.png/revision/latest?cb=20080910095847', 5, NULL),
(387, 4, 'Turtwig', 'https://static.wikia.nocookie.net/espokemon/images/c/c8/Turtwig.png/revision/latest?cb=20151017105732', 12, NULL),
(388, 4, 'Grotle', 'https://static.wikia.nocookie.net/espokemon/images/7/75/Grotle.png/revision/latest?cb=20151017105458', 12, NULL),
(390, 4, 'Chimchar', 'https://static.wikia.nocookie.net/espokemon/images/9/9f/Chimchar.png/revision/latest?cb=20120927233211', 7, NULL),
(391, 4, 'Monferno', 'https://static.wikia.nocookie.net/espokemon/images/6/64/Monferno.png/revision/latest?cb=20080715115118', 7, 10),
(393, 4, 'Piplup', 'https://static.wikia.nocookie.net/espokemon/images/1/11/Piplup.png/revision/latest?cb=20120927233336', 2, NULL),
(394, 4, 'Prinplup', 'https://static.wikia.nocookie.net/espokemon/images/1/1b/Prinplup.png/revision/latest?cb=20080715115108', 2, NULL),
(396, 4, 'Starly', 'https://static.wikia.nocookie.net/espokemon/images/0/08/Starly.png/revision/latest?cb=20080715122429', 11, 18),
(397, 4, 'Staravia', 'https://static.wikia.nocookie.net/espokemon/images/d/df/Staravia.png/revision/latest?cb=20080715122431', 11, 18),
(403, 4, 'Shinx', 'https://static.wikia.nocookie.net/espokemon/images/a/a5/Shinx.png/revision/latest?cb=20150828153514', 5, NULL),
(404, 4, 'Luxio', 'https://static.wikia.nocookie.net/espokemon/images/5/51/Luxio.png/revision/latest?cb=20080715135809', 5, NULL),
(417, 4, 'Pachirisu', 'https://static.wikia.nocookie.net/espokemon/images/f/f9/Pachirisu.png/revision/latest?cb=20080715140139', 5, NULL),
(444, 4, 'Gabite', 'https://static.wikia.nocookie.net/espokemon/images/f/f6/Gabite.png/revision/latest?cb=20151017105026', 4, 16),
(446, 4, 'Munchlax', 'https://static.wikia.nocookie.net/espokemon/images/8/8e/Munchlax.png/revision/latest?cb=20160510005053', 11, NULL),
(447, 4, 'Riolu', 'https://static.wikia.nocookie.net/espokemon/images/f/f0/Riolu.png/revision/latest?cb=20080911163138', 10, NULL),
(495, 5, 'Snivy', 'https://static.wikia.nocookie.net/espokemon/images/9/9a/Snivy.png/revision/latest?cb=20120519045847', 12, NULL),
(498, 5, 'Tepig', 'https://static.wikia.nocookie.net/espokemon/images/0/0e/Tepig.png/revision/latest?cb=20120519045827', 7, NULL),
(501, 5, 'Oshawott', 'https://static.wikia.nocookie.net/espokemon/images/e/e1/Oshawott.png/revision/latest?cb=20120519045734', 2, NULL),
(610, 5, 'Axew', 'https://static.wikia.nocookie.net/espokemon/images/6/62/Axew.png/revision/latest?cb=20101114022936', 4, NULL),
(650, 6, 'Chespin', 'https://static.wikia.nocookie.net/espokemon/images/4/46/Chespin.png/revision/latest?cb=20131014044853', 12, NULL),
(653, 6, 'Fennekin', 'https://static.wikia.nocookie.net/espokemon/images/1/11/Fennekin.png/revision/latest?cb=20131014044448', 7, NULL),
(656, 6, 'Froakie', 'https://static.wikia.nocookie.net/espokemon/images/8/8e/Froakie.png/revision/latest?cb=20130308163804', 2, NULL),
(722, 7, 'Rowlet', 'https://static.wikia.nocookie.net/espokemon/images/f/ff/Rowlet.png/revision/latest?cb=20190808023633', 12, 18),
(723, 7, 'Dartrix', 'https://static.wikia.nocookie.net/espokemon/images/9/9d/Dartrix.png/revision/latest?cb=20161004215918', 12, 18),
(724, 7, 'Decidueye', 'https://static.wikia.nocookie.net/espokemon/images/d/d3/Decidueye.png/revision/latest?cb=20190111190228', 12, 6),
(725, 7, 'Litten', 'https://static.wikia.nocookie.net/espokemon/images/6/6e/Litten.png/revision/latest?cb=20190808023603', 7, NULL),
(726, 7, 'Torracat', 'https://static.wikia.nocookie.net/espokemon/images/f/f5/Torracat.png/revision/latest?cb=20161004221016', 7, NULL),
(727, 7, 'Incineroar', 'https://static.wikia.nocookie.net/espokemon/images/e/ef/Incineroar.png/revision/latest?cb=20161219021820', 7, 15),
(728, 7, 'Popplio', 'https://static.wikia.nocookie.net/espokemon/images/4/41/Popplio.png/revision/latest?cb=20190808023513', 2, NULL),
(729, 7, 'Brionne', 'https://static.wikia.nocookie.net/espokemon/images/d/d3/Brionne.png/revision/latest?cb=20161004221303', 2, NULL),
(730, 7, 'Primarina', 'https://static.wikia.nocookie.net/espokemon/images/1/14/Primarina.png/revision/latest?cb=20161219023348', 2, 8),
(810, 8, 'Grookey', 'https://static.wikia.nocookie.net/espokemon/images/7/7a/Grookey.png/revision/latest?cb=20190606080924', 12, NULL),
(813, 8, 'Scorbunny', 'https://static.wikia.nocookie.net/espokemon/images/c/cc/Scorbunny.png/revision/latest?cb=20190606080807', 7, NULL),
(816, 8, 'Sobble ', 'https://static.wikia.nocookie.net/espokemon/images/0/0c/Sobble.png/revision/latest?cb=20190522085933', 2, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Esta tabla refiere a las regiones que existen en el juego';

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
(7, 'Alola', 'https://static.wikia.nocookie.net/pokemongo/images/9/9d/Unown_Platinum.png/revision/latest?cb=20201122235041'),
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_elemental`
--

INSERT INTO `tipo_elemental` (`id_tipo_elemental`, `nombre`, `imagen_tipo`) VALUES
(1, 'Acero', 'imagenes/Tipo/Type_Acero.png'),
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
(12, 'Planta', 'imagenes/Tipo/Type_Planta.png'),
(13, 'Psíquico', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/7/72/Type_Ps%C3%ADquico.png/revision/latest?cb=20161221101950'),
(14, 'Roca', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/b/b3/Type_Roca.png/revision/latest?cb=20161221101959'),
(15, 'Siniestro', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/39/Type_Siniestro.png/revision/latest?cb=20161221102014'),
(16, 'Tierra', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/49/Type_Tierra.png/revision/latest?cb=20161221102022'),
(17, 'Veneno', 'https://static.wikia.nocookie.net/pokemongo_gamepedia_en/images/9/90/Type_Poison.png/revision/latest?cb=20161105173232'),
(18, 'Volador', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/8/80/Type_Volador.png/revision/latest?cb=20161221102041');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pokemon_ibfk_2` FOREIGN KEY (`id_tipo_elemental`) REFERENCES `tipo_elemental` (`id_tipo_elemental`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pokemon_ibfk_3` FOREIGN KEY (`id_tipo_elemental2`) REFERENCES `tipo_elemental` (`id_tipo_elemental`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
