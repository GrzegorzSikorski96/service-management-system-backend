@section('ticket')
    <tr>
        <td style="width: 20%;">
            <h3>Informacje o zgłoszeniu</h3>
        </td>
        <td style="width: 80%; border-left: 1px solid; padding-left: 10px">
            <h6>
                Opis zgłoszenia
            </h6>
            {{$ticket->description}}
            <br><br>

            <h6>
                Dodatkowe informacje
            </h6>
            {{$ticket->additional_information}}
        </td>
    </tr>
@endsection