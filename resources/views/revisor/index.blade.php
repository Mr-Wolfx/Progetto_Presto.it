<x-layout>

    <div style="height: 100px">
    </div>

    <div class="container-fluid text-center card-glow3 mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="display-3"><b>

                    {{ $article_to_check ? __('ui.ECCO L\'ANNUNCIO DA REVISIONARE')  : __('ui.Non ci sono annunci da revisionare') }}

                </b></h2>
            </div>
        </div>
    </div>
    @if ($article_to_check)
        {{-- carosello --}}

        <div class="container-fluid">
            <div class="row card-glow align-items-center py-4"
                style="border: solid white 3px; border-radius: 50px;padding: 10px; margin: 20px;">
                <div class="col-12 col-md-3 ">
                    <div class="card card-glow" style="width: 100%;border-radius: 30px;">
                        <div class="card-body">
                            <div id="carouselExample" class="carousel slide">
                                @if($article_to_check->images)
                                        <div class="carousel-inner">
                                            @foreach ($article_to_check->images as $image)
                                            <div class="carousel-item  @if ($loop->first) active @endif">
                                                <img style="border-radius: 20px" src="{{$article_to_check->images()->first()->getUrl(500,500)}}" class="img-fluid" alt="">
                                            </div>

                                            @endforeach
                                        </div>
                                        @else
                                        <div class="carousel-item active">
                                            <img src="https://picsum.photos/1920/1080" style="border-radius: 20px;" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://picsum.photos/1920/1081" style="border-radius: 20px;" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://picsum.photos/1921/1080" style="border-radius: 20px;" class="d-block w-100" alt="...">
                                        </div>
                            </div>
                                @endif


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
                </div>


                <div class="col-12 col-md-3">
                    <div class="card card-glow" style="width: 100%;border-radius: 30px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article_to_check->name }}</h5>
                            <p class="card-text"> {{__('ui.Prezzo')}} : {{ $article_to_check->price }} €</p>
                            <p class="card-text">{{ $article_to_check->body }}</p>
                            <p class="card-text"> {{__('ui.Pubblicato il')}}: {{ $article_to_check->created_at->format('d/m/y') }}</p>
                            <p class="card-text"> {{__('ui.Pubblicato da')}} : {{ $article_to_check->user->name }}</p>
                            <a href="/" class="btn btn-success" style="border: solid white 1px">  {{__('ui.Torna indietro')}}
                            </a>
                            <a class="btn btn-secondary" style="border: solid white 1px">
                                {{ $article_to_check->category->name }} </a>
                        </div>
                    </div>
                </div>



            <div class="col-md-3">
                <div class="card-body">
                    <h5 class="tc-accend">Revisione Immagini</h5>
                    <p>Adulti: <span class="{{$image->adult}}"></span></p>
                    <p>Satira: <span class="{{$image->spoof}}"></span></p>
                    <p>Medicina: <span class="{{$image->medical}}"></span></p>
                    <p>Violenza: <span class="{{$image->violence}}"></span></p>
                    <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                </div>

            </div>
<div class="col-md-3">
                <h5 class="tc-accent mt-3">Tags</h5>
                <div class="p-2">
                    @if ($image->labels)
                        @foreach ($image->labels as $label)
                            <p class="d-inline">{{$label}}</p>
                        @endforeach
                    @endif
                </div>
            </div>


        </div>
</div>
        {{-- form accetta o rifiuta --}}
        <div class="container mt-5">
            <div class="row card-glow align-items-center"
                style="border: solid white 3px; border-radius: 50px; padding: 10px;">
                        <div class="col-12 col-md-6">
                            <form action="{{ route('revisor.accept_article', ['article' => $article_to_check]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" style="border: solid white 1px; border-radius: 50px;font-weight: 600;"
                                    class="btn btn-success w-100">{{__('ui.Accetta')}}</button>
                            </form>
                        </div>
                        <div class="col-12 col-md-6">
                            <form action="{{ route('revisor.reject_article', ['article' => $article_to_check]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" style="border: solid white 1px; border-radius: 50px;font-weight: 600;"
                                    class="btn btn-danger w-100">{{__('ui.Rifiuta')}}</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    @endif
</x-layout>
