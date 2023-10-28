<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

body {
    font-family: 'KhmerOS' !important;
}
#result, #result th,#result td{
    border: 1px solid black;
    border-collapse: collapse;
}
#result{
   border: none;
   margin-top: 90px;
    /* border-right: none; */
}
th,td{
    padding: 10px;
}
#footer{
    display: Flexbox  !important;
    flex-direction: row;
    margin-top: 350px;
    padding: 20px;
    line-height: 20px;
    color: #2d86ea;
}

</style>
<body style="width: 90%">
    <div>
        @php
            $user_data[] = $data['user_data'];
            $skills = $data['skills'];
            $talents = $data['talents'];
            $row = 1;
        @endphp
        <table id="result" style="width: 100%;height:2%">
            <thead>
                <tr>
                    <th style="border-top: none;border-left:none;border-right:none" colspan="2" align="left">
                        <img style="width: 150px" id="img-logo" src="{{ public_path('images/white_Sakkal.png') }}" alt="AdminLTE Logo">
                    </th>
                    <th style="border-top: none;border-left:none;border-right:none" colspan="3" align="right">
                        <h2 style="color:#2d86ea" class="mt-2">REPORT</h2>
                    </th>
                </tr>
                <tr>
                    <th>ល.រ</th>
                    <th>ឈ្មោះអ្នកប្រើប្រាស់</th>
                    <th>មុខជំនាញ</th>
                    <th>ទេពកោសល្យ</th>
                    <th>ថ្ងៃខែប្រើប្រាស់</th>
                </tr>
            </thead>
            <tbody>
               @foreach($user_data as $info)
               @php
                   $data_obj = json_decode($info['data_obj'], true);
                   $skill = $skills->whereIn('id',$data_obj['skill'])->pluck('name')->toArray();
                   $talent = $talents->whereIn('id',$data_obj['talent'])->pluck('name')->toArray();
               @endphp
                <tr>
                    <td style="height: 30px">{{ $loop->iteration }}</td>
                    <td>{{ $data_obj['name'] }}</td>
                    <td>{!! implode("<br>",$skill) !!}</td>
                    <td>{!! implode("<br>",$talent) !!}</td>
                    <td>{{ date('d/m/Y',strtotime($info->created_at)) }}</td>
                </tr>
                @php
                    $row++;
                @endphp
               @endforeach
               @for($i=$row;$i<=10;$i++)
                    <tr>
                        <td style="30px">{{ $i }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    <tr>
               @endfor
            </tbody>
        </table>
        <table id="footer" style="width: 95%">
            <tr>
                <th colspan="2" align="left"> 
                    <div id="address">
                        <span>Address : Phnom Penh, Cambodia</span><br>
                        <span>Tel : 096 3233 769</span><br>
                        <span>Email : sakkal2023@gmail.com</span>
                    </div>
                </th>
                <th colspan="3" align="right">
                    <div id="social-media">
                        <span>Fackbook : Sakkal Page</span><br>
                        <span>Youtube : Sakkal Channel</span><br>
                        <span>Website : sakkal.com</span><br>
                    </div>
                </th>
            </tr>
        </table>
    </div>
    
</body>
</html>