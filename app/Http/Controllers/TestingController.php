<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Payment\DuitkuController;

use setasign\Fpdi\Fpdi;
use Codedge\Fpdf\Fpdf\Fpdf;

use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use DNS2D;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use \Carbon\Carbon;

class TestingController extends Controller
{
    function __construct(
        DuitkuController $duitkuPayment
    ){
        $this->duitkuPayment = $duitkuPayment;
    }

    public function testing1()
    {
        $data['amount'] = 10000;
        $data['payment_method'] = 'BT';
        $data['email'] = 'rioanugrah999@gmail.com';
        $data['phone_number'] = '082233684670';
        $data['product'] = 'Open Trip Bromo';
        $data['customer_name'] = 'Rio Anugrah';
        $data['url_callback'] = '-';
        $data['url_return'] = route('frontend.index');

        $data['first_name'] = 'Rio';
        $data['last_name'] = 'Anugrah';
        $data['address'] = '-';
        $data['city'] = 'Malang';
        $data['postal_code'] = '65123';

        $payment = $this->duitkuPayment->store($data);

        return $payment;
    }

    public function testingEtiket()
    {
        $pdf = Pdf::loadView('backend.testing.test');
        $customPaper = array(0, 0, 151.3701, 439.3701);
        $pdf->setPaper($customPaper, 'landscape');
        $pdf->setOptions(['isRemoteEnabled' => true]);

        return $pdf->stream();
    }

    public function testingEtiket2()
    {
        // $pdf = new Fpdi('L','cm',[15,5.34]);
        // $pdf->AddPage();

        // $pdf->setSourceFile(public_path('backend/etiket/etiketplesiran.pdf'));
        // $tplId = $pdf->importPage(1);
        // $size = $pdf->getTemplateSize($tplId);
        // $pdf->useTemplate($tplId, 0, 0, 15);
        // $pdf->SetMargins(0, 0, 0, 0);

        // return $pdf->Output();

        $pdf = new Fpdi('L','cm',[22.5,8.01]);
        // $pdf = new Fpdf();

        $inv = Carbon::now()->format('Ymd').rand(1000,9999);
        for ($i=1; $i<=3; $i++) {
            $pdf->AddPage();
            $pdf->SetMargins(0, 0, 0, 0);

            $x = 0; // Posisi X (mm)
            $y = 0; // Posisi Y (mm)
            $width = 22.5; // Lebar gambar (mm),
            $imagePath = public_path('backend/etiket/etiketplesiran.jpg');
            $pdf->Image($imagePath, $x, $y, $width);

            // $pdf->setSourceFile(public_path('backend/etiket/etiketplesiran.pdf'));
            // $tplId = $pdf->importPage(1);
            // $size = $pdf->getTemplateSize($tplId);
            // $pdf->useTemplate($tplId, 0, 0, 22.5);
            // $pdf->SetMargins(0, 0, 0, 0);

            // lembar 1
            $pdf->SetTextColor(255, 186, 2);
            // // $pdf->SetXY($x + 9.5, $y + 0.5);
            $pdf->SetXY($x+12.5, $y+0.8);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Cell(0, 0, '#'.$inv.'-'.$i);

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x+11, $y+3);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Write(0,'Open Trip Bromo');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x+11, $y+6);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Write(0, 'Tanggal Pembelian : '.Carbon::now()->format('Y-m-d H:i'));

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x + 0.8, $y + 3.6);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write(0, 'E-TIKET');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x + 0.8, $y + 4.4);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write(0, '2512');

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetXY($x + 0.8, $y + 5.1);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write(0, '2025');

            $noBarcode = $inv;
            $fileName = $noBarcode.'.png';
            $tempPath = public_path('backend/etiket/'.$fileName);
            // $tempPath = public_path('backend/etiket/'.time().'.png');;

            // Ensure the directory exists
            if (!\File::exists(public_path('backend/etiket/'))) {
                \File::makeDirectory(public_path('backend/etiket/'));
            }

            QrCode::format('png')
                ->backgroundColor(255, 186, 2)
                // ->color(255, 0, 0)
                ->generate($noBarcode, $tempPath);

            // response()->download($tempPath, $fileName, [
            //     'Content-Type' => 'image/png',
            // ]);

            $pdf->Image($tempPath, $x+15.5, $y+3.3, 2);

            // lembar 2
            $pdf->SetTextColor(255, 186, 2);
            $pdf->SetXY($x+19, $y+0.8);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Write(0,'#'.$inv.'-'.$i);

            $pdf->SetTextColor(255, 186, 2);
            $pdf->SetXY($x+19.35, $y+1.25);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(0, 0, Carbon::now()->format('Y-m-d H:i'));

            $pdf->SetTextColor(255, 186, 2);
            $pdf->SetXY($x+19, $y+2.5);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Write(0,'Destinasi');

            $pdf->SetTextColor(255, 186, 2);
            $pdf->SetXY($x+19, $y+3);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Write(0,'Open Trip Bromo');

            $pdf->Image($tempPath, $x+19.5, $y+3.7, 2);

        }


        // Output the PDF to the browser
        $pdf->Output('I', 'document.pdf'); // 'D' forces download
        unlink($tempPath);
        exit;

    }

    public function saveAndDownload()
    {
        $data = 'https://example.com';
        $fileName = 'my-saved-qr-code-' . time() . '.png';
        $path = public_path('backend/etiket/' . $fileName);

        // Ensure the directory exists
        if (!\File::exists(public_path('backend/etiket/'))) {
            \File::makeDirectory(public_path('backend/etiket/'));
        }

        // Save the file to disk
        QrCode::format('png')->generate($data, $path);

        // Return a download response for the saved file
        return response()->download($path, $fileName, [
            'Content-Type' => 'image/png',
        ]);
    }
}
