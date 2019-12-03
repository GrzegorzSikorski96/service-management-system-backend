<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zgłoszenie - {{$ticket->token}}</title>
    <style type="text/css">
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
@include('pdf.components.service')
@include('pdf.components.client')
@include('pdf.components.device')
@include('pdf.components.ticket')
@include('pdf.components.resignation.footer')
@include('pdf.components.resignation.header')

<div>
    @yield('header')
    <table style="width: 100%;border-collapse: separate; border-spacing: 25px">
        @yield('service')
        @yield('client')
        @yield('device')
        @yield('ticket')
    </table>
</div>

<div style="position: absolute; bottom: 0;">
    @yield('footer')
</div>
</body>
</html>