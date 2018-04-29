USE musicdbproject;

CREATE Table Artist(
	Artist_name VARCHAR(30) PRIMARY KEY
);

CREATE Table Album(
	Album_name VARCHAR(30) NOT NULL,
	Genre VARCHAR(30),
	Artist_name VARCHAR(30) NOT NULL,
	PRIMARY KEY(Album_name, Artist_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name)
);

CREATE Table Song(
	Song_name VARCHAR(30) NOT NULL,
	Song_length INT NOT NULL,
	Album_name VARCHAR(30),
	Artist_name VARCHAR(30) NOT NULL,
	PRIMARY KEY(Song_name, Artist_name),
	FOREIGN KEY (Album_name) REFERENCES Album(Album_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name)
);

CREATE Table User_Account(
	User_name VARCHAR(30) NOT NULL PRIMARY KEY,
	Join_date DATE NOT NULL,
	Email VARCHAR(30) NOT NULL,
	First_name VARCHAR(30),
	Last_name VARCHAR(30)
);

CREATE Table Free_User(
	User_name VARCHAR(30) NOT NULL PRIMARY KEY,
	Free_time_left INT NOT NULL CHECK( Free_time_left>0),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name)
);

CREATE Table Paying_User(
	Subscription_start_date DATE NOT NULL,
	Payment_type VARCHAR(30) NOT NULL,
	Renewal_date DATE NOT NULL,
	User_name VARCHAR(30) NOT NULL PRIMARY KEY,
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name)
);

CREATE Table Playlist(
	Playlist_name VARCHAR(30) NOT NULL,
	Num_songs INT,
	Playlist_length INT,
	User_name VARCHAR(30) NOT NULL,
	PRIMARY KEY (Playlist_name, User_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name)
);

CREATE Table Personal_Playlist(
	Date_created DATE NOT NULL,
	Playlist_name VARCHAR(30) NOT NULL,
	User_name VARCHAR(30) NOT NULL,
	PRIMARY KEY (Playlist_name, User_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name),
	FOREIGN KEY (Playlist_name) REFERENCES Playlist(Playlist_name)
);

CREATE Table Other_User_Playlist(
	Original_owner VARCHAR(30) NOT NULL,
	Playlist_name VARCHAR(30) NOT NULL,
	User_name VARCHAR(30) NOT NULL,
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
	Song_name VARCHAR(30) NOT NULL,
	Artist_name VARCHAR(30) NOT NULL,
	Album_name VARCHAR(30) NOT NULL,
	PRIMARY KEY (Song_name, Artist_name, Album_name),
	FOREIGN KEY (Song_name) REFERENCES Song(Song_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name),
	FOREIGN KEY (Album_name) REFERENCES Album(Album_name)
);

CREATE Table Add_Song(
	User_name VARCHAR(30) NOT NULL,
	Playlist_name VARCHAR(30) NOT NULL,
	Song_name VARCHAR(30) NOT NULL,
	Artist_name VARCHAR(30) NOT NULL,
	Album_name VARCHAR(30) NOT NULL,
	PRIMARY KEY (User_name, Playlist_name, Song_name, Artist_name, Album_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name),
	FOREIGN KEY (Playlist_name) REFERENCES Playlist(Playlist_name),
	FOREIGN KEY (Song_name) REFERENCES Song(Song_name),
	FOREIGN KEY (Artist_name) REFERENCES Artist(Artist_name),
	FOREIGN KEY (Album_name) REFERENCES Album(Album_name)
);

CREATE Table Create_Playlist(
	User_name VARCHAR(30) NOT NULL,
	Playlist_name VARCHAR(30) NOT NULL,
	PRIMARY KEY (User_name, Playlist_name),
	FOREIGN KEY (User_name) REFERENCES User_Account(User_name),
	FOREIGN KEY (Playlist_name) REFERENCES Playlist(Playlist_name)
);
