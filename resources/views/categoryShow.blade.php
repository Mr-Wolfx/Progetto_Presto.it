<x-layout>





    <div style="height: 100px"></div>

    <h2 class="display-1 text-center"><b>{{__('ui.'.$category->name) }}</b></h2>

    <div style="height: 100px"></div>

    <div>
        <div class="container">
            <div class="row">
                @forelse ($category->articles as $article)
                    <div class="col-12 col-md-3 d-flex justify-content-center my-3">
                        <div class="card"
                            style="width: 18rem;border: solid rgba(0, 0, 0, 0.378) 2px;background-color: #00000050;">
                            <img src="{{ !$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500, 500) : 'https://picsum.photos/200' }}"
                                class="card-img-top p-3 " style="border-radius: 20px" alt="{{ $article->name }}">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ Str::limit($article['name'], 25) }}</h5>
                                <p style="border: 1px solid white;" class="card-text text-center bg-success rounded-4"><b>{{ __('ui.Prezzo') }}:</b>
                                    {{ $article->price }} €</p>
                                <hr>
                                <p class="card-text text-center"><b>{{ __('ui.Descrizione') }}:</b> <br>
                                    {{ Str::limit($article['body'], 30) }}</p>
                                <p class="card-text text-center"><b>{{ __('ui.Pubblicato da') }}:</b> <br>
                                    {{ $article->user->name }}</p>
                                <p class="card-text text-center">{{ __('ui.Pubblicato il') }}:<br>
                                    {{ $article->created_at->format('d/m/y') }}</p>



                                <div class="d-flex justify-content-center row">
                                    <div class="col-12">
                                        <a href="{{ route('article.show', compact('article')) }}"
                                            class="overflow-hidden d-flex justify-content-center btn btn-light btn-detail my-1" style="border: solid white 1px">
                                            {{ __('ui.Dettaglio') }} </a>
                                    </div>

                                    <div class="col-12">
                                        <a class="overflow-hidden d-flex justify-content-center btn card-glow4 btn-detail" style="border: solid white 1px">
                                            {{__('ui.'.$article->category->name) }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h2></h2>
                        <p>
                            <b>{{ __('ui.Non sono presenti annunci su questa categoria') }}</b>
                        </p>
                        <p>
                            <button class="btn btn-primary"><a style="text-decoration:none;color: white;" href="{{ route('article.create') }}">{{ __('ui.Pubblicane uno') }}</a></button>
                        </p>
                    </div>
            </div>
        </div>
        @endforelse
    </div>
    </div>
    </div>







</x-layout>
