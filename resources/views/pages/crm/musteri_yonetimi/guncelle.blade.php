<?php
  if($type=='musteri') $disabled = 'disabled';
  else $disabled = '';
?>
@include('pages.modals')
@include('pages.commonmodals')

@section('modalAccountAddress')
@show
@section('modalAccountContact')
@show
@section('modalRemove')
@show


<form name="form_musteri_guncelle" id="form_musteri_guncelle"
      class="form-horizontal tasi-form center-block">
    <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
    <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
    <input type="hidden" name="id" id="guncelle_acc_id" value="{{$customerInfo['id']}}">
    <div class="row">
        <div class="col-lg-3">
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
                        <option value="aktif"  @if ($customerInfo['status'] == "aktif") {{"selected"}} @endif>Aktif</option>
                        <option value="pasif"  @if ($customerInfo['status'] == "pasif") {{"selected"}} @endif>Pasif</option>
                    </select>
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-5">
                    <button data-toggle="dropdown" type="button" name="btn_mus_islem" id="btn_mus_islem"
                            class="btn-add-margin-left btn btn-success"  aria-expanded="false">İşlemler</button>
                    <ul role="menu" class="dropdown-menu">
                        <li><a data-toggle="modal" onclick="onCityClick('info_citycode',0)" href="#modalAccountAddress-{{$type}}-{{$customerInfo['id']}}">Müşteri Adresi Ekleme</a></li>
                        <li><a data-toggle="modal" href="#modalAccountContact-{{$type}}-{{$customerInfo['id']}}" @if($type != 'musteri' ) {!! "style='display: none;'" !!} @endif>Kişi Ekleme</a></li>

                    </ul>
                </div>

            </div>

        </div>
        <div class="col-lg-3">
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
                    <select name="type" id="guncelle_acc_type" class="form-control" @if ($type == "musteri") {{"readonly"}} @endif>
                        <option value="musteri" @if ($type == "musteri") {{"selected"}} @endif>Müşteri</option>
                        <option value="potansiyel" @if ($type == "potansiyel") {{"selected"}} @endif {{$disabled}}>Potansiyel Müşteri</option>
                        <option value="muhtemel" @if ($type == "muhtemel") {{"selected"}} @endif {{$disabled}}>Muhtemel Aday</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150"></label>
                <div class="col-sm-5">
                    <button name="btn_mus_güncelle" id="btn_mus_güncelle" type="button"
                            class="btn-add-margin-left btn btn-warning">
                        Güncelle
                    </button>
                </div>
            </div>
        </div>

    </div>
</form>

@section('modalAccountAddressEdit')
@show

        <!-- Güncelle Alt Tablosu Başlangıcı-->

<section class="panel" style="margin-top: 50px">
    <header class="panel-heading tab-bg-dark-navy-grey ">
        <ul class="nav nav-tabs bold">
            <li class="active">
                <a data-toggle="tab" href="#iletişim">İletişim</a>
            </li>
            @if( $type == 'musteri' )
            <li class="">
                <a data-toggle="tab" href="#kişiler">Kişiler</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#satışfırsatları">Satış Fırsatları</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#sözleşmeler">Sözleşmeler</a>
            </li>
            @endif
        </ul>
    </header>
    <div class="panel-body">
        <div class="tab-content">
            <div id="iletişim" class="tab-pane active">

                <table id="account_update_address-{{$type}}-{{$customerInfo['id']}}" class="display" width="100%">

                </table>
                <script type="text/javascript">
                    insertIletisimToListe({!! $tableDataAddress !!},'{{$type}}-{{$customerInfo['id']}}');
                </script>

            </div>
            <div id="kişiler" class="tab-pane">
                <table id="account_update_contacts-{{$type}}-{{$customerInfo['id']}}" class="display" width="100%">

                </table>
                <script type="text/javascript">
                    @if($tableDataContact !=null)
                    insertDataToContact({!!$tableDataContact!!}, '{{$type}}-{{$customerInfo['id']}}');
                    @endif

                    $('#btn_mus_güncelle').on('click', function() {
                        var a = $('#form_musteri_guncelle').serializeArray();
                        console.log(a);
                        $.ajax({
                            url:  'http://localhost/CRM/public/crm/musteri_yonetimi/update',
                            type: 'POST',
                            data: a,
                            success: function(data) {
                                toastrMessage("Başarılı!", "Güncelleme işlemi başarıyla tamamlandı!", "success");
                            }, error: function() {
                                toastrMessage("Hata!","İstediğiniz işlem yapılamadı!", "error");
                            }
                        });
                    });
                </script>
            </div>

            <div id="satışfırsatları" class="tab-pane"></div>
            <div id="sözleşmeler" class="tab-pane"></div>
        </div>
    </div>
</section>

<div class="modal fade modal-dialog-center" id="AccountContactUpdateModal-{{$type}}-{{$customerInfo['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="custom-modal-content">

    <section class="panel">
      <header class="panel-heading tab-bg-dark-navy-blue ">
        Müşteri Adresi Güncelleme
      </header>
      <div class="tab-pane active panel-body" id="modalAccountContactUpdate-{{$type}}-{{$customerInfo['id']}}">

      </div>
    </section>
    <div class="modal-footer">
      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
    </div>
  </div>

</div>
</div>


<!-- Güncelle Alt Tablosu Bitişi -->
