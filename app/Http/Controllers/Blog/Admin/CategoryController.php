<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Repositories\BlogCategoryRepository;

class CategoryController extends BaseController
{

    private $blogCategoryRepository;

    public function __construct()
    {
       

        $this->blogCategoryRepository=app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);
        return view('blog.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item=new BlogCategory();
        $categoryList=$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.category.edit',compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryUpdateRequest $request)
    {
        $data=$request->all();
        $item=(new BlogCategory())->create($data);

        if($item){
            return redirect()->route('blog.admin.categories.edit',[$item->id])
            ->with(['success'=> 'Успішно збережено']);
        }else{
            return back()->withErrors(['msg'=>'Помилка зберігання'])
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $item = $this->blogCategoryRepository->getEdit($id);
        if(empty($item)){
            abort (404);
        }
        $categoryList =$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = BlogCategory::find($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запис id=[{$id}] не знайдено"])
                ->withInput();
        }
        $data=$request->all();
        $result=$item->fill($data)->save();

        if($result){
            return redirect()
                ->route('blog.admin.categories.edit',$item->id)
                ->with(['success'=>'Успішна Операція']);
                }else{
                    return back()
                    ->withErrors(['msg'=>'Помилка збереження'])
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
        $result=BlogCategory::destroy($id);

        if($result){
            return redirect()
            ->route('blog.admin.categories.index')
            ->with(['success'=> "Запис id[$id] видалено"]);
        }else{
            return back()->withErrors(['msg'=>'Помилка видалення']);
        }
    }
}
