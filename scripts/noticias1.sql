-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 21:20:09
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `titulo` varchar(400) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `userid`, `fechainicio`, `fechafin`, `titulo`, `descripcion`) VALUES
(1, 1, '2019-02-24', '2019-08-24', 'Marte corre por la igualdad', 'El pasado sábado día 24 de febrero tuvo lugar la V Carrera por la Igualdad organizado por el Ayuntamiento de Marte. Grandes deportistas y grandes personas solidarias se citaron para participar en una maratón recorriendo las principales calles de Marte con un fin benéfico: recaudar fondos para ayuda de las víctimas de la violencia de género. Contó con más de 120 participantes de todas las edades'),
(2, 1, '2019-04-15', '2019-10-15', 'Dan comienzo las obras de construcción de un "skatepark"', 'Tras la redacción del proyecto, da comienzo la construcción de un espacio "skatepark" junto a los casi finalizados parque de educación vial y zona infantil de juegos. Será un espacio dedicado al monopatín, el cual se pondrá en marcha la próxima semana con la colaboración de los Colegios del municipio con actividades informativas que coordinará la Policía Municipal.'),
(3, 1, '2019-03-01', '2019-09-01', 'Arrancan los nuevos programas de empleo en el Ayuntamiento', 'La Iniciativa de Cooperación Social y Comunitaria para el Impulso del Emple@Joven y Emple30+ es una acción que está financiada por la Junta de Andalucía y por el Fondo Social Europeo procedente del “Programa Operativo FSE de Andalucía 2014-2020”. Con este programa personas desempleadas pueden acceder al mercado laboral, y lo más importante, pueden obtener la experiencia que tanto demandan las empresas. Ocuparán puestos de auxiliares administrativos, técnicos y monitores deportivos.'),
(4, 1, '2019-05-06', '2019-11-06', 'Actuación de emergencia en la Cuesta de los Zagales para arreglo de saneamiento', 'Durante alrededor de una semana, debido a una severa avería de saneamiento, el Ayuntamiento se verá en la necesidad de intervenir con carácter de urgencia en la Cuesta de los Zagales, quedando cortada a partir de la esquina con C/ Baja. El tráfico habrá de desviarse o bien por esta vía de C/ Baja o con antelación en la C/ Travesía de Peñuelas.'),
(5, 1, '2019-02-15', '2019-08-15', 'MOOC: ¿Estás preparado para competir? Transformación digital para pymes.', 'La transformación digital de las empresas es un factor clave hoy día para su competitividad y productividad. Próximamente, Andalucía Digital pone en marcha un MOOC sobre este tema, para los que quieran formarse de forma gratuita y on-line.'),
(6, 1, '2019-02-06', '2019-08-06', 'El Ayuntamiento ha presentado la primera edición del Premio a la Mejor Idea Empresarial.', 'Este certamen está dirigido a emprendedores de hasta 35 años. La idea es potenciar el desarrollo de nuevos proyectos empresariales. Cuenta con un premio de 4.000 € y otro de 1.000 €. El plazo de presentación de proyectos va del 1 de febrero al 15 de Marzo del 2019'),
(7, 1, '2019-06-27', '2019-11-27', 'LINCE, un Evento para el Emprendedor y sus Ideas', 'LINCE pretende apoyar a los mejores proyectos en marcha e ideas de Emprendimiento de la Provincia. Visualizar el Ecosistema de Emprendimiento de la Provincia. Crear Redes entre Emprendedores, Empresarios e Instituciones, y Mostrar Buenas Prácticas y Experiencias de Empresas.'),
(8, 1, '2019-06-23', '2019-12-23', 'IMEFE: abierto el plazo de solicitud para la cesión gratuita de espacios de negocio', 'El Instituto Municipal de Empleo y Formación Empresarial del Excmo. Ayuntamiento informa que, actualmente y hasta el 18 de agosto de 2019 (13:00 horas), se encuentra abierto el plazo de solicitud para la cesión gratuita de negocio'),
(9, 2, '2019-01-22', '2019-07-22', 'El Portillo Sotero experimenta una profunda mejora urbana', 'El espacio está en el ecuador de sus obras, que supondrá una inversión municipal de más de 80.000. Se trata de la puesta en valor de este punto del que se disfruta tanto desde la calle Fuente Zaide como desde la Avda. Alcalde Fernando Tejero. El proyecto contempla la dotación de una pérgola para producir más sombra y vegetación, fuente, iluminación y en definitiva un embellecimiento de este rincón con vistas al Castillo. '),
(10, 2, '2019-02-25', '2019-08-25', 'La compañía de Pablo Fornell ofreció en el Teatro Municipal "Sylvia y Aminta"', 'Un espectáculo de danza que llegó desde tierras Gaditanas para el disfrute de toda la familia. Algo nuevo e interesante para acercar a los más pequeños al mundo del teatro. De la mano de la compañía de Pablo Fornell pudimos disfrutar el pasado sábado día 23 de febrero, dentro del marco de la programación de actividades por el Día de Andalucía, de Sylvia y Aminta. La historia está basada en criaturas enfrentadas que deben dejar a un lado sus diferencias y unirse para recuperar a sus crías.'),
(11, 2, '2019-03-04', '2019-09-04', 'El Concurso de disfraces y el Concurso de Agrupaciones conformaron un gran fin de semana de Carnaval', 'El pasado viernes día 1 de marzo tuvimos en el Teatro Municipal por tercer año consecutivo el Concurso de Comparsas, Chirigotas y Agrupaciones de Carnaval. Este año hemos podido contar con la participación de seis grupos. Dos comparsas (Carnaval de mis entretelas y La Recompensa) y cuatro chirigotas: "Vamos a bordarlo" , "Los locos de la pista","Los enchufaos de papá" y "Un pito pato´s".'),
(12, 2, '2019-04-30', '2019-10-30', 'Curso para la sensibilización y formación para la agricultura sostenible', 'El Ayuntamiento de recibió de la Diputación la cantidad de 5.500 € para llevar a cabo el denominado “Proyecto de sensibilización y formación para la agricultura sostenible”, correspondiente a las subvenciones que concede este organismos para la realización de proyectos en el marco de las Subvenciones del Área de Agricultura, Ganadería y Medio Ambiente. El presupuesto total asciende a 5.790 euros, asumiendo el Ayuntamiento la parte no subvencionada.El desarrollo supone cursos para desempleados.'),
(13, 2, '2019-03-25', '2019-09-25', 'Alegría y color en la séptima edición de la Fiesta de la Primavera Infantil', 'os niños y niñas del municipio fueron protagonistas en una fiesta que da la bienvenida a la primavera y que se organiza anualmente desde el Área de Ocio y Participación Ciudadana. La jornada comenzó con un pasacalles por calles y avenidas anunciando el evento. Durante todo el día se sucedieron las actuaciones, bailes, sketches cómicos, juegos, concursos y amenización que involucró al público infantil pero también a padres y madres.'),
(14, 7, '2019-07-02', '2020-01-02', 'Fin de semana para la convivencia y el deporte', 'Este pasado fin de semana visitaron Marte 25 pequeños futbolistas de las categorías alevín y benjamín, provenientes del equipo Fútbol Orígen Andaluz, los cuales, acompañados de sus familiares, han llenado Marte de entusiasmo y ganas de practicar deporte más allá de la competición.\r\n\r\nEsta iniciativa, promovida por parte de CD Veteranos de Marte, ha hecho de un fin de semana cualquiera, unos días de convivencia entre niños de toda Andalucía.'),
(15, 7, '2019-06-13', '2019-12-13', 'Ya se puede licitar para explotación el Bar-Cafetería de la Estación tras su reforma', 'La Estación de Autobuses fue objeto de una profunda reforma. En meses anteriores se llevó a cabo de igual manera la reforma del Bar que hay anexa a la misma. Se ha venido prestando el servicio de gestión del Bar por una empresa de servicios cuyo contrato expiró en Noviembre de 2.018.Por ello, se hace necesario proceder a la licitación de la concesión del servicio antes citado, dando así continuación a la prestación de un servicio de vital importancia por su emplazamiento.'),
(16, 7, '2019-02-13', '2019-08-13', 'Los festivos locales para 2019 serán el 13 y 16 de septiembre, coincidiendo con la Feria', 'El Pleno del pasado mes de diciembre aprobó situar los festivos locales correspondientes en los días 13 y 16 de septiembre, coincidiendo con la Real Feria y Fiestas de Marte, de manera que los festivos locales se situarán, combinándose con un fin de semana, para ajustar la feria al día en que tradicionalmente se ha celebrado el Concurso Comarcal Hortofrutícola. Para El Sabariego, la Fiesta del Palo será 30 de abril y 1 de mayo. Para Los Noguerones, la feria será del 17 al 21 de julio.'),
(17, 7, '2019-02-12', '2019-08-12', 'El Archivo Municipal inicia su digitalización', 'El Diputado de Cultura y Deportes y el Alcalde visitaron el Archivo Municipal para conocer los trabajos de digitalización y catalogación que desde el Instituto de Estudios Giennenses se ha propuesto para ordenar toda la documentación existente. Se incorporarán novedades como por ejemplo agilidad en la consulta de expedientes o legajos, así como establecer algunos criterios de conservación, catalogación, consulta, políticas de privacidad y seguridad y una serie de mejoras para las instalaciones. '),
(18, 7, '2019-01-12', '2019-06-12', 'El Castillo ya goza del distintivo de calidad turística "SICTED"', 'El Centro de Interpretación de la Orden Militar de Calatrava que cobija el monumento del Castillo ha recibido el distintivo SICTED. Este distintivo reconoce la calidad del destino y la atención turística. Desde el Área de Turismo se venía trabajando por reajustar algunas indicaciones para adaptarse a esta normativa. El día 11 de enero el Alcalde junto al Concejal de Turismo y Patrimonio recogían la placa que acredita la posesión de manos del Diputado de Turismo de la Diputación Provincial.'),
(19, 7, '2019-01-08', '2019-07-08', 'Los Reyes Magos recorren el municipio desbordando la ilusión y la participación', 'Las cifras de participación en la Cabalgata han superado todas las expectativas. Gracias al tejido asociativo y empresarial del municipio se han alcanzado este año la cercana cifra de dos toneladas en caramelos que se han repartido en las distintas visitas de los Reyes Magos a los núcleos urbanos. Desde aquí el Ayuntamiento desea agradecer toda esta colaboración.'),
(20, 7, '2019-06-07', '2019-12-07', 'Abierto el plazo para solicitar el "chequelibro"', 'Del 1 al 30 de Junio de 2019 está abierto el plazo para solicitar el chequelibro. No se admitirá ninguna solicitud presentada con posterioridad al 30 de Junio de 2019. Como condición se establece que el alumnado para el que se solicite la ayuda deberá estar matriculado en un Centro Educativo del Municipio de Marte y empadronado, junto con su unidad familiar en los registros municipales. La factura de libros debe ser de un establecimiento con razón social en el término municipal de Marte.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
