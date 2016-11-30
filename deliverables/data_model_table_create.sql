CREATE TABLE scrum_user (
    user_id varchar(20) NOT NULL,
    user_name varchar(50) NOT NULL,
    user_birth date NOT NULL,
    user_email varchar(100) NOT NULL,
    PRIMARY KEY (user_id)
);


CREATE TABLE scrum_plan (
    plan_date date NOT NULL,
    user_id varchar(20) NOT NULL,
    PRIMARY KEY (plan_date, user_id)
);


CREATE TABLE scrum_plan_detail (
    plan_detail_seq numeric(2) NOT NULL,
    plan_date date NOT NULL,
    user_id varchar(20) NOT NULL,
    plan_content varchar(200) NOT NULL,
    plan_status varchar(1) NOT NULL,
    plan_comment varchar(200) NOT NULL,
    PRIMARY KEY (plan_detail_seq, plan_date, user_id)
);


CREATE TABLE scrum_reply (
    reply_id integer NOT NULL,
    user_id varchar(20) NOT NULL,
    plan_date date NOT NULL,
    reply_comment varchar(200) NOT NULL,
    reply_timestamp timestamp without time zone NOT NULL,
    PRIMARY KEY (reply_id)
);

CREATE INDEX ON scrum_reply
    (user_id);
CREATE INDEX ON scrum_reply
    (plan_date);
