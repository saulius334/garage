    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-label">Edit breakdown</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card">
              <div class="card-body">
                <h2>{{$breakdown->getTruck->getMechanic->name}} {{$breakdown->getTruck->getMechanic->surname}}</h2>
                <h2>{{$breakdown->getTruck->plate}}</h2>
                    <div id="trucksList"></div>
                      <div class="input-group mt-3">
                          <span class="input-group-text">Title</span>
                          <input value="{{$breakdown->title}}" data-create type="text" name="title" class="form-control">
                      </div>

                      <div class="input-group mt-3">
                          <span class="input-group-text">Notes</span>
                          <textarea data-create name="notes" class="form-control">{{$breakdown->notes}}</textarea>
                      </div>

                      <select data-create name="status" class="form-select mt-3">
                          @foreach ($status as $key => $value)
                          <option value="{{$key}}" @if($key == $breakdown->status) selected @endif>{{$value}}</option>
                          @endforeach
                        </select>

                    <div class="input-group mt-3">
                      <span class="input-group-text">Price</span>
                      <input value="{{$breakdown->price}}" data-create type="text" name="price" class="form-control">
                  </div>

                  <div class="input-group mt-3">
                      <span class="input-group-text">Discount</span>
                      <input value="{{$breakdown->discount}}" data-create type="text" name="discount" class="form-control">
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>