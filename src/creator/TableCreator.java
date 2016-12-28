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

	public static void main(String[] args)
	{
		String url = "jdbc:mysql://localhost/cs353_database";
		String username = "root";
		String password = "";

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

			resultSet = metadata.getTables( "cs353_database", null, "Decides", null);
			if( resultSet.next())
			{
				System.out.println( "`Decides`");
				sql = "DROP TABLE `Decides`;";
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
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Ranks", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Ranks`");
		    	sql = "DROP TABLE `Ranks`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "HostRevs", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`HostRevs`");
		    	sql = "DROP TABLE `HostRevs`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Account", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Account`");
		    	sql = "DROP TABLE `Account`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Address", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Address`");
		    	sql = "DROP TABLE `Address`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Contains", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Contains`");
		    	sql = "DROP TABLE `Contains`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Amenity", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Amenity`");
		    	sql = "DROP TABLE `Amenity`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Room", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Room`");
		    	sql = "DROP TABLE `Room`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "House", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`House`");
		    	sql = "DROP TABLE `House`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "AccomRevs", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`AccomRevs`");
		    	sql = "DROP TABLE `AccomRevs`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Accommodation", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Accommodation`");
		    	sql = "DROP TABLE `Accommodation`;";
		    	stmt.executeUpdate(sql);
		    }
		    
		    resultSet = metadata.getTables( "cs353_database", null, "Review", null);
		    if( resultSet.next())
		    {
		    	System.out.println( "`Review`");
		    	sql = "DROP TABLE `Review`;";
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
		    		"email VARCHAR(32) UNIQUE NOT NULL," +
		    		"phone_number CHAR(15)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Account` is created.");
		    
		    // Create `Credentials` table
		    sql = "CREATE TABLE `Credentials`(" +
		    		"account_ID INT PRIMARY KEY," +
		    		"password VARCHAR(32) NOT NULL," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Credentials` is created.");
		    
		    // Create `Host` table
		    sql = "CREATE TABLE `Host`(" +
		    		"account_ID INT PRIMARY KEY," +
		    		"avg_host_rank NUMERIC(3,2)," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Host` is created."); 
		    
		    // Create `Guest` table
		    sql = "CREATE TABLE `Guest`(" +
		    		"account_ID INT  PRIMARY KEY," +
		    		"avg_guest_rank NUMERIC(3,2)," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Guest` is created.");
		    
		    // Create `Accommodation` table
		    sql = "CREATE TABLE `Accommodation`(" +
		    		"accommodation_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"num_of_people INT," +
		    		"type BIT(1)," +
		    		"percentageRecommend DECIMAL(4,2)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Accommodation` is created.");
		    
		    // Create `Offering` table
		    sql = "CREATE TABLE `Offering`(" +
		    		"offering_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"account_ID INT NOT NULL," +
		    		"accommodation_ID INT NOT NULL," +
		    		"start_date DATE," +
		    		"end_date DATE," +
		    		"price_per_night INT," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)," +
		    		"FOREIGN KEY (accommodation_ID) REFERENCES Accommodation(accommodation_ID)" +
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
		    		"reservation_ID INT  PRIMARY KEY," +
		    		"account_ID INT NOT NULL," +
		    		"offering_ID INT NOT NULL," +
		    		"FOREIGN KEY (reservation_ID) REFERENCES Reservation(reservation_ID)," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)," +
		    		"FOREIGN KEY (offering_ID) REFERENCES Offering(offering_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Makes` is created.");

		    
		    // Create `Decides` table
		    sql = "CREATE TABLE `Decides`(" +
		    		"reservation_ID INT PRIMARY KEY," +
		    		"account_ID INT," +
		    		"STATUS boolean," +
		    		"FOREIGN KEY (reservation_ID) REFERENCES Reservation(reservation_ID)," +
					"FOREIGN KEY (account_ID) REFERENCES Account(account_ID))ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Decides` is created.");
