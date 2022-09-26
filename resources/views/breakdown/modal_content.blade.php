<div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title" id="edit-modal-label">Edit breakdown</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
      <div class="card">
          <div class="card-body">

              <h2>{{$breakdown->getTruck->getMechanic->name}} {{$breakdown->getTruck->getMechanic->surname}}</h2>
              <h2>{{$breakdown->getTruck->plate}}</h2>

              <div id="trucks-list"></div>

              <div class="input-group mb-3">
                  <span class="input-group-text">Title</span>
                  <input data-create type="text" name="title" class="form-control" value="{{$breakdown->title}}">
              </div>

              <div class="input-group mb-3">
                  <span class="input-group-text">Notes</span>
                  <textarea data-create class="form-control" name="notes">{{$breakdown->notes}}</textarea>
              </div>

              <select data-create name="status" class="form-select mb-3">
                  @foreach($status as $key => $value)
                  <option value="{{$key}}" @if($key == $breakdown->status) selected @endif>{{$value}}</option>
                  @endforeach
              </select>

              <div class="input-group mb-3">
                  <span class="input-group-text">Price</span>
                  <input data-create type="text" name="price" class="form-control" value="{{$breakdown->price}}">
              </div>

              <div class="input-group mb-3">
                  <span class="input-group-text">Discount</span>
                  <input data-create type="text" name="discount" class="form-control" value="{{$breakdown->discount}}">
              </div>

          </div>
      </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>