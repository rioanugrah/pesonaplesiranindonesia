{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran - Bootstrap</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style type="text/css">
        /*Basics*/
        body {
            margin: 0px !important;
            padding: 0px !important;
            display: block !important;
            min-width: 100% !important;
            width: 100% !important;
            -webkit-text-size-adjust: none;
        }

        table {
            border-spacing: 0;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        table td {
            border-collapse: collapse;
            mso-line-height-rule: exactly;
        }

        td img {
            -ms-interpolation-mode: bicubic;
            width: auto;
            max-width: auto;
            height: auto;
            margin: auto;
            display: block !important;
            border: 0px;
        }

        td p {
            margin: 0;
            padding: 0;
        }

        td div {
            margin: 0;
            padding: 0;
        }

        td a {
            text-decoration: none;
            color: inherit;
        }

        /*Outlook*/
        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: inherit;
        }

        .ReadMsgBody {
            width: 100%;
            background-color: #ffffff;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /*Gmail blue links*/
        u+#body a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
        }

        /*Buttons fix*/
        .undoreset a,
        .undoreset a:hover {
            text-decoration: none !important;
        }

        .yshortcuts a {
            border-bottom: none !important;
        }

        .ios-footer a {
            color: #aaaaaa !important;
            text-decoration: none;
        }

        /*Responsive*/
        @media screen and (max-width: 639px) {
            table.row {
                width: 100% !important;
                max-width: 100% !important;
            }

            td.row {
                width: 100% !important;
                max-width: 100% !important;
            }

            .img-responsive img {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin: auto;
            }

            .center-float {
                float: none !important;
                margin: auto !important;
            }

            .center-text {
                text-align: center !important;
            }

            .container-padding {
                width: 100% !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .container-padding10 {
                width: 100% !important;
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .container-padding25 {
                width: 100% !important;
                padding-left: 25px !important;
                padding-right: 25px !important;
            }

            .hide-mobile {
                display: none !important;
            }

            .menu-container {
                text-align: center !important;
            }

            .autoheight {
                height: auto !important;
            }

            .m-padding-10 {
                margin: 10px 0 !important;
            }

            .m-padding-15 {
                margin: 15px 0 !important;
            }

            .m-padding-20 {
                margin: 20px 0 !important;
            }

            .m-padding-30 {
                margin: 30px 0 !important;
            }

            .m-padding-40 {
                margin: 40px 0 !important;
            }

            .m-padding-50 {
                margin: 50px 0 !important;
            }

            .m-padding-60 {
                margin: 60px 0 !important;
            }

            .m-padding-top10 {
                margin: 30px 0 0 0 !important;
            }

            .m-padding-top15 {
                margin: 15px 0 0 0 !important;
            }

            .m-padding-top20 {
                margin: 20px 0 0 0 !important;
            }

            .m-padding-top30 {
                margin: 30px 0 0 0 !important;
            }

            .m-padding-top40 {
                margin: 40px 0 0 0 !important;
            }

            .m-padding-top50 {
                margin: 50px 0 0 0 !important;
            }

            .m-padding-top60 {
                margin: 60px 0 0 0 !important;
            }

            .m-height10 {
                font-size: 10px !important;
                line-height: 10px !important;
                height: 10px !important;
            }

            .m-height15 {
                font-size: 15px !important;
                line-height: 15px !important;
                height: 15px !important;
            }

            .m-height20 {
                font-size: 20px !important;
                line-height: 20px !important;
                height: 20px !important;
            }

            .m-height25 {
                font-size: 25px !important;
                line-height: 25px !important;
                height: 25px !important;
            }

            .m-height30 {
                font-size: 30px !important;
                line-height: 30px !important;
                height: 30px !important;
            }

            .rwd-on-mobile {
                display: inline-block !important;
                padding: 5px !important;
            }

            .center-on-mobile {
                text-align: center !important;
            }
        }
    </style>
</head>

<body>
    <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%"
        style="width:100%;max-width:100%;">
        <tr>
            <td align="center" Simpli bgcolor="#F0F0F0" data-composer>
                <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                    class="row container-padding" width="640" style="width:640px;max-width:640px;" Simpli>

                    <tr>
                        <td height="20" style="font-size:20px;line-height:20px;" Simpli>&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="30" style="font-size:30px;line-height:30px;" Simpli>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" class="center-text">
                            <img style="width:180px;border:0px;display: inline!important;"
                                src="{{ asset('frontend/assets/img/logo/logo_plesiran_black.webp') }}" width="180"
                                border="0" editable="true" Simpli data-image-edit Simpli alt="logo">
                        </td>
                    </tr>
                    <tr>
                        <td height="30" style="font-size:30px;line-height:30px;" Simpli>&nbsp;</td>
                    </tr>

                </table>

                <table border="0" align="center" cellpadding="0" cellspacing="0" class="row" role="presentation"
                    width="640" style="width:640px;max-width:640px;" Simpli>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" cellpadding="0" cellspacing="0"
                                role="presentation" class="row container-padding25" width="600"
                                style="width:600px;max-width:600px;">

                                <tr>
                                    <td align="center" Simpli bgcolor="#FFFFFF"
                                        style="border-radius:0 0 36px 36px; border-bottom:solid 6px #DDDDDD;">

                                        <table border="0" align="center" cellpadding="0" cellspacing="0"
                                            role="presentation" class="row container-padding" width="520"
                                            style="width:520px;max-width:520px;">
                                            <tr>
                                                <td class="center-text" Simpli align="center"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:12px;line-height:24px;font-weight:900;font-style:normal;color:#ff9019;text-decoration:none;letter-spacing:2px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            Hallo, ....
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="center"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:48px;line-height:54px;font-weight:700;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli style="font-size: 14pt">
                                                            Terima kasih atas pesanan Anda!
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="center"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;font-weight:300;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            Kami akan mengirimkan informasi pelacakan segera setelah
                                                            pesanan Anda dikirimkan.
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="25" style="font-size:25px;line-height:25px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">

                                                    <table border="0" cellspacing="0" cellpadding="0"
                                                        role="presentation" align="center" class="row"
                                                        width="480" style="width:480px;max-width:480px;">
                                                        <tr>
                                                            <td align="center" Simpli bgcolor="#ff9019"
                                                                style="border-radius: 10px;">

                                                                <table border="0" cellspacing="0" cellpadding="0"
                                                                    role="presentation" align="center" class="row"
                                                                    width="480"
                                                                    style="width:480px;max-width:480px;">
                                                                    <tr>
                                                                        <td height="20"
                                                                            style="font-size:20px;line-height:20px;">
                                                                            &nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center-text" Simpli align="center"
                                                                            style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:22px;line-height:26px;font-weight:400;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">
                                                                            <singleline>
                                                                                <div mc:edit Simpli>
                                                                                    ORDER: <strong
                                                                                        style="color:#FFFFFF;">WR#5TB5@QXZ</strong>
                                                                                </div>
                                                                            </singleline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20"
                                                                            style="font-size:20px;line-height:20px;">
                                                                            &nbsp;</td>
                                                                    </tr>
                                                                </table>

                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="center">

                                                    <table border="0" align="center" cellpadding="0"
                                                        cellspacing="0" role="presentation" class="row"
                                                        width="480" style="width:480px;max-width:480px;">
                                                        <tr>
                                                            <td height="20"
                                                                style="font-size:20px;line-height:20px;" Simpli>&nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">
                                                                <table border="0" align="left" cellpadding="0"
                                                                    cellspacing="0" role="presentation"
                                                                    class="row" width="235"
                                                                    style="width:235px;max-width:235px;">
                                                                    <tr>
                                                                        <td class="center-text" Simpli align="left"
                                                                            style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:24px;font-weight:700;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                                            <singleline>
                                                                                <div mc:edit Simpli>
                                                                                    Rincian Penerima
                                                                                </div>
                                                                            </singleline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="10"
                                                                            style="font-size:10px;line-height:10px;"
                                                                            Simpli>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center-text" Simpli align="left"
                                                                            style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:20px;font-weight:400;font-style:normal;color:#666666;text-decoration:none;letter-spacing:0px;">
                                                                            <singleline>
                                                                                <div mc:edit Simpli>
                                                                                    {{ $billing['first_name'].' '.$billing['last_name'] }} <br>
                                                                                    {{ $billing['email'] }} <br>
                                                                                    {{ $billing['phone'] }}
                                                                                </div>
                                                                            </singleline>
                                                                        </td>
                                                                    </tr>
                                                                </table>



                                                                <table border="0" align="right" cellpadding="0"
                                                                    cellspacing="0" role="presentation"
                                                                    class="row m-padding-top20" width="235"
                                                                    style="width:235px;max-width:235px;">
                                                                    <tr>
                                                                        <td class="center-text" Simpli align="left"
                                                                            style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:24px;font-weight:700;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                                            <singleline>
                                                                                <div mc:edit Simpli>
                                                                                    Tanggal Pembelian
                                                                                </div>
                                                                            </singleline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="10"
                                                                            style="font-size:10px;line-height:10px;"
                                                                            Simpli>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center-text" Simpli align="left"
                                                                            style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:20px;font-weight:400;font-style:normal;color:#666666;text-decoration:none;letter-spacing:0px;">
                                                                            <singleline>
                                                                                <div mc:edit Simpli>
                                                                                    02/26/21 – 02/28/21
                                                                                </div>
                                                                            </singleline>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="10"
                                                                style="font-size:10px;line-height:10px;" Simpli>&nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="40" style="font-size:40px;line-height:40px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>

                            </table>

                            <table border="0" align="center" cellpadding="0" cellspacing="0"
                                role="presentation" class="row container-padding25" width="600"
                                style="width:600px;max-width:600px;" Simpli>

                                <tr>
                                    <td height="40" style="font-size:40px;line-height:40px;" Simpli>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="center-text" Simpli align="center"
                                        style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:12px;line-height:24px;font-weight:900;font-style:normal;color:#ff9019;text-decoration:none;letter-spacing:2px;">
                                        <singleline>
                                            <div mc:edit Simpli>
                                                WHAT'S INSIDE
                                            </div>
                                        </singleline>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="center-text" Simpli align="center"
                                        style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:28px;line-height:34px;font-weight:700;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                        <singleline>
                                            <div mc:edit Simpli>
                                                Your Member
                                            </div>
                                        </singleline>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;" Simpli>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" Simpli bgcolor="#FFFFFF" style="border-radius:36px 36px 0 0;">

                                        <table border="0" align="center" cellpadding="0" cellspacing="0"
                                            role="presentation" class="row container-padding" width="520"
                                            style="width:520px;max-width:520px;">
                                            <tr>
                                                <td height="40" style="font-size:40px;line-height:40px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="left"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:24px;font-weight:700;font-style:normal;color:#ff9019;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            Product Name
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="5" style="font-size:5px;line-height:5px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="left"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;font-weight:400;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            Lorem ipsum dolor sit amet, consec tetur adipisicing elit,
                                                            sed do eiusmod tempor ut labore et dolore.
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="10" style="font-size:10px;line-height:10px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="left"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;font-weight:400;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            <strong>Color:</strong> white
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="left"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;font-weight:400;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            <strong>Qty:</strong> 1
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="left"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;font-weight:400;font-style:normal;color:#333333;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            <strong>Price:</strong> $199.99
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="font-size:20px;line-height:20px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>

                            </table>

                            <table border="0" align="center" cellpadding="0" cellspacing="0"
                                role="presentation" class="row container-padding25" width="600"
                                style="width:600px;max-width:600px;" Simpli>

                                <tr>
                                    <td align="center" Simpli bgcolor="#FFFFFF"
                                        style="border-radius:0 0 36px 36px; border-bottom:solid 6px #DDDDDD;">

                                        <table border="0" align="center" cellpadding="0" cellspacing="0"
                                            role="presentation" class="row container-padding" width="520"
                                            style="width:520px;max-width:520px;">
                                            <tr>
                                                <td height="15"
                                                    style="border-bottom: 4px dotted #E4E4E4;font-size:15px;line-height:15px;">
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">


                                                    <table border="0" align="left" cellpadding="0"
                                                        cellspacing="0" role="presentation" width="100%"
                                                        style="width:100%;max-width:100%;">
                                                        <tr>
                                                            <td>


                                                                <table border="0" align="left" cellpadding="0"
                                                                    cellspacing="0" role="presentation"
                                                                    class="row" width="240"
                                                                    style="width:240px;max-width:240px;">
                                                                    <tr>
                                                                        <td class="center-text" Simpli align="left"
                                                                            style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:24px;font-weight:700;font-style:normal;color:#00000c;text-decoration:none;letter-spacing:0px;">
                                                                            <singleline>
                                                                                <div mc:edit Simpli>
                                                                                    Metode Pembayaran
                                                                                </div>
                                                                            </singleline>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="center-text" Simpli align="left"
                                                                            style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:16px;line-height:40px;font-weight:400;font-style:normal;color:#666666;text-decoration:none;letter-spacing:0px;">
                                                                            <singleline>
                                                                                <div mc:edit Simpli>
                                                                                    Mastercard ending in 4097
                                                                                </div>
                                                                            </singleline>
                                                                        </td>
                                                                    </tr>
                                                                </table>



                                                                <table border="0" align="left" cellpadding="0"
                                                                    cellspacing="0" role="presentation"
                                                                    class="row" width="30"
                                                                    style="width:30px;max-width:30px;">
                                                                    <tr>
                                                                        <td height="30"
                                                                            style="font-size:30px;line-height:30px;">
                                                                            &nbsp;</td>
                                                                    </tr>
                                                                </table>



                                                                <table border="0" align="left" cellpadding="0"
                                                                    cellspacing="0" role="presentation"
                                                                    class="row m-padding-top20" width="250"
                                                                    style="width:250px;max-width:250px;">
                                                                    <tr>
                                                                        <td align="center">

                                                                            <table border="0" align="right"
                                                                                cellpadding="0" cellspacing="0"
                                                                                role="presentation"
                                                                                class="center-float">
                                                                                <tr>
                                                                                    <td align="center">


                                                                                        <table border="0"
                                                                                            align="left"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            role="presentation"
                                                                                            width="100"
                                                                                            style="width:100px;max-width:100px;">
                                                                                            <tr>
                                                                                                <td Simpli
                                                                                                    align="right"
                                                                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:30px;font-weight:700;font-style:normal;color:#00000c;text-decoration:none;letter-spacing:0px;">
                                                                                                    <singleline>
                                                                                                        <div mc:edit
                                                                                                            Simpli>
                                                                                                            Subtotal:
                                                                                                        </div>
                                                                                                    </singleline>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td Simpli
                                                                                                    align="right"
                                                                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:30px;font-weight:700;font-style:normal;color:#00000c;text-decoration:none;letter-spacing:0px;">
                                                                                                    <singleline>
                                                                                                        <div mc:edit
                                                                                                            Simpli>
                                                                                                            Tax:
                                                                                                        </div>
                                                                                                    </singleline>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>



                                                                                        <table border="0"
                                                                                            align="left"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            role="presentation"
                                                                                            width="20"
                                                                                            style="width:20px;max-width:20px;">
                                                                                            <tr>
                                                                                                <td height="20"
                                                                                                    style="font-size:20px;line-height:20px;">
                                                                                                    &nbsp;</td>
                                                                                            </tr>
                                                                                        </table>



                                                                                        <table border="0"
                                                                                            align="left"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            role="presentation"
                                                                                            width="70"
                                                                                            style="width:70px;max-width:70px;">
                                                                                            <tr>
                                                                                                <td Simpli
                                                                                                    align="left"
                                                                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:30px;font-weight:400;font-style:normal;color:#00000c;text-decoration:none;letter-spacing:0px;">
                                                                                                    <singleline>
                                                                                                        <div mc:edit
                                                                                                            Simpli>
                                                                                                            Rp.
                                                                                                            1.500.000
                                                                                                        </div>
                                                                                                    </singleline>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td Simpli
                                                                                                    align="left"
                                                                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:20px;line-height:30px;font-weight:400;font-style:normal;color:#00000c;text-decoration:none;letter-spacing:0px;">
                                                                                                    <singleline>
                                                                                                        <div mc:edit
                                                                                                            Simpli>
                                                                                                            $96.00
                                                                                                        </div>
                                                                                                    </singleline>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>


                                                                                    </td>
                                                                                </tr>
                                                                            </table>

                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="20"
                                                                style="font-size:20px;line-height:20px;">&nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>


                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">

                                                    <table border="0" align="center" cellpadding="0"
                                                        cellspacing="0" role="presentation" class="row"
                                                        width="520" style="width:520px;max-width:520px;">
                                                        <tr>
                                                            <td align="center" height="80" Simpli
                                                                style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:24px;line-height:32px;font-weight:700;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;height:80px;border-radius: 80px;"
                                                                bgcolor="#ff9019">
                                                                <singleline>
                                                                    <div mc:edit Simpli>
                                                                        TOTAL: Rp. 1.500.000
                                                                    </div>
                                                                </singleline>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="font-size:20px;line-height:20px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>

                            </table>

                            <table border="0" align="center" cellpadding="0" cellspacing="0"
                                role="presentation" width="100%" style="width:100%;max-width:100%;" Simpli>

                                <tr>
                                    <td align="center">


                                        <table border="0" align="center" cellpadding="0" cellspacing="0"
                                            role="presentation" class="row container-padding" width="520"
                                            style="width:520px;max-width:520px;">
                                            <tr>
                                                <td height="50" style="font-size:50px;line-height:50px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td class="center-text" Simpli align="center"
                                                    style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:24px;line-height:32px;font-weight:400;font-style:normal;color:#999999;text-decoration:none;letter-spacing:0px;">
                                                    <singleline>
                                                        <div mc:edit Simpli>
                                                            Connect with us <strong>#pesonaplesiranindonesia</strong>
                                                        </div>
                                                    </singleline>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="font-size:20px;line-height:20px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td height="26"
                                                    style="border-bottom: 4px dotted #E4E4E4;font-size:26px;line-height:26px;">
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table border="0" align="center" cellpadding="0"
                                                        cellspacing="0" role="presentation" class="row"
                                                        width="480" style="width:480px;max-width:480px;">
                                                        <tr>
                                                            <td class="center-text" Simpli align="center"
                                                                style="font-family:'Catamaran',Arial,Helvetica,sans-serif;font-size:14px;line-height:24px;font-weight:480;font-style:normal;color:#666666;text-decoration:none;letter-spacing:0px;">
                                                                <multiline>
                                                                    <div mc:edit Simpli>
                                                                        {{ date('Y') }} CV. Pesona Plesiran Indonesia.
                                                                        All Rights Reserved.<br>
                                                                    </div>
                                                                </multiline>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="center-text">
                                                    <img style="width:120px;border:0px;display: inline!important;"
                                                        src="{{ asset('frontend/assets/img/logo/logo_plesiran_black.webp') }}"
                                                        width="120" border="0" editable="true" Simpli
                                                        data-image-edit Simpli alt="logo">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="50" style="font-size:50px;line-height:50px;" Simpli>
                                                    &nbsp;</td>
                                            </tr>
                                        </table>


                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>
