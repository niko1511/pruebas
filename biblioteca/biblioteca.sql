-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 20:45:01
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
-- Base de datos: `nascor01_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bf_autor`
--

CREATE TABLE `bf_autor` (
  `id` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bf_autor`
--

INSERT INTO `bf_autor` (`id`, `id_autor`, `nombre`) VALUES
(4, 0, 'pancho gatito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bf_estante`
--

CREATE TABLE `bf_estante` (
  `id` int(11) NOT NULL,
  `id_cordenadas` int(11) NOT NULL,
  `cordenadas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bf_estante`
--

INSERT INTO `bf_estante` (`id`, `id_cordenadas`, `cordenadas`) VALUES
(10, 34, 'nuevo cajon'),
(16, 0, 'estanteria 4'),
(17, 40, 'nuevo cajon'),
(18, 41, 'estanteria 4'),
(19, 42, 'estanteria 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bf_libros`
--

CREATE TABLE `bf_libros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_estante` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bf_libros`
--

INSERT INTO `bf_libros` (`id`, `nombre`, `id_autor`, `id_estante`, `status`) VALUES
(34, 'Jetpack Compose', 4, 16, 0),
(40, 'Curso de programacion', 4, 10, 3),
(41, 'Android con Kotlin', 4, 0, 0),
(42, 'Android con Kotlin', 4, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bf_libro_persona`
--

CREATE TABLE `bf_libro_persona` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_libro` int(11) NOT NULL,
  `id_estante` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bf_personas`
--

CREATE TABLE `bf_personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_libro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bf_personas`
--

INSERT INTO `bf_personas` (`id`, `nombre`, `id_libro`) VALUES
(1, 'Juan José Nicol', 0),
(3, 'Rosa Aida Perez', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `business_phone` varchar(25) DEFAULT NULL,
  `home_phone` varchar(25) DEFAULT NULL,
  `mobile_phone` varchar(25) DEFAULT NULL,
  `fax_number` varchar(25) DEFAULT NULL,
  `Address` longtext DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state_province` varchar(50) DEFAULT NULL,
  `zip_postal_code` varchar(15) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `web_page` longtext DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `attachments` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `CompanyName`, `last_name`, `first_name`, `email_address`, `job_title`, `business_phone`, `home_phone`, `mobile_phone`, `fax_number`, `Address`, `city`, `state_province`, `zip_postal_code`, `Region`, `web_page`, `notes`, `attachments`) VALUES
(1, 'Company A', 'Bedecs', 'Anna', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 1st Street', 'Seattle', 'WA', '99999', 'USA', NULL, NULL, ''),
(2, 'Company B', 'Gratacos Solsona', 'Antonio', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 2nd Street', 'Boston', 'MA', '99999', 'CA', NULL, NULL, ''),
(3, 'Company C', 'Axen', 'Thomas', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 3rd Street', 'Los Angelas', 'CA', '99999', 'USA', NULL, NULL, ''),
(4, 'Company D', 'Lee', 'Christina', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 4th Street', 'New York', 'NY', '99999', 'CA', NULL, NULL, ''),
(5, 'Company E', 'O’Donnell', 'Martin', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 5th Street', 'Minneapolis', 'MN', '99999', 'USA', NULL, NULL, ''),
(6, 'Company F', 'Pérez-Olaeta', 'Francisco', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 6th Street', 'Milwaukee', 'WI', '99999', 'USA', NULL, NULL, ''),
(7, 'Company G', 'Xie', 'Ming-Yang', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 7th Street', 'Boise', 'ID', '99999', 'USA', NULL, NULL, ''),
(8, 'Company H', 'Andersen', 'Elizabeth', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 8th Street', 'Portland', 'OR', '99999', 'USA', NULL, NULL, ''),
(9, 'Company I', 'Mortensen', 'Sven', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 9th Street', 'Salt Lake City', 'UT', '99999', NULL, NULL, NULL, ''),
(10, 'Company J', 'Wacker', 'Roland', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 10th Street', 'Chicago', 'IL', '99999', 'USA', NULL, NULL, ''),
(11, 'Company K', 'Krschne', 'Peter', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 11th Street', 'Miami', 'FL', '99999', 'USA', NULL, NULL, ''),
(12, 'Company L', 'Edwards', 'John', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 12th Street', 'Las Vegas', 'NV', '99999', NULL, NULL, NULL, ''),
(13, 'Company M', 'Ludick', 'Andre', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 13th Street', 'Memphis', 'TN', '99999', 'USA', NULL, NULL, ''),
(14, 'Company N', 'Grilo', 'Carlos', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 14th Street', 'Denver', 'CO', '99999', 'USA', NULL, NULL, ''),
(15, 'Company O', 'Kupkova', 'Helena', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 15th Street', 'Honolulu', 'HI', '99999', 'USA', NULL, NULL, ''),
(16, 'Company P', 'Goldschmidt', 'Daniel', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 16th Street', 'San Francisco', 'CA', '99999', 'USA', NULL, NULL, ''),
(17, 'Company Q', 'Bagel', 'Jean Philippe', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 17th Street', 'Seattle', 'WA', '99999', 'MT', NULL, NULL, ''),
(18, 'Company R', 'Autier Miconi', 'Catherine', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 18th Street', 'Boston', 'MA', '99999', 'USA', NULL, NULL, ''),
(19, 'Company S', 'Eggerer', 'Alexander', NULL, 'Accounting Assistant', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 19th Street', 'Los Angelas', 'CA', '99999', 'USA', NULL, NULL, ''),
(20, 'Company T', 'Li', 'George', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 20th Street', 'New York', 'NY', '99999', 'USA', NULL, NULL, ''),
(21, 'Company U', 'Tham', 'Bernard', NULL, 'Accounting Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 21th Street', 'Minneapolis', 'MN', '99999', 'CA', NULL, NULL, ''),
(22, 'Company V', 'Ramos', 'Luciana', NULL, 'Purchasing Assistant', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 22th Street', 'Milwaukee', 'WI', '99999', 'WA', NULL, NULL, ''),
(23, 'Company W', 'Entin', 'Michael', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 23th Street', 'Portland', 'OR', '99999', 'USA', NULL, NULL, ''),
(24, 'Company X', 'Hasselberg', 'Jonas', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 24th Street', 'Salt Lake City', 'UT', '99999', 'USA', NULL, NULL, ''),
(25, 'Company Y', 'Rodman', 'John', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 25th Street', 'Chicago', 'IL', '99999', 'MT', NULL, NULL, ''),
(26, 'Company Z', 'Liu', 'Run', NULL, 'Accounting Assistant', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 26th Street', 'Miami', 'FL', '99999', 'USA', NULL, NULL, ''),
(27, 'Company AA', 'Toh', 'Karen', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 27th Street', 'Las Vegas', 'NV', '99999', 'USA', NULL, NULL, ''),
(28, 'Company BB', 'Raghav', 'Amritansh', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 28th Street', 'Memphis', 'TN', '99999', 'USA', NULL, NULL, ''),
(29, 'Company CC', 'Lee', 'Soo Jung', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 29th Street', 'Denver', 'CO', '99999', 'USA', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `business_phone` varchar(25) DEFAULT NULL,
  `home_phone` varchar(25) DEFAULT NULL,
  `mobile_phone` varchar(25) DEFAULT NULL,
  `fax_number` varchar(25) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `zip_postal_code` varchar(15) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `web_page` longtext DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `attachments` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`EmployeeID`, `company`, `LastName`, `first_name`, `email_address`, `job_title`, `business_phone`, `home_phone`, `mobile_phone`, `fax_number`, `address`, `city`, `Region`, `zip_postal_code`, `Country`, `web_page`, `notes`, `attachments`) VALUES
(1, 'Northwind Traders', 'Freehafer', 'Nancy', 'nancy@northwindtraders.com', 'Sales Representative', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 1st Avenue', 'Seattle', 'WA', '99999', 'USA', '#http://northwindtraders.com#', NULL, ''),
(2, 'Northwind Traders', 'Cencini', 'Andrew', 'andrew@northwindtraders.com', 'Vice President, Sales', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 2nd Avenue', 'Bellevue', 'WA', '99999', 'USA', 'http://northwindtraders.com#http://northwindtraders.com/#', 'Joined the company as a sales representative, was promoted to sales manager and was then named vice president of sales.', ''),
(3, 'Northwind Traders', 'Kotas', 'Jan', 'jan@northwindtraders.com', 'Sales Representative', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 3rd Avenue', 'Redmond', 'WA', '99999', 'USA', 'http://northwindtraders.com#http://northwindtraders.com/#', 'Was hired as a sales associate and was promoted to sales representative.', ''),
(4, 'Northwind Traders', 'Sergienko', 'Mariya', 'mariya@northwindtraders.com', 'Sales Representative', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 4th Avenue', 'Kirkland', 'WA', '99999', 'USA', 'http://northwindtraders.com#http://northwindtraders.com/#', NULL, ''),
(5, 'Northwind Traders', 'Thorpe', 'Steven', 'steven@northwindtraders.com', 'Sales Manager', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 5th Avenue', 'Seattle', 'WA', '99999', 'Spain', 'http://northwindtraders.com#http://northwindtraders.com/#', 'Joined the company as a sales representative and was promoted to sales manager. Fluent in French.', ''),
(6, 'Northwind Traders', 'Neipper', 'Michael', 'michael@northwindtraders.com', 'Sales Representative', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 6th Avenue', 'Redmond', 'WA', '99999', 'USA', 'http://northwindtraders.com#http://northwindtraders.com/#', 'Fluent in Japanese and can read and write French, Portuguese, and Spanish.', ''),
(7, 'Northwind Traders', 'Zare', 'Robert', 'robert@northwindtraders.com', 'Sales Representative', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 7th Avenue', 'Seattle', 'WA', '99999', 'USA', 'http://northwindtraders.com#http://northwindtraders.com/#', NULL, ''),
(8, 'Northwind Traders', 'Giussani', 'Laura', 'laura@northwindtraders.com', 'Sales Coordinator', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 8th Avenue', 'Redmond', 'WA', '99999', 'USA', 'http://northwindtraders.com#http://northwindtraders.com/#', 'Reads and writes French.', ''),
(9, 'Northwind Traders', 'Hellung-Larsen', 'Anne', 'anne@northwindtraders.com', 'Sales Representative', '(123)555-0100', '(123)555-0102', NULL, '(123)555-0103', '123 9th Avenue', 'Seattle', 'WA', '99999', 'USA', 'http://northwindtraders.com#http://northwindtraders.com/#', 'Fluent in French and German.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_alumnos`
--

CREATE TABLE `ga_alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ga_alumnos`
--

INSERT INTO `ga_alumnos` (`id_alumno`, `nombre`, `apellido1`, `dni`) VALUES
(1, 'Juan José', 'Nicolini', 49786652),
(3, 'pepe', 'grillo', 222222222),
(4, 'nayo', 'canino', 1111111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_alu_curso`
--

CREATE TABLE `ga_alu_curso` (
  `id_alu_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ga_alu_curso`
--

INSERT INTO `ga_alu_curso` (`id_alu_curso`, `id_alumno`, `id_curso`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_aulas`
--

CREATE TABLE `ga_aulas` (
  `id_aula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ga_aulas`
--

INSERT INTO `ga_aulas` (`id_aula`, `nombre`) VALUES
(1, 'Base de datos'),
(3, 'comunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_cursos`
--

CREATE TABLE `ga_cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ga_cursos`
--

INSERT INTO `ga_cursos` (`id_curso`, `nombre`, `fecha_inicio`, `fecha_fin`, `id_aula`, `id_profesor`) VALUES
(1, 'Programación', '2022-09-01', '2022-09-30', 1, 1),
(3, 'Estruturacion', '2022-10-01', '2022-10-31', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ga_profesores`
--

CREATE TABLE `ga_profesores` (
  `id_profesor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ga_profesores`
--

INSERT INTO `ga_profesores` (`id_profesor`, `nombre`, `apellido1`) VALUES
(1, 'Borja', 'Mulleras'),
(3, 'David', 'david');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `valor_cookie` varchar(100) DEFAULT NULL,
  `fecha_conexion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bf_autor`
--
ALTER TABLE `bf_autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bf_estante`
--
ALTER TABLE `bf_estante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bf_libros`
--
ALTER TABLE `bf_libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kf_estante_id` (`id_estante`);

--
-- Indices de la tabla `bf_libro_persona`
--
ALTER TABLE `bf_libro_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kf_libro_persona_id_libro` (`id_libro`),
  ADD KEY `kf_libro_persona_id_estante` (`id_estante`);

--
-- Indices de la tabla `bf_personas`
--
ALTER TABLE `bf_personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `company` (`CompanyName`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `zip_postal_code` (`zip_postal_code`),
  ADD KEY `state_province` (`state_province`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `city` (`city`),
  ADD KEY `company` (`company`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`LastName`),
  ADD KEY `zip_postal_code` (`zip_postal_code`),
  ADD KEY `state_province` (`Region`);

--
-- Indices de la tabla `ga_alumnos`
--
ALTER TABLE `ga_alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `ga_alu_curso`
--
ALTER TABLE `ga_alu_curso`
  ADD PRIMARY KEY (`id_alu_curso`),
  ADD KEY `fk_alu_curso_alumno` (`id_alumno`),
  ADD KEY `fk_alu_curso_curso` (`id_curso`);

--
-- Indices de la tabla `ga_aulas`
--
ALTER TABLE `ga_aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `ga_cursos`
--
ALTER TABLE `ga_cursos`
  ADD PRIMARY KEY (`id_curso`) USING BTREE,
  ADD KEY `fk_cursos_aulas` (`id_aula`),
  ADD KEY `fk_cursos_profesor` (`id_profesor`);

--
-- Indices de la tabla `ga_profesores`
--
ALTER TABLE `ga_profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bf_autor`
--
ALTER TABLE `bf_autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bf_estante`
--
ALTER TABLE `bf_estante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `bf_libros`
--
ALTER TABLE `bf_libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `bf_libro_persona`
--
ALTER TABLE `bf_libro_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bf_personas`
--
ALTER TABLE `bf_personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ga_alumnos`
--
ALTER TABLE `ga_alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ga_alu_curso`
--
ALTER TABLE `ga_alu_curso`
  MODIFY `id_alu_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ga_aulas`
--
ALTER TABLE `ga_aulas`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ga_cursos`
--
ALTER TABLE `ga_cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ga_profesores`
--
ALTER TABLE `ga_profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bf_libro_persona`
--
ALTER TABLE `bf_libro_persona`
  ADD CONSTRAINT `kf_libro_persona_id_libro` FOREIGN KEY (`id_libro`) REFERENCES `bf_libros` (`id`);

--
-- Filtros para la tabla `ga_alu_curso`
--
ALTER TABLE `ga_alu_curso`
  ADD CONSTRAINT `fk_alu_curso_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `ga_alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_alu_curso_curso` FOREIGN KEY (`id_curso`) REFERENCES `ga_cursos` (`id_curso`);

--
-- Filtros para la tabla `ga_cursos`
--
ALTER TABLE `ga_cursos`
  ADD CONSTRAINT `fk_cursos_aulas` FOREIGN KEY (`id_aula`) REFERENCES `ga_aulas` (`id_aula`),
  ADD CONSTRAINT `fk_cursos_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `ga_profesores` (`id_profesor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
