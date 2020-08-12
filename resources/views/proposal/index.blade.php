@extends('layouts.app')
@section('content')
    <div class="text-center">
        @if (Auth::user()->role_id == 2)
            <h3>جميع المقترحات</h3>

        @else
            <h3>مقترحاتي</h3>

        @endif
    </div>
    <div class="row">
        <div class="col-md-8">
        </div>
        @if (Auth::user()->role_id == 1)
            <div class="col-md-4 text-left">
                <div class="">
                    <a href="{{ url('proposal/create') }}" class="btn btn-success btn-lg">
                        <i class="fas fa-plus"></i>
                        إضافة مقترح جديد
                    </a>
                </div>
            </div>
        @endif

    </div>
    <hr>

    @if($proposals->count() > 0)
        <table class="table table-bordered table-striped table-hover text-right">
            <thead>
            <tr>
                <th>#</th>
                <th>عنوان المقترح</th>
                <th>
                    المحتوى ...
                </th>
                <th>حالة المقترح</th>
                @if (Auth::user()->role_id == 2)
                    <th>الموظف</th>
                @endif

                <th>العمليات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->id }}</td>
                    <td><a href="{{ url('proposal', $proposal->id) }}">{{ $proposal->title }}</a></td>
                    <td>
                        <div contenteditable="false">
                            {!! mb_substr($proposal->content , 0 , 150) !!} ...

                        </div>
                    </td>
                    @if ($proposal->is_closed == 1)
                        <td>
                            <button type="button" class="btn btn-outline-secondary">مغلق</button>

                        </td>

                    @else
                        <td>
                            <button type="button" class="btn btn-outline-success">مفتوح</button>

                        </td>

                    @endif

                    @if (Auth::user()->role_id == 2)
                        <td>{{$proposal->user->name}}</td>
                    @endif

                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('proposal', $proposal->id) }}" class="btn btn-primary">
                                    التفاصيل
                                </a>
                            </div>
                            @if (Auth::user()->role_id == 2)
                                <div class="col-md-4">
                                    <a href="{{ url('proposal/'. $proposal->id .'/edit')}}" class="btn btn-primary">
                                        تعديل
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('proposal.destroy',$proposal->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $proposals->links() !!}

    @else
        <h3>لا توجد مقترحات حتى الآن </h3>
    @endif
@endsection
