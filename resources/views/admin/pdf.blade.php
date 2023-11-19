<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Factura</title>
    <style>
        body {
            width: 15cm;
            height: 21cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            border-bottom: 1px solid #AAAAAA;
            padding-bottom: 10px;
            text-align: center;
        }

        #logo img {
            max-width: 100px;
            max-height: 100px;
        }

        #company {
            margin-top: 10px;
            text-align: center;
        }

        #company h2 {
            margin: 0;
        }

        #company div {
            margin-bottom: 5px;
        }

        main {
            margin-top: 20px;
        }

        #details {
            margin-bottom: 20px;
            text-align: center;
        }

        #client {
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
            border-radius: 10px;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
            border-radius: 10px;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;
        }

        #thanks {
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
        }

        #notices {
            margin-top: 50px;
            text-align: center;
        }

        #notices div {
            margin-bottom: 10px;
        }

        #notices .notice {
            background: #F6F8FA;
            padding: 10px;
            border-radius: 5px;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>

<body>
    <header>
        
        <div id="company">
            <h2 class="name">Antojitos del Mar</h2>
            <div>playa chica - carabeLy | AREQUIPA</div>
            <div>
                901064562 - 01456321
            </div>
            <div>
                <a href="mailto:antojitos@gmail.com">antojitos@gmail.com</a>
            </div>
        </div>
    </header>
    <main>
        <div id="details">
            <h2>Detalles de la Factura</h2>
        </div>
        <div id="client">
            <h2>Información del Cliente</h2>
            <div>
                <strong>Cliente:</strong> {{$order->name}}
            </div>
            <div>
                <strong>Dirección:</strong> {{$order->address}}
            </div>
            <div>
                <strong>Teléfono:</strong> {{$order->phone}}
            </div>
            <div>
                <strong>Email:</strong> <a href="mailto:{{$order->email}}">{{$order->email}}</a>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">DESCRIPCIÓN</th>
                    <th class="unit">PRECIO UNITARIO</th>
                    <th class="qty">CANTIDAD</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">01</td>
                    <td class="desc">
                        <h3>{{$order->product_title}}</h3>Delicioso plato marino con un toque de limón y sal, imposible de resistir. Solo en Antojitos del Mar.
                    </td>
                    <td class="unit">S/.{{ $order->price / $order->quantity }}</td>
                    <td class="qty">{{$order->quantity}}</td>
                    <td class="total">S/.{{$order->price}}</td>
                </tr>
            </tbody>
            <tfoot>
                <br>
           
               
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2"> TOTAL</td>
                    <td>S/.{{$order->price}}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">{{$order->payment_status}}</div>
        <div id="notices">
            <h2>Noticias</h2>
            <div class="notice">Se aplicará un cargo financiero del 1,5% sobre los saldos impagos después de 30 días.</div>
        </div>
    </main>
    <footer>
        La factura se creó en una computadora y es válida sin firma ni sello.
    </footer>
</body>

</html>
