SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `scrum_user`;
DROP TABLE IF EXISTS `scrum_plan`;
DROP TABLE IF EXISTS `scrum_plan_detail`;
DROP TABLE IF EXISTS `scrum_reply`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `scrum_user` (
    `user_id` VARCHAR(20) NOT NULL,
    `user_name` VARCHAR(50) NOT NULL,
    `user_birth` DATE NOT NULL,
    `user_email` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE (`user_id`)
);

CREATE TABLE `scrum_plan` (
    `plan_date` DATE NOT NULL,
    `user_id` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`plan_date`, `user_id`),
    UNIQUE (`plan_date`, `user_id`)
);

CREATE TABLE `scrum_plan_detail` (
    `plan_detail_seq` NUMERIC(2) NOT NULL,
    `plan_date` DATE NOT NULL,
    `user_id` VARCHAR(20) NOT NULL,
    `plan_content` VARCHAR(200) NOT NULL,
    `plan_status` VARCHAR(1) NOT NULL,
    `plan_comment` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`plan_detail_seq`, `plan_date`, `user_id`)
);

CREATE TABLE `scrum_reply` (
    `reply_id` INTEGER(5) NOT NULL,
    `user_id` VARCHAR(20) NOT NULL,
    `plan_date` DATE NOT NULL,
    `reply_comment` VARCHAR(200) NOT NULL,
    `reply_timestamp` TIMESTAMP NOT NULL,
    PRIMARY KEY (`reply_id`),
    UNIQUE (`reply_id`)
);
