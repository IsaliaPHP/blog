-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 04:03 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `activa` int(11) DEFAULT NULL,
  `ult_actualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `slug`, `activa`, `ult_actualizacion`) VALUES
(1, 'Home', 'home', 1, '2023-06-01 23:40:08'),
(2, 'Screencasts', 'screencasts', 1, '2023-06-01 23:40:50'),
(3, 'Descargas', 'descargas', 1, '2023-06-01 23:41:00'),
(4, 'Tienda', 'tienda', 1, '2023-06-01 23:41:07'),
(5, 'Contáctenos', 'cont-ctenos', 1, '2023-06-01 23:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `slug` varchar(350) DEFAULT NULL,
  `cuerpo` text,
  `categoria_id` int(11) DEFAULT NULL,
  `inicial` int(11) DEFAULT NULL,
  `tags` varchar(120) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `f_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ult_actualizacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagina`
--

INSERT INTO `pagina` (`id`, `titulo`, `slug`, `cuerpo`, `categoria_id`, `inicial`, `tags`, `activo`, `f_creacion`, `ult_actualizacion`) VALUES
(1, 'Bienvenid@s', 'bienvenid-s', '<p><span style="color: rgb(0, 0, 0);"><b>IsaliaPHP</b> ha sido creado basándose en las ideas de reutilización de código, uso de convenciones y programación orientada a objetos. Está pensado como herramienta de desarrollo para proyectos simples. Usa el lenguaje de programación PHP y permite utilizarlo tanto en servidores dedicados, como en servidores compartidos (Shared Hosting). <br></span></p><p><span style="color: rgb(0, 0, 0);">El framework está diseñado para acceder a bases de datos, aunque se ha elegido que sólo cuente con conexión a una única base de datos. El usuario puede seleccionar el motor que necesite, siempre que pueda contar con una configuración compatible con <b>PDO</b> (PHP Data Objects)</span></p><p>Su filosofía no es nada nueva, y es una mezcla de ideas acerca de <b><i>escribir menos código</i></b>, <b>abstracción</b> sobre las operaciones de la base de datos, y <b>separación de código</b> usando el patrón de diseño llamado Modelo Vista Controlador (Model View Controller) (MVC)<br></p>', 1, NULL, 'Bienveni@,IsaliaPHP', 1, '2023-06-02 01:48:04', '2023-06-02 01:48:04'),
(2, 'Screencasts', 'screencasts', '<p><span style="color: rgb(0, 0, 0);">Los screencasts o grabaciones/capturas de pantalla son un material muy útil en términos de aprender haciendo. <br></span></p><p><span style="color: rgb(0, 0, 0);"><b>IsaliaPHP</b> irá incluyen periódicamente material en video acerca del funcionamiento de sus características y buenas prácticas.</span></p><p><span style="color: rgb(0, 0, 0);">También se incluirán pequeños tutoriales para hacer uso de herramientas externas en nuestros proyectos.<br></span></p>', 2, NULL, 'Screencasts,Documentación', 1, '2023-06-02 01:48:24', '2023-06-02 01:48:24'),
(3, 'Descargas', 'descargas', '<p>Esta es la página de descargas para nuestro Framework <b>IsaliaPHP</b>. <br></p><p>Encontrarás manuales sobre el uso del framework, así como también algunas guías sobre el uso del lenguaje SQL, y nociones básicas sobre PHP.<br></p>', 3, NULL, NULL, 0, '2023-06-02 01:32:52', '2023-06-02 01:32:52'),
(4, 'Tienda', 'tienda', '<p>En la sección de la tienda podrás encontrar los siguientes ítems:</p><ul><li>Horas de consultoría (aprender en vivo a usar las características del framework, uso de video llamada)</li><li>Horas de soporte (ayuda cuando algo no funciona, de forma directa, con video llamada)</li><li>Componentes reutilizables premium (código útil cuando necesitas resolver problemas específicos)</li><li>Cursos en formato de video<br></li></ul>', 4, NULL, NULL, 0, '2023-06-02 01:32:54', '2023-06-02 01:32:54'),
(5, 'Contacto', 'contacto', '<p>Puedes encontrarnos escribiendo directamente a soporte @ isaliaphp punto com (está escrito así para que no nos escriban los bots jejeje)<br></p>', 5, NULL, NULL, 0, '2023-06-02 01:47:28', '2023-06-02 01:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `clave` varchar(120) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `stamp` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `nombre`, `clave`, `activo`, `stamp`) VALUES
(1, 'admin', 'administrador', '$2y$12$jZDGUpOanQB0o8OWpzNPG.ZMAo.7q1m9S6vccwakjeeFRdtxBhoR.', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
