<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>

<style>
    table {
        border-collapse: collapse;
        text-align: center;

    }

    table, th, td {
        border: 1px solid black;
    }

    body {
        font-family: DejaVu Sans;
        font-size: 12px;
    }
</style>

<div class="invoice">

    <div class="date" style="float: right;">
        <p>Data transakcji: {{ $tr->tr_date }}</p>
    </div>

    <div class="head" style="text-align: center; padding-top: 60px;">
        <p>Faktura VAT</p>
        <p style="font-weight: 700;"> {{ $tr->tr_id }}</p>
    </div>

    <div class="user-data" style="padding-top: 20px;">
        <div class="sell" style="float: left; padding-left: 50px;">
            <ul style="list-style-type: none;">
                <li>
                    <h3 style="font-size: 14px; font-weight: 600;">Sprzedawca:</h3>
                </li>
                <li>
                    SOWIT Hubert Mrozek
                </li>
                <li>
                    3-maja 25
                </li>
                <li>
                    37-555 Sośnica
                </li>
                <li>
                    NIP: 7922298371
                </li>
            </ul>
        </div>
        <div class="buy" style="float: right; padding-right: 80px;">
            <ul style="list-style-type: none;">
                <li>
                    <h3 style="font-size: 14px; font-weight: 600;">Nabywca:</h3>
                </li>
                <li>
                    {{ $user->company_name }}
                </li>
                <li>
                   Adres: {{ $user->address }}
                </li>

                <li>
                    NIP: {{ $user->nip }}
                </li>
            </ul>
        </div>
    </div>


    <div class="table" style="padding-top: 210px;">
        <table class="table table-bordered" style="width: 100%;">
            <thead>
            <tr>
                <th>Nazwa produktu</th>
                <th>Ilo&#x015B;ć</th>
                <th>Cana jednostki brutto</th>
                <th>Wartość netto</th>
                <th>Stawka VAT</th>
                <th>Wartość VAT</th>
                <th>Wartość brutto</th>
            </tr>
            </thead>
            <tr>
                <td>
                    Prenumerata usługi HR
                </td>
                <td>
                    1
                </td>
                <td>
                    {{ $price }} zł
                </td>
                <td>
                    {{ $price*0.81 }} zł
                </td>
                <td>
                    19%
                </td>
                <td>
                    {{ $price*0.19 }} zł
                </td>
                <td>
                    {{ $price }} zł
                </td>
            </tr>
        </table>
    </div>

    <div class="table" style="padding-top: 30px;">
        <table style="width: 100%;">
            <tr>
                <td>
                    Namlżność: @if($tr->tr_status == 1)
                                   Zapłacona
                                @else
                                    Niezapłacona
                                @endif
                </td>
                <td style="height: 40px;">
                    Do zapłaty: {{ $price }} zł
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>

