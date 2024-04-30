<x-layout>

    <div style="height: 100px"></div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-1 mt-5 mt-md-0" style="font-weight: 600;"> {{ __('ui.Tutti i nostri articoli') }} </h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 my-4 d-flex justify-content-center">
                    <div class="card card-glow"
                        style="width: 18rem;border: solid rgba(0, 0, 0, 0.378) 2px;background-color: #00000050 !important;">
                        <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500,500) : "https://picsum.photos/200"}}" class="card-img-top p-3"
                            style="border-radius: 20px !important" alt="{{ $article->name }}">
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ Str::limit($article['name'], 25) }}</b></h5>
                            <p style="border: 1px solid white;" class="card-text text-center bg-success rounded-4"><b><a style="text-decoration: none; color: white" href="{{ route('article.show', compact('article'))}}">{{__('ui.Prezzo')}}:</b> {{ $article->price }} €
                            </a></p>
                        <hr>
                            <p class="card-text text-center"><b>{{ __('ui.Descrizione') }}:</b> <br>
                                {{ Str::limit($article['body'], 30) }}</p>
                            <p class="card-text text-center"><b>{{ __('ui.Pubblicato il') }}:</b> <br>
                                {{ $article->created_at->format('d/m/y') }}</p>

                            <div class="d-flex justify-content-center row">
                                <div class="col-12">

                                    <a href="{{ route('article.show', compact('article')) }}"
                                        class="overflow-hidden d-flex justify-content-center btn btn-light my-1 btn-detail">
                                        {{ __('ui.Dettaglio') }}
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('categoryShow', ['category' => $article->category]) }}"
                                        class="overflow-hidden d-flex justify-content-center btn card-glow4 btn-detail">
                                        {{__('ui.'.$article->category->name)}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h2>{{ __('ui.Non ci sono articoli per questa ricerca') }}</h2>
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
