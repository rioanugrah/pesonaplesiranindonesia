<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use \Carbon\Carbon;

use setasign\Fpdi\Fpdi;

class TransactionController extends Controller
{
    function __construct(
        Payment $payment
    )
    {
        $this->payment = $payment;
    }

    public function index()
    {
        $data['payments'] = $this->payment->orderBy('created_at','desc')->paginate(10);
        $data['totalDay'] = $this->payment->where('payment_date','LIKE','%'.Carbon::today()->format('Y-m-d').'%')->where('status','Success')->sum('amount');

        $now = Carbon::now();
        // $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        // $weekEndtDate = $now->endOfWeek()->format('Y-m-d');

        // $data['totalWeek'] = $this->payment->whereYear('payment_date',$weekStartDate)
        //                                     ->where('payment_date','>=',$weekStartDate)
        //                                     ->where('payment_date','<=',$weekEndtDate)
        //                                     ->where('status','Success')
        //                                     ->sum('amount');
        // $data['totalWeek'] = $this->payment->whereBetween('payment_date',[$weekStartDate,$weekEndtDate])->where('status','Success')->sum('amount');

        $monthStartDate = $now->startOfMonth()->format('Y-m-d');
        $monthEndtDate = $now->endOfMonth()->format('Y-m-d');

        $data['totalMonth'] = $this->payment->whereBetween('payment_date',[$monthStartDate,$monthEndtDate])->where('status','Success')->sum('amount');

        // dd($data);
        return view('backend.transactions.index',$data);
    }

