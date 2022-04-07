@extends('emails.emailTemplate')

@section('content')
    <h2>{{ $user->name }}, a sua password foi redefinida!</h2>
    <p style="margin-top: 0; margin-bottom: 1rem;">A sua password de acesso à plataforma SIGO foi redefinida.</p>

    <p style="margin-top: 0; margin-bottom: 1rem;">De modo a aceder à plataforma deverá aceder ao endereço
        electrónico <a href="{{ $account }}.{{ env('APP_DOMAIN')}}"
            style="color: #007bff; background-color: transparent; text-decoration: none!important;">
            {{ $account }}.{{ env('APP_DOMAIN')}}
        </a> onde deverá introduzir a combinação do seu email com a seguinte palavra passe:</p>
    <div
        style="color:black; position: relative; display: block; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid rgba(0,0,0,.125); border-radius: .25rem; margin: 2rem 3rem; padding: 1rem; text-align: center!important;">
        <h3 style="margin-top: 0; margin-bottom: 0!important; padding-bottom: 0!important; font-size: 1.5em"><strong>Palavra passe:</strong>
            {{ $password }}
        </h3>
    </div>
    <p style="margin-top: 0; margin-bottom: 1rem;">Tenha em consideração que a palavra passe que consta do presente
        email foi gerada aleatoriamente, é pessoal e intransmissível.<br>Contudo, por uma questão de segurança, na
        próxima utilização da plataforma deverá proceder à alteração da mesma.
    </p>
@endsection
