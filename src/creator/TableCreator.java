/**
 * @author Burak Mandira
 * @date Dec 20, 2016
 *
 */
package creator;

import java.sql.Connection;
import java.sql.DatabaseMetaData;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class TableCreator
{
	/**
	 * TODO
	 */
	public TableCreator()
	{
		// TODO Auto-generated constructor stub
	}

	/**
	 * @param args
	 */
	public static void main(String[] args)
	{
		String url = "jdbc:mysql://localhost/cs353_database?useSSL=false";
		String username = "root";
		String password = "root";

		System.out.println("Connecting to the database...");

		try (Connection conn = DriverManager.getConnection(url, username, password)) 
		{
		    System.out.println("Connected!");
		    
		    Statement stmt = conn.createStatement();

		    /*
		     * Check if tables exist. 
		     * If yes, then delete them (pay attention to the order of deletion due to the FKs)
		     */
		    System.out.println( "\nDeleting previous tables (if any)...");
		    DatabaseMetaData metadata = conn.getMetaData();
		    String sql = null;

		    ResultSet resultSet = metadata.getTables( "cs353_database", null, "Credentials", null);
		    // if it exists
		    if( resultSet.next())
		    {
		    	System.out.println( "`Credentials`");
		    	sql = "DROP TABLE `Credentials`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Host", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Host`");
		    	sql = "DROP TABLE `Host`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Guest", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Guest`");
		    	sql = "DROP TABLE `Guest`;";
		    	stmt.executeUpdate(sql);
		    }

		    resultSet = metadata.getTables( "cs353_database", null, "Makes", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Makes`");
		    	sql = "DROP TABLE `Makes`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Reservation", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Reservation`");
		    	sql = "DROP TABLE `Reservation`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Offering", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Offering`");
		    	sql = "DROP TABLE `Offering`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Account", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Account`");
		    	sql = "DROP TABLE `Account`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Accommodation", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Accommodation`");
		    	sql = "DROP TABLE `Accommodation`;";
		    	stmt.executeUpdate(sql);
		    }

		    /*
		     * Create the tables
		     */
		    System.out.println( "\nCreating new tables...");
		    // Create `Account` table
		    sql = "CREATE TABLE `Account`(" +
		    		"account_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"name VARCHAR(32)," +
		    		"surname VARCHAR(32)," +
		    		"email VARCHAR(32) NOT NULL," +
		    		"phone_number CHAR(15)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Account` is created.");
		    
		    // Create `Credentials` table
		    sql = "CREATE TABLE `Credentials`(" +
		    		"c_ID INT AUTO_INCREMENT," +
		    		"account_ID INT," +
		    		"username VARCHAR(32) NOT NULL," +
		    		"password VARCHAR(32) NOT NULL," +
		    		"PRIMARY KEY (c_ID, account_ID)," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Credentials` is created.");
		    
		    // Create `Host` table
		    sql = "CREATE TABLE `Host`(" +
		    		"account_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"avg_host_rank NUMERIC(3,2)," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Host` is created."); 
		    
		    // Create `Guest` table
		    sql = "CREATE TABLE `Guest`(" +
		    		"account_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"avg_guest_rank NUMERIC(3,2)," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Guest` is created.");
		    
		    // Create `Offering` table
		    sql = "CREATE TABLE `Offering`(" +
		    		"offering_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"account_ID INT NOT NULL," +
		    		"start_date DATE," +
		    		"end_date DATE," +
		    		"total_num_of_people INT," +
		    		"price_per_night INT," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Offering` is created.");

		    // Create `Reservation` table
		    sql = "CREATE TABLE `Reservation`(" +
		    		"reservation_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"reserve_start DATE," +
		    		"reserve_end DATE" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Reservation` is created.");

		    // Create `Makes` table
		    sql = "CREATE TABLE `Makes`(" +
		    		"reservation_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"account_ID INT NOT NULL," +
		    		"offering_ID INT NOT NULL," +
		    		"FOREIGN KEY (reservation_ID) REFERENCES Reservation(reservation_ID)," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)," +
		    		"FOREIGN KEY (offering_ID) REFERENCES Offering(offering_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Makes` is created.");

		    /* 
		     * !!! `Decides`: TO BE IMPLEMENTED !!!
		     */
		    
//		    // Create `Decides` table
//		    resultSet = metadata.getTables( "cs353_database", null, "Decides", null);
//		    if( resultSet.next())
//		    {
//		    	System.out.println( "`Decides`");
//		    	sql = "DROP TABLE `Decides`;";
//		    	stmt.executeUpdate(sql);
//		    }
//		    
//		    sql = "CREATE TABLE `Decides`(" +
//		    		"gid INT," +
//		    		"sid INT," +
//		    		"date DATE," +
//		    		"PRIMARY KEY(gid, sid, date)," +
//		    		"FOREIGN KEY (gid) REFERENCES guest(gid)," +
//		    		"FOREIGN KEY (sid) REFERENCES `show`(sid)" +
//		    		") ENGINE = InnoDB;";
//		    stmt.executeUpdate(sql);
//		    System.out.println( "Table `Decides` is created.");
//
		    // Create `Accommodation` table
		    sql = "CREATE TABLE `Accommodation`(" +
		    		"accommodation_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"num_of_people INT," +
		    		"type BIT(1)," +
		    		"street VARCHAR(50)," +
		    		"district VARCHAR(30)," +
		    		"city VARCHAR(30)," +
		    		"country VARCHAR(30)," +
		    		"percentageRecommend DECIMAL(4,2)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Accommodation` is created.");

