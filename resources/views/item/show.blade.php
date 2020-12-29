@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf
    <div class="mr-2 ml-2">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Show Laptop</div>

                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <label for="serial_number" class="col-md-3 col-form-label text-md-right">Serial Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->serial_number }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-3 col-form-label text-md-right">Brand</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->brand }}" disabled >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-3 col-form-label text-md-right">Model</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->model }}" disabled >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="processor" class="col-md-3 col-form-label text-md-right">Spec : Processor</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->processor }}" disabled >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ram" class="col-md-3 col-form-label text-md-right">Spec : RAM</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->ram }}" disabled >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="storage" class="col-md-3 col-form-label text-md-right">Spec : Storage</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->storage }}" disabled >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-md-3 col-form-label text-md-right">Color</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->color }}" disabled autocomplete="color" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="condition" class="col-md-3 col-form-label text-md-right">Condition</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->condition }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="updated_image" class="col-md-3 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                @if ($item->image_1)
                                <a href="/storage/{{ $item->image_1 }}" target="_blank"><img id="custom-img" src="/storage/{{ $item->image_1 }}" style="height:100px; width:100px;"></a>
                                @endif
                                @if ($item->image_2)
                                <a href="/storage/{{ $item->image_2 }}" target="_blank"><img id="custom-img" src="/storage/{{ $item->image_2 }}" style="height:100px; width:100px;"></a>
                                @endif
                                @if ($item->image_3)
                                <a href="/storage/{{ $item->image_3 }}" target="_blank"><img id="custom-img" src="/storage/{{ $item->image_3 }}" style="height:100px; width:100px;"></a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner_name" class="col-md-3 col-form-label text-md-right">Owner Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->owner_name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner_department" class="col-md-3 col-form-label text-md-right">Owner Department</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $item->owner_department }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex" style="margin-left:auto; margin-right:auto;">
                                <button class="btn btn-dark">
                                    <a href="/item/edit/{{ $item->id }}" style="text-decoration:none; color:#fff;">Edit</a>
                                </button>
                                <button class="btn btn-danger ml-2">
                                    <a href="/item/list" style="text-decoration:none; color:#fff;">Back</a>
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mr-2 ml-2">
        <div class="row justify-content-center" style="margin-top: -30px;">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        Defect History
                    </div>
                    <div class="card-body">
                        <div class="defect-history ml-3">
                            @foreach ($defects as $defect)
                            <span style="font-weight:bold;">{{ $defect->created_at }} |</span>
                            <span>{{ $defect->text }}</span>
                            <br>
                            @if ($item->image_1)
                            <a href="/storage/{{ $item->image_1 }}" target="_blank"><img id="custom-img" src="/storage/{{ $item->image_1 }}" style="height:100px; width:100px;"></a>
                            @endif
                            @if ($item->image_2)
                            <a href="/storage/{{ $item->image_2 }}" target="_blank"><img id="custom-img" src="/storage/{{ $item->image_2 }}" style="height:100px; width:100px;"></a>
                            @endif
                            @if ($item->image_3)
                            <a href="/storage/{{ $item->image_3 }}" target="_blank"><img id="custom-img" src="/storage/{{ $item->image_3 }}" style="height:100px; width:100px;"></a>
                            @endif
                            <br><br>
                            @endforeach
                        </div>
                        <div class="defect-form">
                            <form method="POST" enctype="multipart/form-data" action="/defect/{{ $item->id }}">
                                @csrf
                                <div class="col-md-12">
                                    <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" 
                                              autocomplete="text" autofocus>
                                    </textarea>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <input id="defectImage" type="file" name="defectImage" required>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <button type="submit" class="btn btn-outline-dark">
                                        {{ __('Post') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection