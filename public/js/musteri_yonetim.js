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

    if(buton.id == 'btn_islem_acc_name')
        $("div#search_name").toggle(100);
    else if(buton.id == 'btn_islem_acc_title')
        $("div#search_title").toggle(100);
    else if(buton.id == 'btn_islem_acc_status')
        $("div#search_status").toggle(100);
    else if(buton.id == 'btn_islem_acc_industry')
        $("div#search_industry").toggle(100);
    else if(buton.id == 'btn_islem_acc_type')
        $("div#search_type").toggle(100);
    else if(buton.id == 'btn_islem_acc_taxoff')
        $("div#search_taxoff").toggle(100);
    else if(buton.id == 'btn_islem_acc_taxno')
        $("div#search_taxno").toggle(100);
    else if(buton.id == 'btn_islem_acc_acccode')
        $("div#search_acccode").toggle(100);


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

function forIFrame(rowData) {


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

                        $('#modals-'+ parentid).html(htmlData);
                        $('#modalAccountAddressEdit-'+parentid).modal('show');
                        $('#info_type-'+rowId).val(data['type']);
                        $('#info_status-'+rowId).val(data['status']);
                        //its to set selected city & county to the options.
                        onCityCountyUpdate('info_citycode-'+rowId, 'info_countycode-'+rowId,data['cityid'],data['countyid']);
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

    $('.form-address').on('submit',function(event){
        alert("deneme");
        var postData = $(this).serializeArray();
        var actionURL = $(this).attr('action');

        $.ajax({
            url : actionURL,
            type: "POST",
            data : postData,
            success:function(data)
            {
                alert(data);
            },
            error: function(data)
            {
                alert('ajax- form-adress error!');
            }
        });

        event.preventDefault(); //STOP default action
        event.unbind(); //unbind. to stop multiple form submit.
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
    var selectCity = $('#'+selectCityId);
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
    var selectCity = $('#'+selectCityId);
    var selectCounty = $('#'+selectCountyId);
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
    var selectCity = $('#'+selectCityId);
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
