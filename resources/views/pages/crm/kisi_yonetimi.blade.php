@extends('app')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-grey ">
                    <ul class="nav nav-tabs bold">

                        <li class="active" id="li_kisi_listele">
                            <a data-toggle="tab" href="#div_kisi_listele" id="a_kisi_listele">Listele</a>
                        </li>
                        <li class="" id="li_kisi_ekle">
                            <a data-toggle="tab" href="#div_kisi_ekle" id="a_kisi_ekle">Ekle</a>
                        </li>
                        <li class="" id="li_kisi_güncelle" style="display: none;">
                            <a data-toggle="tab" href="#div_kisi_güncelle" id="a_kisi_güncelle">Düzenle</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">

                        <div id="div_kisi_listele" class="tab-pane active panel-body">
                            <form name="form_kisi_listele" id="form_kisi_listele"
                                  class="form-horizontal tasi-form center-block" method="post">
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
                        <div id="div_kisi_ekle" class="tab-pane panel-body">
                            <form name="form_kisi_ekle" id="form_kisi_ekle" action="{{Request::root()}}/crm/kisi_yonetimi/create"
                                  class="form-horizontal tasi-form center-block" method="post">
                                <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
                                <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Adı</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="name" id="kisi_ekle_contact_name" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Soyadı</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="surname" id="kisi_ekle_contact_surname" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Firması</label>
                                            <div class="col-sm-5">
                                                <input name="account" id="kisi_ekle_contact_account" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Durumu</label>
                                            <div class="col-sm-5">
                                                <select name="status" id="kisi_ekle_account_contact_status"
                                                        class="form-control input-sm m-bot15"
                                                        style="width:200px; float: left;">

                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Ünvanı</label>
                                            <div class="col-sm-5">
                                                <input name="title" id="kisi_ekle_account_contact_title" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">İş Telefonu</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="phone1" id="kisi_ekle_info_phone1" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Cep Telefonu</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="phone2" id="kisi_ekle_info_phone2" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Facebook</label>
                                            <div class="col-sm-5">
                                                <input name="facebook" id="kisi_ekle_info_facebook" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Twitter</label>
                                            <div class="col-sm-5">
                                                <input name="twitter" id="kisi_ekle_info_twitter" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Linkedin</label>
                                            <div class="col-sm-5">
                                                <input name="linkedin" id="kisi_ekle_info_linkedin" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">E-Bülten</label>
                                            <div class="col-sm-5">
                                                <select name="bulletin" id="kisi_ekle_contact_bulletin"
                                                        class="form-control input-sm m-bot15"
                                                        style="width:200px; float: left;">

                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150"
                                                   style="float: left">Açıklama</label>
                                            <div>
                                                <textarea name="description" id="kisi_ekle_info_description" class="form-control"
                                                          style="width:500px; height: 280px; float: left;"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150"></label>
                                            <div class="col-sm-5 width-200">
                                                <button name="btn_islem_musteri_adres_ekle"
                                                        id="btn_kisi_ekle" type="submit"
                                                        class="btn-kisi-add-margin-left btn btn-success">Ekle
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                        </div>
                        <div id="div_kisi_güncelle" class="tab-pane panel-body">
                            <form name="form_musteri_guncelle" id="form_musteri_guncelle" action="{{Request::root()}}/crm/kisi_yonetimi/update"
                                  class="form-horizontal tasi-form center-block" method="post">
                                <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
                                <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Adı</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="name" id="kisi_ekle_contact_name" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Soyadı</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="surname" id="kisi_ekle_contact_surname" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Firması</label>
                                            <div class="col-sm-5">
                                                <input name="account" id="kisi_ekle_contact_account" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Durumu</label>
                                            <div class="col-sm-5">
                                                <select name="status" id="kisi_ekle_account_contact_status"
                                                        class="form-control input-sm m-bot15"
                                                        style="width:200px; float: left;">

                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Ünvanı</label>
                                            <div class="col-sm-5">
                                                <input name="title" id="kisi_ekle_account_contact_title" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-5">

                                                <button type="button" name="btn_kisi_islem" id="btn_kisi_islem"
                                                        class="btn-kisi-islem-margin-left btn btn-success" data-toggle="modal"
                                                        href="#myModal5"><i
                                                            class="fa fa-plus"></i> İşlemler
                                                </button>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">İş Telefonu</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="phone1" id="kisi_ekle_info_phone1" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Cep Telefonu</label>
                                            <div>
                                                <div class="col-sm-5">
                                                    <input name="phone2" id="kisi_ekle_info_phone2" type="text"
                                                           class="form-control width-200">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Facebook</label>
                                            <div class="col-sm-5">
                                                <input name="facebook" id="kisi_ekle_info_facebook" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Twitter</label>
                                            <div class="col-sm-5">
                                                <input name="twitter" id="kisi_ekle_info_twitter" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">Linkedin</label>
                                            <div class="col-sm-5">
                                                <input name="linkedin" id="kisi_ekle_info_linkedin" type="text"
                                                       class="form-control width-200">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150">E-Bülten</label>
                                            <div class="col-sm-5">
                                                <select name="bulletin" id="kisi_ekle_contact_bulletin"
                                                        class="form-control input-sm m-bot15"
                                                        style="width:200px; float: left;">

                                                </select>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150"
                                                   style="float: left">Açıklama</label>
                                            <div>
                                                <textarea name="description" id="kisi_ekle_info_description" class="form-control"
                                                          style="width:500px; height: 280px; float: left;"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label width-150"></label>
                                            <div class="col-sm-5 width-200">
                                                <button name="btn_kisi_güncelle" id="btn_kisi_güncelle" type="submit"
                                                        class="btn-kisi-add-margin-left btn btn-warning">
                                                    Güncelle
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <!-- Güncelle Alt Tablosu Başlangıcı

                            <section class="panel" style="margin-top: 50px">
                                <header class="panel-heading tab-bg-dark-navy-grey ">
                                    <ul class="nav nav-tabs bold">
                                        <li class="active">
                                            <a data-toggle="tab" href="#iletişim">İletişim</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#kişiler">Kişiler</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#satışfırsatları">Satış Fırsatları</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#sözleşmeler">Sözleşmeler</a>
                                        </li>
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div id="iletişim" class="tab-pane active">

                                            <table id="güncelle_iletişim_tablo" width="100%">

                                            </table>

                                        </div>
                                        <div id="kişiler" class="tab-pane">

                                            <table id="güncelle_kişiler_tablo" width="100%">

                                            </table>

                                        </div>
                                        <div id="satışfırsatları" class="tab-pane"></div>
                                        <div id="sözleşmeler" class="tab-pane"></div>
                                    </div>
                                </div>
                            </section>

                             Güncelle Alt Tablosu Bitişi

                            -->

                        </div>

                    </div>
                </div>
            </section>
        </section>


    </section>


    <script src="{{Request::root()}}/js/kisi_yonetimi.js"></script>

    <script>
        $(function () {
            insertDataToListe({!! $mydata !!});
        });


    </script>
@endsection