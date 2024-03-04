<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Album;

class AlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $album = $this->route('album');
    
        // Check if the album exists and if the authenticated user is its owner
        return $album && $this->user()->id === $album->user_id;
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->album;
        
        $ret = [
       'album_name' => ['required'],
       'description' => 'required',
        ];

        if($id){
            $ret['album_name'][] = Rule::unique('albums')->ignore($id);
        }else{
            $ret['album_thumb'] = 'required|image';
            $ret['album_name'][] = Rule::unique('albums');
        }
        return $ret;
    }

    public function messages(): array
    {
        $messages = [
            'album_name.required' => 'Il campo album name  è obbligatorio...',
            'album_name.unique' => 'Il campo album name esiste già...',
            'description.required' => 'Il campo Descrizione è obbligatorio...',
            'name.required' => 'Il campo Nome è obbligatorio...',
            'album_thumb.required' => 'Il campo Immagine è obbligatorio...'

        ];
        return $messages;  
    }
}