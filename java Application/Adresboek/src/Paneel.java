import java.awt.BorderLayout;
import java.sql.Connection;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;

public class Paneel extends JPanel {
	
	private JTable mainTable;
	private JScrollPane mainScrollPane;
	private JButton findButton;
	
	private LoadDriver mainDriver;
	
	public Paneel(){
		setLayout(new BorderLayout());
		
		mainDriver = new LoadDriver();
		findButton = new JButton("Find");
		
		Connection conn = mainDriver.getConnection();
		
		DefaultTableModel model = mainDriver.getTableModel("SELECT * FROM adresboek", conn);
		
		mainTable = new JTable(model){
			public boolean isCellEditable(int row, int column) {                
                return false;               
			};
		};
		mainScrollPane = new JScrollPane(mainTable);
		
		add(mainScrollPane, BorderLayout.CENTER);
		
	}
}
