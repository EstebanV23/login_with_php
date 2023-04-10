DROP TABLE IF EXISTS `tbl_rol`;

CREATE TABLE `tbl_rol` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `rol_nom` varchar(50) NOT NULL,
  `rol_des` varchar(200) DEFAULT NULL,
  `rol_est` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`rol_id`),
  UNIQUE KEY `UQ_ROL` (`rol_nom`)
);

INSERT INTO `tbl_rol` VALUES (1,'logueado','Esto corresponde a un usuario logueado',1),(2,'admin','usuario administrador con permisos para ver usuarios logueados',1),(3,'superadmin','usuario admin con permisos para crear a todos los usuarios',1),(4,'Jefe','Usuario logueado con permisos para ver la lista de usuarios',1);

DROP TABLE IF EXISTS `tbl_usuario`;

CREATE TABLE `tbl_usuario` (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `usu_nom` varchar(50) NOT NULL,
  `usu_ape` varchar(50) DEFAULT NULL,
  `usu_mai` varchar(100) NOT NULL,
  `usu_use` varchar(50) NOT NULL,
  `usu_pas` varchar(50) NOT NULL,
  `usu_est` tinyint(1) DEFAULT '1',
  `usu_rol_id` int DEFAULT '1',
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `UQ_USUARIO` (`usu_nom`),
  KEY `FK_USU_ROL` (`usu_rol_id`),
  CONSTRAINT `FK_USU_ROL` FOREIGN KEY (`usu_rol_id`) REFERENCES `tbl_rol` (`rol_id`)
);

INSERT INTO `tbl_usuario` VALUES (1,'Brayan','Villamizar','Esteban.bevf@gmail.com','codevelop23','brayan212305',1,2),(2,'Carlos Farit','Gelves Gomez','faritcito11@gmail.com','FaritElKiller10','farit123',1,1),(3,'Prueba','OPrueba','uncorreo@deverdad.co','prueba','1234',0,1),(4,'qweqwe','eqwew','eqwe@dsd.cpm','qweqw','qweqw',0,1),(5,'Maria Fernanda','Zabala Arciniegas','mafezabalaarciniegas@gmail.com','MafeGamer27','pass',1,2),(6,'Esteban','Fernandez','admin@empresa.com','admin','admincontrol',1,3),(7,'prueba igual','prueba igual','prueba@dsd.co','faritelkiller101','1234',1,1),(8,'prueba copia 2','prueba copia 2','prueb@dsds.com','FaritElKiller102','1234',1,1),(9,'pruebaagregar','pruebaagregar','pruebaagregar@gmail.com','pruebaagregar','pruebaagregar',1,1),(11,'pruebaagregar2','pruebaagregar2','pruebaagregar2@gamil.com','pruebaagregar2','pruebaagregar2',1,2),(12,'Jefe','Landines','jefelandines@gmail.com','jefecito','jefe123',1,4);
