INSERT INTO role (Role_ID, Role_Name) VALUES
                 (NULL, 'Administrateur'),
                 (NULL, 'Gestionaire'),
                 (NULL, 'Editeur'),
                 (NULL, 'Photographe');

INSERT INTO user (User_ID, User_Name, User_Firstname, User_login, User_Password, User_Mail, User_Bank, User_Activity) VALUES
                 (NULL, 'Audric', 'Rosier', 'Audric_San', 'coucou', 'test@gmail.com', 'BE00 0000 0000 0000', 1),
                 (NULL, 'Xavier', 'Deleclos', 'Kikou', 'coucou', 'test@gmail.com', 'BE00 0000 0000 0000', 1),
                 (NULL, 'Ronald', 'Racquez', 'Raquette', 'coucou', 'test@gmail.com', 'BE00 0000 0000 0000', 1),
                 (NULL, 'Benjamin', 'Delbar', 'Laravel', 'coucou', 'test@gmail.com', 'BE00 0000 0000 0000', 1);

INSERT INTO activity (Activity_ID, Activity_Name, Activity_Description, Activity_Statut, Activity_Content, Activity_Type, Activity_Date) VALUES
                     (NULL, 'Stage Decouverte', 'lorem Impum', 1, 'Un stage de decouvertte du GN avec plein de gens', 1, '2022-02-01');

ALTER TABLE `user` ADD `User_Age` INTEGER NULL DEFAULT NULL;
ALTER TABLE user ADD `User_Birthday` DATE NULL DEFAULT NULL;
ALTER TABLE user ADD `User_Point` INTEGER NULL DEFAULT NULL;
ALTER TABLE picture ADD `Picture_Link` VARCHAR(50) NULL DEFAULT NULL;