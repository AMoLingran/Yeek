CREATE TABLE `upwork_work`
(
    `id`          int(10)     NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'uid',
    `name`        varchar(30) NOT NULL COMMENT '作业名',
    `subject`     varchar(20) NOT NULL COMMENT '科目',
    `start`       date                 DEFAULT NULL COMMENT '开始日期',
    `end`         date                 DEFAULT NULL COMMENT '上交日期',
    `annex`       varchar(20)          DEFAULT NULL COMMENT '课件名',
    `remarks`     text COMMENT '备注',
    `need_upload` bit(1)      NOT NULL DEFAULT b'0'
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
    recycle    bit(1)      not null default false comment '1表示将要回收'
) COMMENT '文件表';

