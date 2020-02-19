@section('header')
    <table style="width: 100%;border-collapse: separate; border-spacing: 25px">
        <tr style="margin-bottom: 5px">
            <td style="width: 20%;">
            </td>
            <td style="width: 80%; border-left: 1px solid; padding-left: 10px">
                Potwierdzenie przyjęcia zgłoszenia serwisowego
                <br>
                <span style="font-weight: bold">{{$ticket->token}}</span>
            </td>
        </tr>
    </table>
@endsection