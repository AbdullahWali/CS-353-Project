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
			sql = "INSERT INTO `Account` VALUES (8, 'Burcin', 'Terzioglu', 'terzioglu@gmail.com', '+903125874566');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Account` VALUES (9, 'Ilker', 'Kaleli', 'kaleli@gmail.com', '+903125874566');";
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
			sql = "INSERT INTO `Host` VALUES (9, 4.89);";
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
			sql = "INSERT INTO `Accommodation` VALUES (10, 4, 0, 74.82);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (11, 3, 1, 50.18);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (12, 1, 1, 99.00);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (13, 6, 0, 83.42);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (14, 2, 1, 72.30);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (15, 5, 0, 71.70);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Accommodation` VALUES (16, 2, 1, 88.64);";
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
			sql = "INSERT INTO `Address` VALUES (11, '103. Street', 'West End', 'London', 'UK')";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (12, '30. Street', 'Westminster', 'London', 'UK')";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (13, '5. Avenue', 'Knightsbridge', 'London', 'UK')";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (14, '4. Avenue', 'Campo Marzio', 'Rome', 'Italy')";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (15, '21. Street', 'Campo Marzio', 'Rome', 'Italy')";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Address` VALUES (16, '1. Boullevard', 'Monti', 'Rome', 'Italy')";
			stmt.executeUpdate(sql);
			
			
			// To `Offering`
			sql = "INSERT INTO `Offering` VALUES (1, 4, 6, '2017-01-16', '2017-02-02', 30);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (2, 5, 2, '2017-01-15', '2017-01-31', 136);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (3, 8, 5, '2017-01-01', '2017-12-01', 67);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (4, 1, 8, '2017-03-24', '2017-04-25', 115);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (5, 7, 4, '2017-01-17', '2017-03-26', 236);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (6, 6, 10, '2017-01-04', '2017-01-10', 128);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (7, 3, 1, '2017-01-28', '2017-02-20', 652);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (8, 2, 9, '2017-01-01', '2017-01-10', 91);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (9, 10, 7, '2017-05-01', '2017-08-29', 589);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (10, 3, 3, '2017-02-18', '2017-02-24', 1399);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (11, 3, 3, '2017-03-20', '2017-04-24', 1199);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (12, 9, 11, '2017-07-18', '2017-12-14', 83);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (13, 9, 11, '2017-01-18', '2017-04-15', 94);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (14, 7, 12, '2017-01-30', '2017-09-19', 76);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (15, 7, 13, '2017-01-18', '2018-02-24', 96);";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Offering` VALUES (16, 2, 9, '2017-01-01', '2017-02-24', 100);";
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
            sql = "INSERT INTO `Makes` VALUES (8, 6, 9);";
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

            //TO AMENITY TABLE
            sql = "INSERT INTO `Amenity` VALUES (1, 'Wireless Network(Wi-Fi)');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (2, 'Ethernet Connection');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (3, 'TV');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (4, 'Cable TV');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (5, 'Kitchen');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (6, 'Washing Machine');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (7, 'Dryer');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (8, 'Bathtub');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (9, 'Hangers');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (10, 'Iron');";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Amenity` VALUES (11, 'Free Parking');";
            stmt.executeUpdate(sql);
            
            //TO CONTAINS TABLE
            sql = "INSERT INTO `Contains` VALUES (1, 1);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2, 1);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (3, 1);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (5, 1);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (7, 1);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (11, 1);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1, 2);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2, 2);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (3, 2);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (4, 2);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (5, 2);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (6, 2);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1, 3);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (3, 3);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (8, 3);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (7, 3);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (9, 3);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1, 4);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2, 4);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (3, 4);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (6, 4);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (8, 4);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2, 5);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (5, 5);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (7, 5);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (8, 5);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (9, 5);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1, 6);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2, 6);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (8, 6);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (10, 6);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (11, 6);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1, 7);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2, 7);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (3, 7);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1,8);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (6,8);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (8,8);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1,9);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (10,9);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (11,9);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1,10);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (3,10);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (5,10);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (6,11);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (8,11);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (11,11);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2,12);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (3,12);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (9,12);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (10,13);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (11,13);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (4,13);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (8,13);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (9,14);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2,14);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (5,14);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (1,15);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (7,15);";
            stmt.executeUpdate(sql);
            sql = "INSERT INTO `Contains` VALUES (2,16);";
            stmt.executeUpdate(sql);

			//Add some reviews
			sql  = "INSERT INTO `Review` (`review_ID`, `rating`, `comment`, `recommended`, `date`) VALUES ('1', '4.2', 'wow cok iyi ', b'1', '2016-12-15');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Review` (`review_ID`, `rating`, `comment`, `recommended`, `date`) VALUES ('2', '5', 'vaay be cok guzel ev huydaa ', b'1', '2016-12-30');";
			stmt.executeUpdate(sql);

			sql = "INSERT INTO `Ranks` (`review_ID`, `account_ID`) VALUES ('1', '6');";
			stmt.executeUpdate(sql);
			sql = "INSERT INTO `Ranks` (`review_ID`, `account_ID`) VALUES ('2', '3');";
			stmt.executeUpdate(sql);

			sql ="INSERT INTO `AccomRevs` (`review_ID`, `accommodation_ID`) VALUES ('1', '7');";
			stmt.executeUpdate(sql);
			sql ="INSERT INTO `AccomRevs` (`review_ID`, `accommodation_ID`) VALUES ('2', '7');";
			stmt.executeUpdate(sql);


			System.out.println( "Insertions are completed sucessfully!");
			System.out.println( "\nÀ bientôt.."); // Bu ne demek yaa?
			
		} catch(SQLException e) {
			throw new IllegalStateException( e.getMessage(), e);
		}
	}
}
