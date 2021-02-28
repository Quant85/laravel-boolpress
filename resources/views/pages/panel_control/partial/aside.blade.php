<aside class="btn-controller">
        <a class="dropdown-item {{Route::currentRouteName() ==='panel.index' ?  'active' : (Route::currentRouteName() ==='search' ? 'active' :'')}}" href="{{ route('panel.index')}}" class="btn btn-primary">Panel Control </a>
        <a class="dropdown-item {{Route::currentRouteName() ==='category.index' ? 'active' :''}}" href="{{ route('category.index')}}" class="btn btn-primary">Category</a>
        <a class="dropdown-item {{Route::currentRouteName() ==='tag.index' ? 'active' :''}}" href="{{ route('tag.index')}}" class="btn btn-primary">Tag</a>
    </aside>