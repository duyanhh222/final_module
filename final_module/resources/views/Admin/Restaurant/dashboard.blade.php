@extends('Layout.Admin.index')
@section('title','Food')
@section('main')

@foreach ($total as $row)
<div class="containers">
    <div class="row">
        <div class="four col-md-2">
        </div>
        <div class="four col-md-3">
            <div class="counter-box colored">
                <i class="fas fa-dollar-sign"></i>
                <span class="counter">{{ number_format($row->totals) }}</span>
                <p>Tổng doanh thu</p>
            </div>
        </div>
        <div class="four col-md-2">
        </div>
        <div class="four col-md-3">
            <div class="counter-box colored">
            <i class="fas fa-file-invoice-dollar"></i>
                <span class="counter">{{ number_format($row->number) }}</span>
                <p>Tổng số  đơn hàng</p>
            </div>
        </div>
    </div>
</div>  
@endforeach
<div class="container">
    <form action="" method="get">
        <span class="selectTime">
            <span>
                <label for="">Ngày bắt đầu</label>
                @if (isset($start))
                <input type="date" value="{{$start}}" name="start">
                @else
                <input type="date" name="start">
                @endif
            </span>
            <span>
                <label for="">Ngày kết thúc</label>
                @if (isset($end))
                <input type="date" value="{{$end}}" name="end">
                @else
                <input type="date" name="end">
                @endif
                
            </span>   
        </span>
        <span class="submitTime">
            <button type="submit" class="btn btn-primary">Thống kê</button>
        </span>

    </form>
</div>
@if ($totals != null)
<div class="containers">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Ngày</th>
                <th>Tổng doanh thu</th>
                <th>Tổng số đơn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totals as $key => $row)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $row->time }}</td>
                <td>{{ $row->totals }}</td>
                <td>{{ $row->number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endif
@stop()

@section('css')
<style>
.selectTime span label {
    width: 10%;
}

.selectTime span {
    margin: 10px;
}

.submitTime {
    margin: 10px;
}

input[type="date"]::-webkit-clear-button {
    display: none;
}

/* Removes the spin button */
input[type="date"]::-webkit-inner-spin-button { 
    display: none;
}

/* Always display the drop down caret */
input[type="date"]::-webkit-calendar-picker-indicator {
    color: #2c3e50;
}

/* A few custom styles for date inputs */
input[type="date"] {
    appearance: none;
    -webkit-appearance: none;
    color: #95a5a6;
    font-family: "Helvetica", arial, sans-serif;
    font-size: 18px;
    border:1px solid #ecf0f1;
    background:#ecf0f1;
    padding:5px;
    display: inline-block !important;
    visibility: visible !important;
}

input[type="date"], focus {
    color: #95a5a6;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
}
</style>
<style>
.containers {
    margin-left: 10%;
    margin-right: 10%;
    margin-top: 50px;
    margin-bottom: 50px;
}

.counter-box {
    display: block;
    background: #f6f6f6;
    padding: 40px 20px 37px;
    text-align: center
}

.counter-box p {
    margin: 5px 0 0;
    padding: 0;
    color: #909090;
    font-size: 18px;
    font-weight: 500
}

.counter-box i {
    font-size: 60px;
    margin: 0 0 15px;
    color: #d2d2d2
}

.counter {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #666;
    line-height: 28px
}

.counter-box.colored {
    background: #3acf87
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
    color: #fff
}
</style>
@endsection