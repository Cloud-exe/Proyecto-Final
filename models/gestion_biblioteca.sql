-- Active: 1724916976419@@127.0.0.1@3306@gestion_biblioteca
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2024 a las 14:23:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de datos: `gestion_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
    `id` int(11) NOT NULL,
    `titulo` varchar(255) NOT NULL,
    `autor` varchar(255) NOT NULL,
    `genero` varchar(100) NOT NULL,
    `anio_publicacion` int(11) NOT NULL,
    `isbn` varchar(20) NOT NULL,
    `cantidad_disponible` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO
    `libros` (
        `id`,
        `titulo`,
        `autor`,
        `genero`,
        `anio_publicacion`,
        `isbn`,
        `cantidad_disponible`,
        `created_at`
    )
VALUES (
        1,
        'Cien Años de Soledad',
        'Gabriel García Márquez',
        'Realismo Mágico',
        1967,
        '978-84-376-0494-7',
        10,
        '2024-08-30 11:11:57'
    ),
    (
        2,
        'Don Quijote de la Mancha',
        'Miguel de Cervantes',
        'Novela',
        1605,
        '978-84-376-0493-0',
        6,
        '2024-08-30 11:11:57'
    ),
    (
        3,
        'El Principito',
        'Antoine de Saint-Exupéry',
        'Fábula',
        1943,
        '978-84-376-0495-4',
        8,
        '2024-08-30 11:11:57'
    ),
    (
        4,
        'Crimen y Castigo',
        'Fiódor Dostoyevski',
        'Novela',
        1866,
        '978-84-376-0496-1',
        3,
        '2024-08-30 11:11:57'
    ),
    (
        5,
        'La Odisea',
        'Homero',
        'Épica',
        -800,
        '978-84-376-0497-8',
        7,
        '2024-08-30 11:11:57'
    );

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
    `id` int(11) NOT NULL,
    `nombre` varchar(255) NOT NULL,
    `apellido` varchar(255) NOT NULL,
    `direccion` varchar(255) NOT NULL,
    `telefono` varchar(20) NOT NULL,
    `correo_electronico` varchar(255) NOT NULL,
    `fecha_inscripcion` date NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO
    `miembros` (
        `id`,
        `nombre`,
        `apellido`,
        `direccion`,
        `telefono`,
        `correo_electronico`,
        `fecha_inscripcion`,
        `created_at`
    )
VALUES (
        1,
        'Juan',
        'Pérez',
        'Calle Falsa 123',
        '555-1234',
        'juan.perez@example.com',
        '2023-01-15',
        '2024-08-30 11:12:02'
    ),
    (
        2,
        'María',
        'López',
        'Avenida Siempreviva 742',
        '555-5678',
        'maria.lopez@example.com',
        '2023-02-10',
        '2024-08-30 11:12:02'
    ),
    (
        3,
        'Carlos',
        'García',
        'Boulevard de los Sueños 1',
        '555-8765',
        'carlos.garcia@example.com',
        '2023-03-05',
        '2024-08-30 11:12:02'
    ),
    (
        4,
        'Lucía',
        'Martínez',
        'Camino del Rey 200',
        '555-4321',
        'lucia.martinez@example.com',
        '2023-04-20',
        '2024-08-30 11:12:02'
    ),
    (
        5,
        'Ana',
        'Rodríguez',
        'Plaza Mayor 8',
        '555-6789',
        'ana.rodriguez@example.com',
        '2023-05-12',
        '2024-08-30 11:12:02'
    );

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
    `id` int(11) NOT NULL,
    `id_miembro` int(11) NOT NULL,
    `id_libro` int(11) NOT NULL,
    `fecha_prestamo` date NOT NULL,
    `fecha_devolucion_esperada` date NOT NULL,
    `estado` enum('Prestado', 'Devuelto') DEFAULT 'Prestado',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO
    `prestamos` (
        `id`,
        `id_miembro`,
        `id_libro`,
        `fecha_prestamo`,
        `fecha_devolucion_esperada`,
        `estado`,
        `created_at`
    )
VALUES (
        1,
        1,
        2,
        '2023-07-01',
        '2023-07-15',
        'Devuelto',
        '2024-08-30 11:12:07'
    ),
    (
        2,
        2,
        3,
        '2023-07-02',
        '2023-07-16',
        'Devuelto',
        '2024-08-30 11:12:07'
    ),
    (
        3,
        3,
        1,
        '2023-07-03',
        '2023-07-17',
        'Prestado',
        '2024-08-30 11:12:07'
    ),
    (
        4,
        4,
        5,
        '2023-07-04',
        '2023-07-18',
        'Devuelto',
        '2024-08-30 11:12:07'
    ),
    (
        5,
        5,
        4,
        '2023-07-05',
        '2023-07-19',
        'Prestado',
        '2024-08-30 11:12:07'
    );

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
ADD PRIMARY KEY (`id`),
ADD KEY `id_miembro` (`id_miembro`),
ADD KEY `id_libro` (`id_libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_miembro`) REFERENCES `miembros` (`id`),
ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

ALTER TABLE `libros`
ADD COLUMN `descripcion` TEXT AFTER `cantidad_disponible`,
ADD COLUMN `imagen` VARCHAR(255) NOT NULL DEFAULT 'default_image.jpg' AFTER `descripcion`;

ALTER TABLE `libros` ADD PRIMARY KEY (`id`);

ALTER TABLE `libros` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

UPDATE
TABLE `libros` (
    titulo,
    autor,
    genero,
    anio_publicacion,
    isbn,
    cantidad_disponible,
    descripcion,
    imagen
)
VALUES (
        'Cien Años de Soledad',
        'Gabriel García Márquez',
        'Realismo Mágico',
        1967,
        '978-84-376-0494-7',
        10,
        'Una obra maestra del realismo mágico que narra la historia de la familia Buendía en el pueblo ficticio de Macondo.',
        'cien_anos_de_soledad.jpg'
    ),
    (
        'Don Quijote de la Mancha',
        'Miguel de Cervantes',
        'Novela',
        1605,
        '978-84-376-0493-0',
        5,
        'Las aventuras del ingenioso hidalgo Don Quijote y su fiel escudero Sancho Panza.',
        'don_quijote.jpg'
    ),
    (
        'El Principito',
        'Antoine de Saint-Exupéry',
        'Fábula',
        1943,
        '978-84-376-0495-4',
        8,
        'Un cuento filosófico que explora temas de soledad, amistad, amor y pérdida.',
        'el_principito.jpg'
    ),
    (
        'Crimen y Castigo',
        'Fiódor Dostoyevski',
        'Novela',
        1866,
        '978-84-376-0496-1',
        3,
        'Una obra que analiza la mente criminal y la moralidad, centrada en el joven Raskólnikov.',
        'crimen_y_castigo.jpg'
    ),
    (
        'La Odisea',
        'Homero',
        'Épica',
        -800,
        '978-84-376-0497-8',
        7,
        'El viaje épico de Odiseo mientras intenta regresar a su hogar en Ítaca tras la Guerra de Troya.',
        'default_image.jpg'
    );

UPDATE `libros`
SET
    `descripcion` = 'Una obra que narra la historia de la familia Buendía en el pueblo ficticio de Macondo.',
    `imagen` = 'cien_anos_de_soledad.jpg'
WHERE
    `id` = 1;

UPDATE `libros`
SET
    `descripcion` = 'Las aventuras del ingenioso hidalgo Don Quijote y su fiel escudero Sancho Panza.',
    `imagen` = 'don_quijote.jpg'
WHERE
    `id` = 2;

UPDATE `libros`
SET
    `descripcion` = 'Un cuento filosófico que explora temas de soledad, amistad, amor y pérdida.',
    `imagen` = 'el_principito.jpg'
WHERE
    `id` = 3;

UPDATE `libros`
SET
    `descripcion` = 'Una obra que analiza la mente criminal y la moralidad, centrada en el joven Raskólnikov.',
    `imagen` = 'crimen_y_castigo.jpg'
WHERE
    `id` = 4;

UPDATE `libros`
SET
    `descripcion` = 'El viaje épico de Odiseo mientras intenta regresar a su hogar en Ítaca tras la Guerra de Troya.',
    `imagen` = 'la_odisea.jpg'
WHERE
    `id` = 5;