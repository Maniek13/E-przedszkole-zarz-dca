<?php
session_start();
require_once "polaczenie.php";
require('tfpdf.php');

$polaczenie = new mysqli($db_servername, $db_username, $db_password, $db_name);

$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$linijka = "";
$wynik ="";
$dzieci = $_SESSION['Dzieci2'];

if ($polaczenie->connect_errno!=0) 
{
   echo "Error: ".$polaczenie->connect_errno;
}
else
{
	
		$pdf = new tFPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->AddFont('DejaVuB','','DejaVuSans-Bold.ttf',true);
		$pdf->SetFont('DejaVuB','',16);
		$pdf->Cell(40,10,'Lista chętnych na posiłki');
		$pdf->Ln();
		
		
		
	$sql = "SELECT * FROM dzieciposilki WHERE Data >= '$data1' AND Data <= '$data2' ORDER BY Data ASC";
	
	if($rezultat = @$polaczenie->query($sql))
	{
		$wyniki = $rezultat->fetch_all();
		
	
		
		$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
		$pdf->SetFont('DejaVu','',12);

		$data = "";
		for($i = 0; $i<count($wyniki); $i++)
		{
		if($wyniki[$i][1] != $data)
		{
		$linijka = "Data: ".$wyniki[$i][1];
		$pdf->Cell(60,10,"$linijka",0,1);
		$data = $wyniki[$i][1];
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->line($x,$y,$x+180,$y);
		$pdf->ln(10);
		}
		
		$linijka = "ID dziecka: ".$wyniki[$i][0];
		$pdf->Cell(60,10,"$linijka",0,1);
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->line($x,$y,$x+50,$y);
		
		$linijka = "Posiłki: ";
		$pdf->Cell(60,10,"$linijka",0,1);
		
		if($wyniki[$i][2]==0){$wynik = 'Nie';} else {$wynik =  'Tak';}
		$linijka = "Śniadanie: ".$wynik;
		$pdf->Cell(60,10,"$linijka",0,1);
		
		if($wyniki[$i][3]==0){$wynik = 'Nie';} else {$wynik =  'Tak';}
		$linijka = "Drugie śniadanie: ".$wynik;
		$pdf->Cell(60,10,"$linijka",0,1);
		
		if($wyniki[$i][4]==0){$wynik = 'Nie';} else {$wynik =  'Tak';}
		$linijka = "Obiad: ".$wynik;
		$pdf->Cell(60,10,"$linijka",0,1);
		}
	}	
$polaczenie->close();	
}
$nazwa = "posiłki ".$data1."-".$data2.".pdf";
$pdf->Output('', $nazwa, true);

?> 



