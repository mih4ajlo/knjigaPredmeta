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


global $brojac;

$brojac = 0;

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
	global $brojac;
	$brojac++;

	$upis = explode( "Studijski program/studijski programi:", $value);
	print_r("{ id:". $brojac . " ,\n program:'". $upis[1] . "',\n");
	# funkcija br 1
}
function VrstaStudija($value='')
{
	
	global $brojac;

	$upis = explode( "Vrsta i nivo studija:", $value);
	print_r(" id:". $brojac . " ,\n vrstaStudija:'". $upis[1] . "',\n");
	# funkcija br 2
}
function NazivPredmeta($value='')
{
	if(empty( trim($value))) return;
	//Naziv predmeta:
	global $brojac;


	$upis = explode( "Naziv predmeta:", $value);
	
	$temp = trim($upis[0]);
	if(empty( $temp )) return;

	if(empty($upis[1] ))
		print_r(" id:". $brojac . " ,\n predmet:'". $temp . "',\n");
	//print_r( $brojac ." NazivPredmeta ". $value . "\n");
	# funkcija br 3
}
function Nastavnik($value='')
{
	global $brojac;
	//Nastavnik:
	$upis = explode( "Nastavnik:", $value);
	
	if( !empty( $upis[1] )  )
		print_r(" id:". $brojac . " ,\n nastavnik:'". $upis[1] . "',\n");
	
	# funkcija br 4
}
function Status($value='')
{
	global $brojac;
	//Status predmeta:Izborni
	$upis = explode( "Status predmeta:", $value);
	
	print_r(" id:". $brojac . " ,\n status:'". $upis[1] . "',\n");
	# funkcija br 5
}
function ESPB($value='')
{
	global $brojac;
	$upis = explode( "Broj ESPB:", $value);
	
	print_r(" id:". $brojac . " ,\n ESPB:'". $upis[1] . "',\n");
	# funkcija br 6
}
function Uslov($value='')
{
	global $brojac;
	$upis = explode( "Uslov:", $value);
	
	print_r(" id:". $brojac . " ,\n uslov:'". $upis[1] . "',\n");
	# funkcija br 7
}
function CiljPredmeta($value='')
{
	global $brojac;
	print_r( $brojac ." CiljPredmeta ". $value . "\n");
	# funkcija br 8
}
function Ishod($value='')
{
	global $brojac;
	print_r( $brojac ." Ishod ". $value . "\n");
	# funkcija br 9
}
function SadrzajPredmeta($value='')
{
	global $brojac;
	print_r( $brojac ." SadrzajPredmeta ". $value . "\n");
	# funkcija br 10
}
function TeorijskaNastava($value='')
{
	global $brojac;
	print_r( $brojac ." TeorijskaNastava ". $value . "\n");
	# funkcija br 11
}
function PrakticnaNastava($value='')
{
	global $brojac;
	print_r( $brojac ." PrakticnaNastava ". $value . "\n");
	# funkcija br 12
}
function Literatura($value='')
{
	global $brojac;
	print_r( $brojac ." Literatura ". $value . "\n");
	# funkcija br 13
}
function BrojCasova($value='')
{
	global $brojac;
	print_r( $brojac ." BrojCasova ". $value . "\n");
	# funkcija br 14
}
function MetodaIzvodjena($value='')
{
	global $brojac;
	print_r( $brojac ." MetodaIzvodjena ". $value . "\n");
	# funkcija br 15
}
function Ocena($value='')
{
	global $brojac;
	print_r( $brojac ." Ocena ". $value . "\n");
	# funkcija br 16
}

?>