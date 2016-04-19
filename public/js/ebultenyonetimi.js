/**
* Created by crow on 1.04.2016.
*/

function li_update_close(id){
  //previousObj = $("#li_update_account-"+id).prev('li');
  $('#div_kisi_güncelle-'+id+ ", #li_kisi_güncelle-"+id).remove();
  delete window.openTabs[id];
  //if(window.openTabs) {previousObj.find('a').click();}
  //else {$('#listele','a').click(); alert('tablar bitti.');}
  $('#li_ebulten_listele a').click();

}

function createGuncelleTab(id,name,dynamicTabContent,dynamicTabList,htmlData){
  if(!window.openTabs) {
    window.openTabs = [];
  }

  if(!window.openTabs[id]) {
    window.openTabs[id] = true;
    var div = "<div id='div_kisi_güncelle-" + id + "' class='tab-pane panel-body'>" + htmlData + "</div>";
    $('#' + dynamicTabContent).append(div);
    var list = "<li id='li_kisi_güncelle-" + id + "' style='display: block;'><a data-toggle='tab' href='#div_kisi_güncelle-" + id + "' id='a_kisi_güncelle' style='float: left'>" + name + " - Güncelle " +
    "       " +
    "<i onclick='li_update_close(" + id + ")'  class='fa fa-times color-red'></i></a></li>";
    $('#' + dynamicTabList).append(list);
  } else {
    $("#li_kisi_güncelle-" + id + " a ").click();
  }

}


function fillDataToBulletinListDataTable(dataSet) {

  $('#bulletin_list_table').DataTable( {
    data: dataSet,
    columns: [
      { title: "E-Bülten Numarası", data:"id"},
      { title: "E-Bülten Adı", data: "name"},
      { title:'İşlemler', defaultContent:"<button class='btn btn-primary btn-xs btn-tablo-guncelle'><i class='fa fa-pencil'>  Güncelle</i>" +
      "</button><button class='btn btn-danger btn-xs btn-tablo-sil' data-toggle='modal' href='#musteri_modal_sil'><i class='fa fa-trash-o '>  Sil</i></button>"}
    ],

    "language": {
      "lengthMenu": ' <select>'+
      '<option value="10">10</option>'+
      '<option value="30">30</option>'+
      '<option value="50">50</option>'+
      '<option value="100">100</option>'+
      '<option value="200">200</option>'+
      '<option value="500">500</option>'+
      '<option value="1000">1000</option>'+
      '<option value="-1">All</option>'+
      '</select> Kayıt Görüntüle',
      "sInfo": "Toplam \_TOTAL\_ sonuç arasından \_START\_ ile \_END\_ arasındaki sonuçlar gösteriliyor.",
      "paginate": {
        "next": "İleri",
        "previous": "Geri"
      },
      "emptyTable": "Tablo içinde görüntülenecek veri bulunamadı",
      "sInfoEmpty": "Toplam 0 sonuç arasından 0 ile 0 arasındaki sonuçlar gösteriliyor."
    },

    fnCreatedRow:function(row,data,index){

      var my_token = $('#my_token').val();

      $(row).find('.btn-tablo-guncelle').on('click',function(){
        showguncelle(data);
      });

      $(row).on('dblclick',function(){
        showguncelle(data);
      });

      $(row).find('.btn-tablo-sil').on('click',function(){

        $('#modal_delete_body').html(data['name'] + '   isimli e-bülteni silmek istediğinizden emin misiniz?');
        $('#modal_delete').on('click',function(){
          $.ajax({
            url : window.location + '/delete',
            type: 'POST',
            data: {'id':data['id'],'_token':my_token,'type':data['type']},
            success:function(data){
              row.remove();
            }
          });
          $('#musteri_modal_sil').modal('hide');

        });
      });


    }

  } );
}

