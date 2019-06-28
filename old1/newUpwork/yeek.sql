CREATE TABLE `upwork_work`
(
    `id`          int(10)     NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'uid',
    `name`        varchar(30) NOT NULL COMMENT '作业名',
    `courseId`    varchar(20) NOT NULL COMMENT '科目',
    `start`       date        DEFAULT NULL COMMENT '开始日期',
    `end`         date        DEFAULT NULL COMMENT '上交日期',
    `annex`       varchar(20) DEFAULT NULL COMMENT '课件名',
    `remarks`     text COMMENT '备注',
    `need_upload` boolean     NOT NULL COMMENT '1表示要上传'
) COMMENT ='作业表';


CREATE TABLE `upwork_UploadLog`
(
    `id`       int(10)      NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'uid',
    `fileName` varchar(200) NOT NULL COMMENT '文件名',
    `date`     datetime     NOT NULL COMMENT '上传日期',
    `uploader` varchar(50) COMMENT '上传人',
    `workId`   varchar(50)  NOT NULL COMMENT '作业id'
) COMMENT ='upwork上传日志';



CREATE TABLE `upwork_student`
(
    `id`        int(10)     NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'uid',
    `studentId` varchar(8)  NOT NULL UNIQUE KEY COMMENT '学号',
    `name`      varchar(30) NOT NULL UNIQUE KEY COMMENT '姓名',
    `sex`       varchar(10) NOT NULL COMMENT '性别',
    `dorm`      int(10)     NOT NULL COMMENT '宿舍号'
) COMMENT ='学生表';

CREATE TABLE upwork_file
(
    id         int(10)     not null auto_increment primary key comment 'uid',
    workId     int(10)     not null comment '对应work的id',
    fileName   varchar(50) not null comment '文件名',
    fileDir    varchar(50) not null comment '文件路径',
    `fileSize` varchar(50) NOT NULL COMMENT '文件大小',
    recycle    boolean     not null default false comment '1表示将要回收'
) COMMENT '文件表';

create table upworkl_course
(
    id        int auto_increment,
    name      varchar(30) not null,
    teacher   varchar(30) not null,
    color     varchar(30) not null,
    call_name varchar(20) not null,
    constraint class_pk
        primary key (id)
);

create table yeek_user
(
    id       int auto_increment,
    username varchar(50) not null,
    password varchar(50) not null,
    email    varchar(50) not null,

    constraint user_pk
        primary key (id)
);


create unique index user_username_uindex
    on yeek_user (username);
create unique index user_email_uindex
    on yeek_user (email);


create unique index class_call_name_uindex
    on upworkl_course (call_name);

create unique index class_name_uindex
    on upworkl_course (name);

create unique index class_teacher_uindex
    on upworkl_course (teacher);
