CREATE TABLE ilink (
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    refcode INT(6) NOT NULL,
    linkname VARCHAR(255) NOT NULL,
    linkaddr VARCHAR(255) NOT NULL,
    linkdesc TEXT NOT NULL,
    passcode VARCHAR(100) NOT NULL
);

INSERT INTO ilink (refcode,linkname,linkaddr,linkdesc,passcode)
VALUES (1000,"Heiswayi Nrird","http://10.122.12.12","This is a sample of description for the link above. Make it pretty simple clear!","passcodedow");