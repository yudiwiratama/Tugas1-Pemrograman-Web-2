CREATE TABLE IF NOT EXISTS mahasiswa (
    id int auto_increment primary key,
    nama varchar(255) not null,
    nim varchar(255) not null unique,
    jenis_kelamin enum('L', 'P') not null,
    kelas varchar(255) not null,
    program_studi varchar(255) not null,
    angkatan varchar(255) not null
);

INSERT INTO mahasiswa (nama, nim, jenis_kelamin, kelas, program_studi, angkatan) VALUES
('Arjuna Putra', '2244115533', 'L', 'X', 'Teknik Robotika Kuantum', 2023),
('Bianca Aurora', '3377224488', 'P', 'Y', 'Seni Digital & Realitas Virtual', 2022),
('Cakra Wibawa', '4455667799', 'L', 'Z', 'Agroteknologi Smart Farming', 2024),
('Dinda Marsha', '9988776655', 'P', 'X', 'Psikologi Digital', 2023),
('Elang Gumilang', '1122334466', 'L', 'Y', 'Teknik Energi Terbarukan', 2022),
('Faris Wijaya', '5544332211', 'L', 'A', 'Astrobiologi', 2021),
('Gita Savitri', '6677889900', 'P', 'B', 'Kriminologi Siber', 2024),
('Hadi Pranoto', '0099887766', 'L', 'C', 'Teknik Urban Air Mobility', 2023),
('Indira Kirana', '7788990011', 'P', 'D', 'Ekonomi Kreatif Digital', 2022),
('Joko Anwar', '2233445566', 'L', 'E', 'Antariksa & Teknologi Satelit', 2024);