@section('tab')
    @parent

<li class="" id="li_ekle">
    <a data-toggle="tab" href="#ekle" id="a_ekle">Ekle</a>
</li>
    @stop


@section('tabcontent')
    @parent
<div id="ekle" class="tab-pane panel-body">

    <form name="form_musteri_ekle" id="form_musteri_ekle" class="form-horizontal tasi-form center-block" method="post"
          action="{{Request::root()}}/crm/musteri_yonetimi/create">
        <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
        <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
        <div class="row">
            <div class="col-lg-3 col-lg-3-30">
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Müşteri Kısa Adı</label>
                    <div class="col-sm-5">
                        <input name="name" id="acc_name" type="text" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Müşteri Ünvanı</label>
                    <div class="col-sm-5">
                        <input name="title" id="acc_title" type="text" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Durumu</label>
                    <div class="col-sm-5">
                        <select name="status" id="acc_status" class="form-control">
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="aktif">Aktif</option>
                            <option value="pasif">Pasif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-lg-3-30">
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Sektörü</label>
                    <div class="col-sm-5">
                        <select name="industry" id="acc_industry" class="form-control">
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="sektor1">Sektör 1</option>
                            <option value="sektor2">Sektör 2</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Tipi</label>
                    <div class="col-sm-5">
                        <select name="type" id="acc_type" class="form-control">
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="musteri">Müşteri</option>
                            <option value="potansiyel">Potansiyel Müşteri</option>
                            <option value="muhtemel">Muhtemel Aday</option>
                        </select>
                    </div>
                </div>


            </div>

            <div class="col-lg-3 col-lg-3-30">
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Vergi Dairesi</label>
                    <div class="col-sm-5">
                        <input name="taxoff" id="acc_taxoff" type="text" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Vergi Numarası</label>
                    <div class="col-sm-5">
                        <input name="taxno" id="acc_taxno" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Muh. Kodu</label>
                    <div class="col-sm-5">
                        <input name="acccode" id="acc_acccode" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150"></label>
                    <div class="col-sm-5">
                        <button name="btn_musteri_ekle" id="btn_musteri_ekle" type="submit" class="btn-add-margin-left btn btn-success">Ekle
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@stop