<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if ($item->is_publishied)
                Опублікована
                @else
                Чорновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основні дані</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#adddata" role="tab">Доп інфа</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{old('title',$item->title)}}" type="text" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Стаття</label>
                            <textarea name="text" id="text" class="form-control" rows="20">{{old('text',$item->text)}}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel" name="adddata">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id" class="form-control" placeholder="Виберіть Категорію">
                                @foreach ($categoryList as $categoryOption )
                                <option value="{{$categoryOption->id}}" @if($categoryOption->id==$item->category_id) selected @endif>
                                    {{$categoryOption->id_title}}
                                </option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="excerpt">Витримка</label>
                                <textarea name="excerpt" id="excerpt" rows="3" class="form-control">{{old('excerpt',$item->excerpt)}}</textarea>
                            </div>
                           
                            <div class="form-check">
                                <input type="hidden" name="is_published" value="0">

                                <input type="checkbox" name="is_published" class="form-check-input" value="1" @if($item->is_published) checked="checked" @endif>
                                <label for="is_published" class="form-check-label"> Опубліковано</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>