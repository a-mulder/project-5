import javax.swing.JFrame;

public class StartAdresboek extends JFrame{
	
	static JFrame x;
	public static final int WIDTH = 500;
	public static final int HEIGHT = 500;
	
	public static void main(String[] args){
		x = new JFrame();
		x.setSize(WIDTH, HEIGHT);
		x.setTitle("Adresboek");
		x.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		x.setContentPane(new Paneel());
		x.setVisible(true);
		x.setResizable(false);
	}
}
