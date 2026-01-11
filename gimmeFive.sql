/*First attempt for the Gimme5 database*/

/*Creation of the table*/
/*Movie table*/

CREATE TABLE movies(
	mov_id 				INT(10)unsigned	NOT NULL AUTO_INCREMENT COMMENT"Movie Id",
    mov_title			VARCHAR(100)	NULL					COMMENT"Title of the movie",
    mov_original_title	VARCHAR(100)	NOT NULL				COMMENT"Original title of the movie",
    mov_length			TIME			NOT NULL				COMMENT"Movie length",
    mov_description		TEXT			NOT NULL				COMMENT"Description",
    mov_release_date	DATE			NOT NULL				COMMENT"Release date",
	PRIMARY KEY (mov_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*Categories table*/

CREATE TABLE categories(
	cat_id		INT(10)unsigned		NOT NULL	AUTO_INCREMENT	COMMENT"Categories ID",
    cat_name	VARCHAR(50)			NOT NULL					COMMENT"Categories name",
    PRIMARY KEY (cat_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Nationalities table*/

CREATE TABLE nationalities(
	nat_id		INT(10)unsigned		NOT NULL	AUTO_INCREMENT	COMMENT"Nationalities ID",
    nat_country	VARCHAR(50)			NOT NULL					COMMENT"Country name",
    PRIMARY KEY (nat_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Function table*/

CREATE TABLE functions(
	funct_id		INT(10)unsigned										NOT NULL	AUTO_INCREMENT	COMMENT"Function ID",
    funct_name		ENUM('Administrator','Moderator','User')			NOT NULL					COMMENT"Function name",
    PRIMARY KEY (funct_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Users Table*/

CREATE TABLE users(
	user_id			INT(10)unsigned		NOT NULL	AUTO_INCREMENT	COMMENT"User ID",
    user_name		VARCHAR(50)			NOT NULL					COMMENT"User name",
    user_firstname	VARCHAR(50)			NOT NULL					COMMENT"User first name",
    user_pseudo		VARCHAR(50)			NOT NULL					COMMENT"User pseudo",
    user_email		VARCHAR(255)		NOT NULL					COMMENT"User email",
    user_birthdate	DATE				NOT NULL					COMMENT"User Birthdate",
    user_creadate	DATETIME			NOT NULL					COMMENT"User accounts creation date",
    PRIMARY KEY (user_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Comments table*/

CREATE TABLE comments(
	com_id			INT(10)unsigned						NOT NULL	AUTO_INCREMENT	COMMENT"Comment ID",
    com_comment		TEXT								NOT NULL					COMMENT"Comment content",
    com_score		ENUM('1','2','3','4','5')			NOT NULL					COMMENT"Score out of 5",
    com_datetime	DATETIME							NOT NULL					COMMENT"Comment date time",
    com_photo		VARCHAR(255)						NOT NULL					COMMENT"Comment photo",
    PRIMARY KEY (com_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Jobs table*/

CREATE TABLE jobs(
	job_id		INT(10)unsigned									NOT NULL	AUTO_INCREMENT	COMMENT"Jobs ID",
    job_name	ENUM('Productor','Realisator','ACTOR')			NOT NULL					COMMENT"Categories name",
    PRIMARY KEY (job_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Persons table*/

CREATE TABLE persons(
	pers_id			INT(10)unsigned			NOT NULL	AUTO_INCREMENT	COMMENT"Person ID",
    pers_name		VARCHAR(50)				NOT NULL					COMMENT"Person name",
    pers_firstname	VARCHAR(50)				NOT NULL					COMMENT"Person firstname",
    pers_birthdate	DATE					NOT NULL					COMMENT"Person birth date",
    pers_deathdate	DATE					NULL						COMMENT"person death date",
    PRIMARY KEY (pers_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Moderations table*/

CREATE TABLE moderations(
	mod_id			INT(10)unsigned				NOT NULL	AUTO_INCREMENT	COMMENT"Moderation ID",
    mod_answer		BOOLEAN						NOT NULL					COMMENT"Moderation answer",
    mod_msg_refusal	TEXT						NOT NULL					COMMENT"Argument for refusal",
    mod_datetime	DATETIME					NOT NULL					COMMENT"Person birth date",
    PRIMARY KEY (mod_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Photos table*/

CREATE TABLE photo(
	pho_id			INT(10)unsigned				NOT NULL	AUTO_INCREMENT	COMMENT"Photo ID",
    pho_url			VARCHAR(255)				NOT NULL					COMMENT"Photo URL",
    pho_type		VARCHAR(150)				NOT NULL					COMMENT"Type of file",
    PRIMARY KEY (pho_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

/*Participate table*/
/*Participate is an association table*/


CREATE TABLE participate(
	part_pers_id			INT(10)unsigned		NOT NULL,   /*Foreigner key towards Persons*/
    part_job_id				INT(10)unsigned		NOT NULL,   /*Foreigner key towards Jobs*/
    part_mov_id			    INT(10)unsigned		NOT NULL,   /*Foreigner key towards Movies*/
    part_character_name		VARCHAR(50)			NOT NULL		COMMENT"Character name",

/*Implementation of foreigner keys form 'participate' to the target table*/
/*Foreigner key towards Persons*/
    
CONSTRAINT	fk_part_pers_id
	FOREIGN KEY (part_pers_id)
    REFERENCES persons(pers_id)
    ON DELETE CASCADE,
    
/*Foreigner key towards Jobs*/

CONSTRAINT	fk_part_job_id
	FOREIGN KEY (part_job_id)
    REFERENCES jobs(job_id)
    ON DELETE CASCADE,

/*Foreigner key towards Movies*/
    
CONSTRAINT	fk_part_mov_id
	FOREIGN KEY (part_mov_id)
    REFERENCES movies(mov_id)
    ON DELETE CASCADE,

/*Creation of the composite key*/
    
PRIMARY KEY(part_pers_id, part_job_id, part_mov_id)
);

/*Follow table*/
/*Follow is an association table*/

CREATE TABLE follow(
	follo_user_id			INT(10)unsigned		NOT NULL,   /*Foreigner key towards Users*/
    follo_mov_id			INT(10)unsigned		NOT NULL,   /*Foreigner key towards Movies*/

/*Implementation of foreigner keys form 'follow' to the target table*/
/*Foreigner key towards Users*/
    
CONSTRAINT	fk_follo_user_id
	FOREIGN KEY (follo_user_id)
    REFERENCES users(user_id)
    ON DELETE CASCADE,
    
/*Foreigner key towards Movies*/

CONSTRAINT	fk_follo_mov_id
	FOREIGN KEY (follo_mov_id)
    REFERENCES movies(mov_id)
    ON DELETE CASCADE,

/*Creation of the composite key*/
    
PRIMARY KEY(follo_user_id ,follo_mov_id)
);

/*Liked table*/
/*Liked is an association table*/

CREATE TABLE liked(
	lik_user_id			INT(10)unsigned		NOT NULL,   /*Foreigner key towards Users*/
    lik_com_id			INT(10)unsigned		NOT NULL,   /*Foreigner key towards Comments*/
    
/*Foreigner key towards Users*/

CONSTRAINT	fk_lik_user_id
	FOREIGN KEY (lik_user_id)
    REFERENCES users(user_id)
    ON DELETE CASCADE,

/*Foreigner key towards Comments*/
    
CONSTRAINT	fk_lik_com_id
	FOREIGN KEY (lik_com_id)
    REFERENCES comments(com_id)
    ON DELETE CASCADE,

/*Creation of the composite key*/
    
PRIMARY KEY(lik_user_id ,lik_com_id)
);

/*Belong table*/
/*Belong is an association table*/

CREATE TABLE belong(
	belong_cat_id			INT(10)unsigned		NOT NULL,   /*Foreigner key towards Categories*/
    belong_mov_id			INT(10)unsigned		NOT NULL,   /*Foreigner key towards Movies*/
    
/*Foreigner key towards Categories*/

CONSTRAINT	fk_belong_cat_id 
	FOREIGN KEY (belong_cat_id)
    REFERENCES categories(cat_id)
    ON DELETE CASCADE,

/*Foreigner key towards Movies*/
    
CONSTRAINT	fk_belong_mov_id
	FOREIGN KEY (belong_mov_id)
    REFERENCES movies(mov_id)
    ON DELETE CASCADE,

/*Creation of the composite key*/
    
PRIMARY KEY(belong_cat_id ,belong_mov_id)
);

/*Modification of Movies table to implement Foreigner key towards Moderations*/

ALTER TABLE movies 
ADD mov_mod_id INT unsigned;
ALTER TABLE movies
ADD CONSTRAINT mov_mod_id
FOREIGN KEY (mov_mod_id)
REFERENCES moderation (mod_id);

/*Modification of Photos table to implement Foreigner key towards Movies*/

ALTER TABLE photo
ADD pho_mov_id INT unsigned;
ALTER TABLE photo
ADD CONSTRAINT fk_pho_mov_id 
FOREIGN KEY (pho_mov_id) 
REFERENCES movies(mov_id) 
ON DELETE CASCADE;

/*Modification of Users table to implement Foreigner key towards Comments, Nationalities & Functions*/

ALTER TABLE users 
ADD user_com_id		INT unsigned,
ADD user_nat_id 	INT unsigned,
ADD user_funct_id	INT unsigned;

/*Creation of the link between the table with the foreigner key*/
/*Users towards Comments*/

ALTER TABLE users
ADD CONSTRAINT fk_user_com_id 
FOREIGN KEY (user_com_id) 
REFERENCES comments(com_id) 
ON DELETE CASCADE;

/*Users towards nationalities*/

ALTER TABLE users
ADD CONSTRAINT fk_user_nat_id 
FOREIGN KEY (user_nat_id) 
REFERENCES nationalities(nat_id) 
ON DELETE CASCADE;

/*Users towards Functions*/

ALTER TABLE users
ADD CONSTRAINT fk_user_funct_id 
FOREIGN KEY (user_funct_id) 
REFERENCES functions(funct_id) 
ON DELETE CASCADE;

/*Modification of Comments table to implement Foreigner key towards Users, Movies & Moderations*/

ALTER TABLE comments
ADD com_user_id 	INT unsigned,
ADD com_movie_id 	INT unsigned,
ADD com_mod_id 		INT unsigned;

/*Creation of the link between the table with the foreigner key*/
/*Comments towards Users*/

ALTER TABLE comments
ADD CONSTRAINT fk_com_user_id 
FOREIGN KEY (com_user_id) 
REFERENCES users(user_id)
ON DELETE CASCADE;

/*Comments towards Movies*/

ALTER TABLE comments
ADD CONSTRAINT fk_com_movie_id 
FOREIGN KEY (com_movie_id) 
REFERENCES movies(mov_id)
ON DELETE CASCADE;

/*Comments towards Moderations*/

ALTER TABLE comments
ADD CONSTRAINT fk_com_mod_id
FOREIGN KEY (com_mod_id) 
REFERENCES moderation(mod_id)
ON DELETE CASCADE;

/*Modification of Moderations table to implement Foreigner key towards Users*/

ALTER TABLE moderation
ADD mod_user_id 	INT unsigned;

/*Creation of the link between the table with the foreigner key*/
/*Moderations towards Users*/

ALTER TABLE moderation
ADD CONSTRAINT fk_mod_user_id
FOREIGN KEY (mod_user_id) 
REFERENCES users(user_id)
ON DELETE CASCADE;

/*Modification of Persons table to implement Foreigner key towards Users*/

ALTER TABLE persons
ADD pers_nat_id 	INT unsigned;

ALTER TABLE persons
ADD CONSTRAINT fk_pers_nat_id
FOREIGN KEY (pers_nat_id) 
REFERENCES nationalities(nat_id)
ON DELETE CASCADE;

/*Creation of the link between the table with the foreigner key*/
/*Persons towards Nationalities*/