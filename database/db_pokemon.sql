-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-07-2021 a las 21:39:48
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_fk_pokemon` int(11) NOT NULL,
  `id_fk_usuario` int(11) NOT NULL,
  `calificacion` tinyint(4) NOT NULL,
  `texto` text,
  PRIMARY KEY (`id_comentario`),
  KEY `id_fk_usuario` (`id_fk_usuario`) USING BTREE,
  KEY `id_fk_pokemon` (`id_fk_pokemon`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_fk_pokemon`, `id_fk_usuario`, `calificacion`, `texto`) VALUES
(7, 4, 2, 2, '22222222222222222222'),
(8, 4, 2, 4, 'aaaaaa'),
(9, 4, 2, 4, 'aaaaaa'),
(24, 5, 3, 5, 'aaaaaaaaa'),
(25, 5, 2, 4, 'aaaaaasasasasas'),
(26, 5, 2, 5, 'zxzx'),
(27, 5, 2, 5, 'asas'),
(45, 1, 2, 2, 'aa'),
(46, 1, 3, 4, 'asas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id_pokemon` int(11) NOT NULL AUTO_INCREMENT,
  `id_region` tinyint(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `imagen_pokemon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_tipo_elemental` tinyint(4) NOT NULL,
  `id_tipo_elemental2` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_pokemon`),
  KEY `id_region` (`id_region`),
  KEY `id_tipo_elemental` (`id_tipo_elemental`,`id_tipo_elemental2`) USING BTREE,
  KEY `id_tipo_elemental2` (`id_tipo_elemental2`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id_pokemon`, `id_region`, `nombre`, `imagen_pokemon`, `id_tipo_elemental`, `id_tipo_elemental2`) VALUES
(1, 1, 'Bulbasaur', 'https://images.wikidexcdn.net/mwuploads/wikidex/archive/4/43/20080715101726%21Bulbasaur.png', 12, 17),
(2, 1, 'Yvysaur', 'https://static.wikia.nocookie.net/espokemon/images/8/86/Ivysaur.png', 12, 17),
(4, 1, 'Charmander', 'https://static.wikia.nocookie.net/espokemon/images/5/56/Charmander.png', 7, NULL),
(5, 1, 'Charmeleon', 'https://static.wikia.nocookie.net/espokemon/images/f/fb/Charmeleon.png', 7, NULL),
(7, 1, 'Squirtle', 'https://static.wikia.nocookie.net/espokemon/images/e/e3/Squirtle.png', 2, NULL),
(8, 1, 'Wartortle', 'https://static.wikia.nocookie.net/espokemon/images/d/d7/Wartortle.png', 2, NULL),
(18, 1, 'Pidgeot', 'https://static.wikia.nocookie.net/espokemon/images/a/a9/Pidgeot.png', 11, 18),
(19, 1, 'Rattata', 'https://static.wikia.nocookie.net/espokemon/images/c/c4/Rattata.png', 11, NULL),
(25, 1, 'Pikachu', 'https://static.wikia.nocookie.net/espokemon/images/7/77/Pikachu.png', 5, NULL),
(37, 1, 'Vulpix', 'https://static.wikia.nocookie.net/espokemon/images/8/8d/Vulpix.png', 7, NULL),
(52, 1, 'Meowth', 'https://static.wikia.nocookie.net/espokemon/images/9/99/Meowth.png', 11, NULL),
(54, 1, 'Psyduck', 'https://static.wikia.nocookie.net/espokemon/images/3/32/Psyduck.png', 2, NULL),
(66, 1, 'Machop', 'https://static.wikia.nocookie.net/espokemon/images/2/2b/Machop.png', 10, NULL),
(104, 1, 'Cubone', 'https://static.wikia.nocookie.net/espokemon/images/6/65/Cubone.png', 16, NULL),
(111, 1, 'Rhyhorn', 'https://static.wikia.nocookie.net/espokemon/images/3/36/Rhyhorn.png', 16, 14),
(133, 1, 'Eevee', 'https://static.wikia.nocookie.net/espokemon/images/f/f2/Eevee.png', 11, NULL),
(148, 1, 'Dragonair', 'https://static.wikia.nocookie.net/espokemon/images/5/5a/Dragonair.png', 4, NULL),
(152, 2, 'Chikorita', 'https://static.wikia.nocookie.net/espokemon/images/4/4e/Chikorita.png', 12, NULL),
(155, 2, 'Cyndaquil', 'https://static.wikia.nocookie.net/espokemon/images/9/99/Cyndaquil.png', 7, NULL),
(158, 2, 'Totodile', 'https://static.wikia.nocookie.net/espokemon/images/e/e7/Totodile.png', 2, NULL),
(172, 2, 'Pichu', 'https://static.wikia.nocookie.net/espokemon/images/9/9d/Pichu.png', 5, NULL),
(196, 2, 'Espeon', 'https://static.wikia.nocookie.net/espokemon/images/e/ef/Espeon.png', 13, NULL),
(197, 2, 'Umbreon', 'https://static.wikia.nocookie.net/espokemon/images/9/9f/Umbreon.png', 15, NULL),
(231, 2, 'Phanpy', 'https://static.wikia.nocookie.net/espokemon/images/9/9f/Phanpy.png', 16, NULL),
(300, 3, 'Skitty', 'https://static.wikia.nocookie.net/espokemon/images/f/f0/Skitty.png', 11, NULL),
(311, 3, 'Pusle', 'https://static.wikia.nocookie.net/espokemon/images/b/b0/Plusle.png', 5, NULL),
(312, 3, 'Minum', 'https://static.wikia.nocookie.net/espokemon/images/f/f5/Minun.png', 5, NULL),
(387, 4, 'Turtwig', 'https://static.wikia.nocookie.net/espokemon/images/c/c8/Turtwig.png', 12, NULL),
(388, 4, 'Grotle', 'https://static.wikia.nocookie.net/espokemon/images/7/75/Grotle.png', 12, NULL),
(390, 4, 'Chimchar', 'https://static.wikia.nocookie.net/espokemon/images/9/9f/Chimchar.png', 7, NULL),
(391, 4, 'Monferno', 'https://static.wikia.nocookie.net/espokemon/images/6/64/Monferno.png', 7, 10),
(393, 4, 'Piplup', 'https://static.wikia.nocookie.net/espokemon/images/1/11/Piplup.png', 2, NULL),
(394, 4, 'Prinplup', 'https://static.wikia.nocookie.net/espokemon/images/1/1b/Prinplup.png', 2, NULL),
(396, 4, 'Starly', 'https://static.wikia.nocookie.net/espokemon/images/0/08/Starly.png', 11, 18),
(397, 4, 'Staravia', 'https://static.wikia.nocookie.net/espokemon/images/d/df/Staravia.png', 11, 18),
(403, 4, 'Shinx', 'https://static.wikia.nocookie.net/espokemon/images/a/a5/Shinx.png', 5, NULL),
(404, 4, 'Luxio', 'https://static.wikia.nocookie.net/espokemon/images/5/51/Luxio.png', 5, NULL),
(417, 4, 'Pachirisu', 'https://static.wikia.nocookie.net/espokemon/images/f/f9/Pachirisu.png', 5, NULL),
(444, 4, 'Gabite', 'https://static.wikia.nocookie.net/espokemon/images/f/f6/Gabite.png', 4, 16),
(446, 4, 'Munchlax', 'https://static.wikia.nocookie.net/espokemon/images/8/8e/Munchlax.png', 11, NULL),
(447, 4, 'Riolu', 'https://static.wikia.nocookie.net/espokemon/images/f/f0/Riolu.png', 10, NULL),
(495, 5, 'Snivy', 'https://static.wikia.nocookie.net/espokemon/images/9/9a/Snivy.png', 12, NULL),
(498, 5, 'Tepig', 'https://static.wikia.nocookie.net/espokemon/images/0/0e/Tepig.png', 7, NULL),
(501, 5, 'Oshawott', 'https://static.wikia.nocookie.net/espokemon/images/e/e1/Oshawott.png', 2, NULL),
(610, 5, 'Axew', 'https://static.wikia.nocookie.net/espokemon/images/6/62/Axew.png', 4, NULL),
(650, 6, 'Chespin', 'https://static.wikia.nocookie.net/espokemon/images/4/46/Chespin.png', 12, NULL),
(653, 6, 'Fennekin', 'https://static.wikia.nocookie.net/espokemon/images/1/11/Fennekin.png', 7, NULL),
(656, 6, 'Froakie', 'https://static.wikia.nocookie.net/espokemon/images/8/8e/Froakie.png', 2, NULL),
(722, 7, 'Rowlet', 'https://static.wikia.nocookie.net/espokemon/images/f/ff/Rowlet.png', 12, 18),
(723, 7, 'Dartrix', 'https://static.wikia.nocookie.net/espokemon/images/9/9d/Dartrix.png', 12, 18),
(724, 7, 'Decidueye', 'https://static.wikia.nocookie.net/espokemon/images/d/d3/Decidueye.png', 12, 6),
(725, 7, 'Litten', 'https://static.wikia.nocookie.net/espokemon/images/6/6e/Litten.png', 7, NULL),
(726, 7, 'Torracat', 'https://static.wikia.nocookie.net/espokemon/images/f/f5/Torracat.png', 7, NULL),
(727, 7, 'Incineroar', 'https://static.wikia.nocookie.net/espokemon/images/e/ef/Incineroar.png', 7, 15),
(728, 7, 'Popplio', 'https://static.wikia.nocookie.net/espokemon/images/4/41/Popplio.png', 2, NULL),
(729, 7, 'Brionne', 'https://static.wikia.nocookie.net/espokemon/images/d/d3/Brionne.png', 2, NULL),
(730, 7, 'Primarina', 'https://static.wikia.nocookie.net/espokemon/images/1/14/Primarina.png', 2, 8),
(810, 8, 'Grookey', 'https://static.wikia.nocookie.net/espokemon/images/7/7a/Grookey.png', 12, NULL),
(813, 8, 'Scorbunny', 'https://static.wikia.nocookie.net/espokemon/images/c/cc/Scorbunny.png', 7, NULL),
(816, 8, 'Sobble ', 'https://static.wikia.nocookie.net/espokemon/images/0/0c/Sobble.png', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id_region` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagen_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Esta tabla refiere a las regiones que existen en el juego';

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `nombre`, `imagen_region`) VALUES
(1, 'Kanto', 'https://static.wikia.nocookie.net/pokemongo/images/4/40/Kanto_Platinum.png'),
(2, 'Johto', 'https://static.wikia.nocookie.net/pokemongo/images/a/a6/Johto_Platinum.png'),
(3, 'Hoenn', 'https://static.wikia.nocookie.net/pokemongo/images/e/e9/Hoenn_Platinum.png'),
(4, 'Sinnoh', 'https://static.wikia.nocookie.net/pokemongo/images/8/8c/Sinnoh_Platinum.png'),
(5, 'Teselia', 'https://static.wikia.nocookie.net/pokemongo/images/1/16/Unova_Platinum.png'),
(6, 'Kalos', 'https://static.wikia.nocookie.net/pokemongo/images/d/d2/Kalos_Platinum.png'),
(7, 'Alola', 'https://static.wikia.nocookie.net/pokemongo/images/9/9d/Unown_Platinum.png'),
(8, 'Galar', 'https://static.wikia.nocookie.net/pokemongo/images/f/ff/Galar_Platinum.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_elemental`
--

DROP TABLE IF EXISTS `tipo_elemental`;
CREATE TABLE IF NOT EXISTS `tipo_elemental` (
  `id_tipo_elemental` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagen_tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_tipo_elemental`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_elemental`
--

INSERT INTO `tipo_elemental` (`id_tipo_elemental`, `nombre`, `imagen_tipo`) VALUES
(1, 'Acero', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/2/2c/Type_Acero.png'),
(2, 'Agua', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/b/b7/Type_Agua.png'),
(3, 'Bicho', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/9/91/Type_Bicho.png'),
(4, 'Dragón', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/d/d4/Type_Drag%C3%B3n.png'),
(5, 'Eléctrico', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/c/c7/Type_El%C3%A9ctrico.png'),
(6, 'Fantasma', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/1/11/Type_Fantasma.png'),
(7, 'Fuego', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/38/Type_Fuego.png'),
(8, 'Hada', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/49/Type_Hada.png'),
(9, 'Hielo', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/35/Type_Hielo.png'),
(10, 'Lucha', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/6/66/Type_Lucha.png'),
(11, 'Normal', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/2/23/Type_Normal.png'),
(12, 'Planta', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/6/60/Type_Planta.png'),
(13, 'Psíquico', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/7/72/Type_Ps%C3%ADquico.png'),
(14, 'Roca', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/b/b3/Type_Roca.png'),
(15, 'Siniestro', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/39/Type_Siniestro.png'),
(16, 'Tierra', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/49/Type_Tierra.png'),
(17, 'Veneno', 'https://static.wikia.nocookie.net/pokemongo_gamepedia_en/images/9/90/Type_Poison.png'),
(18, 'Volador', 'https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/8/80/Type_Volador.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(500) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `email`, `contraseña`, `nombre`, `apellido`, `administrador`) VALUES
(2, 'admin@admin', '$2y$10$yiQieHg9ORhiOWTJC7HFD.XzZAKa2yT46sTDYsR7J/iafsjl6VVA2', 'admin', 'admin', 1),
(3, 'hola@hola', '$2y$10$Uytufa4wr/psxH/wcFDRJOZWZ2eKHMXfCUQcQ5oBg4YSqQ7eZ8MY6', 'hola', 'hola', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_fk_usuario`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_fk_pokemon`) REFERENCES `pokemon` (`id_pokemon`) ON DELETE CASCADE ON UPDATE CASCADE;

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
