<form name="form_bulletin_update" id="form_bulletin_update-{{ $data->id }}" class="form-horizontal tasi-form center-block"
      role="form">
    <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
    <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
    <input type="hidden" name="id" id="contactid">
    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <label for="bulletin_name" class="col-sm-1 width-150 control-label">E-Bulten Adı :</label>
                <div class="col-sm-7">
                    <input name="name" type="text" id="update_bulletin_name" type="text"
                           class="form-control width-400" required>
                </div>

            </div>

            <div class="form-group">
                <label for="bulletin_date" class="col-sm-1 width-150 control-label">Açıklama :</label>
                <div class="col-sm-7">
                            <textarea name="description" id="update_bulletin_description" class="form-control "
                                      style="width:400px; height: 100px; float: left; resize: none" required></textarea>
                </div>
            </div>

        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label for="type" class="col-sm-1 width-150 control-label">E-Bülten Tipi :</label>
                <div class="col-sm-7">
                    <select name="type" id="update_bulletin_type" class="form-control width-300" required>
                        <option value="" disabled selected>Seçiniz</option>
                        <option value="red">Kırmızı Bülten</option>
                        <option value="blue">Mavi Bülten</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="bulletin_date" class="col-sm-1 width-150 control-label">Gönderim Başlangıç Tarihi
                    :</label>
                <div class="col-sm-7">
                    <div class="input-group date form_datetime-componentUpdateStart-{{$bulletinId}}"style="width: 273px;"
                         data-link-field="form-datetime-start_update-{{$bulletinId}}" data-link-format="yyyy-mm-dd hh:ii">
                        <input id="update_bulletin_startdate" type="text" readonly="" size="16"
                               class="form-control"  required>
                                                <span class="input-group-btn add-on">
                                                <button type="button" class="btn btn-danger date-set"
                                                        style=" height: 35px; "><i class="fa fa-calendar"></i></button>
                                                </span>
                        <input name="startdate" type="hidden" id="form-datetime-start_update-{{$bulletinId}}" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="bulletin_date" class="col-sm-1 width-150 control-label">Gönderim Bitiş Tarihi
                    :</label>
                <div class="col-sm-5  width-200">
                    <div class="date form_datetime-componentUpdateEnd-{{$bulletinId}}" style="width: 273px;"
                         data-link-field="form-datetime-end_update-{{$bulletinId}}" data-link-format="yyyy-mm-dd hh:ii">
                        <input id="update_bulletin_enddate" type="text" readonly="" size="16"
                               class="form-control" required>
                                                <span class="input-group-btn add-on">
                                                <button type="button" class="btn btn-danger date-set"
                                                        style=" height: 35px; "><i class="fa fa-calendar"></i></button>
                                                </span>
                        <input name="enddate" type="hidden" id="form-datetime-end_update-{{$bulletinId}}" value="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <input name="btn_bulletin_update" id="btn_bulletin_update-{{ $data->id }}" type="button"
                           value="Güncelle" class="btn btn-success btn_bulletin_add_margin">
                </div>
            </div>
        </div>
    </div>

    <section class="panel" style="margin-top: 50px">
        <header class="panel-heading tab-bg-dark-navy-grey ">
            <ul class="nav nav-tabs bold">
                <li class="active">
                    <a data-toggle="tab" href="#bulletin_update_bulletinContact_div">E-Bülten Gönderimi Yapılan
                        Kişiler</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#bulletin_update_bulletinFile_div">E-Bülten Dosyası</a>
                </li>
            </ul>
        </header>
        <div class="panel-body">
            <div class="tab-content">
                <div id="bulletin_update_bulletinContact_div" class="tab-pane active">

                    <table id="bulletin_update_bulletinContact_table-{{ $data->id }}" class="display" width="100%">
                        <thead>
                        <tr>
                            <th><input name="select_all" value="1" type="checkbox" id="select-all-check-{{$data->id}}"></th>
                            <th>E-Bülten Yapılacak Kişinin Adı</th>
                            <th>E-Bülten Yapıcalak Kişinin Soyadı</th>
                        </tr>
                        </thead>
                    </table>
                <pre id="example-console">
                </pre>
                </div>
                <div id="bulletin_update_bulletinFile_div" class="tab-pane">

                    <input name="btn_bulletin_update" id="btn_bulletin_update" type="button"
                           value="Dosya Ekle" class="btn btn-success" data-toggle="modal"
                           href="#modal_bulletin_fileUpload-{{ $data->id }}">

                    <table id="bulletin_update_bulletinFile_table-{{ $data->id }}" width="100%">

                    </table>

                </div>
            </div>
        </div>
    </section>
</form>

