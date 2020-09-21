<?php

namespace App\Http\Controllers\Pdf;

include_once 'tfpdf.php';

use App\Form;
use App\User;

use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\Storage;


class PosterController extends tFPDF
{
    public function poster_download($id, $form_id)
    {

        $user = User::findOrFail($id);

        $form = Form::where([
            ['id', $form_id],
            ['user_id', $id],
        ])->first();

        $i = rand(1,10);


        $qrCode = new QrCode('http://www.i-cv.pl/curriculum-vitae/'.$form->id);

//        $qrCode->setWriterByName('png');
//        header('Content-Type: '.$qrCode->getContentType());
//        $qrCode->writeFile('storage/qr/file'.$i.'.png'); // !!!!!!!
//        dd($qrCode);


        Storage::put('public/qr/file'.$i.'.png', $qrCode->writeString());

        $head = "Ogłoszenie o pracę";


        $pdf = new tFPDF();
        $pdf->AddPage();

        $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $pdf->SetFont('DejaVu','',30);

        $pdf->Cell(0,10,$head,0,1,"C");
        $pdf->Ln(20);

        $pdf->SetFont('DejaVu','',14);
        $pdf->Cell(0,10,"Firma: ".$form->company,0,1,"C");
        $pdf->Cell(0,10,"Na stanowisko: ".$form->profession,0,1,"C");
        $pdf->Cell(0,10,"Adres: ".$form->street.", ".$form->city,0,1,"C");
        $pdf->Cell(0,10,"Województwo: ".$form->voi,0,1,"C");
        $pdf->Ln(6);

        $pdf->Cell(0,10,"Opis stanowiska: ",0,1,"L");
        $pdf->SetFont('DejaVu','',12);
        $pdf->MultiCell(0,10,$form->description,0,"L",false);
        $pdf->Ln(10);



        $pdf->SetFont('DejaVu','',14);
        $pdf->Cell(0,10,"Rekrutujemy do: ".$form->active_date,0,1,"C");
        $pdf->Ln(10);

        $pdf->Cell(0,10,"Formularz dostępny na stronie: http://www.i-cv.pl/curriculum-vitae/".$form->id,0,1,"C");
        $pdf->Ln(20);

//        $pdf->Image($upload_path);
        $pdf->Image('storage/qr/file'.$i.'.png',140, 230, 55, 55);



        $pdf->Output();




    }
}


