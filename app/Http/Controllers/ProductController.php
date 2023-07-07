<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function index(){
        $product=Product::get();

       // dd($product);

        return view('product.index',compact('product'));
    }

    public function create(){


        return view('product.create');
    }

    public function store(Request $request){
        //dd($request->all());

        $request->validate([
           'name'=>'required',
           'description'=>'required',
           'image'=>'required'

        ]);

        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
       // dd($imageName);

       $product = new Product;
       $product->image=$imageName;
       $product->name=$request->name;
       $product->description=$request->description;
       $product->save();
       return redirect()->back()->with('success', 'Form submitted successfully');
    }

    public function edit($id){
      
        $product=Product::where('id',$id)->first();
     
      return view('product.edit',compact('product'));

    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable'
 
         ]);
         $product=Product::where('id',$id)->first();

         if(isset($request->image)){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $product->image=$imageName;
           // dd($imageName);
         }
           $product->name=$request->name;
           $product->description=$request->description;
           $product->save();
           return redirect()->back()->with('success', 'Product Update Successfully');
            
         }

         public function delete($id){
            //dd($id);
            $product=Product::where('id',$id)->first();

            $product->delete();
            return redirect()->back()->with('success', 'Product Deleted Successfully');

         }

    }

