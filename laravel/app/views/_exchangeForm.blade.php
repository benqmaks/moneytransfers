<form name="exchangeForm"  method="POST" action="{{action('HomeController@addExchange')}}" novalidate="novalidate">
    <div class="container-fluid" id="exchangeForm">
        <div class="row">
            {{--форма добавления обьявления--}}
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Мне нужно:</span>
                    </div>
                    <div class="col-xs-9">
                        <span class="value" ng-init="ad_type = 'refill'">
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
                    <div class="col-xs-3">
                        <span class="value">
                             <input type="number" name="summ"
                                    ng-pattern="/^[0-9]{1,7}$/"
                                    ng-model="summ"
                                    maxlength="15"
                                    minlength="1"
                                    required="required"
                                    class="form-control"
                                    id="amount"
                                    placeholder="1000"/>
                        </span>
                    </div>
                    <div class="col-xs-3 text-right">
                        <span class="caption">Комиссия(%):</span>
                    </div>
                    <div class="col-xs-3">
                        <span class="value">
                            <input type="number" name="commission"
                                   ng-pattern="/^[0-9]{1,7}$/"
                                   ng-model="commission"
                                   maxlength="15"
                                   class="form-control"
                                   id="commission" placeholder="10"/>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Плат.&nbsp;система:</span>
                    </div>
                    <div class="col-xs-9">
                        <span class="value">
                            <input type="text" name="money_type"
                                   ng-model="money_type"
                                   maxlength="20"
                                   required="required"
                                   class="form-control"
                                   id="moneyType"
                                   placeholder="webmoney, приватбанк"/>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Город</span>
                    </div>
                    <div class="col-xs-9">
                        <span class="value">
                            <input type="text" name="city"
                                   ng-model="city"
                                   maxlength="20"
                                   class="form-control"
                                   id="city"
                                   placeholder="Луганск" />
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3">
                        <span class="caption">Телефон:</span>
                    </div>
                    <div class="col-xs-9">
                        <span class="value">
                              <input type="tel" name="phone"
                                     ng-model="phone"
                                     maxlength="15"
                                     minlength="10"
                                     required="required"
                                     class="form-control"
                                     id="phone"
                                     placeholder="Телефон"/>
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
                        <button type="button"
                                ng-disabled="exchangeForm.$invalid"
                                ng-click="submitForm()"
                                class="btn btn-default">Разместить
                        </button>
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
        <div class="row" ng-show="exchangeForm.$invalid && exchangeForm.$dirty">
            <div class="col-xs-6">
                <div class="error-wrap">
                    <span class="error">Правильно заполните все необходимые поля!</span>
                </div>
            </div>
            <div class="col-xs-6"></div>
        </div>
    </div>
</form>