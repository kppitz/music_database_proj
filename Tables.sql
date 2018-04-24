USE musicdbproject;

DROP TABLE IF EXISTS Create_Playlist;
DROP TABLE IF EXISTS Add_Song;
DROP TABLE IF EXISTS Include;
DROP TABLE IF EXISTS Produce;
DROP TABLE IF EXISTS Other_User_Playlist;
DROP TABLE IF EXISTS Personal_Playlist;
DROP TABLE IF EXISTS Playlist;
DROP TABLE IF EXISTS Paying_User;
DROP TABLE IF EXISTS Free_User;
DROP TABLE IF EXISTS Song;
DROP TABLE IF EXISTS Album;
DROP TABLE IF EXISTS Artist;
DROP TABLE IF EXISTS User_Account;

CREATE Table Artist(
	Artist_name VARCHAR(30) PRIMARY KEY
);

CREATE Table Album(
	Album_name VARCHAR(30),
	Genre VARCHAR(30),
	Artist_name VARCHAR(30),
	PRIMARY KEY(Album_name, Artist_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name)
);

CREATE Table Song(
	Song_name VARCHAR(30),
	Song_length INT,
	Album_name VARCHAR(30),
	Artist_name VARCHAR(30),
	PRIMARY KEY(Song_name, Artist_name),
	FOREIGN KEY (Album_name) REFERENCES Album(Album_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name)
);

CREATE Table User_Account(
	User_name VARCHAR(30) PRIMARY KEY,
	Join_date DATE,
	Email VARCHAR(30),
	First_name VARCHAR(30),
	Last_name VARCHAR(30)
);

CREATE Table Free_User(
	User_name VARCHAR(30) PRIMARY KEY,
	Free_time_left INT,
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name)
);

CREATE Table Paying_User(
	Subscription_start_date DATE,
	Payment_type VARCHAR(30),
	Renewal_date DATE,
	User_name VARCHAR(30) PRIMARY KEY,
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name)
);
CREATE Table Playlist(
	Playlist_name VARCHAR(30),
	Num_songs INT,
	Playlist_length INT,
	User_name VARCHAR(30),
	PRIMARY KEY (Playlist_name, User_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name)
);

CREATE Table Personal_Playlist(
	Date_created DATE,
	Playlist_name VARCHAR(30),
	User_name VARCHAR(30),
	PRIMARY KEY (Playlist_name, User_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name),
	FOREIGN KEY (Playlist_name) REFERENCES Playlist(Playlist_name)
);

CREATE Table Other_User_Playlist(
	Original_owner VARCHAR(30),
	Playlist_name VARCHAR(30),
	User_name VARCHAR(30),
	PRIMARY KEY (Original_owner, Playlist_name, User_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name),
	FOREIGN KEY (Playlist_name) REFERENCES Playlist(Playlist_name)
);

CREATE Table Produce(
	Artist_name VARCHAR(30),
	Album_name VARCHAR(30),
	PRIMARY KEY (Artist_name, Album_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name),
	FOREIGN KEY (Album_name) REFERENCES Album(Album_name)
);

CREATE Table Include(
	Song_name VARCHAR(30),
	Artist_name VARCHAR(30),
	Album_name VARCHAR(30),
	PRIMARY KEY (Song_name, Artist_name, Album_name),
	FOREIGN KEY (Song_name) REFERENCES Song(Song_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name),
	FOREIGN KEY (Album_name) REFERENCES Album(Album_name)
);

CREATE Table Add_Song(
	User_name VARCHAR(30),
	Playlist_name VARCHAR(30),
	Song_name VARCHAR(30),
	Artist_name VARCHAR(30),
	Album_name VARCHAR(30),
	PRIMARY KEY (User_name, Playlist_name, Song_name, Artist_name, Album_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name),
	FOREIGN KEY (Playlist_name) REFERENCES Playlist(Playlist_name),
	FOREIGN KEY (Song_name) REFERENCES Song(Song_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name),
	FOREIGN KEY (Album_name) REFERENCES Album(Album_name)
);

CREATE Table Create_Playlist(
	User_name VARCHAR(30),
	Playlist_name VARCHAR(30),
	PRIMARY KEY (User_name, Playlist_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name),
	FOREIGN KEY (Playlist_name) REFERENCES Playlist(Playlist_name)
);
	
DROP TABLE Create_Playlist;
DROP TABLE Add_Song;
DROP TABLE Include;
DROP TABLE Produce;
DROP TABLE Other_User_Playlist;
DROP TABLE Personal_Playlist;
DROP TABLE Playlist;
DROP TABLE Paying_User;
DROP TABLE Free_User;
DROP TABLE Song;
DROP TABLE Album;
DROP TABLE Artist;
DROP TABLE User_Account;