//
		    // Create `Address` table
		    sql = "CREATE TABLE `Address`(" +
		    		"accommodation_ID INT PRIMARY KEY," +
		    		"street VARCHAR(50)," +
		    		"district VARCHAR(30)," +
		    		"city VARCHAR(30)," +
		    		"country VARCHAR(30)," +
		    		"FOREIGN KEY (accommodation_ID) REFERENCES Accommodation(accommodation_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Address` is created.");

		    // Create `Amenity` table
		    sql = "CREATE TABLE `Amenity`(" +
		    		"amenity_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"amenity_name VARCHAR(30)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Amenity` is created.");

		    // Create `Contains` table
		    sql = "CREATE TABLE `Contains`(" +
		    		"amenity_ID INT," +
		    		"accommodation_ID INT NOT NULL," +
		    		"PRIMARY KEY (amenity_ID, accommodation_ID)," +
		    		"FOREIGN KEY (amenity_ID) REFERENCES Amenity(amenity_ID)," +
		    		"FOREIGN KEY (accommodation_ID) REFERENCES Accommodation(accommodation_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Contains` is created.");

		    // Create `Room` table
		    sql = "CREATE TABLE `Room`(" +
		    		"accommodation_ID INT PRIMARY KEY," +
		    		"num_of_beds INT," +
		    		"FOREIGN KEY (accommodation_ID) REFERENCES Accommodation(accommodation_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Room` is created.");

		    // Create `House` table
		    sql = "CREATE TABLE `House`(" +
		    		"accommodation_ID INT PRIMARY KEY," +
		    		"num_of_rooms INT," +
		    		"num_of_wc INT," +
		    		"FOREIGN KEY (accommodation_ID) REFERENCES Accommodation(accommodation_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `House` is created.");
		    
		    // Create `Review` table
		    sql = "CREATE TABLE `Review`(" +
		    		"review_ID INT AUTO_INCREMENT PRIMARY KEY," +
		    		"rating DECIMAL(2,1) NOT NULL," +
		    		"comment VARCHAR(300)," +
		    		"recommended BIT(1)," +
		    		"date DATETIME" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Review` is created.");
		    
		    // Create `AccomRevs` table
		    sql = "CREATE TABLE `AccomRevs`(" +
		    		"review_ID INT PRIMARY KEY," +
		    		"accommodation_ID INT NOT NULL," +
		    		"FOREIGN KEY (review_ID) REFERENCES Review(review_ID)," +
		    		"FOREIGN KEY (accommodation_ID) REFERENCES Accommodation(accommodation_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `AccomRevs` is created.");
		    
		    // Create `Ranks` table
		    sql = "CREATE TABLE `Ranks`(" +
		    		"review_ID INT PRIMARY KEY," +
		    		"account_ID INT NOT NULL," +
		    		"FOREIGN KEY (account_ID) REFERENCES Account(account_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `Ranks` is created.");
		    
		    // Create `HostRevs` table
		    sql = "CREATE TABLE `HostRevs`(" +
		    		"host_ID INT," +
		    		"guest_ID INT," +
		    		"rating DECIMAL(2,1) NOT NULL," +
		    		"comment VARCHAR(300)," +
		    		"date DATETIME," +
		    		"PRIMARY KEY(host_ID, guest_ID)," +
		    		"FOREIGN KEY (host_ID) REFERENCES Accommodation(accommodation_ID)," +
		    		"FOREIGN KEY (guest_ID) REFERENCES Accommodation(accommodation_ID)" +
		    		") ENGINE = InnoDB;";
		    stmt.executeUpdate(sql);
		    System.out.println( "Table `HostRevs` is created.");
		    
		    System.out.println( "All tables are created succesfully!");
			System.out.println("\nAu revoir..");
			
		} catch (SQLException e) {
		    throw new IllegalStateException( e.getMessage(), e);
		}
	}
}
