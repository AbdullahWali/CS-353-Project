/**
 * @author Burak Mandira
 * @date Dec 21, 2016
 *
 */
package creator;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

public class Inserter
{

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
			 * Insert records into the tables
			 */
			System.out.println( "\nInserting values into the tables...");
			String sql = null;

			// To `Account`
			sql = "INSERT INTO `Account` VALUES (1, 'John', 'Doe', 'john@doe.com', '+345216945');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (2, 'Fatih', 'Gundogdu', 'fgundogdu@hotmail.com', '+905935893220');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (3, 'Albert', 'Einstein', 'einstein@eth.edu.tr', '+32655478002');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (4, 'Hans', 'Fuhrer', 'fuhrerhans@abc.de', '+3125566854');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (5, 'Mike', 'Tyson', 'tyson@bomerang.nl', '+8941065014');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (6, 'Janke', 'Rademaker', 'j.rademaker@zth.nl', '+89514632021');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (7, 'Nihat', 'Ozkul', 'nihat@gmail.com', '+903125874566');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (8, 'Burcin', 'Terzioglu', 'ozkul@gmail.com', '+903125874566');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (9, 'Ilker', 'Kaleli', 'ILKER@gmail.com', '+903125874566');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (10, 'Ercument', 'Cicek', 'cicek@bilkent.edu.tr', '+905354781100');";
			stmt.executeUpdate(sql);

			// To `Credentials`
			sql = "INSERT INTO `Credentials` VALUES (1, 'john123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (2, 'fatih123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (3, 'albert123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (4, 'hans123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (5, 'mike123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (6, 'janke123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (7, 'nihat123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (8,  'burcin123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (9,  'ilker123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (10, 'ercument123');";
			stmt.executeUpdate(sql);
			
			// To `Host`
			sql = "INSERT INTO `Host` VALUES (1, 3.5);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Host` VALUES (2, 5);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Host` VALUES (3, 4.65);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Host` VALUES (4, 1.41);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Host` VALUES (5, 2.60);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Host` VALUES (6, 4.52);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Host` VALUES (7, 3.69);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Host` VALUES (8, 2.89);";
			stmt.executeUpdate(sql);
			
			
			// To `Guest`
			sql = "INSERT INTO `Guest` VALUES (6, 2.15);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Guest` VALUES (7, 1.52);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Guest` VALUES (8, 3.78);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Guest` VALUES (9, 4.95);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Guest` VALUES (10, 5);";
			stmt.executeUpdate(sql);
			
			// To `Accommodation`			
			sql = "INSERT INTO `Accommodation` VALUES (1, 7, 0, 83.76);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (2, 3, 0, 25.4);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (3, 10, 0, 96.21);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (4, 2, 1, 56.19);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (5, 3, 1, 43.06);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (6, 12, 1, 23);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (7, 6, 0, NULL);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (8, 4, 0, 45.09);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (9, 1, 1, 99.99);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (10, 4, 1, 74.82);";
			stmt.executeUpdate(sql);
			
			// To `Address`
			sql = "INSERT INTO `Address` VALUES (1, '2000. Street', 'Bellevue', 'New York', 'USA');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (2, '49. Street', 'Lichtenberg', 'Berlin', 'Germany');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (3, '201. Street', 'Saint Germain', 'Paris', 'France');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (4, '30. Street', 'West End', 'London', 'UK');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (5, '1029. Street', 'Nordstrand', 'Oslo', 'Norway');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (6, '304. Street', 'Oost', 'Amsterdam', 'Netherlands');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (7, '850. Street', 'Amarante', 'Porto', 'Portugal');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (8, '703. Street', 'Nou Barris', 'Barcelona', 'Spain');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (9, '283. Street', 'Monteverde', 'Rome', 'Italy');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (10, '398. Street', 'Taksim', 'Istanbul', 'Turkey')";
			stmt.executeUpdate(sql);
			
			// To `Offering`
			sql = "INSERT INTO `Offering` VALUES (1, 4, 6, '2016-12-22', '2016-12-25', 12, 30);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (2, 5, 2, '2017-01-15', '2017-01-31', 3, 136);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (3, 8, 5, '2016-10-01', '2016-12-01', 3, 67);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (4, 1, 8, '2016-02-24', '2016-02-25', 4, 115);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (5, 7, 4, '2016-09-17', '2016-10-26', 2, 236);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (6, 6, 10, '2016-07-04', '2017-07-09', 4, 128);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (7, 3, 1, '2017-11-28', '2017-12-13', 7, 652);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (8, 2, 9, '2017-01-01', '2017-01-08', 1, 91);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (9, 10, 7, '2017-05-14', '2017-08-29', 6, 589);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (10, 3, 3, '2017-02-18', '2017-02-24', 10, 1399);";
			stmt.executeUpdate(sql);

			//To Reservation
			sql = "INSERT INTO `Reservation` VALUES(1, '2016-10-10', '2016-10-12' );";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Reservation` VALUES(2, '2016-09-20', '2016-09-27' );";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Reservation` VALUES(3, '2017-01-06', '2017-01-08' );";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Reservation` VALUES(4, '2017-07-10', '2017-07-08' );";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Reservation` VALUES(5,'2016-12-22', '2016-12-24' );";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Reservation` VALUES(6, '2017-01-20', '2017-01-30' );";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Reservation` VALUES(7, '2017-05-12', '2017-07-01' );";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Reservation` VALUES(8, '2016-02-24', '2016-02-25' );";
			stmt.executeUpdate(sql);

            //To Makes
            sql = "INSERT INTO `Makes` VALUES (4, 1, 6);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Makes` VALUES (2, 3, 5);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Makes` VALUES (1, 4, 3);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Makes` VALUES (8, 5, 4);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Makes` VALUES (3, 6, 8);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Makes` VALUES (5, 7, 1);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Makes` VALUES (6, 7, 2);";
            stmt.executeUpdate(sql);


            //Decides
            sql = "INSERT INTO `Decides` VALUES (1, 4, true);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Decides` VALUES (2, 7, true);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Decides` VALUES (3, 2, false);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Decides` VALUES (4, 6, false);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Decides` VALUES (5, 4, false);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Decides` VALUES (6, 5, true);";
            stmt.executeUpdate(sql);






            System.out.println( "Insertions are completed sucessfully!");
			System.out.println( "\nÀ bientôt.."); // Bu ne demek yaa?
			
		} catch(SQLException e) {
			throw new IllegalStateException( e.getMessage(), e);
		}
	}
}