    function NbLines($w, $txt)
    {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) {
            $w = $this->w - $this->rMargin - $this->x;
        }
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") {
            $nb--;
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ') {
                $sep = $i;
            }
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) {
                        $i++;
                    }
                } else {
                    $i = $sep + 1;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else {
                $i++;
            }
        }
        return $nl;
    }

    public function testing()
    {
        // dd(public_path('testing/InvoiceTesting.pdf'));
        $pdf = new Fpdi();

        $pdf->AddPage();

        $pdf->setSourceFile(public_path('testing/InvoiceTesting.pdf'));
        $tplId = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($tplId);
        $pdf->useTemplate($tplId, 0, 0, 205);

        // $pdf->SetFont('Helvetica', '', 12);
        //Invoice To
        $pdf->SetTextColor(92, 154, 67);
        $pdf->SetXY(20, 65);
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->Write(0, 'Rio Anugrah Adam Saputra');

        //Whatsapp
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(20, 80);
        $pdf->Write(0, 'No. Whatsapp');

        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(20, 87);
        $pdf->Write(0, '0813-xxxx-xxxx');

        //Invoice Date
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(130, 80);
        $pdf->Write(0, 'Date');

        $pdf->SetXY(145, 80);
        $pdf->Write(0, ':');

        $pdf->SetXY(150, 80);
        $pdf->Write(0, '01 Agustus 2025');

        //Invoice
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(121, 121, 121);
        // $pdf->SetXY(135, 87);
        // $pdf->Write(0, 'Invoice');

        // $pdf->SetXY(152, 87);
        // $pdf->Write(0, '#20240801-020');
        $pdf->SetXY(114, 87);
        $pdf->MultiCell(70, 0, 'Invoice #20240801-020', 0, 'R');

        //Detail
        $pdf->SetFont('Helvetica', '', 11);

        $dataList = [
            [
                'no' => 1,
                'item' => 'ajskdajksdjkasda',
                'price' => 100000,
                'qty' => 1,
                'total' => 100000
            ],
            [
                'no' => 2,
                'item' => 'Private Trip Bromo - MP Malang',
                'price' => 100000,
                'qty' => 1,
                'total' => 100000
            ],
            [
                'no' => 3,
                'item' => 'ajskdajksdjkasda',
                'price' => 100000,
                'qty' => 1,
                'total' => 100000
            ],
            [
                'no' => 4,
                'item' => 'Private Trip Bromo 05 Agustus 2024 (19 Dewasa, 3 Balita)',
                'price' => 100000,
                'qty' => 2,
                'total' => 100000
            ],
            [
                'no' => 5,
                'item' => 'Private Trip Bromo 05 Agustus 2024 (19 Dewasa, 3 Balita)',
                'price' => 100000,
                'qty' => 2,
                'total' => 100000
            ],
        ];

        // $pdf->SetXY(19, 87);
        // $w = [10, 70, 37, 15, 35];
        // $pdf->Cell($w[0], 7, 'No', 1, 0, 'C', true);
        // $pdf->Cell($w[1], 7, 'Item Description', 1, 0, 'C', true);
        // $pdf->Cell($w[2], 7, 'Price', 1, 0, 'C', true);
        // $pdf->Cell($w[3], 7, 'Qty', 1, 0, 'C', true);
        // $pdf->Cell($w[4], 7, 'Total', 1, 1, 'C', true);

        $total = [];
        foreach ($dataList as $key => $value) {
            $no = $key+1;
            // $pdf->SetTextColor(121, 121, 121);
            // $pdf->SetXY(24, ((106*$no)/15)+97);
            // // $pdf->Write(0, $no);
            // $pdf->MultiCell(70, 6, $no, 0, 'L');
            // $pdf->SetXY(34, ((106*$no)/14)+97);
            // // $pdf->Write(0, $value['item']);
            // $pdf->MultiCell(70, ((6*$no)/10)+3, $value['item'], 0, 'L');

            // $pdf->SetXY(67, ((106*$no)/15)+97);
            // $pdf->MultiCell(70, 6, 'Rp. '.number_format($value['price'],0,',','.'), 0, 'R');

            // $pdf->SetXY(77, ((106*$no)/15)+97);
            // $pdf->MultiCell(70, 6, $value['qty'], 0, 'R');

            // $pdf->SetXY(115, ((106*$no)/15)+97);
            // $pdf->MultiCell(70, 6, 'Rp. '.number_format($value['price']*$value['qty'],0,',','.'), 0, 'R');

            // array_push($total,$value['price']*$value['qty']);

            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $width = 15;

            $pdf->SetTextColor(121, 121, 121);
            $pdf->SetXY($x + $width, $y+18);
            // $pdf->Cell($width-5, 5, $no, 0, 0, "l");
            $pdf->MultiCell($width+55, 5, $no, 0, 'L');
            $pdf->SetXY($x + $width+10, $y+18);
            $pdf->MultiCell($width+55, 5, $value['item'], 0, 'L');
            $pdf->SetXY($x + $width+40, $y+18);
            $pdf->MultiCell($width+55, 5, 'Rp. '.number_format($value['price'],0,',','.'), 0, 'R');
            $pdf->SetXY($x + $width+52, $y+18);
            $pdf->MultiCell($width+55, 5, $value['qty'], 0, 'R');
            $pdf->SetXY($x + $width+88, $y+18);
            $pdf->MultiCell($width+55, 5, 'Rp. '.number_format($value['price']*$value['qty'],0,',','.'), 0, 'R');

            $pdf->Ln(-15);

            array_push($total,$value['price']*$value['qty']);
        }


        //Sub Total
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->SetTextColor(121, 121, 121);

        $pdf->SetXY(115, 170);
        $pdf->Write(0, 'Sub Total');

        $pdf->SetXY(140, 170);
        $pdf->Write(0, ':');

        $pdf->SetXY(150, 170);
        $pdf->Write(0, 'Rp. '.number_format(array_sum($total),0,',','.'));

        //Tax
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->SetTextColor(121, 121, 121);

        $pdf->SetXY(115, 177);
        $pdf->Write(0, 'Tax');

        $pdf->SetXY(140, 177);
        $pdf->Write(0, ':');

        $pdf->SetXY(150, 177);
        $pdf->Write(0, '0%');

        //Total
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->SetTextColor(255, 255, 255);

        $pdf->SetXY(120, 192);
        $pdf->Write(0, 'Total');

        $pdf->SetXY(114, 192);
        $pdf->MultiCell(70, 0, 'Rp. '.number_format(array_sum($total),0,',','.'), 0, 'R');

        //Status
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->SetTextColor(121, 121, 121);

        $pdf->SetXY(115, 205);
        $pdf->Write(0, 'Status');

        $pdf->SetXY(140, 205);
        $pdf->Write(0, ':');

        $pdf->SetTextColor(219, 168, 0);
        $pdf->SetXY(150, 205);
        $pdf->Write(0, 'Waiting Payment');

        return $pdf->Output();
    }

    public function downloadInvoice($id)
    {
        $pdf = new Fpdi();

        $payment = $this->payment->find($id);

        if (empty($payment)) {
            return redirect()->back();
        }

        $pdf->AddPage();
        $pdf->SetTitle('Invoice #'.explode('E-TIKET',$payment->booking->booking_code)[1].'-'.$payment->status);
        $pdf->setSourceFile(public_path('testing/InvoiceTesting.pdf'));
        $tplId = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($tplId);
        $pdf->useTemplate($tplId, 0, 0, 205);

        //Invoice To
        $pdf->SetTextColor(92, 154, 67);
        $pdf->SetXY(20, 65);
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->Write(0, json_decode($payment->payment_billing)->first_name.' '.json_decode($payment->payment_billing)->last_name);

        //Whatsapp
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(20, 80);
        $pdf->Write(0, 'No. Whatsapp');

        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(20, 87);
        $pdf->Write(0, json_decode($payment->payment_billing)->phone);

        //Invoice Date
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(130, 80);
        $pdf->Write(0, 'Date');

        $pdf->SetXY(140, 80);
        $pdf->Write(0, ':');

        $pdf->SetXY(145, 80);
        $pdf->Write(0, \Carbon\Carbon::create($payment->created_at)->isoFormat('DD MMMM YYYY'));

        //Invoice
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(114, 87);
        $pdf->MultiCell(70, 0, 'Invoice #'.explode('E-TIKET',$payment->booking->booking_code)[1], 0, 'R');

        //Detail
        $pdf->SetFont('Helvetica', '', 11);
        // $booking = $payment->booking->select('booking_name as title')->where('payment_id',$payment->id)->first();
        // $bookingDepartureAdult = $payment->booking->bookingDeparture->select('num_of_adult as qty')->where('booking_id',$payment->booking->id)->first();
        // $bookingDepartureChild = $payment->booking->bookingDeparture->select('num_of_child as qty')->where('booking_id',$payment->booking->id)->union($bookingDepartureAdult)->first();
        // $bookingExtras = $payment->booking->bookingExtra->select('booking_extra_name as title, booking_extra_price as price')->where('booking_id',$payment->booking->id)->union($bookingDepartureChild);
        // dd($bookingExtras);
        $pdf->SetTextColor(121, 121, 121);
        $pdf->SetXY(24, 105);
        $pdf->MultiCell(70, 6, 1, 0, 'L');
        $pdf->SetXY(34, 105);
        $text = $payment->booking->booking_name.' Departure Date : '.\Carbon\Carbon::create($payment->booking->bookingDeparture->booking_date)->isoFormat('DD MMMM YYYY').
        ' Adult : '.$payment->booking->bookingDeparture->num_of_adult.
        ' Child : '.$payment->booking->bookingDeparture->num_of_child
        ;
        $pdf->MultiCell(70, 5, $text, 0, 'L');

        $pdf->SetXY(67, 105);
        $pdf->MultiCell(70, 6, 'Rp. '.number_format($payment->booking->total_price,0,',','.'), 0, 'R');

        $pdf->SetXY(77, 105);
        $pdf->MultiCell(70, 6, 1, 0, 'R');

        $pdf->SetXY(115, 105);
        $pdf->MultiCell(70, 6, 'Rp. '.number_format($payment->booking->total_price*1,0,',','.'), 0, 'R');

        //Sub Total
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->SetTextColor(121, 121, 121);

        $pdf->SetXY(115, 170);
        $pdf->Write(0, 'Sub Total');

        $pdf->SetXY(140, 170);
        $pdf->Write(0, ':');

        $pdf->SetXY(150, 170);
        $pdf->Write(0, 'Rp. '.number_format($payment->booking->total_price*1,0,',','.'));

        //Tax
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->SetTextColor(121, 121, 121);

        $pdf->SetXY(115, 177);
        $pdf->Write(0, 'Tax');

        $pdf->SetXY(140, 177);
        $pdf->Write(0, ':');

        $pdf->SetXY(150, 177);
        $pdf->Write(0, '0%');

        //Total
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->SetTextColor(255, 255, 255);

        $pdf->SetXY(120, 192);
        $pdf->Write(0, 'Total');

        $pdf->SetXY(114, 192);
        $pdf->MultiCell(70, 0, 'Rp. '.number_format($payment->booking->total_price*1,0,',','.'), 0, 'R');

        //Status
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->SetTextColor(121, 121, 121);

        $pdf->SetXY(115, 205);
        $pdf->Write(0, 'Status');

        $pdf->SetXY(140, 205);
        $pdf->Write(0, ':');

        switch ($payment->status) {
            case 'Pending':
                $pdf->SetTextColor(219, 168, 0);
                $pdf->SetXY(150, 205);
                $pdf->Write(0, 'Waiting Payment');
                break;
            case 'Success':
                $pdf->SetTextColor(92, 154, 67);
                $pdf->SetXY(150, 205);
                $pdf->Write(0, 'PAID');
                break;
            case 'Failed':
                $pdf->SetTextColor(255, 49, 49);
                $pdf->SetXY(150, 205);
                $pdf->Write(0, 'DENIED');
                break;

            default:
                # code...
                break;
        }

        return $pdf->Output('Invoice #'.explode('E-TIKET',$payment->booking->booking_code)[1].'.pdf','D');
    }
}
