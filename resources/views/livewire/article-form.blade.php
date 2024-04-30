<div>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    
    <form wire:submit='store' enctype="multipart/form-data">
        
        <div class="mb-3">
            <label for="name" class="form-label">{{__('ui.Titolo')}}</label>
            <input wire:model.live.blur='name' style="background-color: transparent;border: solid white 2px;" type="text" class="form-control" id="name">
            
            <div>
                @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">{{__('ui.Prezzo')}}</label>
            <input wire:model.blur='price' style="background-color: transparent;border: solid white 2px;" type="text" class="form-control" id="price">
            
            @error('price') <span class="text-danger error">{{ $message }}</span> @enderror
            
        </div>
        
        <div class="mb-3">
            <label for="body" class="form-label">{{__('ui.Descrizione')}}</label>
            <textarea wire:model.blur='body' style="background-color: transparent;border: solid white 2px;" class="form-control" id="body" cols="30" rows="10"></textarea>
            
            @error('body') <span class="text-danger error">{{ $message }}</span> @enderror
            
        </div>
        <label for="category">{{__('ui.Categorie')}}</label>
        <select wire:model.defer="category"  id="category" style="border: solid white 2px;" class="form-control my-3">
            <option value="">{{__('ui.Scegli una categoria')}}</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}
            </option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="text">{{__('ui.CaricaImmagini')}}</label>
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control @error('temporary_images.*') in-invalid @enderror" placeholder="Img"/>

            @error('temporary_images.*')
            <p class="text-danger mt-2">{{$message}}</p>
                
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview: </p>
                    <div class="row border borde-4 border-info rounded py-3">
                        @foreach ($images as $key => $image)
                            <div class="col my-3">
                                <div class="img-preview mx-auto rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                <button type="button" class="btn btn-danger d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif





        
        <button type="submit" class="btn {{-- btn-success --}} card-glow4 mt-3 w-100" style="border: solid white 2px">{{__('ui.Inserisci un annuncio')}}</button>
    </form>
</div>
