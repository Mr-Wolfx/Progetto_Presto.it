<x-layout>
    <div style="height: 100px">

    </div>


    <div class="container mt-5">
        <div class="row card-glow align-items-center" style="border: solid white 3px; border-radius: 50px; margin: 20px;">
            <div class="col-12 col-md-7">

                <h2 class="text-center display-1 mt-5 mt-md-0" style="font-weight: 600;">{{__('ui.Accedi')}}</h2>

                <form class="mb-3" method="POST" action="{{route('login')}}">

                    @csrf



                    <div class="mb-3 mt-0 mt-md-5">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" style="background-color: transparent;border: solid white 2px;" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" style="background-color: transparent; border: solid white 2px;" class="form-control" id="password">
                    </div>



                    <button type="submit" class="btn card-glow3 w-100" style="border: solid white 1px">{{__('ui.Invia')}}</button>
                </form>

                <a class="text-decoration-none text-white" href="{{route('register')}}">{{__('ui.Se non sei ancora registrato clicca qui!')}} </a>
            </div>
            <div class="col-12 col-md-5">
                <div class="d-flex flex-column justify-content-center overflow-hidden">
                    <img src="/img/illustration.png">
                </div>
            </div>
        </div>
    </div>

</x-layout>
