<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Section Dc</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
            border-collapse: collapse;
        }

        th, td {
            border: solid 1px rgba(161, 161, 161, 0.9);
            border-collapse: collapse;
            padding: 2px;
            /*margin: 2px;*/
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        thead tr td {
            font-weight: bold;
        }

        .logoLeft {
            position: fixed;
            margin-top: 10px;
            margin-left: 20px;
            height: 80px !important;
            Width: auto !important;
        }

        .companyname {
            position: fixed;
            margin-top: 2px;
            margin-left: 20px;
            /*font-weight: 400;*/
            /*font-size: 36px;*/
            /*font-size: x-large;*/
            font-size: 30px;
            text-align: center;
            text-transform: uppercase;
            height: 35px;
        }

        .address1 {
            position: fixed;
            margin-top: 34px;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        .address2 {
            position: fixed;
            margin-top: 30px;
            top: 20px !important;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        .gst {
            position: fixed;
            margin-top: 32px;
            top: 32px !important;
            font-weight: 400;
            font-size: 12px;
            text-align: center;
            font-family: sans-serif;
        }

        div.relative {
            position: relative;
            width: 400px;
            height: 200px;
            border: 3px solid #73AD21;
        }

        div.absolute {
            position: absolute;
            top: 80px;
            right: 0;
            width: 200px;
            height: 100px;
            border: 3px solid red;
        }


        .page-break {
            page-break-after: always;
        }

    </style>

</head>
<body>

<table width="100%" class="print:*">
    <thead>
    <tr>
        <td colspan="2">
            <div style="height: 65px;" class="bg-blue-400 ">
                <div style="text-align: center; width: 100%;" class="companyname">{{$cmp->get('company_name')}}</div>
                <div style="text-align: center; width: 100%;" class="address1">{{$cmp->get('address_1')}}</div>
                <div style="text-align: center; width: 100%;" class="address2">{{$cmp->get('address_2')}}</div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="  background-color: darkgray">
            <div style=" height: 18px;text-align: center;  vertical-align: middle; color: white; font-size: medium  ">
                Delivery Challan

            </div>
            <div style="text-align: right; color: white; margin-top: -20px; margin-bottom: 4px">
                Original copy&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </td>
    </tr>
    <tr>
        <td style="padding: 0;margin: 0;">
            <div style="text-align: left;">
                <p style="font-size: 12px; line-height: 5px ">&nbsp;&nbsp;M/s.{{$contact->get('contact_name')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('address_1')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('address_3')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('gstCell')}}</p>
            </div>
        </td>
        <td style="padding: 0;margin: 0;">
            <div style="text-align: left; width: 100%;">
                <div><span style="font-size: 18px;">&nbsp;Unit - {{session()->get('tenant_id')}}</span></div>
                <div><span style="vertical-align: middle;font-size: 13px;">&nbsp;&nbsp;Dc no:&nbsp;</span><span
                        style="font-size: 18px;">&nbsp;&nbsp;{{$obj->vno}}</span></div>
                <div><span style="vertical-align: middle;font-size: 13px; ">&nbsp;&nbsp;Date:&nbsp;</span><span
                        style="font-size: 14px;">{{$obj->vdate ?date('d-m-Y', strtotime($obj->vdate)):''}}</span></div>
            </div>
        </td>
    </tr>
    </thead>
</table>
<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th width="12px" >#</th>
        <th width="22px">Order&nbsp;No</th>
        <th width="225px" >Style&nbsp;No</th>
        <th width="65px">Colour</th>
        <th width="20px">Sizes</th>
        <th width="50px" >Quantity</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index => $row)

        <tr>
            <td align="center">{{$index+1}} </td>
            <td align="center">{{$obj->order_name}} </td>
            <td >{{$obj->style_name}} </td>
            <td align="center">&nbsp;{{$row['colour_name']}}</td>
            <td align="center">&nbsp;{{$row['size_name']}}</td>
            <td align="right">&nbsp;{{$row['qty']}}</td>
        </tr>

    @endforeach

    @for($i = 0; $i < 10-$list->count(); $i++)

        <tr>
            <td width="12" align="center">&nbsp;</td>
            <td width="12" align="center">&nbsp;</td>
            <td width="12" align="center">&nbsp;</td>
            <td width="12" align="center">&nbsp;</td>
            <td width="12" align="center">&nbsp;</td>
            <td width="12" align="center">&nbsp;</td>
        </tr>

    @endfor


    <tr>
        <td colspan="6" align="center"></td>
    </tr>
    <tr>
        <td colspan="4" align="left">Purpose : {{$obj->receiver_details}}</td>
        <td align="right">&nbsp;Total&nbsp;Qty&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="right">&nbsp;{{$obj->total_qty}}</td>
    </tr>
    <tr>
        <td colspan="3" style="height: 40px; text-align: left; vertical-align: top; padding-top: 5px ">Receiver Sign
        </td>
        <td colspan="3" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ">
            &nbsp;for&nbsp;{{$cmp->get('company_name')}}
        </td>
    </tr>
    </tbody>
</table>


<table width="100%" class="print:*">
    <thead>
    <tr>
        <td colspan="2">
            <div style="height: 65px;" class="bg-blue-400 ">
                <div style="text-align: center; width: 100%;" class="companyname">{{$cmp->get('company_name')}}</div>
                <div style="text-align: center; width: 100%;" class="address1">{{$cmp->get('address_1')}}</div>
                <div style="text-align: center; width: 100%;" class="address2">{{$cmp->get('address_2')}}</div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="  background-color: darkgray">
            <div style=" height: 18px;text-align: center;  vertical-align: middle; color: white; font-size: medium  ">
                Delivery Challan

            </div>
            <div style="text-align: right; color: white; margin-top: -20px; margin-bottom: 4px">
                Second copy&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </td>
    </tr>
    <tr>
        <td style="padding: 0;margin: 0;">
            <div style="text-align: left;">
                <p style="font-size: 12px; line-height: 5px ">&nbsp;&nbsp;M/s.{{$contact->get('contact_name')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('address_1')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('address_3')}}</p>
                <p style="line-height: 5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$contact->get('gstCell')}}</p>
            </div>
        </td>
        <td style="padding: 0;margin: 0;">
            <div style="text-align: left; width: 100%">
                <div><span style="font-size: 18px;">&nbsp;Unit - {{session()->get('tenant_id')}}</span></div>
                <div><span style="vertical-align: middle;font-size: 13px; ">&nbsp;&nbsp;Dc no:&nbsp;</span><span
                        style="font-size: 18px;">&nbsp;&nbsp;{{$obj->vno}}</span></div>
                <div><span style="vertical-align: middle;font-size: 13px; ">&nbsp;&nbsp;Date:&nbsp;</span><span
                        style="font-size: 14px;">{{$obj->vdate ?date('d-m-Y', strtotime($obj->vdate)):''}}</span></div>
            </div>
        </td>
    </tr>
    </thead>
</table>

<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th width="12px" >#</th>
        <th width="22px">Order&nbsp;No</th>
        <th width="225px" >Style&nbsp;No</th>
        <th>Colour</th>
        <th>Sizes</th>
        <th width="70px" >Quantity</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index => $row)

        <tr>
            <td align="center">{{$index+1}} </td>
            <td align="center">{{$obj->order_name}} </td>
            <td >{{$obj->style_name}} </td>
            <td align="center">&nbsp;{{$row['colour_name']}}</td>
            <td align="center">&nbsp;{{$row['size_name']}}</td>
            <td align="right">&nbsp;{{$row['qty']}}</td>
        </tr>

    @endforeach

    @for($i = 0; $i < 10-$list->count(); $i++)

        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>

    @endfor


    <tr>
        <td colspan="6" align="center"></td>
    </tr>
    <tr>
        <td colspan="4" align="left">Purpose : {{$obj->receiver_details}}</td>
        <td align="right">&nbsp;Total&nbsp;Qty&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="right">&nbsp;{{$obj->total_qty}}</td>
    </tr>
    <tr>
        <td colspan="3" style="height: 40px; text-align: left; vertical-align: top; padding-top: 5px ">Receiver Sign
        </td>
        <td colspan="3" style="height: 40px; text-align: center; vertical-align: top; padding-top: 5px ">
            &nbsp;for&nbsp;{{$cmp->get('company_name')}}
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
