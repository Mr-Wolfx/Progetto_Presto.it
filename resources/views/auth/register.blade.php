<x-layout>
    <div style="height: 100px">

    </div>
    <div class="container mt-5">
        <div class="row card-glow align-items-center" style="border: solid white 3px; border-radius: 50px; margin: 20px;">
            <div class="col-12 col-md-6 mb-4">

                <h2 class="text-center display-1 mt-5 mt-md-0" style="font-weight: 600;"> {{__('ui.REGISTRATI')}}</h2>

                <form method="POST" action="{{route('register')}}">

                    @csrf

                    <div class="mt-0 mt-md-5">
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control" style="background-color: transparent;border: solid white 2px;" id="name" aria-describedby="emailHelp">

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" style="background-color: transparent;border: solid white 2px;" id="email" aria-describedby="email">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" style="background-color: transparent;border: solid white 2px;" id="password">
                    </div>

                    <div class="mb-3">
                        <label for="passwordConfirmation" class="form-label">{{__('ui.Conferma Password')}}</label>
                        <input name="password_confirmation" type="password" class="form-control" style="background-color: transparent;border: solid white 2px;" id="passwordConfirmation">
                    </div>

                    <button type="submit" class="btn card-glow3 w-100" style="border: solid white 1px">{{__('ui.Invia')}}</button>
                </form>

                <a class="text-decoration-none text-white" href="{{route('login')}}">{{__('ui.Se sei già registrato clicca qui')}}</a>
            </div>

            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-center overflow-hidden">
                    <img src="/img/illustration3.png">
                </div>
            </div>

        </div>
    </div>
</x-layout>
