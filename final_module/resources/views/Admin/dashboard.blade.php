@extends('Layout.Admin.index')
@section('main')
<div class="container">
    <div class="row">
        <div class="four col-md-3">
            <div class="counter-box colored">
                <i class="fas fa-utensils"></i>
                <span class="counter">{{ $numberOfRestaurant }}</span>
                <p>Số lượng nhà hàng</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fa fa-user"></i>
                <span class="counter">{{ $numberOfUser }}</span>
                <p>Số lượng thành viên</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
                <i class="fas fa-drumstick-bite"></i>
                <span class="counter">{{ $numberOfFood }}</span>
                <p>Số lượng món ăn</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box">
            <i class="fas fa-file-invoice-dollar"></i>
                <span class="counter">{{ $numberOfBill }}</span>
                <p>Số lượng đơn hàng</p>
            </div>
        </div>
    </div>
</div>
@stop()
@section('css')
<style>
.container {
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
@section('js')
<script>
    $(document).ready(function() {

        $('.counter').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                $(this).text(Math.ceil(now));
            }
            });
        });

    });
</script>
@endsection