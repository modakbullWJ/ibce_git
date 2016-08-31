<?php
/**
 * 시험문제 (Exam for Gnuboard4)
 *
 * Copyright (c) 2013 Choi Jae-Young <www.miwit.com>
 *
 * 저작권 안내
 * - 저작권자는 이 프로그램을 사용하므로서 발생하는 모든 문제에 대하여 책임을 지지 않습니다. 
 * - 이 프로그램을 어떠한 형태로든 재배포 및 공개하는 것을 허락하지 않습니다.
 * - 이 저작권 표시사항을 저작권자를 제외한 그 누구도 수정할 수 없습니다.
 */

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$default_charset = '';
if (preg_match("/^utf/i", $g4[charset]))
    $default_charset = "default charset=utf8;";

$sql = "create table if not exists {$mw_exam['info_table']} (
ex_id int not null auto_increment,
bo_table varchar(20) not null,
wr_id int not null,
mb_id varchar(20) not null,
ex_title varchar(255) not null comment '시험제목',
ex_level tinyint not null comment '시험참여 가능레벨',
ex_level_scale varchar(1) not null default '+' comment '시험참여 가능레벨단위',
ex_begin datetime not null comment '시험시작 시간',
ex_limit datetime not null comment '시험종료 시간',
ex_limit_number int not null comment '참여인원 제한',
ex_minimum int not null comment '합격점수',
ex_full_point int not null comment '만점시 지급 포인트',
ex_point int not null comment '합격시 지급 포인트',
ex_retake varchar(1) not null comment '불합격시 재시험여부',
ex_datetime datetime not null,
primary key(ex_id)) {$default_charset}";
sql_query($sql);

$sql = "create table if not exists {$mw_exam['question_table']} (
ex_id int not null comment '시험ID',
qn_num int not null comment '질문순서',
qn_question text not null comment '질문내용',
qn_right_answer varchar(255) not null comment '정답',
qn_score int not null comment '문항점수') {$default_charset}";
sql_query($sql);

$sql = "create table if not exists {$mw_exam['answer_table']} (
ex_id int not null,
mb_id varchar(20) not null,
as_answer text not null comment '시험자답변',
as_pass varchar(1) not null comment '합격여부',
as_datetime datetime not null,
as_ip varchar(20) not null,
as_agent varchar(255) not null) {$default_charset}";
sql_query($sql);

sql_query("alter table {$mw_exam['info_table']} add ex_level_scale varchar(1) not null default '+' comment '시험참여 가능레벨단위'", false);
