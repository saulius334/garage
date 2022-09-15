@if(Session::has('success_msg'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="alert alert-success alert-dismissible fade show">
                {{ Session::get('success_msg')  }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
@if(Session::has('danger_msg'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="alert alert-danger alert-dismissible fade show">
                {{ Session::get('danger_msg')  }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif
@if(Session::has('info_msg'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="alert alert-info alert-dismissible fade show">
                {{ Session::get('info_msg')  }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif