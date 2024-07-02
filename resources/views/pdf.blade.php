<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <style>
        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }

        table {
            width: 100%;
            border-spacing: 2px;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.products tr {
            background-color: rgb(96 165 250);
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);
            border-top: none;
            /* Remove top border for all table rows */
            text-align: center;
            border-spacing: 0;
        }

        table tr.items td {
            padding: 0.5rem;
        }

        .total {
            margin-top: 1rem;
            font-size: 0.875rem;
            text-align: center;
        }

        .row {
            display: flex;
            /* Enable flexbox for row layout */
        }

        .col-left {
            float: left;
            width: 85%;
            /* Adjust width as needed */
        }

        .col-right {
            float: right !important;
            width: 15%;
            /* Adjust width as needed */
        }

        .noborder {
            border: none;
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="https://assets.99static.com/logos/en/wordmark_grey.svg" alt="logo" width="100" />
            </td>
        </tr>
    </table>
    <div><h1>Report</h1></div>
    <h2>Transfer ID: {{ sprintf("%06d", $data->id) }}</h2>
    @php $total = 0; @endphp

    <div class="margin-top">
        <table class="products">
            <tr>
                <th width="10%">No</th>
                <th width="70%">Requesting Description</th>
                <th width="10%">Qty</th>
                <th width="10%">Cost</th>
            </tr>
            @foreach($data->products as $key => $item)
            <tr class="items">
            @php $total += $item->cost; @endphp
                <td width="10%">{{ $key+1 }}</td>
                <td width="70%">{{ $item->desc }}</td>
                <td width="10%">{{ $item->qty }}</td>
                <td width="10%">{{ $item->cost }}</td>
            </tr>

            @endforeach
            <tr class="total">
                <td width="10%" colspan="2" class="noborder"></td>
                <td width="10%">Total:</td>
                <td width="10%">{{$total}}$</td>
            </tr>
        </table>
    </div>

    <br><br>

    <div class="row">
        <div class="col-left">
            <div>Requesting name</div>
            <div>{{ $data->requestor ? $data->requestor->name : "Name" }}</div>
            <div><img src="{{ asset('signatures/requestor.png') }}" alt="requestor" width="70"/></div>

        </div>
        <div class="col-right">
            <div>Approval name</div>
            <div>{{ $data->approval ? $data->approval->name : "Name" }}</div>
            <div><img src="{{ asset('signatures/ceo.png') }}" alt="approval" width="70"/></div>
        </div>
    </div>

    <!-- <div class="footer margin-top">
        <div>&copy; Carlos, IT</div>
    </div> -->
</body>

</html>