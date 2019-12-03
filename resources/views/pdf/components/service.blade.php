@section('service')
    <tr>
        <td style="width: 20%;">
            <h3>Dane serwisu</h3>
        </td>
        <td style="width: 80%; border-left: 1px solid; padding-left: 10px">
            <h6>
                Nazwa firmy
            </h6>
            {{$service->name}}
            <br><br>

            <h6>
                Adres
            </h6>
            {{$service->address}}
            <br><br>

            <h6>
                NIP
            </h6>
            {{$service->NIP}}
            <br><br>

            <h6>
                Telefon
            </h6>
            {{$service->phone_number}}
            <br><br>

            <h6>
                E-mail
            </h6>
            {{$service->email}}
            <br><br>
        </td>
    </tr>
@endsection