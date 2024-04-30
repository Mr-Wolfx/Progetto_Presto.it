<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-1">{{__('ui.Modifica')}}: {{$article->title}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <livewire:edit-article :article="$article" />
            </div>
        </div>
    </div>
</x-layout>
