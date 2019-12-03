@section('footer')
    <table style="width: 100%;border-collapse: separate; border-spacing: 25px">
        <tr>
            <td style="width: 40%; border-top: 2px dotted">
                Podpis wydającego
            </td>

            <td style="width: 20%; text-align: center">
                <h5>
                    Data odbioru
                </h5>
                <h6>
                    {{ $ticket->updated_at }}
                </h6>
                <br>

                <h5>
                    Wydający
                </h5>
                <h6>
                    {{$user->name}} {{$user->surname}}
                </h6>
            </td>

            <td style="width: 40%; border-top: 2px dotted;text-align: right">
                Podpis odbierającego
            </td>
        </tr>
    </table>
@endsection