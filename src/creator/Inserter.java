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
			sql = "INSERT INTO `Account` VALUES (7, 'Nihat', 'Ozkul', 'ozkul@gmail.com', '+903125874566');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (8, 'Burcin', 'Terzioglu', 'ozkul@gmail.com', '+903125874566');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (9, 'Ilker', 'Kaleli', 'ozkul@gmail.com', '+903125874566');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (10, 'Ercument', 'Cicek', 'cicek@bilkent.edu.tr', '+905354781100');";
			stmt.executeUpdate(sql);

			// To `Credentials`
			sql = "INSERT INTO `Credentials` VALUES (1, 'john', 'john123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (2, 'fatih', 'fatih123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (3, 'albert', 'albert123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (4, 'hans', 'hans123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (5, 'mike', 'mike123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (6, 'janke', 'janke123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (7, 'nihat', 'nihat123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (8, 'burcin', 'burcin123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (9, 'ilker', 'ilker123');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Credentials` VALUES (10, 'ercument', 'ercument123');";
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
			
//			// To `guest_show`
//			sql = "INSERT INTO guest_show VALUES (5, 1, '2016-11-22');";
//			stmt.executeUpdate(sql);
			
			System.out.println( "Insertions are completed sucessfully!");
			System.out.println( "\nÀ bientôt..");
			
		} catch(SQLException e) {
			throw new IllegalStateException( e.getMessage(), e);
		}
	}
}
