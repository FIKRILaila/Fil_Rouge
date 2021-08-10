<?php

namespace App\Http\Controllers;
use App\Http\controllers\platsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use App\Models\Plat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class platsController extends Controller
{

    public function storePlat(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $query = Plat::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' =>  $input['image'],
            'chef_id' => Auth::user()->id,
        ]);
        if($query){
            return back()->with('success','post added successfuly');
        }else{
            return back()->with('fail','Somthing went wrong');
        }
    }
    
    public function editPost(Request $request){
        $id = $request->input('post_id');
        if ($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        else{
            $plat = Plat::where("id","=",$id)->get();
            foreach($plat as $p){
                $input['image'] = $p->image;
            }
        }
        $query = Plat::where("id","=",$id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' =>  $input['image']
        ]);
        if($query){
            return back()->with('success','Post updated successfuly');
        }else{
            return back()->with('fail','Somthing went wrong');
        }
    }

    public function getPlatsChef($id){
        $chef =User::where('id','=',$id)->get();
        $allPost = Plat::where('chef_id','=',$id)->orderBy('plats.created_at','DESC')->get();
        return view('chef_profil',['Posts'=>$allPost,'chef'=>$chef]);
    }


    public function myPosts(){
        $id =Auth::user()->id;
        $allPost = Plat::where('chef_id','=',$id)->orderBy('plats.created_at','DESC')->get();
        return view('chef.myPosts',['Posts'=>$allPost]);
    }

    
    public function deletePost(Request $request){
        $id = $request->input('post_id');
        $query = DB::table('plats')->delete($id);
        if($query){
            return redirect()->route('myPosts')->with('success', 'Post has been deleted succesfuly');
        }else{
            return redirect()->route('myPosts')->with('fail','Somthing went wrong');

        }
    }
}
