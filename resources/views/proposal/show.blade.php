@extends('layouts.app')
@section('content')
    <div class="text-center">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> عرض المقترح </h2>
                </div>

            </div>
            <br>
            <br>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <br>

                    <h3 style="color: #1d643b">{{ $proposal->title }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>محتوى المقترح</strong>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div contenteditable="false">
                                {!! $proposal->content !!}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الموظف</strong>
                    <br>
                    <h4 style="color: blue">                    {{ $proposal->user->name }}</h4>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>حالة المقترح</strong>
                    <br>
                    @if ($proposal->is_closed == 1)
                        <button type="button" class="btn btn-outline-secondary">مغلق</button>
                        @if (Auth::user()->role_id == 2)

                            <a class="btn btn-outline-success" href="{{ url('proposal/change-status/'. $proposal->id)}}"
                               role="button">
                                فتح المقترح
                            </a>
                        @endif

                    @else
                        <button type="button" class="btn btn-outline-success">مفتوح</button>
                        @if (Auth::user()->role_id == 2)
                            <a class="btn btn-outline-secondary"
                               href="{{ url('proposal/change-status/'. $proposal->id)}}"
                               role="button">
                                إغلاق المقترح
                            </a>
                        @endif

                    @endif
                </div>
                <div class="form-group">
                    <strong>تاريخ إنشاء المقترح</strong>
                    <br>
                    {{ $proposal->created_at }}
                </div>
                <div class="form-group">
                    <strong>تاريخ آخر تعديل على المقترح</strong>
                    <br>
                    {{ $proposal->updated_at }}
                </div>
                <div class="form-group">
                    <strong>المرفقات</strong>
                    <br>
                    @if (sizeof($attachments) != 0)
                        @foreach($attachments as $attachment)
                            <a href="{{url('attachment/'.$attachment->path)}}" target="_blank"
                               class="btn btn-outline-secondary">
                                {{ $attachment->path}}
                            </a>                        @endforeach
                    @else
                        لا توجد مرفقات
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::user()->role_id == 2)


            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{ url('proposal/'. $proposal->id .'/edit')}}" class="btn btn-primary">
                    تعديل المقترح
                </a>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <form action="{{ route('proposal.destroy',$proposal->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف المقترح</button>
                </form>
            </div>
            <br>
            <br>
            <br>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <a class="btn btn-dark" href="{{route('proposal.index')}}" role="button">العودة للمقترحات</a>

            </div>





        @endif


    </div>


@endsection
