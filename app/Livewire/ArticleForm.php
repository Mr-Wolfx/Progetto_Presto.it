<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Models\Article;
use App\Models\User;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ArticleForm extends Component
{
    use WithFileUploads;
    
    
    
    
    public $temporary_images;
    public $article;
    public $images=[];
    public $image;
    
    
    
    
    #[Validate('min:3', message: 'Questo campo deve essere di almeno 3 caratteri')]
    #[Validate('required', message: 'Questo campo è obbligatorio')]
    public $name;
    
    #[Validate('max:6', message: 'Questo campo deve avere massimo 6 caratteri')]
    #[Validate('required', message: 'Questo campo è obbligatorio')]
    public $price;
    
    #[Validate('min:10', message: 'Questo campo deve essere di almeno 10 caratteri')]
    #[Validate('required', message: 'Questo campo è obbligatorio')]
    #[Validate('max:2000', message: 'Questo campo può contenere al massimo 2.000 caratteri')]
    public $body;
    
  
    public $category;
    
    
    
    
    protected $rules = [
        
        'images.' => 'image|max:2048',
        'temporary_images.' => 'image|max:2048'
    ];
    
    protected $messages = [
        
        'images.max' => "L'immagine deve essere massimo di 2MB",
        'temporary_images..required' => "L' immagine è richiesta",
        'temporary_images..image' => "I file devono essere immagini",
        'temporary_images.*.max' => "L'immagine deve essere massimo di 2MB",
    ];
    
    public function store(){
        
        $this->validate();
        $category = Category::find($this->category);
        $article = $category->articles()->create(
            [
                'name' => $this->name,
                'price' => $this->price,
                'body' => $this->body,
                ]
            );
            
            Auth::user()->articles()->save($article);
            
            if(count($this->images)){
                
                foreach($this->images as $image){
                    
                    $newFileName = "article/{$article->id}";
                    $newImage = $article->images()->create(['path' => $image->store($newFileName, 'public')]);
                    
                    RemoveFaces::withChain([
                        
                        new ResizeImage($newImage->path, 500 , 500 ),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id)
                        
                        ])->dispatch(($newImage->id));
                        
                    }
                    
                    File::deleteDirectory(storage_path('/app/livewire-tmp'));
                }
                
                session()->flash('message','Articolo inserito correttamente, sarà pubblicato dopo la revisione.');
                $this->cleanForm();
            }
            
            protected function cleanForm(){
                $this->name = "";
                $this->price = "";
                $this->body = "";
                $this->category = "";
                $this->image = "";
                $this->temporary_images = [];
                $this->images = [];
                
            }
            
            public function render()
            {
                return view('livewire.article-form');
            }
            
            
            public function updatedTemporaryImages()
            {
                if(
                    $this->validate([
                        'temporary_images.*' => 'image|max:2048',
                        ]))
                        {
                            foreach ($this->temporary_images as $image)
                            {
                                $this->images[] = $image;
                            }
                        }
                    }
                    
                    
                    public function removeImage($key)
                    {
                        if(in_array($key, array_keys($this->images))){
                            unset($this->images[$key]);
                        }
                    }
                }
                