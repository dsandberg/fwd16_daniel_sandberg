CREATE DEFINER=`root`@`localhost` PROCEDURE `count_has_diagnose`(IN diagnose_name varchar(45))
BEGIN
    SELECT 
       count(patient.pat_id) as patient_with_diagnose
    FROM
        patient
        join relation_patient_diagnose on patient.pat_id = relation_patient_diagnose.patient_id
        join diagnose on relation_patient_diagnose.diagnose_id = diagnose.dia_id
	WHERE diagnose.dia_name like diagnose_name;
        
END

-------------------------------------

CREATE DEFINER=`root`@`localhost` PROCEDURE `count_patient_with_diagnose`(IN diagnose_name varchar(45))
BEGIN
SELECT 
        COUNT(`sjukhus`.`patient`.`pat_id`) AS `patients`
    FROM
        ((`sjukhus`.`diagnose`
        JOIN `sjukhus`.`relation_patient_diagnose` ON ((`sjukhus`.`diagnose`.`dia_id` = `sjukhus`.`relation_patient_diagnose`.`diagnose_id`)))
        JOIN `sjukhus`.`patient` ON ((`sjukhus`.`patient`.`pat_id` = `sjukhus`.`relation_patient_diagnose`.`patient_id`)))
        WHERE diagnose.dia_name like diagnose_name;
END


-------------------------------------

CREATE DEFINER=`root`@`localhost` PROCEDURE `count_rows_patient`()
BEGIN
	SELECT * FROM count_patients;
END

-------------------------------------

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_has_patients`(in var_doctor_id int(11))
BEGIN
select patient.pat_id as patient, patient.pat_name, patient.pat_surname from doctor
inner join patient on doctor.dr_id = patient.doctor_fk
where doctor.dr_id = var_doctor_id;
END

-------------------------------------

CREATE DEFINER=`root`@`localhost` PROCEDURE `med_for_diagnose`( IN diagnose_name varchar(45))
BEGIN
	  SELECT 
		diagnose.dia_name AS diagnose,
        medicine.med_name AS medicine,
        sjukhus.medicine.med_dose AS dosage_mg
	FROM
		diagnose
	JOIN
		medicine on sjukhus.diagnose.dia_id = sjukhus.medicine.diagnose_fk
	WHERE
		diagnose.dia_name like diagnose_name;
		
END

-------------------------------------

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_has_nurse`(in var_patient_id int(11))
BEGIN
  SELECT 
        `sjukhus`.`patient`.`pat_id` AS `patient`,
        `sjukhus`.`nurse`.`nur_name` AS `nurse_name`,
        `sjukhus`.`nurse`.`nur_surname` AS `nurse_surname`
    FROM
        ((`sjukhus`.`patient`
        JOIN `sjukhus`.`relation_parent_nurse` ON ((`sjukhus`.`patient`.`pat_id` = `sjukhus`.`relation_parent_nurse`.`patient_id`)))
        JOIN `sjukhus`.`nurse` ON ((`sjukhus`.`relation_parent_nurse`.`nurse_id` = `sjukhus`.`nurse`.`nur_id`)))
    WHERE
        (`sjukhus`.`patient`.`pat_id` = var_patient_id);
END