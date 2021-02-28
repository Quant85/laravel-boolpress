<section class="search-section">
  <form action="{{url('search')}}" method="post">
    @csrf
    <br>
    <div class="container">
      <div class="row">
        <div class="container-fluid">
          <div class="form-group row">
            <label for="date" class="col-form-label col-sm-2">Created from</label>
            <div class="col-sm3">
              <input type="date" class="form-control input-sm" id="fromCreated" name="fromCreated" required>
            </div>
            <label for="date" class="col-form-label col-sm-2">Created to</label>
            <div class="col-sm3">
              <input type="date" class="form-control input-sm" id="toCreated" name="toCreated" required>
            </div>
            <div class="col-sm-2">
              <button type="submit" class="btn" name="search" title="Search"><img class="icon" src="https://img.icons8.com/search"> </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <a class="refresh" href="{{ route('panel.index')}}" class="btn btn-primary"><img class="icon" src="https://img.icons8.com/nolan/2x/refresh.png" alt=""> </a>
</section>