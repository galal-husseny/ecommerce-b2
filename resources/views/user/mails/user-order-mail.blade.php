<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .products th td {
            border-bottom: 1px solid #ddd;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <h1>Invoice</h1><br><br>

    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="" alt="Company logo" style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                                Order #: 123<br />
                                Created: January 1, 2015<br />
                                Due: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <p>
                                    website name.
                                </p>
                                <p>
                                    website address
                                </p>
                                <p>
                                    website mail
                                </p>
                            </td>

                            <td>
                                <p>
                                    Billed to:
                                </p>
                                <p>
                                    {{$userMailData->getUserName()}}
                                </p>
                                <p>
                                    user address
                                </p>
                                <p>
                                    user email
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Payment Method:</td>
                <td>COD</td>
            </tr>
        </table>
        <br /><br />
        <h3 style="text-align: start;">Details</h3>
        <table class="products">
            <thead>
                <tr class="heading">
                    <th style="text-align: center;"> Code </th>
                    <th style="text-align: center;"> Product name </th>
                    <th style="text-align: center;"> Quantity </th>
                    <th style="text-align: center;"> Price </th>
                    <th style="text-align: center;"> Total </th>
                </tr>
            </thead>

            <tbody>
                <tr class="item">
                    <td style="text-align: center;"> Code </td>
                    <td style="text-align: center;">
                        <p>product name</p>
                    </td>
                    <td style="text-align: center;">
                        <p>
                            quantity
                        </p>
                    </td>
                    <td style="text-align: center;">
                        <p>product price</p>
                    </td>
                    <td style="text-align: center;">
                        <p>
                            product subtotal
                        </p>
                    </td>
                </tr>
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Sub Total</th>
                    <td style="text-align: center;">subtotal</td>
                </tr class="total">
                <!-- end tr -->
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Coupon applied :</th>
                    <td style="text-align: center;">coupon code</td>
                </tr>
                <!-- end tr -->
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Discount :</th>
                    <td style="text-align: center;">- discount value</td>
                </tr>

                <!-- end tr -->
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Shipping Charge :</th>
                    <td style="text-align: center;">shipping value </td>
                </tr>
                <!-- end tr -->
                <tr class="total">
                    <td colspan="4"> </td>
                    <th>Total</th>
                    <td style="text-align: center;">total </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
