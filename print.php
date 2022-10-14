<?php
require 'vendor/autoload.php';
require 'utilities.php';

use Fpdf\Fpdf;

$category = $_GET['category'];

$data_post = query("SELECT * FROM posts WHERE category = '$category'");

class pdf extends Fpdf
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'Grafik Statistik Postingan ', 1, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function BarisUser($fullname, $email, $username, $likes, $comments, $content, $align = "L")
    {
        $this->Cell(40, 10, $fullname, '1', 0, $align);
        $this->Cell(60, 10, $email, 1, 0, $align);
        $this->Cell(35, 10, $username, 1, 0, $align);
        $this->Cell(30, 10, $likes, 1, 0, $align);
        $this->Cell(30, 10, $comments, 1, 0, $align);
        $this->MultiCell(0, 10, $content, 1, $align);
    }
}

$pdf = new pdf("L", "mm", "A3");
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 20, $category, 1, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 14);
$pdf->BarisUser("Nama Lengkap", "Email", "Username", "Like", "Comment", "Content", "C");
$pdf->SetFont('Arial', '', 12);
foreach ($data_post as $data) {
    $data_user = query("SELECT * FROM users WHERE id_user = " . $data["id_user"])[0];
    $likes = query("SELECT COUNT(id_post) 'likes' FROM likes_post WHERE id_post = " . $data["id_post"])[0];
    $comments = query("SELECT COUNT(id_post) 'comments' FROM comments WHERE id_post = " . $data["id_post"])[0];
    $pdf->BarisUser($data_user["nama_lengkap"], $data_user["email"], $data_user["username"], $likes["likes"], $comments["comments"], $data["content"]);
}
$pdf->Output();