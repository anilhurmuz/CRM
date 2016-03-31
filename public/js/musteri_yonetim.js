
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
        var div = "<div id='update-" + id + "' class='tab-pane panel-body'>" + htmlData + "</div>";
        $('#' + dynamicTabContent).append(div);
        var list = "<li id='li_update_account-" + id + "' style='display: block;'><a data-toggle='tab' href='#update-" + id + "' id='a_güncelle' style='float: left'>" + name + " - Güncelle " +
            "<button onclick='li_update_close(" + id + ")' class='btn-li-close fa fa-times btn-danger'></button></a></li>";
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
        data: {'data':rowData['id'],'_token':my_token},
        success:function(data){
            //brings the Guncelle tab.
            createGuncelleTab(rowData['id'],rowData['name'],'dynamicTabContent','dynamicTabList',data);
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

$(document).ready(function() {




    $('#güncelle_iletişim_tablo').DataTable( {
        data: kisiler,
        columns: [
            { title: "Adres Türü", data: "" },
            { title: "Durumu", data: ""  },
            { title: "Adresi", data: ""  },
            { title: "İlçe." , data: "" },
            { title: "İl", data: ""  },
            { title: "Posta Kodu" , data: "" },
            { title: "Telefon-1." , data: "" },
            { title: "Telefon-2" , data: "" },
            { title: "WEB", data: ""  },
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


function onCityClick(){
    var my_token = $('#my_token').val();
    var selectCity = $('#info_citycode');
    $.ajax({
        url : window.location + '/fill_city_county',
        type: 'POST',
        dataType:'json',
        data: {'_token':my_token,'request':'city'},
        success:function(data){
            $.each(data, function(key, val){
                selectCity.append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        },
        error: function () {
            alert('ajax error!');
        }
    });
}

function onCityChanged(){
    var my_token = $('#my_token').val();
    var selectCity = $('#info_citycode');
    var selectCounty = $('#info_countycode');

    selectCounty.html('<option value="" disabled selected>Seçiniz</option>');

    $.ajax({
        url : window.location + '/fill_city_county',
        type: 'POST',
        dataType:'json',
        data: {'_token':my_token,'request':'county','cityId':selectCity.val()},
        success:function(data){
            $.each(data, function(key, val){
                selectCounty.append('<option value="' + val.id + '">' + val.name + '</option>');
            })

        },
        error: function () {
            alert('ajax error!');
        }
    });
}