function fillBulletinAddDataTable(dataSet, dataSet2) {

  if ( $.fn.DataTable.isDataTable('#bulletin_update_bulletinContact_table') ) {
    $('#bulletin_update_bulletinContact_table').DataTable().destroy();
  }

  var table =  $("#bulletin_update_bulletinContact_table").DataTable({
    data: dataSet,
    'columnDefs': [{
      'targets': 0,
      'searchable': false,
      'orderable': false,
      'className': 'dt-body-center',
      'render': function(data, type, full, meta) {
        return '<input type="checkbox" name="contactId[]" value="' + $('<div/>').text(data).html() + '">';
      }
    }],
    columns: [
      {data: "contactId"},
      {data: "name"},
      {data: "surname"}
    ],

    fnCreatedRow: function(row, data, dataIndex){
      for(var i in dataSet2){
        if(dataSet2[i]['parentid'] == data['contactId']){
          $(row).find('input[type="checkbox"]').prop('checked','checked');
          break;
        }
      }
    },
    "language": {
      "lengthMenu": ' <select>' +
      '<option value="10">10</option>' +
      '<option value="30">30</option>' +
      '<option value="50">50</option>' +
      '<option value="100">100</option>' +
      '<option value="200">200</option>' +
      '<option value="500">500</option>' +
      '<option value="1000">1000</option>' +
      '<option value="-1">All</option>' +
      '</select> Kayıt Görüntüle',
      "sInfo": "Toplam \_TOTAL\_ sonuç arasından \_START\_ ile \_END\_ arasındaki sonuçlar gösteriliyor.",
      "paginate": {
        "next": "İleri",
        "previous": "Geri"
      },
      "emptyTable": "Tablo içinde görüntülenecek veri bulunamadı",
      "sInfoEmpty": "Toplam 0 sonuç arasından 0 ile 0 arasındaki sonuçlar gösteriliyor."
    },
    'order' : [[1, 'asc']]
  });

  $('#select-all-check').on('click', function(){
    var rows = table.rows({ 'search': 'applied' }).nodes();
    $('input[type="checkbox"]', rows).prop('checked', this.checked);
  });

  $('#bulletin_update_bulletinContact_table tbody').on('change', 'input[type="checkbox"]', function() {
    if(!this.checked) {
      var el = $('#select-all-check').get(0);
      if(el && el.checked && ('indeterminate' in el)) {
        el.indeterminate = true;
      }
    }
  });

  $('#form_bulletin_update').on('submit', function(e) {
    var form = this;
    table.$('input[type="checkbox"]').each(function() {
      if(!$.contains(document, this)) {
        if(this.checked) {
          $(form).append(
            '<input type="hidden" name="' + this.name + '" value="'+ this.value +'">'
          );
        }
      }
      else if(!this.checked){
        $(form).append(
          '<input type="hidden" name="uncheckcontactId[]" value="' + this.value + '">'
        );
      }
    });
  });

}

function fillBulletinContactDataTable(dataSet) {
  $('#bulletin_update_bulletinFile_table').DataTable({
    data: dataSet,
    columns: [
      {title: "Ad", data: "name"},
      {title: "Soyad", data: "surname"}
    ],

    "language": {
      "lengthMenu": ' <select>' +
      '<option value="10">10</option>' +
      '<option value="30">30</option>' +
      '<option value="50">50</option>' +
      '<option value="100">100</option>' +
      '<option value="200">200</option>' +
      '<option value="500">500</option>' +
      '<option value="1000">1000</option>' +
      '<option value="-1">All</option>' +
      '</select> Kayıt Görüntüle',
      "sInfo": "Toplam \_TOTAL\_ sonuç arasından \_START\_ ile \_END\_ arasındaki sonuçlar gösteriliyor.",
      "paginate": {
        "next": "İleri",
        "previous": "Geri"
      },
      "emptyTable": "Tablo içinde görüntülenecek veri bulunamadı",
      "sInfoEmpty": "Toplam 0 sonuç arasından 0 ile 0 arasındaki sonuçlar gösteriliyor."
    }
  });
}

function showguncelle(rowData){

  var my_token = $('[name="csrf-token"]').attr('content');


  $.ajax({
    url : window.location + '/edit',
    type: 'POST',
    data: {'data':rowData['id'],'_token':my_token},
    success:function(data){
      var id = rowData['id'];
      //assigns id to the related modals
      $('.bulletinId').val(id);
      //brings the Guncelle tab.
      createGuncelleTab(rowData['id'],rowData['name'],'dynamicTabContent','dynamicTabList',data);
      //fills the Guncelle form.
      $('#div_kisi_güncelle-' + id + ' .bullentinId').val(rowData.id);
      $('#div_kisi_güncelle-' + id + ' #update_bulletin_name').val(rowData.name);
      $('#div_kisi_güncelle-' + id + ' #update_bulletin_date').val(rowData.todate);
      $('#div_kisi_güncelle-' + id + ' #update_bulletin_type').val(rowData.type);
    },
    error: function () {
      alert('ajax error!');
    }
  });
}
