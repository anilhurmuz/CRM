<!--    -->
var dataSet = [];

var iletişim = [

];
var kisiler = [

];

function li_update_close(id){
    //previousObj = $("#li_update_account-"+id).prev('li');
    $('#update-'+id+ ", #li_update_account-"+id).remove();
    delete window.openTabs[id];
    //if(window.openTabs) {previousObj.find('a').click();}
    //else {$('#listele','a').click(); alert('tablar bitti.');}
    $('#li_listele a').click();

}


function toogle(buton){

    if(buton.id == 'btn_islem_acc_name'){
        $("div#search_name").toggle(100);
        $("#search_span_name").html($("#acc_list_name").val());
    }
    else if(buton.id == 'btn_islem_acc_title'){
        $("div#search_title").toggle(100);
        $("#search_span_title").html($("#acc_list_title").val());
    }

    else if(buton.id == 'btn_islem_acc_status'){
        $("div#search_status").toggle(100);
        $("#search_span_status").html($("#acc_list_status").val());
    }

    else if(buton.id == 'btn_islem_acc_industry'){
        $("div#search_industry").toggle(100);
        $("#search_span_industry").html($("#acc_list_industry").val());
    }

    else if(buton.id == 'btn_islem_acc_type'){
        $("div#search_type").toggle(100);
        $("#search_span_type").html($("#acc_list_type").val());
    }



}

function createGuncelleTab(id,name,dynamicTabContent,dynamicTabList,htmlData){
    if(!window.openTabs) {
        window.openTabs = [];
    }

    if(!window.openTabs[id]) {
        window.openTabs[id] = true;

        //console.log(id);

        var div = "<div id='update-" + id + "' class='tab-pane panel-body'>" + htmlData + "</div>";
        $('#' + dynamicTabContent).append(div);
        var list = "<li id='li_update_account-" + id + "' style='display: block;'><a data-toggle='tab' href='#update-" + id + "' id='a_güncelle' style='float: left'>" + name + " - Güncelle " +
            "<button onclick='li_update_close(\"" + id + "\")' class='btn-li-close fa fa-times btn-danger'></button></a></li>";
        $('#' + dynamicTabList).append(list);
    } else {
        $("#li_update_account-"+id + " a ").click();
    }

}

function showguncelle(rowData){

    var my_token = $('[name="csrf-token"]').attr('content');


    $.ajax({
        url : window.location + '/edit',
        type: 'POST',
        data: {'data':rowData['id'],'_token':my_token,'type':rowData['type']},
        success:function(htmlData){
            //brings the Guncelle tab.
            var uniqueId = rowData['type'] + "-" + rowData['id'];
            createGuncelleTab(uniqueId,rowData['name'],'dynamicTabContent','dynamicTabList',htmlData);
        },
        error: function () {
            alert('ajax error!');
        }
    });
}

