<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;



class CategoriesController extends Controller
/* to to fetch all data of database in welcome page*/
{
    public function index(){
    	$categories= Category::all();//to fetch all data of database and assign to variable categories
    	return view('welcome',compact('categories'));
    }
    
    /* to store category information in database*/
    public function store(Request $request){/*to catch all data/inputs from form*/
        $this->validate($request,[/*to validate request data coming from form and defined in array*/
        'name'=>'required|unique:categories,name',/*unique: for name field to be unique which require 2 parameters(tablename(categories) and columnname(name)) */
        ]);
        $dataInput =new category;
        $dataInput->name= $request->get('name');
        if ($request->hasFile('icons')){
        $category=$request->File('icons');
        $category->move(public_path().'/',$category->getClientOriginalName());
        $dataInput->icons= $category->getClientOriginalName();
        }
        $dataInput->save();
        return redirect('/');  
        }
    
    /* to redirect to editcategory page with particular id*/
    public function edit($id){
        $category=Category::findorfail($id);//to find category with particular id
        return view('update.editcategory')->with('category',$category);
    }

    /* to update particular category information*/
    public function update(Request $request,$id){
        $category=Category::find($id);
        $this->validate($request,[/*to validate request data coming from form and defined in array*/
        'name'=>'unique:categories,name',/*unique: for name field to be unique which require 2 parameters(tablename(categories) and columnname(name)) */
        ]);
        if ($request->hasFile('icons')){
        $dataInput=$request->File('icons');
        $dataInput->move(public_path().'/',$dataInput->getClientOriginalName());
        $category->icons= $dataInput->getClientOriginalName();
        }
         $category->update();       
        return redirect('/');

        
        }

     /*to delete particular category information*/
    public function destroy($id){          
        $category=Category::findorfail($id);
        $category->delete();
        return redirect('/');

    }
}

