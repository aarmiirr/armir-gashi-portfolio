import java.util.Scanner;
public class Paga {

	public static void main(String[] args) {

		String emri;
		int oretepunuara;
		double pagesaore;
		double muaji;
		
		Scanner scan = new Scanner(System.in);
		
		System.out.println("Sheno emrin tend");
		emri = scan.nextLine();
		
		System.out.println("Sa ore ke punuar kete muaj ?");
		oretepunuara = scan.nextInt();

		System.out.println("Sa $ paguhesh ti qdo ore ?");
		pagesaore = scan.nextDouble();
		
		muaji = oretepunuara * pagesaore;
		
		System.out.println("Pershendetje " + emri);
		System.out.println("Pagesa jote mujore eshte " + muaji +"$");
		
	}

}
