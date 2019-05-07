@extends('layouts.commonLayout')

@section('content')
    <div class="mb-4 px-5 py-2">
        <a href="{{ route('getTotal', [ 'scid' => 'getMt' ]) }}" class="btn btn-primary px-2">
            月次集計
        </a>
        <a href="{{ route('getTotal', [ 'scid' => 'getYt' ]) }}" class="btn btn-primary px-2">
            年次集計
        </a>
    </div>
    <div class="container mt-4">
        {{ $data }}
    </div>
@endsection
