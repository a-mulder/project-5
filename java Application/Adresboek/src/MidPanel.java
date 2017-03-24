import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.sql.*;
import java.util.Vector;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;

public class MidPanel extends JPanel{
	
	private JTable mainTable;
	private JScrollPane mainScrollPane;
	private InvoerPaneel invoerPaneel;
	
	public MidPanel(Connection conn, LoadDriver mainDriver){
		setLayout(new GridLayout(2,1));
		
		DefaultTableModel model = mainDriver.getTableModel("SELECT * FROM adresboek");
		mainTable = new JTable(model){
			public boolean isCellEditable(int row, int column) {                
                return false;               
			};
		};
		mainScrollPane = new JScrollPane(mainTable);
		invoerPaneel = new InvoerPaneel(conn, mainDriver);
		
		add(mainScrollPane);
		add(invoerPaneel);
	
		
	}

}
