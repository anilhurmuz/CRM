@section('tab')
    @parent
<li class="active" id="li_listele">
    <a data-toggle="tab" href="#listele" id="a_listele">Listele</a>
</li>
    @stop

@section('tabcontent')
    @parent
<div id="listele" class="tab-pane active panel-body">
    <form name="form_müsteri_listele" id="form_müsteri_listele"
          class="form-horizontal tasi-form center-block" method="post">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Müşteri Kısa Adı</label>
                    <div>
                        <select name="name" id="acc_name" class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button name="btn_islem_acc_name" id="btn_islem_acc_name"
                                onclick="toogle(this)" class="btn btn-success btn-success-green"
                                type="button" style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Müşteri Ünvanı</label>
                    <div>
                        <select name="title" id="acc_title"
                                class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button name="btn_islem_acc_title" id="btn_islem_acc_title"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Durumu</label>
                    <div>
                        <select name="status" id="acc_status"
                                class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button name="btn_islem_acc_status" id="btn_islem_acc_status"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Sektörü</label>
                    <div>
                        <select name="industry" id="acc_industry"
                                class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button name="btn_islem_acc_industry" id="btn_islem_acc_industry"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>


            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Tipi</label>
                    <div>
                        <select name="type" id="acc_type" class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button name="btn_islem_acc_type" id="btn_islem_acc_type"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Vergi Dairesi</label>
                    <div>
                        <select name="taxoff" id="acc_taxoff"
                                class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button name="btn_islem_acc_taxoff" id="btn_islem_acc_taxoff"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Vergi Numarası</label>
                    <div>
                        <select name="taxno" id="acc_taxno"
                                class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button name="btn_islem_acc_taxno" id="btn_islem_acc_taxno"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Muh. Kodu</label>
                    <div>
                        <select name="acccode" id="acc_acccode"
                                class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">

                        </select>
                        <button type="button" name="btn_islem_acc_acccode"
                                id="btn_islem_acc_acccode" onclick="toogle(this)"
                                class="btn btn-success" style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>


            </div>

            <div class="col-lg-4">

                <section class="panel search-panel-background">
                    <header class="panel-heading">
                        <i class="search-i-font">Arama Kriterleri : </i>

                    </header>
                    <div class="panel-body ">
                        <div id="search_name" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Müşteri Kısa Adı </i>
                                <a onclick="$('#search_name').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background">
                                <div class="">
                                    <button type="button"class="btn btn-warning search-btn-margin" >
                                        <i id="search_i_name"></i>ddasd</button>
                                    <span id="search_span_name">vvcxvx</span>
                                </div>
                            </div>
                        </div>
                        <div id="search_title" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Müşteri Ünvanı </i>
                                <a onclick="$('#search_title').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background">
                                dasdsadsadadasdasdsadsadas
                            </div>

                        </div>
                        <div id="search_status" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Durumu </i>
                                <a onclick="$('#search_status').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background">
                                dasdsadsadadasdasdsadsadas
                            </div>

                        </div>
                        <div id="search_industry" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Sektörü </i>
                                <a onclick="$('#search_industry').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background">
                                dasdsadsadadasdasdsadsadas
                            </div>

                        </div>
                        <div id="search_type" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Tipi </i>
                                <a onclick="$('#search_type').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                        </div>
                        <div id="search_taxoff" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Vergi Dairesi </i>
                                <a onclick="$('#search_taxoff').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                        </div>
                        <div id="search_taxno" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Vergi Numarası </i>
                                <a onclick="$('#search_taxno').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                        </div>
                        <div id="search_acccode" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Muh. kodu </i>
                                <a onclick="$('#search_acccode').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas</div>

                        </div>

                    </div>
                </section>

            </div>
        </div>
    </form>

    <div class="listele-table">


        <table id="musteri_listele_tablo" class="display" width="100%"></table>


    </div>


</div>
@stop