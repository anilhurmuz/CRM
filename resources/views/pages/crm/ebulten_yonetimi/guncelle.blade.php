<form name="form_bulletin_update" id="form_bulletin_update" class="form-horizontal tasi-form center-block"
      data-toggle="validator" role="form" method="post"
      action="{{Request::root()}}/crm/ebulten_yonetimi/update">
    <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
    <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
    <input type="hidden" name="id" class="bulletinId" value="">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="bulletin_name" class="col-sm-1 width-150 control-label">E-Bulten Adı :</label>
                <div class="col-sm-5">
                    <input name="name" type="text" id="update_bulletin_name" type="text"
                           class="form-control width-200" required>
                    <div class="help-block with-errors"></div>
                </div>

            </div>

            <div class="form-group">
                <label for="bulletin_date" class="col-sm-1 width-150 control-label">Gönderim Tarihi :</label>
                <div class="col-sm-5  width-200">
                    <div class="date form_datetime-component">
                        <input name="todate" id="update_bulletin_date" type="text" readonly="" size="16"
                               class="form-control">
                                                <span class="input-group-btn add-on">
                                                <button type="button" class="btn btn-danger date-set"
                                                        style=" height: 35px; "><i class="fa fa-calendar"></i></button>
                                                </span>
                    </div>

                </div>

            </div>
            <div class="form-group">
                <label for="type" class="col-sm-1 width-150 control-label">E-Bülten Tipi :</label>
                <div class="col-sm-5">
                    <select name="type" id="update_bulletin_type" class="form-control" required>
                        <option value="" disabled selected>Seçiniz</option>
                        <option value="ebrosur" >Broşür</option>
                        <option value="info" >Bilgi Dökümanı</option>
                        <option value="referans" >Referans Dökümanı</option>
                        <option value="tecsolution" >Teknik Çözüm Dökümanı</option>
                        <option value="price" >Fiyat Listesi</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-1 control-label width-150">
                    <div>
                        <input type="file" id="update_bulletin_file" class="default">

                    </div>
                </div>
                <div class="col-sm-5">
                    <input name="btn_bulletin_update" id="btn_bulletin_update" type="submit"
                           value="Güncelle" class="btn btn-warning margin-left-100-width">
                </div>
            </div>



        </div>
    </div>



<section class="panel" style="margin-top: 50px">
    <header class="panel-heading tab-bg-dark-navy-grey ">
        <ul class="nav nav-tabs bold">
            <li class="active">
                <a data-toggle="tab" href="#bulletin_update_bulletinContact_div">E-Bülten Gönderimi Yapılan Kişiler</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#bulletin_update_bulletinFile_div">E-Bülten Dosyası</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <div class="tab-content">
            <div id="bulletin_update_bulletinContact_div" class="tab-pane active">

                <table id="bulletin_update_bulletinContact_table" class="display" width="100%">
                    <thead>
                    <tr>
                        <th><input name="select_all" value="1" type="checkbox" id="select-all-check"></th>
                        <th>E-Bülten Yapılacak Kişinin Adı</th>
                        <th>E-Bülten Yapıcalak Kişinin Soyadı</th>
                    </tr>
                    </thead>
                </table>
                <pre id="example-console">
                </pre>
            </div>
            <div id="bulletin_update_bulletinFile_div" class="tab-pane">

                <table id="bulletin_update_bulletinFile_table" width="100%">

                </table>

            </div>
        </div>
    </div>
</section>
</form>
<script type="text/javascript">

    $(".form_datetime-component").datetimepicker({
        format: "yyyy-mm-dd hh:ii",
        autoclose: true
    });

    fillBulletinAddDataTable({!! $data2 !!}, {!! $data4 !!});
    fillBulletinContactDataTable({!! $data3 !!});

</script>

