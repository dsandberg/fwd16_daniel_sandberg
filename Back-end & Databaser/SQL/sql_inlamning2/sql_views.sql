CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `sjukhus`.`count_patient_diagnose` AS
    SELECT 
        COUNT(`sjukhus`.`patient`.`pat_id`) AS `patients`,
        `sjukhus`.`diagnose`.`dia_name` AS `dia_name`
    FROM
        ((`sjukhus`.`diagnose`
        JOIN `sjukhus`.`relation_patient_diagnose` ON ((`sjukhus`.`diagnose`.`dia_id` = `sjukhus`.`relation_patient_diagnose`.`diagnose_id`)))
        JOIN `sjukhus`.`patient` ON ((`sjukhus`.`patient`.`pat_id` = `sjukhus`.`relation_patient_diagnose`.`patient_id`)))
    GROUP BY `sjukhus`.`diagnose`.`dia_name`

------------------------------------------

    CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `sjukhus`.`count_patients` AS
    SELECT 
        COUNT(`sjukhus`.`patient`.`pat_id`) AS `patients`
    FROM
        `sjukhus`.`patient`

------------------------------------------

CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `sjukhus`.`doctor_patient` AS
    SELECT 
        `sjukhus`.`doctor`.`dr_id` AS `dr_id`,
        `sjukhus`.`doctor`.`dr_name` AS `dr_name`,
        `sjukhus`.`doctor`.`dr_surname` AS `dr_surname`,
        `sjukhus`.`patient`.`pat_id` AS `patient`
    FROM
        (`sjukhus`.`doctor`
        JOIN `sjukhus`.`patient` ON ((`sjukhus`.`doctor`.`dr_id` = `sjukhus`.`patient`.`doctor_fk`)))

------------------------------------------

CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `sjukhus`.`med_for_otitis` AS
    SELECT 
        `sjukhus`.`diagnose`.`dia_name` AS `diagnose`,
        `sjukhus`.`medicine`.`med_name` AS `medicine`,
        `sjukhus`.`medicine`.`med_dose` AS `dosage_mg`
    FROM
        (`sjukhus`.`diagnose`
        JOIN `sjukhus`.`medicine` ON ((`sjukhus`.`diagnose`.`dia_id` = `sjukhus`.`medicine`.`diagnose_fk`)))
    WHERE
        (`sjukhus`.`diagnose`.`dia_name` LIKE 'otitis')

------------------------------------------

CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `sjukhus`.`nurse_patient` AS
    SELECT 
        `sjukhus`.`patient`.`pat_id` AS `patient`,
        `sjukhus`.`nurse`.`nur_name` AS `nurse_name`,
        `sjukhus`.`nurse`.`nur_surname` AS `nurse_surname`
    FROM
        ((`sjukhus`.`patient`
        JOIN `sjukhus`.`relation_parent_nurse` ON ((`sjukhus`.`patient`.`pat_id` = `sjukhus`.`relation_parent_nurse`.`patient_id`)))
        JOIN `sjukhus`.`nurse` ON ((`sjukhus`.`relation_parent_nurse`.`nurse_id` = `sjukhus`.`nurse`.`nur_id`)))
    WHERE
        (`sjukhus`.`patient`.`pat_id` = 1)