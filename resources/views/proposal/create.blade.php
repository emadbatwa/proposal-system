@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="pull-left">
                <h2>إضافة مقترح جديد</h2>
            </div>
            <div class="pull-right text-left">
                <a class="btn btn-primary" href="{{ route('proposal.index') }}"> العودة للمقترحات</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <strong>فشلت الإضافة! </strong>الرجاء التحقق من صحة البيانات المدخلة<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="text-center" action="{{ route('proposal.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>عنوان المقترح:</strong>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                           placeholder="الرجاء كتابة عنوان مختصر وموجز">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>محتوى المقترح</strong>
                    <textarea class="ckeditor form-control" style="height:150px" name="content">
                        {{ old('content') }}
                    </textarea></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>يمكنك إضافة أكثر من مرفق عن طريق تحديدهم وكحد أقصى 4 مرفقات (المرفقات اختيارية)</strong>
                    <input type="file" class="form-control" name="attachments[]" placeholder="المرفقات"
                           multiple>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">إضافة المقترح</button>
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
