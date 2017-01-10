<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

use Auth, Session;
use App\Product;
use Image;



class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $sorting = $request->get('sorting');
        $products = [];

        if (!empty($search)) {
            $products = Product::where('name', 'like', "%$search%")
            ->paginate(6);
        } else { 
            if (!empty($sorting)) {
                $products = Product::orderBy('name', $sorting)->paginate(6);
            } else {
                $products = Product::paginate(6);
            }
            
        }

        return view('products.index', compact('products'));

    }

    public function show($id)
    {
        if (empty($id)) {
            return redirect('/');
        }

        $product = Product::where([['id', $id]])->first();
        
        return view('products.view_details', compact('product'));
    }

    public function add()
    {
    	return view('products.add');
    }

    public function store(AddProductRequest $request)
    {
		$product = $request->all();

		$image = '';
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $image = sha1($filename . time()) . '.' . $extension;
            $destinationPath = base_path() . '/public/images/';
            $thumbDestinationPath = base_path() . '/public/images/_thumbnail/';

            if (!is_dir($destinationPath)) {
            	mkdir($destinationPath, 0755);
            }

            if (!is_dir($thumbDestinationPath)) {
                mkdir($thumbDestinationPath, 0755);
            }

            $thumb_img = Image::make($file->getRealPath())->resize(100, 100);
            $thumb_img->save($thumbDestinationPath.$image, 80);

            $request->file('image')->move($destinationPath, $image);

            
        }

        if (!empty($product['image'])) {
            $product['image'] = $image;
        } else {
            unset($product['image']);
        } 

        Product::create($product);

        Session::flash('success', 'The product has been added successfully. Thank you.');
        return redirect('/');
    }

    public function edit($id)
    {
    	if (empty($id)) {
    		Session::flash('error', 'The product id is invalid.');
        	return redirect('/');
    	}

    	$product = Product::where([['id', $id]])->first();

    	if (empty($product)) {
    		Session::flash('error', 'The product was not found.');
        	return redirect('/');
    	}

        return view('products.edit', compact('product'));
    
    }

    public function update($id, EditProductRequest $request)
    {
    	$product = $request->all();

        $image = '';
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $image = sha1($filename . time()) . '.' . $extension;
            $destinationPath = base_path() . '/public/images/';
            $thumbDestinationPath = base_path() . '/public/images/_thumbnail/';

            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755);
            }

            if (!is_dir($thumbDestinationPath)) {
                mkdir($thumbDestinationPath, 0755);
            }

            $thumb_img = Image::make($file->getRealPath())->resize(100, 100);
            $thumb_img->save($thumbDestinationPath.$image, 80);

            $request->file('image')->move($destinationPath, $image);
        }

        if (!empty($product['image'])) {
            $product['image'] = $image;
        } else {
            unset($product['image']);
        }

        $update = Product::where([['id', $id]])->first();

        $update->update($product);

        Session::flash('success', 'The product has been updated successfully. Thank you.');
        return redirect('/');
    }

    public function destroy($id = null, Request $request)
    {
        $delete = Product::where([['id', $id]])->first();

        if (empty($delete)) {
            abort(404, 'Not Found.');
        }

        try {
            $delete->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            
            Session::flash('error', 'Sorry! The product could not be deleted.');
            return redirect('/');
        }
        
        Session::flash('success', 'The product has been deleted successfully. Thank you.');
        return redirect('/');
    }

}
