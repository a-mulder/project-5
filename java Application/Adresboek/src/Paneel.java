import java.awt.BorderLayout;
import javax.swing.*;
import javax.swing.table.DefaultTableModel;

public class Paneel extends JPanel {
	
	private JTable mainTable;
	private JScrollPane mainScrollPane;
	
	private LoadDriver mainDriver;
	
	public Paneel(){
		setLayout(new BorderLayout());
		
		mainDriver = new LoadDriver();
		mainTable = new JTable();
		
		DefaultTableModel model = mainDriver.getTableModel("SELECT * FROM adresboek");
		mainTable.setModel(model);
		mainScrollPane = new JScrollPane(mainTable);
		
		add(mainScrollPane, BorderLayout.CENTER);
		
	}
}
