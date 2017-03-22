import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Vector;
import javax.swing.table.DefaultTableModel;

public class LoadDriver {
	
	private String username, password, db, ip;
	
	public LoadDriver(){
		this("root", "", "Adresboek", "localhost:3306");
	}
	
	public LoadDriver(String username, String password, String db, String ip){
		this.username = username;
		this.password = password;
		this.db = db;
		this.ip = ip;
	}
	
	public DefaultTableModel getTableModel(String sql){
		DefaultTableModel model = null;
		try {
			Connection conn = getConnection();
			java.sql.PreparedStatement stmt = conn.prepareStatement(sql);
			ResultSet result = stmt.executeQuery();
			
			java.sql.ResultSetMetaData rsmt = stmt.getMetaData();
			int count = rsmt.getColumnCount();
			Vector<String> columnNames = new Vector<>();
			for (int i = 1; i <= count; i++ ){
			    columnNames.add(rsmt.getColumnName(i));
			}
			model = new DefaultTableModel(columnNames, 0);
			
			while(result.next()){
				Vector<String> row = new Vector<>();
			    for (int i = 1; i <= count; i++) {
			        row.add(result.getString(i));
			    }
			    model.addRow(row);
			}
		} catch (Exception e) {
			System.out.println(e);
		}
		return model;
		
	}
	
	public Connection getConnection(){
		Connection conn;
		try{
			Class.forName("com.mysql.jdbc.Driver");
			conn = DriverManager.getConnection("jdbc:mysql://"+ip+"/"+db+"?user="+username+"&password="+password);
		}catch(SQLException | ClassNotFoundException x){
			System.out.println("Er is geen verbinding met de database. Error:");
			System.out.println("SQLException: " + x);
			conn = null;
		}
		return conn;
	}
}
