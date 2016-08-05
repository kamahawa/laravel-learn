@extends('views.master')
@section('title','sub title')

@section('sidebar')
    Nam phia tren <br/>
    @parent <br/>
    Nam phia duoi parent
@stop

@section('content')
Day la trang sub
<br />

<?php $name = '<b>Huy Cuong</b>'; ?>
Chào bạn {{ $name }}
<br />
Chào bạn {!! $name !!}
<br />
{{ isset($name) ? $name : 'Huy Cuong' }}
<br />
{{ $name or 'Huy Cuong' }}
<br />
{!! $name or 'Huy Cuong' !!}
<br />

@for ($i = 0;$i < 10;$i++)
 Giá trị : {{ $i }} <br />
@endfor

<?php $i = 1; ?>
@while ($i <= 5)
 <p>Lặp 5 lần.</p>
 <?php $i++; ?>
@endwhile

<?php
$arr = ["com","banh canh", "pho"];
?>
@foreach ($arr as $item)
    {{ $item }},
@endforeach

@stop