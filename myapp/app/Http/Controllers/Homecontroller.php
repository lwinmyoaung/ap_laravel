<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostStored;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Events\PostCreatedEvent;
use App\Http\Requests\storeBlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostStoredUsingMarkdown;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreatedNotification;

class HomeController extends Controller
{
    // Manual Middleware
    public function _construct()
    {
        $this->middleware('admin');
    }

    // Naming Route Example Method
    public function testnameingroute()
    {
        dd("This is Naming Route Example");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Collections testing function pluck()
        // dd(Post::all()->pluck('name'));
        
        // Collections testing function collect()
        // $collections = collect( ['lwin','myo','aung'] )->map(function($name){
        //     return strtoupper($name);
        // });
        // dd($collections);

        // // Testing Sending Mails
        // $request->session()->flash('status','Task was successful!');

        // // Testing mail config
        // dd(config('mail.from.address'));

        // // Sending mail using Demo
        // Mail::raw('Hello World',function($msg){
        //     $msg->to('lwin@gmail.com')
        //         ->subject('AP Index Function');
        // });

        // // Testing Notification Using Facade
        // // Loop ပတ်ပြီးသုံးရင် ပိုအသုံးဝင်
        // Notification::send(Auth::user(),new PostCreatedNotification());
        // echo 'noti sent'; exit();

        // // Testing Notification Using notify()
        // $user = Auth::user();
        // $user->notify(new PostCreatedNotification());
        // echo 'noti sent'; exit();

        $data = Post::where( 'user_id', auth()->user()->id )->get();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeBlogPost $request)
    {
        // Laravel Backend Validation
        // $request->validate([
        //     'name' => 'required|unique:posts',
        //     'description' => 'required|max:255',
        // ]);
        
        // Fillable မသုံးဘဲ Normal Save Example
        // $post = new POST();
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();

        // Fillable Example
        // Post::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        // ]);

        // Guarded Example
        // Post::create($request->all());

        // Validated data တွေအကုန် saved
        $validated = $request->validated();
        $post = Post::create($validated + ['user_id' => auth()->user()->id ]);

        // // Sending Html using Mailtrap HTML Form
        // Mail::to('lwin@gmail.com')->send(new PostStored($post));
        // // Sending Html using Mailtrap Markdown Form
        // Mail::to('lwin@gmail.com')->send(new PostStoredUsingMarkdown($post));

        // // Testing Event Listener
        // event(new PostCreatedEvent($post));
        
        return redirect('posts')->with('status',config('aprogrammer.message.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Many to One Testing
        // dd($post->categories);
        // dd($post->categories->name);

        // Route Model Binding ကြောင့် id နဲ့ရှာဖွေရန်မလိုတော့ပါ
        // $post = Post::findOrfail($id);

        // Manually Authorization Filter
        // if( $post->user_id != auth()->id()){
        //     abort(403);
        // }

        // Policy Authorization Filter
        $this->authorize('view', $post);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        // Route Model Binding ကြောင့် id နဲ့ရှာဖွေရန်မလိုတော့ပါ
        // $post = Post::findOrfail($id);
        
        // Manually Authorization Filter
        // if( $post->user_id != auth()->id()){
        //     abort(403);
        // }

        // Policy Authorization Filter
        $this->authorize('view', $post);

        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeBlogPost $request, Post $post)
    {
        // Route Model Binding ကြောင့် id နဲ့ရှာဖွေရန်မလိုတော့ပါ
        // $post = Post::findOrfail($id);

        // Laravel Backend Validation StoreBlogPost ပါလို့ မလိုတော့ဘူး
        // $request->validate([
        //     'name' => 'required|unique:posts',
        //     'description' => 'required|max:255',
        // ]);

        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save(); 
        
        // $post->update($request->all());

        // Validated data တွေအကုန် saved
        $validated = $request->validated();
        $post->update($validated);
        return redirect('posts'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Route Model Binding ကြောင့် id နဲ့ရှာဖွေရန်မလိုတော့ပါ
        // Post::destroy($id);

        $post->delete();
        return redirect('posts');
    }
}
