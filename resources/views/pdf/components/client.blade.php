@section('client')
    <tr>
        <td style="width: 20%;">
            <h3>Dane klienta</h3>
        </td>
        <td style="width: 80%; border-left: 1px solid; padding-left: 10px">
            <h6>
                @if($ticket->client->NIP)
                    Nazwa firmy
                @else
                    Imię i nazwisko
                @endif
            </h6>
            {{$ticket->client->name}}
            <br><br>

            <h6>
                Adres
            </h6>
            {{$ticket->client->address}}
            <br><br>

            @if($ticket->client->NIP)
                <h6>
                    NIP
                </h6>
                {{$ticket->client->NIP}}
                <br><br>
            @endif

            <h6>
                Telefon
            </h6>
            {{$ticket->client->phone_number}}
            <br><br>

            @if($ticket->client->email)
                <h6>
                    E-mail
                </h6>
                {{$ticket->client->email}}
                <br><br>
            @endif
        </td>
    </tr>
@endsection