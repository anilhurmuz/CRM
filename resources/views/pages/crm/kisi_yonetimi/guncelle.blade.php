@if($reqtype == "1")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <meta name="csrf-token" content="{!! csrf_token() !!}"/>
  <link rel="shortcut icon" href="{{Request::root()}}/img/favicon.png">

  <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{Request::root()}}/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{Request::root()}}/css/bootstrap-reset.css" rel="stylesheet">
  <link href="{{Request::root()}}/css/toastr.css" rel="stylesheet">
  <!--external css-->
  <link href="{{Request::root()}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
  <link href="{{Request::root()}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
  media="screen"/>
  <link rel="stylesheet" href="{{Request::root()}}/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="{{Request::root()}}/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
  <!--right slidebar-->
  <link href="{{Request::root()}}/css/slidebars.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link href="{{Request::root()}}/css/style.css" rel="stylesheet">
  <link href="{{Request::root()}}/css/customstyle.css" rel="stylesheet">
  <link href="{{Request::root()}}/css/style-responsive.css" rel="stylesheet"/>
  <link href="{{Request::root()}}/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="{{Request::root()}}/js/jquery.js"></script>
  <script src="{{Request::root()}}/js/jquery-1.12.0.min.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
  <!--[if lt IE 9]>

  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>




  <![endif]-->

</head>

<body>
  @endif
  <form name="form_musteri_guncelle" id="form_musteri_guncelle"
  class="form-horizontal tasi-form center-block">
  <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
  <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
  <input type="hidden" class="contId" name="id" value="">
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
          <select name="account" id="kisi_ekle_contact_account" class="form-control input-sm m-bot15"  style="width:200px; float: left;" required disabled>
            @foreach($firmNames as $firmName)
            <option value="{{ $firmName->id }}">{{ $firmName->name }}</option>
            @endforeach
          </select>
        </div>

      </div>
      <div class="form-group">
        <label class="col-sm-1 control-label width-150">Durumu</label>
        <div class="col-sm-5">
          <select name="status" id="kisi_ekle_account_contact_status"
          class="form-control input-sm m-bot15"
          style="width:200px; float: left;" disabled>
          <option value="" disabled selected>Seçiniz</option>
          <option value="aktif">Çalışan</option>
          <option value="pasif">Ayrılmış</option>
        </select>

      </div>

    </div>
    <div class="form-group">
      <label class="col-sm-1 control-label width-150">Ünvanı</label>
      <div class="col-sm-5">
        <input name="title" id="kisi_ekle_account_contact_title" type="text"
        class="form-control width-200" disabled>
      </div>

    </div>

    <div class="form-group">

      <div class="col-sm-5">

        <button type="button" name="btn_kisi_islem" id="btn_kisi_islem" data-toggle="dropdown"
        class="btn-kisi-islem-margin-left btn btn-success" data-toggle="modal" aria-expanded="false"
        href="#myModal5"><i
        class="fa fa-plus"></i> İşlemler <b class="caret"></b>
      </button>
      <ul role="menu"  class="dropdown-menu extended inbox">
        <div class="notify-arrow notify-arrow-red"></div>
        <li><a data-toggle="modal" href="#modalContactCompany-{{$contact}}">Kişi Firma Ekleme</a></li>
      </ul>
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
      <option value="" disabled selected>Seçiniz</option>
      <option value="yes">Evet</option>
      <option value="no">Hayır</option>
      <option value="deny">Kişi Reddetti</option>
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
      <button name="btn_kisi_güncelle" id="btn_kisi_güncelle" type="button"
      class="btn-kisi-add-margin-left btn btn-warning">
      Güncelle
    </button>
  </div>
</div>
</div>
</div>
</form>

