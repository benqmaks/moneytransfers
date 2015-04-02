<div class="container-fluid" id="refill-cont" ng-init="refillCount = {{{count($refill)}}}">
    <div class="row" ng-show="refillCount">
        <div class="col-xs-3">
            <span class="heading">Дата добавления</span>
        </div>
        <div class="col-xs-3">
            <span class="heading">Сумма</span>
        </div>
        <div class="col-xs-3">
            <span class="heading">Телефон</span>
        </div>
        <div class="col-xs-3">
            <span class="heading">Коментарий</span>
        </div>
    </div>

    <div class="row" ng-hide="refillCount">
        <div class="col-xs-12">
            <div class="no-data">
                <p>Здесь пока нет обьявлений. Ты можешь стать <span class="be-first" ng-click="beFirst('refill')">первым.</span></p>
            </div>
        </div>
    </div>
    @if(isset($refill) && count($refill))
        @foreach($refill as $item)
            <div class="row">
                <div class="col-xs-3">
                    <div class="date-time">{{{$item->created_at}}}</div>
                </div>
                <div class="col-xs-3">
                    <span class="summ">{{{$item->summ}}}</span>
                    <span class="type">{{{$item->money_type}}}</span>
                </div>
                <div class="col-xs-3">
                    <div class="phone">
                        <span class="phone phone-hidden" data-phone="{{{$item->phone}}}" show-phone>показать номер</span>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="comment">
                        <p class="comment-text">
                            @if(isset($item->city))
                                <span>{{{$item->city}}}. </span>
                            @endif
                            @if(isset($item->commission))
                                <span>Комиссия {{{$item->commission}}}%. </span>
                            @endif
                            {{{$item->comment}}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>