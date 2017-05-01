-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-05-2017 a las 03:49:30
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `fun_club`
--
CREATE DATABASE IF NOT EXISTS `fun_club` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `fun_club`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_productos`
--

CREATE TABLE `calificaciones_productos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `piso` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `numero` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `localidad_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id` int(11) NOT NULL,
  `remito_id` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  `domicilio_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_reservas`
--

CREATE TABLE `estados_reservas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  `monto` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_productos`
--

CREATE TABLE `factura_productos` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_productos`
--

CREATE TABLE `fotos_productos` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `file` blob NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `duracion_viaje` int(11) DEFAULT NULL,
  `precio` decimal(30,2) DEFAULT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_pagos`
--

CREATE TABLE `medios_pagos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas_user`
--

CREATE TABLE `multas_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `descripcion` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `precio` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_multas`
--

CREATE TABLE `pagos_multas` (
  `id` int(11) NOT NULL,
  `multas_user_id` int(11) NOT NULL,
  `medio_pago_id` int(11) NOT NULL,
  `monto` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_reserva`
--

CREATE TABLE `pagos_reserva` (
  `id` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medio_pago_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `abreviatura` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `rango_edad_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `descripcion` varchar(280) COLLATE latin1_spanish_ci NOT NULL,
  `informacion` varchar(280) COLLATE latin1_spanish_ci NOT NULL,
  `dimensiones` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `precio` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango_edades`
--

CREATE TABLE `rango_edades` (
  `id` int(11) NOT NULL,
  `rango` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `monto` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remitos`
--

CREATE TABLE `remitos` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado_reserva_id` int(11) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_productos`
--

CREATE TABLE `reservas_productos` (
  `id` int(11) NOT NULL,
  `reserva_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipo_telefono_id` int(11) NOT NULL,
  `numero` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_telefonos`
--

CREATE TABLE `tipo_telefonos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dni` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones_productos`
--
ALTER TABLE `calificaciones_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_calificacion_user_idx` (`user_id`),
  ADD KEY `fk_producto_idx` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_domicilio_user_idx` (`user_id`),
  ADD KEY `fk_domiclio_localidad_idx` (`localidad_id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_envio_remito_idx` (`remito_id`),
  ADD KEY `fk_envio_reserva_idx` (`reserva_id`),
  ADD KEY `fk_envio_domicilio_idx` (`domicilio_id`);

--
-- Indices de la tabla `estados_reservas`
--
ALTER TABLE `estados_reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_facturas_reserva_idx` (`reserva_id`);

--
-- Indices de la tabla `factura_productos`
--
ALTER TABLE `factura_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_factura_producto_idx` (`producto_id`),
  ADD KEY `fk_factura_idx` (`factura_id`);

--
-- Indices de la tabla `fotos_productos`
--
ALTER TABLE `fotos_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fotos_prod_idx` (`producto_id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_localidad_provincia_idx` (`provincia_id`);

--
-- Indices de la tabla `medios_pagos`
--
ALTER TABLE `medios_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multas_user`
--
ALTER TABLE `multas_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_multa_user_idx` (`user_id`);

--
-- Indices de la tabla `pagos_multas`
--
ALTER TABLE `pagos_multas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pago_multa_idx` (`multas_user_id`),
  ADD KEY `fk_medio_pago_idx` (`medio_pago_id`);

--
-- Indices de la tabla `pagos_reserva`
--
ALTER TABLE `pagos_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_pago_idx` (`reserva_id`),
  ADD KEY `fk_medio_pago_reserva_idx` (`medio_pago_id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rango_edad_idx` (`rango_edad_id`),
  ADD KEY `fk_categoria_prod_idx` (`categoria_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prov_pais_idx` (`pais_id`);

--
-- Indices de la tabla `rango_edades`
--
ALTER TABLE `rango_edades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recibo_fact_idx` (`factura_id`);

--
-- Indices de la tabla `remitos`
--
ALTER TABLE `remitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_remito_factura_idx` (`factura_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_user_idx` (`user_id`),
  ADD KEY `fk_reserva_estado` (`estado_reserva_id`);

--
-- Indices de la tabla `reservas_productos`
--
ALTER TABLE `reservas_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_reserva_idx` (`reserva_id`),
  ADD KEY `fk_reserva_producto_idx` (`producto_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tel_user_idx` (`user_id`),
  ADD KEY `fk_tel_tipo_idx` (`tipo_telefono_id`);

--
-- Indices de la tabla `tipo_telefonos`
--
ALTER TABLE `tipo_telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `fk_user_rol_idx` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones_productos`
--
ALTER TABLE `calificaciones_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados_reservas`
--
ALTER TABLE `estados_reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura_productos`
--
ALTER TABLE `factura_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fotos_productos`
--
ALTER TABLE `fotos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medios_pagos`
--
ALTER TABLE `medios_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `multas_user`
--
ALTER TABLE `multas_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagos_multas`
--
ALTER TABLE `pagos_multas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagos_reserva`
--
ALTER TABLE `pagos_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rango_edades`
--
ALTER TABLE `rango_edades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `remitos`
--
ALTER TABLE `remitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reservas_productos`
--
ALTER TABLE `reservas_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_telefonos`
--
ALTER TABLE `tipo_telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones_productos`
--
ALTER TABLE `calificaciones_productos`
  ADD CONSTRAINT `fk_calificacion_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `fk_domicilio_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_domiclio_localidad` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `fk_envio_domicilio` FOREIGN KEY (`domicilio_id`) REFERENCES `domicilios` (`id`),
  ADD CONSTRAINT `fk_envio_remito` FOREIGN KEY (`remito_id`) REFERENCES `remitos` (`id`),
  ADD CONSTRAINT `fk_envio_reserva` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_reserva` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`id`);

--
-- Filtros para la tabla `factura_productos`
--
ALTER TABLE `factura_productos`
  ADD CONSTRAINT `fk_factura` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `fk_factura_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `fotos_productos`
--
ALTER TABLE `fotos_productos`
  ADD CONSTRAINT `fk_fotos_prod` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `fk_localidad_provincia` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`);

--
-- Filtros para la tabla `multas_user`
--
ALTER TABLE `multas_user`
  ADD CONSTRAINT `fk_multa_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pagos_multas`
--
ALTER TABLE `pagos_multas`
  ADD CONSTRAINT `fk_medio_pago` FOREIGN KEY (`medio_pago_id`) REFERENCES `medios_pagos` (`id`),
  ADD CONSTRAINT `fk_pago_multa` FOREIGN KEY (`multas_user_id`) REFERENCES `multas_user` (`id`);

--
-- Filtros para la tabla `pagos_reserva`
--
ALTER TABLE `pagos_reserva`
  ADD CONSTRAINT `fk_medio_pago_reserva` FOREIGN KEY (`medio_pago_id`) REFERENCES `medios_pagos` (`id`),
  ADD CONSTRAINT `fk_reserva_pago` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria_prod` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_rango_edad` FOREIGN KEY (`rango_edad_id`) REFERENCES `rango_edades` (`id`);

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `fk_prov_pais` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`);

--
-- Filtros para la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD CONSTRAINT `fk_recibo_fact` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`);

--
-- Filtros para la tabla `remitos`
--
ALTER TABLE `remitos`
  ADD CONSTRAINT `fk_remito_factura` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reserva_estado` FOREIGN KEY (`estado_reserva_id`) REFERENCES `estados_reservas` (`id`),
  ADD CONSTRAINT `fk_reserva_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `reservas_productos`
--
ALTER TABLE `reservas_productos`
  ADD CONSTRAINT `fk_reserva_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_reserva_reserva` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`id`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `fk_tel_tipo` FOREIGN KEY (`tipo_telefono_id`) REFERENCES `tipo_telefonos` (`id`),
  ADD CONSTRAINT `fk_tel_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;
