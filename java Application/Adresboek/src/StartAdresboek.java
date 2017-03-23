import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

import javax.swing.JFrame;

public class StartAdresboek extends JFrame{
	
	public static final int WIDTH = 500;
	public static final int HEIGHT = 500;
	
	public static void main(String[] args){
		JFrame main = new JFrame();
		
		main.setSize(WIDTH, HEIGHT);
		main.setTitle("Adresboek");
		main.setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		main.addWindowListener(new WindowAdapter(){
			public void windowClosing(WindowEvent e){
				main.dispose();
				System.exit(0);
			}
		});
		main.setContentPane(new Paneel());
		main.setVisible(true);
		main.setResizable(false);
	}
}
