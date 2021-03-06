@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="pull-left">
                <h2>تعديل مقترح</h2>
            </div>
            <div class="pull-right text-left">
                <a class="btn btn-primary" href="{{ route('proposal.index') }}"> العودة للمقترحات</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <strong>فشل التعديل! </strong>الرجاء التحقق من صحة البيانات المدخلة<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="text-center" action="{{ route('proposal.update',$proposal->id) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>عنوان المقترح:</strong>
                    <input type="text" name="title" value="{{ $proposal->title }}" class="form-control"
                           placeholder="الرجاء كتابة عنوان مختصر وموجز">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>محتوى المقترح</strong>
                    <textarea class="ckeditor form-control" style="height:150px" name="content">
                        {!! $proposal->content !!}
                    </textarea></div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">تعديل المقترح</button>
            </div>
        </div>

    </form>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-success").click(function () {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function () {
                $(this).parents(".hdtuto control-group lst").remove();
            });
        });
    </script>


@endsection