//		    // Create `guest_show` table
//		    resultSet = metadata.getTables( "cs353_database", null, "guest_show", null);
//		    if( resultSet.next())
//		    {
//		    	System.out.println( "`guest_show`");
//		    	sql = "DROP TABLE `guest_show`;";
//		    	stmt.executeUpdate(sql);
//		    }
//		    
//		    sql = "CREATE TABLE `guest_show`(" +
//		    		"gid INT," +
//		    		"sid INT," +
//		    		"date DATE," +
//		    		"PRIMARY KEY(gid, sid, date)," +
//		    		"FOREIGN KEY (gid) REFERENCES guest(gid)," +
//		    		"FOREIGN KEY (sid) REFERENCES `show`(sid)" +
//		    		") ENGINE = InnoDB;";
//		    stmt.executeUpdate(sql);
//		    System.out.println( "Table `guest_show` is created.");
//
//		    // Create `guest_show` table
//		    resultSet = metadata.getTables( "cs353_database", null, "guest_show", null);
//		    if( resultSet.next())
//		    {
//		    	System.out.println( "`guest_show`");
//		    	sql = "DROP TABLE `guest_show`;";
//		    	stmt.executeUpdate(sql);
//		    }
//		    
//		    sql = "CREATE TABLE `guest_show`(" +
//		    		"gid INT," +
//		    		"sid INT," +
//		    		"date DATE," +
//		    		"PRIMARY KEY(gid, sid, date)," +
//		    		"FOREIGN KEY (gid) REFERENCES guest(gid)," +
//		    		"FOREIGN KEY (sid) REFERENCES `show`(sid)" +
//		    		") ENGINE = InnoDB;";
//		    stmt.executeUpdate(sql);
//		    System.out.println( "Table `guest_show` is created.");
//
//		    // Create `guest_show` table
//		    resultSet = metadata.getTables( "cs353_database", null, "guest_show", null);
//		    if( resultSet.next())
//		    {
//		    	System.out.println( "`guest_show`");
//		    	sql = "DROP TABLE `guest_show`;";
//		    	stmt.executeUpdate(sql);
//		    }
//		    
//		    sql = "CREATE TABLE `guest_show`(" +
//		    		"gid INT," +
//		    		"sid INT," +
//		    		"date DATE," +
//		    		"PRIMARY KEY(gid, sid, date)," +
//		    		"FOREIGN KEY (gid) REFERENCES guest(gid)," +
//		    		"FOREIGN KEY (sid) REFERENCES `show`(sid)" +
//		    		") ENGINE = InnoDB;";
//		    stmt.executeUpdate(sql);
//		    System.out.println( "Table `guest_show` is created.");
//
//		    // Create `guest_show` table
//		    resultSet = metadata.getTables( "cs353_database", null, "guest_show", null);
//		    if( resultSet.next())
//		    {
//		    	System.out.println( "`guest_show`");
//		    	sql = "DROP TABLE `guest_show`;";
//		    	stmt.executeUpdate(sql);
//		    }
//		    
//		    sql = "CREATE TABLE `guest_show`(" +
//		    		"gid INT," +
//		    		"sid INT," +
//		    		"date DATE," +
//		    		"PRIMARY KEY(gid, sid, date)," +
//		    		"FOREIGN KEY (gid) REFERENCES guest(gid)," +
//		    		"FOREIGN KEY (sid) REFERENCES `show`(sid)" +
//		    		") ENGINE = InnoDB;";
//		    stmt.executeUpdate(sql);
//		    System.out.println( "Table `guest_show` is created.");
//
//		    // Create `guest_show` table
//		    resultSet = metadata.getTables( "cs353_database", null, "guest_show", null);
//		    if( resultSet.next())
//		    {
//		    	System.out.println( "`guest_show`");
//		    	sql = "DROP TABLE `guest_show`;";
//		    	stmt.executeUpdate(sql);
//		    }
//		    
//		    sql = "CREATE TABLE `guest_show`(" +
//		    		"gid INT," +
//		    		"sid INT," +
//		    		"date DATE," +
//		    		"PRIMARY KEY(gid, sid, date)," +
//		    		"FOREIGN KEY (gid) REFERENCES guest(gid)," +
//		    		"FOREIGN KEY (sid) REFERENCES `show`(sid)" +
//		    		") ENGINE = InnoDB;";
//		    stmt.executeUpdate(sql);
//		    System.out.println( "Table `guest_show` is created.");
//
//		    // Create `guest_show` table
//		    resultSet = metadata.getTables( "cs353_database", null, "guest_show", null);
//		    if( resultSet.next())
//		    {
//		    	System.out.println( "`guest_show`");
//		    	sql = "DROP TABLE `guest_show`;";
//		    	stmt.executeUpdate(sql);
//		    }
//		    
//		    sql = "CREATE TABLE `guest_show`(" +
//		    		"gid INT," +
//		    		"sid INT," +
//		    		"date DATE," +
//		    		"PRIMARY KEY(gid, sid, date)," +
//		    		"FOREIGN KEY (gid) REFERENCES guest(gid)," +
//		    		"FOREIGN KEY (sid) REFERENCES `show`(sid)" +
//		    		") ENGINE = InnoDB;";
//		    stmt.executeUpdate(sql);
//		    System.out.println( "Table `guest_show` is created.");
//
//		    System.out.println( "All tables are created succesfully!");
//		    
//		    /* 
//			 * Insert records into the tables
//			 */
//			System.out.println( "\nInserting values into the tables...");
//			
//			// To `host`
//			sql = "INSERT INTO host VALUES (1,'Fatih Altayli', 'altayli', '1111', 'Mr.', 'journalist');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO host VALUES (2,'Cuneyt Ozdemir', 'ozdemir', '2222', 'Mr.', 'journalist');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO host VALUES (3,'Neil deGrasse Tyson', 'tyson', '3333', 'Dr.', 'astrophysicist');";
//			stmt.executeUpdate(sql);
//
//			// To `channel`
//			sql = "INSERT INTO channel VALUES (1, 'National Geographic');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO channel VALUES (2, 'CNN TURK');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO channel VALUES (3, 'Haberturk');";
//			stmt.executeUpdate(sql);
//			
//			// To `show`
//			sql = "INSERT INTO `show` VALUES (1, 'Teke tek', '23:00:00', 'Tuesday', 1, 3);";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO `show` VALUES (2, '5N1K', '22:00:00', 'Sunday', 2, 2);";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO `show` VALUES (3, 'Startalk', '22:00:00', 'Monday', 3, 1);";
//			stmt.executeUpdate(sql);
//			
//			// To `guest`
//			sql = "INSERT INTO guest VALUES (5, 'Celal Sengor', 'Prof. Dr.', 'geologist', 'Professor Sengor is a (foreign) member of The American Philosophical Society, The United States National Academy of Sciences and The Russian Academy of Sciences. Actually, he is the second Turkish prominent professor who is elected as a member by the Russian Academy of Sciences after Professor ordinarius Mehmet Fuat Koprulu.');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest VALUES (6, 'Ilber Ortayli', 'Prof. Dr.', 'historian', 'Ilber Ortayli is heir to a bilingual Turkish family so that he obtained German from his father and Russian from his mother. As a polyglot historian he has enough competency in Italian, English, French, Persian and also in Ottoman Turkish and Latin in order to fluently employ or maintain historical research with historical documents in the archives. His published articles are mainly in Turkish, German and French and various of them are translated in English.');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest VALUES (7, 'Mayim Bialik', 'Mrs.', 'actress', 'Mayim Chaya Bialik is an American actress and neuroscientist. From 1991 to 1995, she played  the title character of NBCs Blossom. Since 2010, she has played Dr. Amy Farrah Fowler - like the actress, a neuroscientist - on CBSs The Big Bang Theory.');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest VALUES (8, 'Orhan Pamuk', 'Mr.', 'novelist', 'Orhan Pamuk is a Turkish novelist,screenwriter, academic and recipient of the 2006 Nobel Prize in Literature. One of Turkeys most prominent novelists, his work has sold over thirteen million books in sixty-three languages, making him the countrys bestselling writer.');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest VALUES (9, 'Fazil Say', 'Mr.', 'pianist', 'Fazil Say is a virtuoso Turkish pianist and composer who was born in Ankara, described recently as \"not merely a pianist of genius; but undoubtedly he will be one of the great artists of the twenty-first century\".');";
//			stmt.executeUpdate(sql);
//			
//			// To `guest_show`
//			sql = "INSERT INTO guest_show VALUES (5, 1, '2016-11-22');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest_show VALUES (6, 1, '2016-11-22');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest_show VALUES (7, 3, '2016-11-21');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest_show VALUES (8, 2, '2016-11-27');";
//			stmt.executeUpdate(sql);
//			sql = "INSERT INTO guest_show VALUES (9, 2, '2016-11-27');";
//			stmt.executeUpdate(sql);
//			
//			System.out.println( "Insertions are completed sucessfully!");
//			
//			/*
//			 * Print resultant tables
//			 */
//			System.out.println("\nPrinting resultant tables...");
//			
//			System.out.println("Table `host`:");
//			sql = "SELECT * FROM host;";
//			resultSet = stmt.executeQuery(sql);
//			while( resultSet.next())
//				System.out.println( resultSet.getInt("hid") + " | " + resultSet.getString("name") + " | " + resultSet.getString("nickname") + " | " +
//									resultSet.getString("password") + " | " + resultSet.getString("title") + " | " + resultSet.getString("proffesion"));
//			
//			System.out.println("\nTable `channel`:");
//			sql = "SELECT * FROM channel;";
//			resultSet = stmt.executeQuery(sql);
//			while( resultSet.next())
//				System.out.println( resultSet.getInt("cid") + " | " + resultSet.getString("cname"));
//			
//			System.out.println("\nTable `show`:");
//			sql = "SELECT * FROM `show`;";
//			resultSet = stmt.executeQuery(sql);
//			while( resultSet.next())
//				System.out.println( resultSet.getInt("sid") + " | " + resultSet.getString("pname") + " | " + resultSet.getTime("time")+ " | " +
//									resultSet.getString("day") + " | " + resultSet.getInt("hid") + " | " + resultSet.getInt("cid"));
//			
//			System.out.println("\nTable `guest`:");
//			sql = "SELECT * FROM guest;";
//			resultSet = stmt.executeQuery(sql);
//			while( resultSet.next())
//				System.out.println( resultSet.getInt("gid") + " | " + resultSet.getString("gname") + " | " + resultSet.getString("title") + " | " +
//									resultSet.getString("proffesion") + " | " + resultSet.getString("short_bio"));
//			
//			System.out.println("\nTable `guest_show`:");
//			sql = "SELECT * FROM guest_show;";
//			resultSet = stmt.executeQuery(sql);
//			while( resultSet.next())
//				System.out.println( resultSet.getInt("gid") + " | " + resultSet.getInt("sid") + " | " + resultSet.getString("date"));
//			
			System.out.println("\nAu revoir..");
			
		} catch (SQLException e) {
//				    throw new IllegalStateException("Cannot connect to the database!", e);
			e.printStackTrace();
		}
	}
}
