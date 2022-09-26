<div id="breakdown" class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Register new breakdown</h2>
                </div>
                <div class="card-body">
                    <select data-create name="mechanic_id" class="form-select mt-3">
                        <option value="0">Choose mechanic</option>
                        @foreach ($mechanics as $value)
                        <option value="{{$value->id}}">{{$value->name}} {{$value->surname}}</option>
                        @endforeach
                      </select>
                      <div id="trucksList"></div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Title</span>
                            <input data-create type="text" name="title" class="form-control">
                        </div>

                        <div class="input-group mt-3">
                            <span class="input-group-text">Notes</span>
                            <textarea data-create name="notes" class="form-control"></textarea>
                        </div>

                        <select data-create name="status" class="form-select mt-3">
                            @foreach ($status as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                          </select>

                      <div class="input-group mt-3">
                        <span class="input-group-text">Price</span>
                        <input data-create type="text" name="price" class="form-control">
                    </div>

                    <div class="input-group mt-3">
                        <span class="input-group-text">Discount</span>
                        <input data-create type="text" name="discount" class="form-control">
                    </div>

                    <button data-submit type="button" class="btn btn-secondary mt-4">Create</button>

                </div>
            </div>
        </div>
    </div>
</div>