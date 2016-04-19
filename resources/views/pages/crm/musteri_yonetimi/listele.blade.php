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
                        <input type="text" name="name" id="acc_list_name" class="form-control input-sm m-bot15"
                               style="width:200px; float: left;" autocomplete="on"/>
                        <button name="btn_islem_acc_name" id="btn_islem_acc_name"
                                onclick="toogle(this)" class="btn btn-success btn-success-green"
                                type="button" style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Müşteri Ünvanı</label>
                    <div>
                        <input type="text" name="title" id="acc_list_title" class="form-control input-sm m-bot15"
                               style="width:200px; float: left;" autocomplete="on"/>
                        <button name="btn_islem_acc_title" id="btn_islem_acc_title"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Durumu</label>
                    <div>
                        <select name="status" id="acc_list_status"
                                class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="aktif">Aktif</option>
                            <option value="pasif">Pasif</option>
                        </select>
                        <button name="btn_islem_acc_status" id="btn_islem_acc_status"
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
                        <select name="type" id="acc_list_type" class="form-control"
                                style="width:200px; float: left;">
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="musteri">Müşteri</option>
                            <option value="potansiyel">Potansiyel Müşteri</option>
                            <option value="muhtemel">Muhtemel Aday</option>
                        </select>
                        <button name="btn_islem_acc_type" id="btn_islem_acc_type"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Sektörü</label>
                    <div>
                        <select name="industry" id="acc_list_industry" class="form-control input-sm m-bot15"
                                style="width:200px; float: left;">
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="sektor1">Sektör 1</option>
                            <option value="sektor2">Sektör 2</option>
                        </select>
                        <button name="btn_islem_acc_industry" id="btn_islem_acc_industry"
                                onclick="toogle(this)" class="btn btn-success" type="button"
                                style=" height: 30px; "><i
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
                                <div class="">
                                    <span id="search_span_title">vvcxvx</span>
                                </div>
                            </div>

                        </div>
                        <div id="search_status" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Durumu </i>
                                <a onclick="$('#search_status').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background">
                                <div class="">
                                    <span id="search_span_status">vvcxvx</span>
                                </div>
                            </div>

                        </div>
                        <div id="search_industry" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Sektörü </i>
                                <a onclick="$('#search_industry').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background">
                                <div class="">
                                    <span id="search_span_industry">vvcxvx</span>
                                </div>
                            </div>

                        </div>
                        <div id="search_type" class="m-bot15" style="display: none">
                            <header class="search-panel-header">
                                <i class="search-sub-header-font">  Tipi </i>
                                <a onclick="$('#search_type').hide()" class="fa fa-times-circle pull-right"></a>
                            </header>
                            <div class="search-subdiv-background">
                                <div class="">
                                    <span id="search_span_type">vvcxvx</span>
                                </div>
                            </div>

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