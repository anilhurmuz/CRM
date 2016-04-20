@section('tab')
    @parent
    <li class="active" id="li_opportunity_list">
        <a data-toggle="tab" href="#div_opportunity_list" id="a_opportunity_list">Listele</a>
    </li>
@stop

@section('tabcontent')
    @parent
    <div id="div_opportunity_list" class="tab-pane active panel-body">
        <form name="form_opportunity_list" id="form_opportunity_list"
              class="form-horizontal tasi-form center-block" method="post">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Fırsat Adı </label>
                        <div>
                            <select name="opportunity_name" id="opportunity_list_opportunity_name" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_name" id="btn_islem_opportunity_name"
                                    onclick="toogle(this)" class="btn btn-success btn-success-green"
                                    type="button" style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Müşteri </label>
                        <div>
                            <select name="opportunity_accountid" id="opportunity_list_opportunity_accountid"
                                    class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_accountid" id="btn_islem_opportunity_accountid"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">İş Ortağı </label>
                        <div>
                            <select name="opportunity_partnerid" id="opportunity_list_opportunity_partnerid"
                                    class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_partnerid" id="btn_islem_opportunity_partnerid"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Müşteri Yöneticisi </label>
                        <div>
                            <select name="opportunity_contactid" id="opportunity_list_opportunity_contactid"
                                    class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_contactid" id="btn_islem_opportunity_contactid"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Kaynak Türü </label>
                        <div>
                            <select name="opportunity_sourceid" id="opportunity_list_opportunity_sourceid" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_sourceid" id="btn_islem_opportunity_sourceid"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>
                    </div>


                </div>
                <div class="col-lg-3">


                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Kaynak Detayı </label>
                        <div>
                            <select name="opportunity_campaignid" id="opportunity_list_opportunity_campaignid"
                                    class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_campaignid" id="btn_islem_opportunity_campaignid"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Tahmini Bedeli </label>
                        <div>
                            <select name="opportunity_estimatedcost" id="opportunity_list_opportunity_estimatedcost"
                                    class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_estimatedcost" id="btn_islem_opportunity_estimatedcost"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Tahmini Dönemi </label>
                        <div>
                                <div data-date-viewmode="years" data-date-format="mm-yyyy" data-date=""
                                     class="input-append date dpYears" style="float: left; width: 170px">
                                    <input name="opportunity_todate" id="opportunity_list_opportunity_todate"  type="text" readonly="" size="16"
                                           class="form-control" >
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button" style=" height: 35px; "><i
                                                            class="fa fa-calendar"></i></button>
                                              </span>
                                </div>

                            <button type="button" name="btn_islem_opportunity_todate"
                                    id="btn_islem_opportunity_todate" onclick="toogle(this)"
                                    class="btn btn-success" style=" height: 35px; margin-left: 30px"><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Durumu </label>
                        <div>
                            <select name="opportunity_status" id="opportunity_list_opportunity_status" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_sourceid" id="btn_islem_opportunity_sourceid"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Olasılığı </label>
                        <div>
                            <select name="opportunity_probability" id="opportunity_list_opportunity_probability"
                                    class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_islem_opportunity_probability" id="btn_islem_opportunity_probability"
                                    onclick="toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>


                </div>

                <div class="col-lg-4 margin-left-100">

                    <section class="panel search-panel-background">
                        <header class="panel-heading">
                            <i class="search-i-font">Arama Kriterleri : </i>

                        </header>
                        <div class="panel-body ">
                            <div id="search_opportunity_name" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Fırsat Adı </i>
                                    <a onclick="$('#search_opportunity_name').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    <div class="">
                                        <button type="button"class="btn btn-warning search-btn-margin" >
                                            <i id="search_i_name"></i>ddasd</button>
                                        <span id="search_span_name">vvcxvx</span>
                                    </div>
                                </div>
                            </div>
                            <div id="search_opportunity_accountid" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Müşteri </i>
                                    <a onclick="$('#search_opportunity_accountid').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_opportunity_partnerid" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  İş Ortağı </i>
                                    <a onclick="$('#search_opportunity_partnerid').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_opportunity_contactid" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Müşteri Yöneticisi </i>
                                    <a onclick="$('#search_opportunity_contactid').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_opportunity_sourceid" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Kaynak Türü </i>
                                    <a onclick="$('#search_opportunity_sourceid').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                            </div>
                            <div id="search_opportunity_campaignid" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Kaynak Detayı </i>
                                    <a onclick="$('#search_opportunity_campaignid').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                            </div>
                            <div id="search_opportunity_estimatedcost" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Tahmini Bedeli </i>
                                    <a onclick="$('#search_opportunity_estimatedcost').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                            </div>
                            <div id="search_opportunity_todate" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Tahmini Dönemi </i>
                                    <a onclick="$('#search_opportunity_todate').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                            </div>
                            <div id="search_opportunity_status" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Durumu </i>
                                    <a onclick="$('#search_opportunity_status').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                            </div>
                            <div id="search_opportunity_probability" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font">  Olasılığı </i>
                                    <a onclick="$('#search_opportunity_probability').hide()" class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                            </div>

                        </div>
                    </section>

                </div>
            </div>
        </form>

        <div class="listele-table">

            <table id="opportunity_list_table" class="display" width="100%"></table>

        </div>


    </div>
@stop