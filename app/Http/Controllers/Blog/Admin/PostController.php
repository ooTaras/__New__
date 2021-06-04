<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\BlogPostRepository;

class PostController extends Controller
{
    private $blogPostRepository;
    public function __construct()
    {
        $this->blogPostRepository=app(BlogPostRepository::class);
        $this->blogCategoryRepository=app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator=$this->blogPostRepository->getAllWithPaginate();

        return view('blog.admin.post.index',compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item=new BlogPost();

        $categoryList=$this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.post.edit',compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data=$request->input();
        $item=(new BlogPost())->create($data);

        if($item){
            return redirect()->route('blog.admin.posts.edit',[$item->id])
            ->with(['success' => 'Успішно збережено ']);
        }else{
            return back()->withErrors(['msg' => 'Помилка збереження'])
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $item=$this->blogPostRepository->getEdit($id);
        return view('blog.admin.post.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=$this->blogPostRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }
        $categoryList=$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.post.edit',compact('item','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item=$this->blogPostRepository->getEdit($id);
        if(empty($item)){
            return back()
            ->withErrors(['msg' => "Запис id=[{$id}] незнайдено"])
            ->withInput();
        }
        $data=$request->all();
        $result=$item->update($data);

        if($result){
            return redirect()
            ->route('blog.admin.posts.edit',$item->id)
            ->with(['success' => "Успішна операція"]);
        }else{
            return back()
            ->withErrors(['msg' => 'Помилка операції'])
            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=BlogPost::destroy($id);

        if($result){
            return redirect()
            ->route('blog.admin.posts.index')
            ->with(['success'=> "Запис id[$id] видалено"]);
        }else{
            return back()->withErrors(['msg'=>'Помилка видалення']);
        }
    }
}
