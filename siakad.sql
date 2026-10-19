create database siakad_db;

use siakad_db;

create table
    krs (
        id int auto_increment primary key,
        nim varchar(20) not null,
        nama varchar(100) not null,
        tahun_akademik varchar(20) not null,
        kelas varchar(10) not null,
        semester varchar(10) not null,
        sks int not null,
        status_krs varchar(20) not null
    );