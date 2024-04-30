<x-layout>
    <div style="height: 100px"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                <h1 class="display-1"><b>{{__('ui.Inserisci un annuncio')}}</b></h1>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <livewire:article-form  />
            </div>
        </div>
    </div>
</x-layout>
