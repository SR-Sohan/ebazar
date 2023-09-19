<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getProduct(){
        return Product::with(["brand","category"])->get();
    }
    public function productById($id){
        return Product::with(["brand","category"])->find($id);
    }

    public function createProduct(Request $request){
        $brand_id = $request->input("brand_id");
        $cat_id = $request->input("cat_id");
        $title = $request->input("title");
        $short_des = $request->input("short_des");
        $price = $request->input("price");
        $stock = $request->input("stock");
        $remark = $request->input("remark");
        $image = $request->file("image");
        $imageName = time()."_".'.'.$image->getClientOriginalExtension();            
        $request->image->storeAs('public/images', $imageName);

       $product = Product::create([
            "brand_id" => $brand_id,
            "cat_id" => $cat_id,
            "title" => $title,
            "short_des" => $short_des,
            "price" => $price,
            "stock" => $stock,
            "remark" => $remark,
            "image" => $imageName,
            "discount" => "0",
            "discount_price" => "0",
            "star" => "0",
        ]);

        if($product){
            return response()->json([
                "status" => "success",
                "message" => "Product Create Successful",
            ]);
        }else{
            return response()->json([
                "status" => "failed",
                "message" => "Category Create Failed",
            ]);
        }
    }

    public function deleteProduct(Request $request){
        $id = $request->input("id");
        $image = $request->input("image");

        $deleteItem = Product::find($id)->delete();
        if($deleteItem){
            $imagePath = 'public/images/'.$image;        
            Storage::delete($imagePath);
            return 1;
        }else{
            return 0;
        }
    }
}