<div class="modal fade modal-dialog-center" id="modal_bulletin_fileUpload-{{ $data->id }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content-wrap">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">E-Bülten Dosya Ekle</h4>
                </div>
                <div id="modal_bulletin_file_body" style="width: 500px; height: 350px">
                    <form name="form_bulletin_fileUpload" id="form_bulletin_fileUpload-{{ $data->id }}" enctype="multipart/form-data"
                          class="form-horizontal tasi-form center-block" role="form" method="post"
                          action="{{Request::root()}}/crm/ebulten_yonetimi/add_document">
                        <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
                        <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
                        <input type="hidden" name="bulletinid" value="{!! $data->id !!}">
                        <div class="col-lg-6" style="padding-top: 50px">
                            <div class="form-group">
                                <label for="bulletin_name" class="col-sm-1 width-150 control-label" style="float: left">Dosya
                                    Adı :</label>
                                <div class="col-sm-5 width-200">
                                    <input name="name" type="text" id="update_bulletin_fileName" type="text"
                                           class="form-control width-200" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type" class="col-sm-1 width-150 control-label" style="float: left">Dosya
                                    Tipi :</label>
                                <div class="col-sm-5 width-200">
                                    <select name="type" id="update_bulletin_type" class="form-control width-200"
                                            required>
                                        <option value="" disabled selected>Seçiniz</option>
                                        <option value="ebrosur">Broşür</option>
                                        <option value="info">Bilgi Dökümanı</option>
                                        <option value="referans">Referans Dökümanı</option>
                                        <option value="tecsolution">Teknik Çözüm Dökümanı</option>
                                        <option value="price">Fiyat Listesi</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1 control-label width-150">
                                    <div>
                                        <input name="url" type="file" id="update_bulletin_file" class="default">
                                    </div>
                                </div>
                            </div>
                            <input name="modal_bulletin_file_add" class="btn btn-success" type="submit"
                                   id="modal_bulletin_file_add" value="Ekle">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"> Kapat</button>
                </div>

            </div>
        </div>
    </div
</div>

<script type="text/javascript">

    $(".form_datetime-component").datetimepicker({
        format: "yyyy-mm-dd hh:ii",
        autoclose: true
    });

    fillBulletinAddDataTable({!! $data2 !!}, {!! $data4 !!}, {{ $data->id }});
    fillBulletinContactDataTable({!! $data3 !!}, {{ $data->id }});

    $('#btn_bulletin_update-{{ $data->id }}').on('click', function () {
        var b = $('#form_bulletin_update-{{ $data->id }}').serializeArray();
        $.ajax({
            url: window.location + '/update',
            type: 'POST',
            data: b,
            success: function (data) {
                fillBulletinAddDataTable(data.data2, data.data4);
                toastrMessage("Başarılı!", "Güncelleme işlemi başarıyla tamamlandı!", "success");
            }, error: function () {
                toastrMessage("Hata!", "İstediğiniz işlem yapılamadı!", "error");
            }
        });
    });
        if (!$('#form_bulletin_fileUpload-{{ $data->id }}').valid()) {
            toastrMessage("Hata!", "Lütfen boş alanların hepsini doldurunuz!", "error");
        } else {
            $("#form_bulletin_fileUpload-{{ $data->id }}").ajaxForm({
                        success: function (response, status) {
                            console.log(status);
                            if (response == 1) {
                                toastrMessage("Hata!", "Dosya gereksinimleri geçersiz!", "error");
                            } else if (response == 2) {
                                toastrMessage("Hata!", "Dosya türü geçersiz!", "error");
                            } else {
                                toastrMessage("Başarılı!", "Dosya ekleme işlemi başarıyla tamamlandı!", "success");
                                $('#modal_bulletin_fileUpload-{{ $data->id }}').modal('hide');
                                fillBulletinContactDataTable(response, {{ $data->id }});
                            }
                        }, error: function () {
                            toastrMessage("Hata!", "Dosya ekleme işlemi yapılamadı!", "error");

                        }
                    }
            );
        }

    var date = new Date();
    var startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes());
    var FromEndDate = new Date();
    var ToEndDate = new Date();

    ToEndDate.setDate(ToEndDate.getDate() + 365);

    $('.form_datetime-componentUpdateStart-{{$bulletinId}}').datetimepicker({
        format: "dd MM yyyy DD hh:ii",
        language: 'tr',
        weekStart: 1,
        startDate: startDate,
        autoclose: true
    }).on('changeDate', function (selected) {
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        startDate = new Date(startDate.getUTCFullYear(), startDate.getUTCMonth(), startDate.getUTCDate(), startDate.getUTCHours(), startDate.getUTCMinutes());
        $('.form_datetime-componentUpdateEnd-{{$bulletinId}}').datetimepicker("destroy").datetimepicker('setStartDate', startDate);
    });

    $('.form_datetime-componentUpdateEnd-{{$bulletinId}}').datetimepicker({
                weekStart: 1,
                language: 'tr',
                format: "dd MM yyyy DD hh:ii",
                startDate: startDate,
                initialDate: startDate,
                endDate: ToEndDate,
                autoclose: true
            })
            .on('changeDate', function (selected) {
                FromEndDate = new Date(selected.date.valueOf());
                FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                FromEndDate = new Date(FromEndDate.getUTCFullYear(), FromEndDate.getUTCMonth(), FromEndDate.getUTCDate(), FromEndDate.getUTCHours(), FromEndDate.getUTCMinutes());
                $('.form_datetime-componentUpdateStart-{{$bulletinId}}').datetimepicker("destroy").datetimepicker('setEndDate', FromEndDate);
            });


</script>
