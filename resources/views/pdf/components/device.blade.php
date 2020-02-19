@section('device')
    <tr>
        <td style="width: 20%;">
            <h3>Dane urządzenia</h3>
        </td>
        <td style="width: 80%; border-left: 1px solid; padding-left: 10px">
            <h6>
                Nazwa urządzenia
            </h6>
            {{$ticket->device->name}}
            <br><br>

            <h6>
                Numer seryjny
            </h6>
            {{$ticket->device->serial_number}}
            <br><br>

            <h6>
                Opis
            </h6>
            {{$ticket->device->description}}
            <br><br>
        </td>
    </tr>
@endsection