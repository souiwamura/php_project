@extends('layouts.commonLayout')

@section('content')
    <div class="mb-4 px-5 py-2">
        <form action="{{ route('getTotal') }}" method="POST" class="float-left mx-1">
            @csrf
            <input
             type="hidden"
             id="scid"
             name="scid"
             value="getMt" />
            <input
             type="hidden"
             id="userId"
             name="userId"
             value="{{ Auth::user()->id }}" />
            <input type="submit" class="btn btn-primary px-2" value="月次集計" />
        </form>
        <form action="{{ route('getTotal') }}" method="POST">
            @csrf
            <input
             type="hidden"
             id="scid"
             name="scid"
             value="getWt" />
            <input
             type="hidden"
             id="userId"
             name="userId"
             value="{{ Auth::user()->id }}" />
            <input type="submit" class="btn btn-primary px-2" value="週次集計" />
        </form>
    </div>
    <div class="container mt-4">
        @if (isset($array))
            @if (array_key_exists('message', $array))
                {{ $array['message'] }}
            @else
                <div style="position:relate;">
                    <div id="postTotalColumn_div" style="width:1000px; height:500px;"></div>
                    <?= $array['lava']->render('ColumnChart', 'postTotalColumn', 'postTotalColumn_div') ?>
                </div>
            @endif
        @endif
    </div>
@endsection