<div class="modal fade modal-dialog-center" id="modalContactCompany-{{$contact}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content-wrap">
      <section class="panel">
        <header class="panel-heading tab-bg-dark-navy-grey ">
          Kişi Firma Ekleme
        </header>
        <div class="tab-pane active panel-body">
          <form name="form_islem_kisi_firma" id="form_islem_kisi_firma-{{$contact}}"
          class="form-horizontal tasi-form center-block">
          <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
          <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
          <input type="hidden" name="contactid" value="{{  $contact }}">
          <div class="row">
            <div class="col-lg-3">

              <div class="form-group">
                <label class="col-sm-1 control-label width-150">Firması</label>
                <div class="col-sm-5">
                  <select name="account" id="kisi_ekle_contact_account" class="form-control input-sm m-bot15"  style="width:200px; float: left;" required>
                    @foreach($firmNames as $firmName)
                    <option value="{{ $firmName->id }}">{{ $firmName->name }}</option>
                    @endforeach
                  </select>
                </div>

              </div>
              <div class="form-group">
                <label class="col-sm-1 control-label width-150">Durumu</label>
                <div class="col-sm-5">
                  <select name="status" id="info_status" class="form-control input-sm m-bot15"
                  style="width:200px; float: left;">
                  <option value="" disabled selected>Seçiniz</option>
                  <option value="aktif">Çalışan</option>
                  <option value="pasif">Ayrılmış</option>
                </select>

              </div>

            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label width-150">Ünvanı</label>
              <div class="col-sm-5">
                <input name="title" id="contact_title" type="text" class="form-control width-200">
              </div>

            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label width-150"></label>
              <div class="col-sm-5">
                <button type="button" id="addRow" class="btn btn-success">Ekle </button>
                <button data-dismiss="modal" class="btn btn-danger">Close </button>

              </div>
            </div>

          </div>
        </div>
      </form>
    </div>
  </section>
</div>

</div>
</div>

<section class="panel" style="margin-top: 50px">
  <header class="panel-heading tab-bg-dark-navy-grey ">
    <ul class="nav nav-tabs bold">
      <li class="active">
        <a data-toggle="tab" href="#firms">Çalıştığı Firmalar</a>
      </li>
    </ul>
  </header>
  <div class="panel-body">
    <div class="tab-content">
      <div id="firms" class="tab-pane active">

        <table id="kisi-update-table-{{$contact}}" class="display" width="100%"></table>

      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
$(document).ready(function() {

  getContactInfo({!! $contactInfo !!}, {{ $contact }});

});

$('#addRow').on('click', function() {
  var a = $('#form_islem_kisi_firma-{{$contact}}').serializeArray();
  $.ajax({
    url:   'http://localhost/CRM/public/crm/kisi_yonetimi/firma_ekle',
    type: 'POST',
    data: a,
    success: function(data) {
      console.log(data);
      getContactInfo(data, {{ $contact }});
      $('#modalContactCompany-{{$contact}}').modal('hide');
      toastrMessage("Başarılı!", "Firma ekleme işlemi başarıyla tamamlandı!", "success");
    }, error: function() {
      alert('ajax error!');
    }
  });
});
$('#btn_kisi_güncelle').on('click', function() {
  var b = $('#form_musteri_guncelle').serializeArray();
  $.ajax({
    url: 'http://localhost/CRM/public/crm/kisi_yonetimi/update',
    type: 'POST',
    data: b,
    success:function(data) {
        toastrMessage("Başarılı!", "Güncelleme işlemi başarıyla tamamlandı!", "success");
    }, error: function() {
      alert('ajax error!');
    }
  });
});

</script>
@if($reqtype == "1")
<script src="{{Request::root()}}/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{Request::root()}}/js/jquery-migrate-1.2.1.min.js"></script>
<script src="{{Request::root()}}/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="{{Request::root()}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{Request::root()}}/js/jquery.scrollTo.min.js"></script>
<script src="{{Request::root()}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{Request::root()}}/js/respond.min.js"></script>


<!--right slidebar-->
<script src="{{Request::root()}}/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="{{Request::root()}}/js/common-scripts.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{Request::root()}}/js/jquery.dataTables.min.js"></script>
<script src="{{Request::root()}}/js/musteri_yonetim.js"></script>
<script src="{{Request::root()}}/js/toastr.js"></script>
<script src="{{Request::root()}}/js/toastr-message.js"></script>
<script>
$('document').ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});
</script>

</body>
</html>
@endif
