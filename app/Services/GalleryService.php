<?php
namespace App\Services;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryService{
    public function store(Request $request)
    {
         if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('Gallery'),$name);
        }


        Gallery::create([
            'room_id'=>$request->room_id,
            'title'=>$request->title,
            'is_active'=>$request->is_active,
            'image_path'=>$name,
        ]);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
                $gallery->room_id = $request->room_id;
                $gallery->title = $request->title;
                $gallery->is_active = $request->is_active;
                if($request->hasFile('image'))
                {
                    $image = $request->file('image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('Gallery'),$name);
                    $gallery->image_path = $name;
                }
                $gallery->update();
        

        
    }



}



?>
