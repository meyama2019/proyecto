# Creacion del usuario de la apli 

CREATE USER 'socio'@'localhost' IDENTIFIED BY 'socio';



# Privilegios para `socio`@`localhost`

GRANT USAGE ON *.* TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`paises` TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`contacto` TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`fotos` TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`usuarios` TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`documentos` TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`provincias` TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`noticias` TO 'socio'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES ON `marte`.`rolusuario` TO 'socio'@'localhost';


FLUSH PRIVILEGES;  