<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function getCategory(){
        return Category::all();
    }

    public function createCategory(Request $request){
        $name = $request->input("name");
        $image = $request->file("image");
        $imageName = time()."_".'.'.$image->getClientOriginalExtension();            
        $request->image->storeAs('public/images', $imageName);

       $category = Category::create([
            "name" => $name,
            "image" => $imageName
        ]);

        if($category){
            return response()->json([
                "status" => "success",
                "message" => "Category Create Successful",
            ]);
        }else{
            return response()->json([
                "status" => "failed",
                "message" => "Category Create Failed",
            ]);
        }

    }

    public function deleteCategory(Request $request){
        $id = $request->input("id");
        $image = $request->input("image");

        $deleteItem = Category::find($id)->delete();
        if($deleteItem){
            $imagePath = 'public/images/'.$image;        
            Storage::delete($imagePath);
            return 1;
        }else{
            return 0;
        }

    }

}
