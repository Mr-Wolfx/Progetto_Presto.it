<x-layout>


    <div style="height: 100px"></div>


    <div>
        <h2 class="display-1 text-center mt-5 mt-md-0" style="font-weight: 600;"> {{ __('ui.Annunci') }}
            {{ $article->name }}</h2>
    </div>


    <div style="height: 50px"></div>



    <div class="container-fluid">
        <div class="row">
            {{-- CAROUSEL --}}
            <div class="col-12 col-md-4">
                <div
                    class="card"style="border-radius: 20px; width: 100%;border: solid rgba(0, 0, 0, 0.378) 2px;background-color: #00000050;">
                    <div class="card-body">
                        <div id="carouselExample" class="carousel slide">
                            @if (count($article->images) > 0)
                                <div class="carousel-inner">
                                    @foreach ($article->images as $image)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img style="border-radius: 20px" src="{{ $image->getUrl(500, 500) }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/500" style="border-radius: 5px !important"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/500" style="border-radius: 5px !important"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/500" style="border-radius: 5px !important"
                                            class="d-block w-100" alt="...">
                                    </div>
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>



        {{-- DESCRIZIONE --}}
        <div class="col-12 col-md-8">
            <div class="card"
                style="border-radius: 20px; width: 100%;border: solid rgba(0, 0, 0, 0.378) 2px;background-color: #00000050;">
                <div class="card-body">
                    <h5 class="card-title"><b>{{ __('ui.Titolo') }}:</b> {{ $article->name }}</h5>
                    <p class="card-text"> <b>{{ __('ui.Prezzo') }}:</b> {{ $article->price }} €</p>
                    <p class="card-text"><b>{{ __('ui.Descrizione') }}: </b>{{ $article->body }}</p>
                    <p class="card-text"><b>{{ __('ui.Pubblicato il') }}:</b>
                        {{ $article->created_at->format('d/m/y') }}</p>
                    <p class="card-text"><b>{{ __('ui.Pubblicato da') }}:</b> {{ $article->user->name }}</p>
                    <a href="/" class="btn btn-success"> {{ __('ui.Torna indietro') }} </a>
                    <a class="btn btn-secondary"> {{__('ui.'.$article->category->name)}} </a>
                </div>
            </div>
        </div>
    </div>
    </div>



</x-layout>
