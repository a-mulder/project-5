import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;

public class Paneel extends JPanel {
	
	private JButton findButton;
	private MidPanel midPanel;
	
	private LoadDriver mainDriver;
	
	public Paneel(){
		setLayout(new BorderLayout());
		
		mainDriver = new LoadDriver();
		Connection conn = mainDriver.getConnection();
		mainDriver.initConnection(conn);
		
		findButton = new JButton("Find");
		midPanel = new MidPanel(conn, mainDriver);
		
		findButton.addActionListener(new FindButtonHandler());
		
		add(midPanel, BorderLayout.CENTER);
		add(findButton, BorderLayout.WEST);
		
		
	}
	
	class FindButtonHandler implements ActionListener{
		public void actionPerformed(ActionEvent e) {
		}
	}
}
