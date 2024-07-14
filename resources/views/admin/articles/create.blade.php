@extends('admin.layouts.master')

@section('css')

@endsection


@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Basic Elements</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Basic Elements</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm mới bài viết</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{route('admin.articles.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" id="basiInput" name="title">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Ảnh</label>
                                        <input type="file" class="form-control" id="basiInput" name="image">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="basiInput" class="form-label">Danh mục</label>
                                    <select class="form-select" name="catelogue_id">
                                        @foreach($catelogues as $catelogue)
                                            <option value="{{$catelogue->id}}">{{$catelogue->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="basiInput" class="form-label">Thẻ</label>
                                    <select class="form-select" multiple aria-label="multiple select example" name="tag_id">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Nội dung</label>
                                        <textarea name="content" id="noi_dung"></textarea>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <button type="submit" class="btn btn-success">Tạo mới</button>
                                </div>
                            </div>
                        </form>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection


@section('js')
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'noi_dung' );
    </script>
@endsection