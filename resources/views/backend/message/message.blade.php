@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif
@if (session('info'))
<div class="alert alert-info">
    {{ session('info') }}
</div>
@endif

<div class="row">
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <h6>
                    <i class="icon fas fa-ban"></i> Validation exist!
                </h6>
                @foreach ($errors->all() as $error)
                    <p class="mb-0">
                        <i class="icon fas fa-info"></i>{{ $error }}
                    </p>
                @endforeach
            </div>
        @endif
    </div>
</div>