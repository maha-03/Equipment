CREATE TABLE type_of_equipment ( 
	id_type              int NOT NULL AUTO_INCREMENT   ,
	name_type            varchar(30)     ,
	mask_sn              varchar(10)     ,
	CONSTRAINT Pk_type_of_equipment_id_type PRIMARY KEY  ( id_type ) 
 ) 

CREATE TABLE equipment ( 
	id_                  int NOT NULL AUTO_INCREMENT   ,
	type_id              int NOT NULL    ,
	sn                   varchar(10) NOT NULL    ,
	CONSTRAINT Pk_equipment_id PRIMARY KEY  ( id_ ) 
 ) 

CREATE UNIQUE INDEX Unq_equipment ON equipment ( sn );

ALTER TABLE equipment ADD CONSTRAINT Fk_equipment_type_of_equipment FOREIGN KEY ( type_id ) REFERENCES type_of_equipment( id_type ) ON DELETE NO ACTION ON UPDATE NO ACTION;

