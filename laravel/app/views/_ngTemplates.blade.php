<script id="cashingTemplate" type="text/ng-template">
    <div class="row ng-cashing-added" id="addedCashing" ng-repeat="item in cashing | orderBy: '-created_at'">
        <div class="col-xs-3">
            <div class="date-time">@{{item.created_at}}</div>
        </div>
        <div class="col-xs-3">
            <span class="summ">@{{item.summ}}</span>
            <span class="type">@{{item.money_type}}</span>
        </div>
        <div class="col-xs-3">
            <div class="phone">
                <span class="phone phone-hidden" data-phone="@{{item.phone}}" show-phone>показать номер</span>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="comment">
                <p class="comment-text">
                    <span ng-if="item.city">@{{item.city}}. </span>
                    <span ng-if="item.commission">Комиссия @{{item.commission}}%. </span>
                    @{{item.comment}}
                </p>
            </div>
        </div>
    </div>
</script>

<script id="refillTemplate" type="text/ng-template">
    <div class="row ng-refill-added" id="addedRefill" ng-repeat="item in refill | orderBy: '-created_at'">
        <div class="col-xs-3">
            <div class="date-time">@{{item.created_at}}</div>
        </div>
        <div class="col-xs-3">
            <span class="summ">@{{item.summ}}</span>
            <span class="type">@{{item.money_type}}</span>
        </div>
        <div class="col-xs-3">
            <div class="phone">
                <span class="phone phone-hidden" data-phone="@{{item.phone}}" show-phone>показать номер</span>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="comment">
                <p class="comment-text">
                    <span ng-if="item.city">@{{item.city}}. </span>
                    <span ng-if="item.commission">Комиссия @{{item.commission}}%. </span>
                    @{{item.comment}}
                </p>
            </div>
        </div>
    </div>
</script>