<x-layout>

    <div style="height: 100px;"></div>
    <div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <form class="container-fluid" method="POST" action="{{route('send_email')}}">

            @csrf

            <h2 class="text-center shift"><b> {{__('ui.Diventa un revisore')}} </b></h2>
            {{-- <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
            </div> --}}
            <div class="mb-3">
                <label for="userText" class="form-label">{{__('ui.Presenta la tua candidatura')}} </label>
                <textarea type="longtext" name="description" class="form-control card-glow3" style="height: 300px;" id="userText"></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn card-glow3 w-50 shift" style="border: solid white 2px;"><b style="letter-spacing: 5px;">{{__('ui.Invia')}}</b></button>
            </div>
        </form>
    </div>

</x-layout>
