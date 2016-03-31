@if ($infoData['type'] == "musteri")
    {{$disabled = "disabled"}}
@else
    {{$disabled = ""}}
@endif

<form name="form_musteri_guncelle" id="form_musteri_guncelle"
      class="form-horizontal tasi-form center-block" method="post" action="{{Request::root()}}/crm/musteri_yonetimi/update">
    <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
    <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
    <input type="hidden" name="id" id="guncelle_acc_id" value="{{$infoData['parentid']}}">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Müşteri Kısa Adı</label>
                <div class="col-sm-5">
                    <input name="name" id="guncelle_acc_name" type="text" value="{{$customerInfo['name']}}" class="form-control">
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Müşteri Ünvanı</label>
                <div class="col-sm-5">
                    <input name="title" id="guncelle_acc_title" type="text" value="{{$customerInfo['title']}}" class="form-control">
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Durumu</label>
                <div class="col-sm-5">
                    <select name="status" id="guncelle_acc_status" value="pasif" class="form-control">
                        <option value="aktif"  @if ($infoData['status'] == "aktif") {{"selected"}} @endif>Aktif</option>
                        <option value="pasif"  @if ($infoData['status'] == "pasif") {{"selected"}} @endif>Pasif</option>
                    </select>
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-5">
                    <button data-toggle="dropdown" type="button" name="btn_mus_islem" id="btn_mus_islem"
                            class="btn-add-margin-left btn btn-success"  aria-expanded="false">İşlemler</button>
                    <ul role="menu" class="dropdown-menu">
                        <li><a data-toggle="modal" onclick="onCityClick()" href="#modalAccountAddress">Müşteri Adresi Ekleme</a></li>
                        <li><a data-toggle="modal" href="#modalAccountContact">Kişi Ekleme</a></li>

                    </ul>
                </div>

            </div>

        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Sektörü</label>
                <div class="col-sm-5">
                    <select name="industry" id="guncelle_acc_industry" class="form-control">
                        <option value="sektor1" @if ($customerInfo['industry'] == "sektor1") {{"selected"}} @endif>Sektor 1</option>
                        <option value="sektor2" @if ($customerInfo['industry'] == "sektor2") {{"selected"}} @endif>Sektor 2</option>
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Tipi</label>
                <div class="col-sm-5">
                    <select name="type" id="guncelle_acc_type" class="form-control" @if ($infoData['type'] == "musteri") {{"readonly"}} @endif>
                        <option value="musteri" @if ($infoData['type'] == "musteri") {{"selected"}} @endif>Müşteri</option>
                        <option value="potansiyel" @if ($infoData["type"] == "potansiyel") {{"selected"}} @endif {{$disabled}}>Potansiyel Müşteri</option>
                        <option value="muhtemel" @if ($infoData["type"] == "muhtemel") {{"selected"}} @endif {{$disabled}}>Muhtemel Aday</option>
                    </select>
                </div>
            </div>


        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Vergi Dairesi</label>
                <div class="col-sm-5">
                    <input name="taxoff" id="guncelle_info_taxoff" value="{{$infoData['taxoff']}}"  type="text" class="form-control">
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Vergi Numarası</label>
                <div class="col-sm-5">
                    <input name="taxno" id="guncelle_info_taxno" value="{{$infoData['taxno']}}" type="text" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Muh. Kodu</label>
                <div class="col-sm-5">
                    <input name="acccode" id="guncelle_info_acccode" value="{{$infoData['acccode']}}" type="text" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150"></label>
                <div class="col-sm-5">
                    <button name="btn_mus_güncelle" id="btn_mus_güncelle" type="submit"
                            class="btn-add-margin-left btn btn-warning">
                        Güncelle
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>

<!-- Güncelle Alt Tablosu Başlangıcı-->

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
<!-- Güncelle Alt Tablosu Bitişi -->
