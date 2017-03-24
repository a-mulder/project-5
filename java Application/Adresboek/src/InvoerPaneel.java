import java.sql.Connection;
import java.util.Vector;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class InvoerPaneel extends JPanel {
	
	private	JLabel[] inputLabel;
	private JTextField[] input;
	
	private int y = 20;
	
	public InvoerPaneel(Connection conn, LoadDriver mainDriver){
		setLayout(null);
		
		Vector<String> columnNames = mainDriver.getTableColumnNames("SELECT * FROM adresboek");
		inputLabel = new JLabel[columnNames.size()];
		input = new JTextField[columnNames.size()];
		
		for(int i = 0; i < columnNames.size(); i++){
			inputLabel[i] = new JLabel(columnNames.get(i));
			inputLabel[i].setBounds(20, y, 100, 25);
			
			input[i] = new JTextField();
			input[i].setBounds(80, y, 100, 25);
			y += 35;
		}
		for(int i = 0; i < columnNames.size(); i++){
			add(inputLabel[i]);
			add(input[i]);
		}
	}
}
