@section('tab')
    @parent
    <li class="" id="li_opportunity_add">
        <a data-toggle="tab" href="#div_opportunity_add" id="a_opportunity_add">Ekle</a>
    </li>
@stop

@section('tabcontent')
    @parent
    <div id="div_opportunity_add" class="tab-pane panel-body">
        <form name="form_opportunity_add" id="form_opportunity_add" action="{{Request::root()}}/crm/satis_firsati_yonetimi/create"
              class="form-horizontal tasi-form center-block" method="post">
            <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
            <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Fırsat Adı </label>
                        <div>
                            <div class="col-sm-5">
                                <input name="name" id="opportunity_add_name" type="text"
                                       class="form-control width-200" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Müşteri </label>
                        <div>
                            <div class="col-sm-5 width-250">
                                <select name="accountid" id="opportunity_add_accountid" class="form-control" required>
                                    <option value="" disabled selected>Seçiniz</option>
                                    @foreach($oppAddAccount as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">İş Ortağı </label>
                        <div class="col-sm-5 width-250">
                            <select name="partnerid" id="opportunity_add_partnerid" class="form-control" required>
                                <option value="" disabled selected>Seçiniz</option>
                                @foreach($oppAddAccount as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Müşteri Yöneticisi </label>
                        <div>
                            <div class="col-sm-5 width-250">
                                <select name="contactid" id="opportunity_add_contactid" class="form-control" required>
                                    <option value="" disabled selected>Seçiniz</option>
                                    <option value="1" >Bedircan</option>
                                    @foreach($oppAddContact as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Kaynak Türü </label>
                        <div>
                            <div class="col-sm-5 width-250">
                                <select name="leadid" id="opportunity_add_leadid" class="form-control" required>
                                    <option value="" disabled selected>Seçiniz</option>
                                    @foreach($oppAddLead as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Kaynak Detayı </label>
                        <div class="col-sm-5 width-250">
                            <select name="campaignid" id="opportunity_add_campaignid" class="form-control" required>
                                <option value="" disabled selected>Seçiniz</option>
                                <option value="1" >Kampanya</option>
                                @foreach($oppAddCampaign as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Tahmini Bedeli </label>
                        <div>
                            <div class="col-sm-5">
                                <input name="estimatedcost" id="opportunity_add_estimatedcost" type="text"
                                       class="form-control width-200" required>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bulletin_date" class="col-sm-1 width-150 control-label">Tahmini Dönemi </label>
                        <div class="col-sm-5  width-200">
                            <div data-date-viewmode="years" data-date-format="mm-yyyy" data-date=""
                                 class="input-append date dpYears">
                                <input name="todate" id="opportunity_add_todate"  type="text" readonly="" size="16"
                                       class="form-control" >
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button" style=" height: 35px; "><i
                                                            class="fa fa-calendar"></i></button>
                                              </span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Durumu </label>
                        <div>
                            <div class="col-sm-5 width-250">
                                <select name="status" id="opportunity_add_status" class="form-control" required>
                                    <option value="" disabled selected>Seçiniz</option>
                                    <option value="bugun" >Bugün</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Olasılığı </label>
                        <div class="col-sm-5 width-250">
                            <select name="probability" id="opportunity_add_probability" class="form-control" required>
                                <option value="" disabled selected>Seçiniz</option>
                                <option value="25" >%25</option>
                                <option value="50" >%50</option>
                                <option value="75" >%75</option>
                                <option value="99" >%99</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150"></label>
                        <div class="col-sm-5 width-200">
                            <button name="btn_opportunity_add"
                                    id="btn_opportunity_add" type="submit"
                                    class="margin-left-100-width btn btn-success">Ekle
                            </button>
                        </div>
                    </div>


                </div>



            </div>

        </form>
    </div>
@stop