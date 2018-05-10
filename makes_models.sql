CREATE DEFINER=`root`@`localhost` PROCEDURE `PopulateMakesAndModels`()
BEGIN

	TRUNCATE model;
    TRUNCATE make;
    INSERT INTO make (name, text) VALUES ("Ford", "Ford");
    INSERT INTO make (name, text) VALUES ("Holden", "Holden");
    INSERT INTO make (name, text) VALUES ("Toyota", "Toyota");
    INSERT INTO make (name, text) VALUES ("Mitsubishi", "Mitsubishi");
    INSERT INTO make (name, text) VALUES ("Subaru", "Subaru");
    INSERT INTO make (name, text) VALUES ("Hyundai", "Hyundai");
    INSERT INTO make (name, text) VALUES ("Mazda", "Mazda");


    INSERT INTO model (make, name, text) VALUES ("Subaru", "Forester", "Forester");
    INSERT INTO model (make, name, text) VALUES ("Subaru", "Outback", "Outback");
    INSERT INTO model (make, name, text) VALUES ("Subaru", "WRX", "WRX");
    INSERT INTO model (make, name, text) VALUES ("Subaru", "Impreza", "Impreza");

    INSERT INTO model (make, name, text) VALUES ("Ford", "Falcon", "Falcon");
    INSERT INTO model (make, name, text) VALUES ("Ford", "Focus", "Focus");
    INSERT INTO model (make, name, text) VALUES ("Ford", "Mondeo", "Mondeo");
    INSERT INTO model (make, name, text) VALUES ("Ford", "Ranger", "Ranger");
    INSERT INTO model (make, name, text) VALUES ("Ford", "Fiesta", "Fiesta");
    
    INSERT INTO model (make, name, text) VALUES ("Holden", "Commodore", "Commodore");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Astra", "Astra");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Barina", "Barina");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Captiva", "Captiva");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Colorado", "Colorado");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Cruze", "Cruze");

    INSERT INTO model (make, name, text) VALUES ("Toyota", "Yaris", "Yaris");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Corolla", "Corolla");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Hilux", "Hilux");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Prius", "Prius");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Camry", "Camry");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Rav 4", "Rav 4");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Kluger", "Kluger");


    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Lancer", "Lancer");
    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Challenger", "Challenger");
    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Triton", "Triton");
    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Pajero", "Pajero");
    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Outlander", "Outlander");

    INSERT INTO model (make, name, text) VALUES ("Hyundai", "i30", "i30");
    INSERT INTO model (make, name, text) VALUES ("Hyundai", "SantaFe", "SantaFe");
    INSERT INTO model (make, name, text) VALUES ("Hyundai", "Elantra", "Elantra");

    INSERT INTO model (make, name, text) VALUES ("Mazda", "3", "3");
    INSERT INTO model (make, name, text) VALUES ("Mazda", "6", "6");
    INSERT INTO model (make, name, text) VALUES ("Mazda", "BT50", "BT50");
    INSERT INTO model (make, name, text) VALUES ("Mazda", "CX3", "CX3");
    INSERT INTO model (make, name, text) VALUES ("Mazda", "CX5", "CX5");
    INSERT INTO model (make, name, text) VALUES ("Mazda", "CX7", "CX7");
    INSERT INTO model (make, name, text) VALUES ("Mazda", "CX9", "CX9");
END