function insertDataToListe(dataset) {

    $('#musteri_listele_tablo').DataTable( {
        data: dataset,
        "columnDefs" : [
            {
                targets  :   [0],
                visible :   false,
                searchable: false

            }
        ],
        columns: [
            { data:"id"},
            { title: "Müşteri Kısa Adı", data:"name" },
            { title: "Müşteri Ünvanı", data:"title" },
            { title: "Durumu", data:"status" },
            { title: "Sektörü.", data:"industry" },
            { title: "Tipi", data:"type" },
            {title:'İşlemler', defaultContent:"<button class='btn btn-primary btn-xs btn-tablo-guncelle'><i class='fa fa-pencil'>  Güncelle</i>" +
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

                $('#modal_delete_body').html(data['name'] + '   isimli müşteriyi silmek istediğinizden eminmisiniz?');
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


function insertIletisimToListe(dataset, tableId) {



    $('#account_update_address-'+tableId).DataTable( {
        data: dataset,
        "columnDefs" : [
            {
                targets  :   [0,1,2,3,4],
                visible :   false,
                searchable: false

            }
        ],
        columns: [
            { data: "parentid" },
            { data: "parenttype" },
            { data:"id"},
            { data:"cityid"},
            { data:"countyid"},
            { title: "Adres Türü", data: "type" },
            { title: "Durumu", data: "status"  },
            { title: "Adresi", data: "address"  },
            { title: "İlçe." , data: "citycode" },
            { title: "İl", data: "countycode"  },
            { title: "Posta Kodu" , data: "zipcode" },
            { title: "Telefon-1." , data: "phone1" },
            { title: "Telefon-2" , data: "phone2" },
            { title: "WEB", data: "web"  },
            { title: "Vergi Dairesi" , data: "taxoff" },
            { title: "Vergi No" , data: "taxno" },
            { title: "Muhasebe Kodu", data: "acccode"  },
            {title:'İşlemler', defaultContent:"<button class='btn btn-primary btn-xs btn-tablo-guncelle-iletisim'><i class='fa fa-pencil'>  Güncelle</i>" +
            "</button><button class='btn btn-danger btn-xs btn-tablo-sil-iletisim' data-toggle='modal' href='#musteri_modal_sil'><i class='fa fa-trash-o '>  Sil</i></button>"}
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

            $(row).find('.btn-tablo-guncelle-iletisim').on('click',function(){
                // güncellenecek kisim
                $.ajax({
                    url : window.location + '/edit_address',
                    type: 'POST',
                    data: {'parentid':data['parentid'],'parenttype':data['parenttype'],'id':data['id'],'_token':my_token},
                    success:function(htmlData){

                        var parentid = data['parentid'];
                        var rowId = data['id'];
                        var type = data['parenttype'];
                        console.log(type);

                        $('body').append(htmlData);
                        $('#modalAccountAddressEdit-'+type+"-"+parentid).modal('show');
                        $('#info_type-'+rowId).val(data['type']);
                        $('#info_status-'+rowId).val(data['status']);
                        //its to set selected city & county to the options.
                        onCityCountyUpdate('info_citycode-'+type+"-"+rowId, 'info_countycode-'+type+"-"+rowId,data['cityid'],data['countyid']);
                    }
                });
            });


            $(row).find('.btn-tablo-sil-iletisim').on('click',function(){

                $('#modal_delete_body').html( ' isimli müşteriye ait '+ data.citycode + ' ' +  data.countycode + ' adres bilgilerini silmek istediğinizden emin misiniz?');
                $('#modal_delete').on('click',function(){
                    $.ajax({
                        url : window.location + '/delete_address',
                        type: 'POST',
                        data: {'id':data['id'],'_token':my_token},
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

//iliskili kişileri tabloya ekleme kısmı, henüz tamamlanmadı.
function insertContactsToEditTable(dataset, tableId) {

    $('#account_update_contacts-'+tableId).DataTable( {
        data: dataset,
        "columnDefs" : [
            {
                targets  :   [0,1,2],
                visible :   false,
                searchable: false

            }
        ],
        columns: [
            { data: "parentid" },
            { data: "parenttype" },
            { data:"id"},
            { title: "Adı", data: "type" },
            { title: "Soyadı", data: "status"  },
            { title: "Ünvanı", data: "address"  },
            { title: "Telefon" , data: "citycode" },
            { title: "Cep Telefonu", data: "countycode"  },
            { title: "e-posta adres" , data: "zipcode" },
            { title: "e-bülten üyeliği" , data: "phone1" },
            {title:'İşlemler', defaultContent:"<button class='btn btn-primary btn-xs btn-tablo-guncelle-iletisim'><i class='fa fa-pencil'>  Güncelle</i>" +
            "</button><button class='btn btn-danger btn-xs btn-tablo-sil-iletisim' data-toggle='modal' href='#musteri_modal_sil'><i class='fa fa-trash-o '>  Sil</i></button>"}
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

            $(row).find('.btn-tablo-guncelle-iletisim').on('click',function(){
                // güncellenecek kisim
                $.ajax({
                    url : window.location + '/edit_contact',
                    type: 'POST',
                    data: {'parentid':data['parentid'],'parenttype':data['parenttype'],'id':data['id'],'_token':my_token},
                    success:function(htmlData){
                        //güncelle tıklandığında...
                    }
                });
            });


            $(row).find('.btn-tablo-sil-iletisim').on('click',function(){

                $('#modal_delete_body').html( ' isimli müşteriye ait kişiyi silmek istediğinizden emin misiniz?');
                $('#modal_delete').on('click',function(){
                    $.ajax({
                        url : window.location + '/delete_address',
                        type: 'POST',
                        data: {'id':data['id'],'_token':my_token},
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

$(document).ready(function() {

        $("#acc_list_name").autocomplete ({
            source: window.location + '/autocompleteAccListName',
            minLength: 1
        });

        $("#acc_list_title").autocomplete ({
            source: window.location + '/autocompleteAccListTitle'
        });



    $('#güncelle_kişiler_tablo').DataTable( {
        data: iletişim,
        columns: [
            { title: "Adı" , data: "" },
            { title: "Soyadı" , data: "" },
            { title: "Ünvanı" , data: "" },
            { title: "Telefon." , data: "" },
            { title: "Cep Telefonu" , data: "" },
            { title: "E-Posta Adresi" , data: "" },
            { title: "E-Bülten Üyeliği" , data: "" },
            {title:'İşlemler', defaultContent:"<button class='btn btn-primary btn-xs'><i class='fa fa-pencil'>  Güncelle</i></button><button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '>  Sil</i></button>" }
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
        }

    } );



} );


function onCityClick(selectCityId,rowCityId){
    var my_token = $('#my_token').val();
    var selectCity = $('.'+selectCityId);
    var selected ="";
    $.ajax({
        url : window.location + '/fill_city_county',
        type: 'POST',
        dataType:'json',
        data: {'_token':my_token,'request':'city'},
        success:function(data){
            $.each(data, function(key, val){
                selectCity.append('<option value="' + val.id + '">' + val.name + '</option>');
            });

            selectCity.val(rowCityId);
        },
        error: function () {
            alert('ajax error!');
        }
    });
}

function onCityChanged(selectCityId,selectCountyId,rowCountyId){
    var my_token = $('#my_token').val();
    var selectCity = $('.'+selectCityId);
    var selectCounty = $('.'+selectCountyId);
    var selected ="";

    selectCounty.html('<option value="" disabled selected>Seçiniz</option>');

    $.ajax({
        url : window.location + '/fill_city_county',
        type: 'POST',
        dataType:'json',
        data: {'_token':my_token,'request':'county','cityId':selectCity.val()},
        success:function(data){
            $.each(data, function(key, val){
                selectCounty.append('<option value="' + val.id+ '">' + val.name + '</option>');
            });

            selectCounty.val(rowCountyId);

        },
        error: function () {
            alert('ajax error!');
        }
    });

}

function onCityCountyUpdate(selectCityId,selectCountyId,rowCityId,rowCountyId){
    var my_token = $('#my_token').val();
    var selectCity = $('.'+selectCityId);
    var selected ="";
    $.ajax({
        url : window.location + '/fill_city_county',
        type: 'POST',
        dataType:'json',
        data: {'_token':my_token,'request':'city'},
        success:function(data){
            $.each(data, function(key, val){
                if(val.id == rowCityId) selected = "selected";
                else selected = "";

                selectCity.append('<option value="' + val.id + '"'+selected+'>' + val.name + '</option>');
            });
            onCityChanged(selectCityId,selectCountyId,rowCountyId);
        },
        error: function () {
            alert('ajax error!');
        }
    });
}


function insertDataToContact(dataset, tableId) {

    $('#account_update_contacts-' + tableId).DataTable( {
        data: dataset,
        "columnDefs" : [
            {
                targets  :   [0],
                visible :   false,
                searchable: false

            }
        ],
        columns: [
            { data:"id"},
            { title: "Adı", data:"name" },
            { title: "Soyadı", data:"surname" },
            { title: "Durumu", data:"status" },
            { title: "Ünvanı", data:"title" },
            { title: "Firması", data:"account" },
            { title: "İş Telefonu", data:"phone1" },
            { title: "Cep Telefonu", data:"phone2" },
            { title:'İşlemler', defaultContent:"<button class='btn btn-primary btn-xs btn-tablo-guncelle'><i class='fa fa-pencil'>  Güncelle</i>" +
            "</button><button class='btn btn-danger btn-xs btn-tablo-sil'><i class='fa fa-trash-o '>  Sil</i></button>"}
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
                showguncelle2(data);
            });


            $(row).find('.btn-tablo-sil').on('click',function(){
                if(confirm(data['name']+" isimli kullanıcı silmek istediğinizden emin misiniz?")){
                    $.ajax({
                        url : window.location + '/contactDeleteInAccount',
                        type: 'POST',
                        data: {'id':data['id'], '_token':my_token},
                        success:function(data){
                            row.remove();
                        }, error:function() {
                            alert('AJAX ERROR!');
                        }
                    });
                }

            });
        }

    } );
}



function showguncelle2(rowData){

    var my_token = $('[name="csrf-token"]').attr('content');

    $.ajax({
        url :  'http://localhost/CRM/public/crm/kisi_yonetimi/edit',
        type: 'POST',
        data: {'data':rowData['id'],'_token':my_token},
        success:function(data){
            var id = rowData['id'];
            //assigns id to the related modals
            $('.contId').val(id);
            console.log(id);
            //brings the Guncelle tab.
            createGuncelleTab2(rowData['accountid'],rowData['type']);
            //fills the iframe Guncelle form.
            $('iframe').load(function() {
                $('iframe').contents().find('.contId').val(rowData.id);
                $('iframe').contents().find('#kisi_ekle_contact_name').val(rowData.name);
                $('iframe').contents().find('#kisi_ekle_contact_surname').val(rowData.surname);
                $('iframe').contents().find('#kisi_ekle_contact_account').val(rowData.accountid);
                $('iframe').contents().find('#kisi_ekle_account_contact_status').val(rowData.status);
                $('iframe').contents().find('#kisi_ekle_account_contact_title').val(rowData.title);
                $('iframe').contents().find('#kisi_ekle_info_phone1').val(rowData.phone1);
                $('iframe').contents().find('#kisi_ekle_info_phone2').val(rowData.phone2);
                $('iframe').contents().find('#kisi_ekle_info_facebook').val(rowData.facebook);
                $('iframe').contents().find('#kisi_ekle_info_twitter').val(rowData.twitter);
                $('iframe').contents().find('#kisi_ekle_info_linkedin').val(rowData.linkedin);
                $('iframe').contents().find('#kisi_ekle_contact_bulletin').val(rowData.bulletin);
                $('iframe').contents().find('#kisi_ekle_info_description').val(rowData.description);
            });
        },
        error: function () {
            alert('ajax error!');
        }
    });
}

function createGuncelleTab2(id,type){
        var my_token = $('[name="csrf-token"]').attr('content');

        var iframe = '<iframe src="http://localhost/CRM/public/crm/kisi_yonetimi/edit?_token='+my_token+'&data='+id+'&frame=1" width="100%" height="1000" frameborder="0" allowtransparency="true" scrolling="no"></iframe>';
        console.log(id);
        $('#modalAccountContactUpdate-'+type+'-'+id).html(iframe);
        $('#AccountContactUpdateModal-'+type+'-'+id).modal('show');
}


function getContactInfo(dataSet, tableId) {

          if ( $.fn.DataTable.isDataTable('#kisi-update-table-' + tableId) ) {
          $('#kisi-update-table-' + tableId).DataTable().destroy();
            }

          $('#kisi-update-table-' + tableId).DataTable({
           data: dataSet,
           columnDefs: [
               {
                   "targets": [0],
                   "visible": false,
                   "searchable": false
                 }
           ],
           columns: [
               {data: "id"},
               {title: "Firma", data: "name"},
               {title: "Ünvanı", data: "title"}
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
           }
       });
}
