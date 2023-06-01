

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Thoughts Crystal Email</title>

        

        <!-- Start Common CSS -->

        <style type="text/css">

            #outlook a {padding:0;}

            body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; font-family: Helvetica, arial, sans-serif;}

            .ExternalClass {width:100%;}

            .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}

            .backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}

            .main-temp table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family: Helvetica, arial, sans-serif;}

            .main-temp table td {border-collapse: collapse;}

        </style>

        <!-- End Common CSS -->

    </head>

    <body>

        @php
            $array = \App\Models\ForgotPasswordCode::where('email',Session::get('forgotuseremail'))->first();
        @endphp
        Your Code is {{$array->code}}
    </body>

</html>