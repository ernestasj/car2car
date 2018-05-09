CREATE DEFINER=`root`@`localhost` PROCEDURE `PopulateMakesAndModels`()
BEGIN

	TRUNCATE model;
    TRUNCATE make;
	INSERT INTO make (name, text) VALUES ("Ford", "Ford");
    INSERT INTO make (name, text) VALUES ("Holden", "Holden");
    INSERT INTO make (name, text) VALUES ("Toyota", "Toyota");
    INSERT INTO make (name, text) VALUES ("Mitsubishi", "Mitsubishi");
    INSERT INTO make (name, text) VALUES ("Subaru", "Subaru");


    INSERT INTO model (make, name, text) VALUES ("Subaru", "Forester", "Forester");
    INSERT INTO model (make, name, text) VALUES ("Subaru", "Outback", "Outback");
    INSERT INTO model (make, name, text) VALUES ("Subaru", "WRX", "WRX");

    INSERT INTO model (make, name, text) VALUES ("Ford", "Falcon", "Falcon");
    INSERT INTO model (make, name, text) VALUES ("Ford", "XR6", "XR6");
    INSERT INTO model (make, name, text) VALUES ("Ford", "Focus", "Focus");
    
    INSERT INTO model (make, name, text) VALUES ("Holden", "Commodore", "Commodore");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Astra", "Astra");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Barina", "Barina");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Captiva", "Captiva");
    INSERT INTO model (make, name, text) VALUES ("Holden", "Colorado", "Colarado");

    INSERT INTO model (make, name, text) VALUES ("Toyota", "Yaris", "Yaris");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Corolla", "Corolla");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Hilux", "Hilux");
    INSERT INTO model (make, name, text) VALUES ("Toyota", "Prius", "Prius");


    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Lancer", "Lancer");
    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Challenger", "Challenger");
    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Triton", "Triton");
    INSERT INTO model (make, name, text) VALUES ("Mitsubishi", "Pajero", "Pajero");

END