
CREATE TABLE IF NOT EXISTS Dogtable (
  `DogID` INT NOT NULL AUTO_INCREMENT,
  `DogName` VARCHAR(45) NOT NULL,
  `DogBreed` VARCHAR(45) NOT NULL,
  `DogSex` VARCHAR(8) NOT NULL,
  `DogAge` INT NOT NULL,
  `DogColor` VARCHAR(15) NOT NULL,
  `DogSize` VARCHAR(15) NOT NULL,
  `DogDescription` VARCHAR(45) NOT NULL,
  `DogMedical` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`DogID`));



-- -----------------------------------------------------
-- Table`UserTable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS UserTable (
  `UserID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(15) NOT NULL,
  `FirstName` VARCHAR(45) NOT NULL,
  `LastName` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(15) NOT NULL,
  `UserType` VARCHAR(20) NOT NULL,
  `AnnualIncome` DOUBLE NULL DEFAULT NULL,
  `Email` VARCHAR(30) NOT NULL,
  `Address` VARCHAR(45) NOT NULL,
  `NumberOfPetsAtHome` INT NULL DEFAULT NULL,
  PRIMARY KEY (`UserID`));


-- -----------------------------------------------------
-- Table `History`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS History (
  `HistoryID` INT NOT NULL AUTO_INCREMENT,
  `AdoptionDate` DATE NOT NULL,
  `AdoptionStatus` VARCHAR(15) NOT NULL,
  `HistoryNote` VARCHAR(45) NOT NULL,
  `Dogtable_DogID` INT NOT NULL,
  `UserTable_UserID` INT NOT NULL,
  PRIMARY KEY (`HistoryID`, `Dogtable_DogID`, `UserTable_UserID`),
  INDEX `fk_History_Dogtable1_idx` (`Dogtable_DogID` ASC) ,
  INDEX `fk_History_UserTable1_idx` (`UserTable_UserID` ASC) ,
  CONSTRAINT `fk_History_Dogtable1`
    FOREIGN KEY (`Dogtable_DogID`)
    REFERENCES `myronovy`.`Dogtable` (`DogID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_History_UserTable1`
    FOREIGN KEY (`UserTable_UserID`)
    REFERENCES `myronovy`.`UserTable` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table MessageTabel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS MessageTabel (
  `MessageID` INT NOT NULL AUTO_INCREMENT,
  `UserID` INT NOT NULL,
  `UserName` VARCHAR(45) NOT NULL,
  `MessageDate` DATE NOT NULL,
  `MessageEmail` VARCHAR(45) NOT NULL,
  `MessageText` VARCHAR(100) NOT NULL,
  `UserTable_UserID` INT NOT NULL,
  PRIMARY KEY (`MessageID`),
  INDEX `fk_MessageTabel_UserTable1_idx` (`UserTable_UserID` ASC) ,
  CONSTRAINT `fk_MessageTabel_UserTable1`
    FOREIGN KEY (`UserTable_UserID`)
    REFERENCES `myronovy`.`UserTable` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



