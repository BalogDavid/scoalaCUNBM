@component('mail::message')
    Buna {{$user->name}},
    Apasa pe butonul de mai jos pentu a-ti reseta parola

    @component('mail::button', ['url'=> url('reset/' .$user->remember_token)])
        Reseteaza
    @endcomponent

    In caz ca nu reusiti sa va schimbati parola sau nu dumneavoasta ati cerut schimbarea ei, contactati directiunea!

    Multumim,
    {{config('app.name')}}


@endcomponent
