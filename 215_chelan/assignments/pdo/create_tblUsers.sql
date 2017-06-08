CREATE TABLE `johnhsnyder`.`tblUsers`(
  `userid`     INT(11) NOT NULL AUTO_INCREMENT
 ,`username`   VARCHAR(20) NOT NULL
 ,`password`   CHAR(40) NOT NULL
 ,`level`      INT NULL
 ,PRIMARY KEY(`userid`)
 ,UNIQUE`ix_uk_username`(`username`))
ENGINE = InnoDB;