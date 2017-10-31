# News Website
--------------------------------------------------------------------------------------------------
Setup Instruction:

1. Download mySQL (just server would be enough, you may follow any Youtube videos)

2. Set up XAMPP, and make adjustment to some file according to this video link (https://www.youtube.com/watch?v=xdvVKywGlc0&t=588s)

3. Start XAMPP (Apache and MySQL), open your web browser and go to "localhost:[Port Number you set]/phpmyadmin"

In SQL menu:

Execute "CREATE DATABASE registration;"  to create database.

Then go to registration database, and go to SQL menu, use following statement create tables:

CREATE TABLE users (
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE save(
	username VARCHAR(30),
	artIndex INT,
	imgIndex INT
);

CREATE TABLE `ny politics`(
	NewsID INT,
	Date VARCHAR(100),
	Caption VARCHAR(1000),
	NumSentence INT,
	Sentences text,
	ImageID text,
	Image text
);

CREATE TABLE data(
	username VARCHAR(30),
	PhotoID VARCHAR(100),
	Sentence text
);

4. In XAMPP, click Apache's config button, and click "php.ini", change "memory_limit","post_max_size","upload_max_filesize" value to 100MB.
   Find "xampp\phpMyAdmin\libraries\config.default.php" and change $cfg['ExecTimeLimit'] to 0
	
5. Select "ny politics" table, in "Import" menu, select "NY Politics.csv" and import it into database (Take a while)

6. Save all .php file .css file into "XAMPP/htdocs"

7. Open your web browser and go to "localhost:[Port Number you set]/login.php", and you may register or log in.


------------------------------------------------------------------------------------------------------------
Website Instruction:
1. Submit: save the labeling sentences into database

2. Go Backward/Forward: move to next picture without saving/modifying database

3. If a image has been labeled, the sentences will be checked automatically when you go back to that image, but you can overwrite it by selecting new sentences and clicking submit.

4. Go to Page: First blank is article id and Second blank is image id.



NOTES: Try not to directly access other .php file by typing url.


-------------------------------------------------------------------------------------------------------------
Database Table Description:
1. users: User information table

2. save: Article Index, Image Index for each user

3. ny politics: csv data is here

4. data: Labeling data is here 
