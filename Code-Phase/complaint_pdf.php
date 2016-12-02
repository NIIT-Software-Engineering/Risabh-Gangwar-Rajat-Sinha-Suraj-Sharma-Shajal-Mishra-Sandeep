<?php	
	require_once('reviewSys_fns.php');
	require("fpdf.php");
	session_start();
	if($_SESSION['valid_user']!=='ADMIN')
		header("Location: overall_review.php");
	$service=get_service($_GET[id]);
	if(!$service)
		header("Location: overall_review.php");
	$image=get_image_service($_GET[id]);
	$average=get_average_service($_GET[id]);
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image('images/LOGO.jpg',15,5,40,30,'jpg',"http://localhost/reviewsys/overall_review.php");
	$pdf->SetFont("Arial","B",26);
	$pdf->Cell(50,5,"",0,1);
	$pdf->Cell(60,10,"",0,0);
	$pdf->Cell(120,10,"REVIEW SUMMARY",1,1,C);
	$pdf->Cell(0,20,"",0,1,C);
	$pdf->Cell(0,10,$service.':',0,1);
	$pdf->Image($image,140,35,40,30);
	$pdf->Cell(0,20,"",0,1);
	$pdf->Cell(80,10,"Average: ".$average,1,1);
	$pdf->Cell(0,20,"",0,1);
	$pdf->SetFont("Arial","B",10);
	for($x=1;$x<=5;$x++)
	{
		$pdf->Cell(80,10,$x." star",1,1);
		$review=get_review($x,$service);
		foreach($review as $name)
		{
			$pdf->Cell(30,10,$name[0],1,0,C);
			$pdf->Cell(0,10,$name[1],1,1);
		}
		$pdf->Cell(0,20,"",0,1);
	}
	$pdf->Output();
?>
