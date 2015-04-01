@extends('layout')
@section('content')
<div class="container" id="exTabs">
    <div class="content" role="tabpanel">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#cashing" aria-controls="cashing" role="tab" data-toggle="tab">Обналичивание</a></li>
            <li role="presentation" ><a href="#refill" aria-controls="refill" role="tab" data-toggle="tab">Пополнение</a></li>
            <li role="presentation" class="pull-right" id="addItemBtn"><a href="#addItem" aria-controls="addItem" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Добавить обьявление</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="cashing">
                @include('_cashingList')
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="refill">
                @include('_refillList')
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="addItem">
                <div class="heading-text">
                    <h3>Что это такое и как это работает?</h3>
                    <p>Это доска объявлений по обналичиванию-пополнению банковских карт и платежных систем . Бесплатно разместить объявление может любой желающий.</p>

                    <h3>Бесплатно разместить объявление</h3>
                    <p>Разместите предложение на обналичивание-пополнение и его увидят все посетители сайта. Так вы сможете произвести нужную вам операцию без посредников на ваших условиях.</p>
                </div>
                @include('_exchangeForm')
            </div>
        </div>
    </div>
</div>

<script id="cashingTemplate" type="text/ng-template">
    <div class="row">
        <div class="col-xs-3">
            <div class="date-time">@{{cashing.created_at}}</div>
        </div>
        <div class="col-xs-3">
            <span class="summ">@{{cashing.summ}}</span>
            <span class="type">@{{cashing.money_type}}</span>
        </div>
        <div class="col-xs-3">
            <div class="phone">
                <span class="phone-first">@{{cashing.phone}}</span>
                <span class="phone-second"></span>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="comment">
                <p>@{{cashing.comment}}</p>
            </div>
        </div>
    </div>
</script>

<script id="refillTemplate" type="text/ng-template">
    <div class="row">
        <div class="col-xs-3">
            <div class="date-time">@{{refill.created_at}}</div>
        </div>
        <div class="col-xs-3">
            <span class="summ">@{{refill.summ}}</span>
            <span class="type">@{{refill.money_type}}</span>
        </div>
        <div class="col-xs-3">
            <div class="phone">
                <span class="phone-first">@{{refill.phone}}</span>
                <span class="phone-second"></span>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="comment">
                <p>@{{refill.comment}}</p>
            </div>
        </div>
    </div>
</script>
@endsection
