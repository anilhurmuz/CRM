@section('tab')
    @parent
    <li class="active" id="li_kisi_listele">
        <a data-toggle="tab" href="#div_kisi_listele" id="a_kisi_listele">Listele</a>
    </li>
@stop

@section('tabcontent')
    @parent
    <div id="div_kisi_listele" class="tab-pane active panel-body">
        <form name="form_kisi_listele" id="form_kisi_listele"
              class="form-horizontal tasi-form center-block" method="post">
            <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
            <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
            <input type="hidden" class="contId" name="id" value="">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Adı</label>

                        <div>
                            <select name="name" id="kisi_listele_name" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_name" id="btn_kisi_search_name"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Soyadı</label>
                        <div>
                            <select name="surname" id="kisi_listele_surname" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_surname" id="btn_kisi_search_surname"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Firması</label>
                        <div>
                            <select name="account" id="kisi_listele_account" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_account" id="btn_kisi_search_account"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Durumu</label>
                        <div>
                            <select name="status" id="kisi_listele_status" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_status" id="btn_kisi_search_status"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Ünvanı</label>
                        <div>
                            <select name="title" id="kisi_listele_title" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_title" id="btn_kisi_search_title"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">İş Telefonu</label>
                        <div>
                            <select name="phone1" id="kisi_listele_phone1" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_phone1" id="btn_kisi_search_phone1"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Cep Telefonu</label>
                        <div>
                            <select name="phone2" id="kisi_listele_phone2" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_phone2" id="btn_kisi_search_phone2"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4">


                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Facebook</label>
                        <div>
                            <select name="facebook" id="kisi_listele_facebook" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_facebook" id="btn_kisi_search_facebook"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Twitter</label>
                        <div>
                            <select name="twitter" id="kisi_listele_twitter" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_twitter" id="btn_kisi_search_twitter"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">Linkedin</label>
                        <div>
                            <select name="linkedin" id="kisi_listele_linkedin" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_linkedin" id="btn_islem_contact_linkedin"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150">E-Bülten</label>
                        <div>
                            <select name="bulletin" id="kisi_listele_bulletin" class="form-control input-sm m-bot15"
                                    style="width:200px; float: left;">

                            </select>
                            <button name="btn_kisi_search_bulletin" id="btn_islem_bulletin"
                                    onclick="kisi_searc_toogle(this)" class="btn btn-success" type="button"
                                    style=" height: 30px; "><i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150"
                               style="float: left">Açıklama</label>
                        <div>
                                                <textarea name="description" id="kisi_listele_description"
                                                          class="form-control"
                                                          style="width:400px; height: 200px; float: left;"></textarea>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <section class="panel search-panel-background">
                        <header class="panel-heading">
                            <i class="search-i-font">Arama Kriterleri : </i>

                        </header>
                        <div class="panel-body ">
                            <div id="search_kisi_name" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Adı </i>
                                    <a onclick="$('#search_kisi_name').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    <div class="">
                                        <button type="button"
                                                class="btn btn-warning search-btn-margin">
                                            <i id="search_i_kisi_name"></i>ddasd
                                        </button>
                                        <span id="search_span__kisi_name">vvcxvx</span>
                                    </div>
                                </div>
                            </div>
                            <div id="search_kisi_surname" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Soyadı </i>
                                    <a onclick="$('#search_kisi_surname').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_status" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Durumu </i>
                                    <a onclick="$('#search_kisi_status').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_title" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Ünvanı </i>
                                    <a onclick="$('#search_kisi_title').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background">
                                    dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_account" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Firması </i>
                                    <a onclick="$('#search_kisi_account').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_phone1" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> İş Telefonu </i>
                                    <a onclick="$('#search_kisi_phone1').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_phone2" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Cep Telefonu </i>
                                    <a onclick="$('#search_kisi_phone2').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_facebook" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Facebook </i>
                                    <a onclick="$('#search_kisi_facebook').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_twitter" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Twitter </i>
                                    <a onclick="$('#search_kisi_facebook').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_linkedin" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> Linkedin </i>
                                    <a onclick="$('#search_kisi_likedin').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas
                                </div>

                            </div>
                            <div id="search_kisi_bulletin" class="m-bot15" style="display: none">
                                <header class="search-panel-header">
                                    <i class="search-sub-header-font"> E-Bülten </i>
                                    <a onclick="$('#search_kisi_bulletin').hide()"
                                       class="fa fa-times-circle pull-right"></a>
                                </header>
                                <div class="search-subdiv-background"> dasdsadsadadasdasdsadsadas
                                </div>

                            </div>

                        </div>
                    </section>

                </div>
            </div>

        </form>

        <div class="listele-table">

            <table id="kisi_listele_tablo" class="display" width="100%"></table>

        </div>


    </div>
@stop