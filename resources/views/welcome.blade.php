<x-layout>

    

    @if (session('message'))
    <div class=" position-absolute" style="top: 100px;">
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    </div>
    @endif

    @if (session('messageSuccess'))
    <div class=" position-absolute" style="top: 100px;">
        <div class="alert alert-success">
            {{ session('messageSuccess') }}
        </div>
    </div>
    @endif


    <header class="container-fluid">
        <div class="row img-bg align-items-center">
            <div class="col-12">
                <div style="height: 500px">
                </div>

                <a href="#latestCard" class="text-decoration-none">
                    <div class="d-flex justify-content-center">

                        <div class="card-glow2 bgtitolo">
                                <h1 class=" titolo2 presto-logo text-center ">
                                    PRESTO.IT</h1>
                                {{-- <h2 class="titolo2 presto-logo2 text-center ">
                                    {{ __('ui.allAnnouncements') }}</h2> --}}
                            </div>


                    </div>
                </a>

                <div class="d-flex justify-content-center ">
                    <a href="#latestCard">
                        <i class="fa-solid fa-chevron-down fa-bounce fa-2xl text-light freccia"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="linea w-100">
        </div>
    </header>

    <div id="latestCard" class="container {{-- container1 --}}">
        <div class="row">
            <h2 class="text-center my-5 display-1" style="padding-top: 40px; font-weight: 600;">
                {{ __('ui.Ultimi Annunci') }} </h2>
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 my-3 d-flex justify-content-center box1">
                    <div class="card"
                        style="width: 18rem; background-color: #00000050; border: solid rgba(0, 0, 0, 0.378) 2px;">
                        <img src="{{ !$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500, 500) : 'https://picsum.photos/200' }}"
                            class="card-img-top p-3" style="border-radius: 20px !important" alt="{{ $article->name }}">
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ Str::limit($article['name'], 18) }}</b></h5>
                            <p style="border: 1px solid white;" class="card-text text-center bg-success rounded-4">
                                <b>{{ __('ui.Prezzo') }}:</b>
                                {{ $article->price }} €
                            </p>
                            <hr>
                            <p class="card-text text-center"><b>{{ __('ui.Descrizione') }}:</b> <br>
                                {{ Str::limit($article['body'], 30) }}</p>
                            <p class="card-text text-center"><b>{{ __('ui.Pubblicato il') }}:</b> <br>
                                {{ $article->created_at->format('d/m/y') }}</p>

                            <div class="d-flex justify-content-center row">
                                <div class="col-12 my-1">

                                    <a href="{{ route('article.show', compact('article')) }}"
                                        class="overflow-hidden d-flex justify-content-center btn-light btn btn-detail">
                                        {{ __('ui.Dettaglio') }}
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('categoryShow', ['category' => $article->category]) }}"
                                        class="overflow-hidden d-flex justify-content-center btn {{-- bg-primary --}} card-glow4 btn-detail">
                                        {{__('ui.'.$article->category->name) }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</x-layout>
