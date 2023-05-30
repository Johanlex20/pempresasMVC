-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 23:24:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pempresas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `tipoId` varchar(100) NOT NULL,
  `identificacion` int(11) DEFAULT NULL,
  `tipoPrograma` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `telefono` bigint(30) DEFAULT NULL,
  `creacionaprendiz` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id`, `nombre`, `tipoId`, `identificacion`, `tipoPrograma`, `email`, `password`, `telefono`, `creacionaprendiz`) VALUES
(66, 'johan', '1', 101239655, '2', 'johan@johan.com', 'johan', 3021236544, '2023-05-03'),
(74, 'pachin', '1', 121212, '2', 'pachin@hotmail.com', '$2y$10$n4JNJr8x1bgs5NJL243RjuPcxzCUURE6r2ALMk5cpLUJw7KXnNyDi', 3657415, '2023-05-04'),
(147, ' prueba', '1', 1010, '1', 'prueba@prueba.com', 'preuba', 1234656, '2023-05-08'),
(151, ' yy', '1', 10, '1', 'y@y.com', 'y', 3058746521, '2023-05-10'),
(152, 'nutri', '1', 975045656, '3', 'nutri@gmail.com', 'nutri', 3002420656, '2023-05-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `razonsocial` varchar(60) NOT NULL,
  `tipoId` varchar(30) NOT NULL,
  `identificacionemp` bigint(20) NOT NULL,
  `direccionemp` varchar(70) DEFAULT NULL,
  `telefonoemp` bigint(20) NOT NULL,
  `emailemp` varchar(60) NOT NULL,
  `passwordemp` char(60) DEFAULT NULL,
  `imagen` blob DEFAULT NULL,
  `creacionemp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `razonsocial`, `tipoId`, `identificacionemp`, `direccionemp`, `telefonoemp`, `emailemp`, `passwordemp`, `imagen`, `creacionemp`) VALUES
(1, ' blue', '5', 90000000, 'calle 70 N° 35-60', 321000000, 'blue@gmail.com', 'blue', 0x36333032643738666632636331316536646166386366353162313039613738622e6a7067, '2023-05-17'),
(2, ' FACEBOOK', '5', 90099009, 'FACEBOOK # 23 - 45', 12012012, 'FACEBOOK@FACEBOOK.COM', 'FACEBOOK', 0x36383061373437636631333736376563653961336663346262633430336565642e6a7067, '2023-05-17'),
(5, ' AMAZON', '5', 902356987, 'AMAZON INDUSTRY MIAMI', 302321256, 'amazon@amazon.com', 'amazon', 0x66633137303763333031653035636234636339353733373934323065356237652e6a7067, '2023-05-21'),
(6, ' Zapatos yepeto sas', '1', 80569874, 'Av 50 este # 78 L -24', 306213357, 'zapatos@zapatos.com', 'zapatos', 0x37633365303162396662653334396539313033333935653632326436623433622e6a7067, '2023-05-21'),
(7, ' MICROSOFT -ACTUALIZADO', '5', 9004587457, 'MICROSOFT COMPANY MIAMI', 3203252010, 'microsoft@microsoft.com', 'microsoft', 0x31653563646435623036353261393732623765326539656435366639626637322e6a7067, '2023-05-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `tipoPrograma` varchar(30) DEFAULT NULL,
  `imagen` blob DEFAULT NULL,
  `jornada` varchar(30) DEFAULT NULL,
  `modatrabajo` varchar(30) DEFAULT NULL,
  `sueldo` bigint(20) DEFAULT NULL,
  `vacantes` int(200) DEFAULT NULL,
  `descriempleo` text DEFAULT NULL,
  `respon` text DEFAULT NULL,
  `reque` text DEFAULT NULL,
  `fechapubliofe` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `titulo`, `tipoPrograma`, `imagen`, `jornada`, `modatrabajo`, `sueldo`, `vacantes`, `descriempleo`, `respon`, `reque`, `fechapubliofe`) VALUES
