<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <div class="list-group">
           @foreach($categories as $category)
            <li class="list-group-item">
                <a href="">{{$category->name}}</a>
            </li>
            @endforeach
        </div>
    </div>
</div>
