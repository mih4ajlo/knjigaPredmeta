<?php  

/*
1.Studijski program/studijski programi: Informacioni sistemi i tehnologije
2.Vrsta i nivo studija:Osnovne akademske studije
3.Naziv predmeta:
4.Nastavnik:Aničić M. Nenad
5.Status predmeta:Izborni
6.Broj ESPB: 4
7.Uslov: /
8.Cilj predmeta
9.Ishod predmeta
10.Sadržaj predmeta
11.Teorijska nastava:
12.Praktična nastava:
13.Literatura
14.Broj časova aktivne nastave
15.Metode izvođenja nastave
16.Ocena znanja (maksimalni broj poena 100)

*/




$celine = array( "StudijskiProgram" => "Studijski program" , "VrstaStudija" => "Vrsta i" , "NazivPredmeta" => "Naziv predmeta" , "Nastavnik" => "Nastavnik" , "Status" => "Status predmeta" , "ESPB" => "Broj ESPB" , "Uslov" => "Uslov:" , "CiljPredmeta" => "Cilj predmeta" , "Ishod" => "Ishod predmeta" , "SadrzajPredmeta" => "Sadržaj predmeta" , "TeorijskaNastava" => "Teorijska nastava" , "PrakticnaNastava" => "Praktična nastava" , "Literatura" => "Literatura" , "BrojCasova" => "Broj časova" , "MetodaIzvodjena" => "Metode izvođenja" , "Ocena" => "Ocena znanja"  );


main( $celine );

function main($celine='')
{
	// liniju po liniju citas 
	

	$handle = fopen("knjiga-latinica.txt", "r");
	if ($handle) {

		$flag = "";

	    while (($line = fgets($handle)) !== false) {
	        //provera da li se neka od kljucnih reci nalazi

	    	$status = provera( $celine, $line);

	    	

	    	if( !empty($status) ){ //novi flag
	    		$flag = $status;
	    	}
	    	else if($flag !== ""){ //obicna linija
	    		$flag( $line );
	    	}

			
			//if($flag !== "")
				
	    }

	    fclose($handle);
	} else {
	    // error opening the file.
	} 

	
}


//treda da vrati aktivan flag i status
function provera($niz='', $line)
{
	foreach ($niz as $key => $value ) {
		
		$subject = $line;
		$pattern = '/^\s*'.$value.'/';
		$res = preg_match($pattern, $subject);

		if($res === 1){
			$key( trim( $line )  );		// upisi prvu liniju	
			return $key; //flag, koji je aktivan
			//break; //izlazi iz foreach-a
			//die();
		}


		//regex provera ^\s+ sadrzaj value-a
		//ako postoji stream ide u funkciju; break foreach
	}

	return false; //nije nijedna od pocetnih linija, obicna je linija
}

//kada naidjes na 1 stavku to je novi element


//sve funkcije - parsiraju i upisuju text u posebne fajlove - gomila posebnih fajlova
// na kraju se ti fajlovi merg-uju u jedan

function StudijskiProgram($value='')
{
	print_r("StudijskiProgram ". $value . "\n");
	# funkcija br 1
}
function VrstaStudija($value='')
{
	print_r("VrstaStudija ". $value . "\n");
	# funkcija br 2
}
function NazivPredmeta($value='')
{
	print_r("NazivPredmeta ". $value . "\n");
	# funkcija br 3
}
function Nastavnik($value='')
{
	print_r("Nastavnik ". $value . "\n");
	# funkcija br 4
}
function Status($value='')
{
	print_r("Status ". $value . "\n");
	# funkcija br 5
}
function ESPB($value='')
{
	print_r("ESPB ". $value . "\n");
	# funkcija br 6
}
function Uslov($value='')
{
	print_r("Uslov ". $value . "\n");
	# funkcija br 7
}
function CiljPredmeta($value='')
{
	print_r("CiljPredmeta ". $value . "\n");
	# funkcija br 8
}
function Ishod($value='')
{
	print_r("Ishod ". $value . "\n");
	# funkcija br 9
}
function SadrzajPredmeta($value='')
{
	print_r("SadrzajPredmeta ". $value . "\n");
	# funkcija br 10
}
function TeorijskaNastava($value='')
{
	print_r("TeorijskaNastava ". $value . "\n");
	# funkcija br 11
}
function PrakticnaNastava($value='')
{
	print_r("PrakticnaNastava ". $value . "\n");
	# funkcija br 12
}
function Literatura($value='')
{
	print_r("Literatura ". $value . "\n");
	# funkcija br 13
}
function BrojCasova($value='')
{
	print_r("BrojCasova ". $value . "\n");
	# funkcija br 14
}
function MetodaIzvodjena($value='')
{
	print_r("MetodaIzvodjena ". $value . "\n");
	# funkcija br 15
}
function Ocena($value='')
{
	print_r("Ocena ". $value . "\n");
	# funkcija br 16
}

?>