(8, ' PROGRAMADORES JAVA', '1', 0x65366366663537653161386539393534646230356232366632306539653862372e6a7067, 'FULL TIME', 'presencial ', 2000000, 2, 'Desarrolladores JAVA para acompañar equipo modelado aplicaciones de seguiridad', 'Desarrollo de lineas de codigo en lenguaje JAVA, cumpliendo indicaciones del lider', '-Conocimientos JAVA\r\n-Conocimientos SpringBoot', '2023-05-17'),
(12, ' QUIMICO AGUAS', '16', 0x63396266376266633966353862626365613964383166323163343662363464612e6a7067, 'FULL TIME', 'VIRTUAL', 2000000, 200, 'QUIMICO AGUAS QUIMICO AGUAS QUIMICO AGUAS ', 'QUIMICO AGUAS QUIMICO AGUAS QUIMICO AGUAS', 'QUIMICO AGUAS QUIMICO AGUASQUIMICO AGUAS QUIMICO AGUASQUIMICO AGUAS', '2023-05-21'),
(14, ' Zapatero a tu zapato ', '4', 0x32366263643766663961643032393864323437393961393730383735616338632e6a7067, 'Jornada completa', 'Presencial', 1800000, 2, 'Zapatero a tu zapato Zapatero a tu zapato  Zapatero a tu zapato  Zapatero a tu zapato ', 'Zapatero a tu zapato  Zapatero a tu zapato  Zapatero a tu zapato Zapatero a tu zapato ', 'conocimientos de Zapatero a tu zapato ', '2023-05-21'),
(15, 'Diseñador Digital 3D actualizado', '15', 0x37306537633639303935303130323539393561613935643065613335623063612e6a7067, 'FULL TIME', 'VIRTUAL', 2000000, 5, 'Creative Production Agency specializing in content ', 'What you will be doing:  Create and design various materials for digital media, trade shows, brochures and print. Motion graphics is a plus. Developing campaign concepts Adapting existing artwork to several digital channels Review designs for accuracy before delivery Works with the project manager to determine design/production requirements, deadlines, and messaging objectives to create marketing materials that are on strategy, on time, and on budget.', 'Required skills  Excellent English communication skills — written and oral. Proficient in Adobe Photoshop, Illustrator, and InDesign A proven ability to work on multiple projects at once, designing for a wide range of varying brands, audiences, and industries Exhibit strong attention to detail Creative and technical problem solver with an obsession with finding solutions. Working under tight deadlines.', '2023-05-21'),
(16, ' Soldador ', '9', 0x64653938626264656133663161333062613730656464613561346136666537652e6a7067, 'Jornada completa', 'Presencial', 3000000, 50, 'Solador tuberia de acero al carbono con tanques acero inoxidable', 'crear estructuras segun diseño, o planos indicados', '3 años en trabajos de soldadura ', '2023-05-23'),
(17, ' Animador digital ', '1', 0x64323631353263633065316530366164353234613539656633653433346135302e6a7067, 'FULL TIME', 'VIRTUAL', 2, 2, 'Creative Production Agency specializing in content ', 'Analista de diferentes muestras, llevar control de muestreos entregar informes', '3 años en trabajos de soldadura ', '2023-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(11) NOT NULL,
  `tipoPrograma` varchar(70) NOT NULL,
  `moda_prog` varchar(15) DEFAULT NULL,
  `tipo_form_prog` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id`, `tipoPrograma`, `moda_prog`, `tipo_form_prog`) VALUES
(1, 'Programación de Software', 'Presencial', 'Técnico'),
(2, 'Sistemas', 'Presencial', 'Técnico'),
(3, 'Soldadura de productos metálicos en platina', 'Presencial', 'Técnico'),
(4, 'Bisutería artesanal', 'Presencial', 'Operario'),
(5, 'Laminación manual fibra de vidrio', 'Presencial', 'Operario'),
(6, 'Carpintería metálica', 'Presencial', 'Técnico'),
(7, 'Inspección y ensayos con procesos no destructivos', 'Presencial', 'Técnico'),
(8, 'Alistamiento de laboratorios de análisis y ensayos \npara la industria', 'Presencial', 'Técnico'),
(9, 'Soldadura de tubería de acero al carbono \ncon procesos SMAW', 'Presencial', 'Profundización técnica'),
(10, 'Soldadura en tuberías de acero al carbono \ncon procesos GTAW Y SMAW', 'Presencial', 'Profundización técnica'),
(11, 'Supervisión de la Fabricación de productos metálicos', 'Presencial', 'Tecnólogo'),
(12, 'Operaciones de comercio exterior', 'Virtual', 'Técnico'),
(13, 'Contabilización de operaciones comerciales y \nfinancieras', 'Virtual', 'Técnico'),
(14, 'Desarrollo multimedia y web', 'Virtual', 'Tecnólogo'),
(15, 'Animación digital', 'Virtual', 'Tecnólogo'),
(16, 'Análisis y desarrollo de software', 'Virtual', 'Tecnólogo'),
(17, 'Desarrollo publicitario', 'Virtual', 'Tecnólogo'),
(18, 'Desarrollo de medios gráficos visuales', 'Virtual', 'Tecnólogo'),
(19, 'Desarrollo prueba ', 'virtual', 'tecnologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoidentificacion`
--

CREATE TABLE `tipoidentificacion` (
  `id` int(11) NOT NULL,
  `tipoId` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipoidentificacion`
--

INSERT INTO `tipoidentificacion` (`id`, `tipoId`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Cedula de Extrangeria'),
(3, 'Registro civil'),
(4, 'Numero de Pasaporte'),
(5, 'NIT'),
(6, 'Tarjeta de identidad'),
(9, ' multipas'),
(10, '  multipas actualizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(1) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'correo@correo.com', '$2y$10$VnzbBQc709np2Bd8Lso.5eZK7dMJRe.H.p0NV2IUA1aAp/t9xrFDS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
