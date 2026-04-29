@extends('admin.dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h2 class="display-6">Add Home </h2>

                    </div>
                </div>
            </div><!-- .nk-page-head -->
            <div class="nk-block">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-head-content">

                    </div>
                </div><!-- .nk-block-head -->
                <div class="card shadown-none">
                    <div class="card-body">

                        <form action="{{ route('update.home', $alldata->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="row g-3 gx-gs">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInputText1" class="form-label">Home Title </label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="title" value="{{ $alldata->title }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInputText1" class="form-label">Home
                                            Description</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="description" value="{{ $alldata->description }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlInputText1" class="form-label">Home
                                            Link</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="link" value="{{ $alldata->link }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Home Image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" name="image" class="form-control" id="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"></label>
                                        <div class="form-control-wrap">
                                            <img id="showImage"
                                                src="{{ !empty($alldata->image) ? asset($alldata->image) : asset('upload/no_image.jpg') }}"
                                                style="width:80px; height:80px; margin-top:10px;">
                                        </div>
                                    </div>
                                </div>




                                <div class="col-lg-12 col-xl-12">
                                    <button type="submit" class="btn btn-secondary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- .card-body -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
