<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Doctrine\Inflector\Rules\Word;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());

            $count=10;

            if($request->has('count')){
                $count=$request->count;
            }


         // latest('id') عدد العناصر بالصفحة وعشان نقلب ترتيب البوستات بنحط
        $posts=Post::latest('id')->paginate($count);

         if($request->has('search')){
            $posts =Post::where('title','like','%'.$request->search.'%')->orderByDesc('id')
            ->paginate(10);
        }

        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
// dd($request->all());
        //validation
        // $request->validate([
        //     'title'=>'required',
        //     'image'=>'required|image',
        //     'content'=>['required'],
        // ]);

        // $validator=Validator::make($request->all(),
        // [
        //     'title'=>'required',
        //     'image'=>'required|image',
        //     'content'=>['required'],
        // ]);
        // if ($validator->fails()){
        //     return redirect()->back()
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        // return $this->removescript($request->title);

        //Uploded File
        // طريقة حفظ الملفات المرفوعة في مجلد داخل ال public
        $imgname=$request->file('image')->getClientOriginalName(); //اعطاء اسم معين ل الملف الذي تم رفعه

        // $path=$request->file('image')->store('uploades','public');

//طريقة اخرى ل تخزين البيانات في قاعدة البيانات
        // $path=$request->file('image')->store('/','custom');

//طريقة اخرى ل تخزين البيانات في قاعدة البيانات
        $path=$request->file('image')->move('public_path'('images'),$imgname);


        //save in Database

        // $post=new Post();
        // $post->title=$request->title;
        // $post->slug=Str::slug($request->title);
        // $post->image=$path;
        // $post->content=$request->content;
        // $post->user_id=1;
        // $post->save();

        // anather way

        Post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'image'=>$path,
            'content' =>$request->content,
            'user_id'=>1
        ]);

        //redirect
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =Post::withTrashed()->find($id);
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
         return redirect()->route('admin.posts.index');
    }
    private function removescript($input){
        return str_replace('<script>','',$input);
    }
}
