use sjukhus;

-- Antal insjukna i olika sjukdomar.
select count(patient.pat_id) as patients, diagnose.dia_name from diagnose 
inner join relation_patient_diagnose on diagnose.dia_id = relation_patient_diagnose.diagnose_id 
inner join patient on pat_id = relation_patient_diagnose.patient_id 
group by diagnose.dia_name;
SELECT * FROM count_patient_diagnose;
CALL count_patient_with_diagnose('otitis');


-- Antal insjukna patienter.
select count(patient.pat_id) as patients from patient;
SELECT * FROM count_patients;
CALL count_rows_patient;

-- Visa olika mediciner och dosering för en viss sjukdom.
select diagnose.dia_name as diagnose, med_name as medicine, med_dose as dosage_mg from diagnose 
inner join medicine on diagnose.dia_id = medicine.diagnose_fk 
where diagnose.dia_name like "otitis";
SELECT * FROM med_for_otitis;
CALL med_for_diagnose('otitis');

-- Vilka sjuksköterskor som behandlar en viss patient.
select patient.pat_id as patient, nurse.nur_name as nurse_name, nurse.nur_surname as nurse_surname from patient 
inner join relation_parent_nurse on patient.pat_id = relation_parent_nurse.patient_id
inner join nurse on relation_parent_nurse.nurse_id = nurse.nur_id
where patient.pat_id = 1;
SELECT * FROM nurse_patient;
CALL patient_has_nurse(1);

-- Visa vilka patienter behandlas av en läkare.
select doctor.dr_id, doctor.dr_name, doctor.dr_surname, patient.pat_id as patient from doctor
inner join patient on doctor.dr_id = patient.doctor_fk;
SELECT * FROM doctor_patient;
CALL doctor_has_patients(1);

-- Dessutom ska ni ha store procedure för antal insjuknade i rabies (cancer).
CALL count_patient_with_diagnose('cancer');