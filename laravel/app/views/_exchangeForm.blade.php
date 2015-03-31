<form name="exchangeForm" method="POST" action="{{action('HomeController@addExchange')}}" novalidate="novalidate">
    <div class="container-fluid">
        <div class="row">
            {{--форма добавления обьявления--}}
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Мне нужно:</span>
                    </div>
                    <div class="col-xs-9">
                        <span class="value">
                            <select class="form-control" name="ad_type" id="adType" ng-model="ad_type">
                                <option value="refill">Пополнение</option>
                                <option value="cashing">Обналичивание</option>
                            </select>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Сумма:</span>
                    </div>
                    <div class="col-xs-5">
                        <span class="value">
                             <input type="text" name="summ"
                                    ng-model="summ"
                                    maxlength="15"
                                    minlength="1"
                                    required="required"
                                    class="form-control"
                                    id="amount"
                                    placeholder="Сумма"/>
                        </span>
                    </div>
                    <div class="col-xs-4">
                        <input type="text" name="money_type"
                               ng-model="money_type"
                               maxlength="20"
                               minlength="1"
                               required="required"
                               class="form-control"
                               id="moneyType"
                               placeholder="wmu, грн...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Телефон:</span>
                    </div>
                    <div class="col-xs-9">
                        <span class="value">
                              <input type="text" name="phone"
                                     ng-model="phone"
                                     maxlength="15"
                                     minlength="10"
                                     required="required"
                                     class="form-control"
                                     id="phone"
                                     placeholder="Телефон">
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Коментарий:</span>
                    </div>
                    <div class="col-xs-9">
                        <span class="value">
                            <textarea name="comment" class="form-control"
                                      ng-model="comment"
                                      id="comment"
                                      placeholder="Коментарий"
                                      rows="3"
                                      maxlength="160"></textarea>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4 text-center">
                        <button type="button" ng-disabled="exchangeForm.$invalid" ng-click="submitForm()" class="btn btn-default">Разместить</button>
                    </div>
                    <div class="col-xs-4"></div>
                </div>
            </div>

            {{--описание--}}
            <div class="col-xs-6">
                <p class="text">
                    Мы не несем ответственности за достоверность, за содержание информации размещенной пользователями в
                    объявлениях, а также не несем ответственности за осуществление операций по обналичиванию-пополнению
                    платежных карт и платежных систем.
                </p>
            </div>
        </div>
    </div>
</form>