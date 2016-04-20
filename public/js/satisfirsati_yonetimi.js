function toogle(buton){

    if(buton.id == 'btn_islem_opportunity_name')
        $("div#search_opportunity_name").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_accountid')
        $("div#search_opportunity_accountid").toggle(100);
    else if(buton.id     == 'btn_islem_opportunity_partnerid')
        $("div#search_opportunity_partnerid").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_contactid')
        $("div#search_opportunity_contactid").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_sourceid')
        $("div#search_opportunity_sourceid").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_campaignid')
        $("div#search_opportunity_campaignid").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_todate')
        $("div#search_opportunity_todate").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_estimatedcost')
        $("div#search_opportunity_estimatedcost").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_status')
        $("div#search_opportunity_status").toggle(100);
    else if(buton.id == 'btn_islem_opportunity_probability')
        $("div#search_opportunity_probability").toggle(100);
}
function createGuncelleTab(id,name,dynamicTabContent,dynamicTabList,htmlData){
    if(!window.openTabs) {
        window.openTabs = [];
    }
    if(!window.openTabs[id]) {
        window.openTabs[id] = true;
        var div = "<div id='div_opportunity_update-" + id + "' class='tab-pane panel-body'>" + htmlData + "</div>";
        $('#' + dynamicTabContent).append(div);
        var list = "<li id='li_opportunity_update-" + id + "' style='display: block;'><a data-toggle='tab' href='#div_opportunity_update-" + id + "' id='a_opportunity_update' style='float: left'>" + name + " - Güncelle " +
            "       " +
            "<i onclick='li_update_close(" + id + ")'  class='fa fa-times color-red'></i></a></li>";
        $('#' + dynamicTabList).append(list);
    } else {
        $("#li_opportunity_update-"+id + " a ").click();
    }

}

function showguncelle(rowData){

    var my_token = $('[name="csrf-token"]').attr('content');


    $.ajax({
        url : window.location + '/edit',
        type: 'POST',
        data: {'id':rowData['id'],'_token':my_token},
        success:function(data){

            //brings the Guncelle tab.

            createGuncelleTab(rowData['id'],rowData['name'],'oppdynamicTabContent','oppdynamicTabList',data);
            //fills the Guncelle form.


            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_id').val(rowData.id);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_name').val(rowData.name);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_accountid').val(rowData.accountid);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_partnerid').val(rowData.partnerid);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_contactid').val(rowData.contactid);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_leadid').val(rowData.leadid);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_campaignid').val(rowData.campaignid);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_estimatedcost').val(rowData.estimatedcost);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_todate').val(rowData.todate);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_status').val(rowData.status);
            $('#div_opportunity_update-' + rowData.id + ' #div_opportunity_scope').html(rowData.scope);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_probability').val(rowData.probability);
            $('#div_opportunity_update-' + rowData.id + ' #opportunity_update_probability').val(rowData.probability);

        },
        error: function () {
            alert('ajax error!');
        }
    });






}
function li_update_close(id){
    $('#div_opportunity_update-'+id+ ", #li_opportunity_update-"+id).remove();
    delete window.openTabs[id];
    //if(window.openTabs) {previousObj.find('a').click();}
    //else {$('#listele','a').click(); alert('tablar bitti.');}
    $('#li_opportunity_list a').click();

}

function insertOpportunitiesDataToListe(dataset) {

    $('#opportunity_list_table').DataTable( {
        data: dataset,
        "columnDefs" : [
            {
                targets  :   [0,1,2,3,4,5,6],
                visible :   false,
                searchable: false
            }
        ],
        columns: [
            { data:"id"},
            { data:"accountid"},
            { data:"contactid"},
            { data:"partnerid"},
            { data:"leadid"},
            { data:"campaignid"},
            { data:"scope"},
            { title: "Müşteri", data: "accname"},
            { title: "Fırsat Adı", data: "name"},
            { title: "Durumu", data: "status"},
            { title: "Tahmini Dönemi", data: "todate"},
            { title: "Tahmini Bedeli", data: "estimatedcost"},
            { title: "Olasılığı", data: "probability"},
            { title: "Müşteri Yöneticisi", data: "contname"},
            {title:'İşlemler', defaultContent:"<button class='btn btn-primary btn-xs btn-opportunityTable-update'><i class='fa fa-pencil'>  Güncelle</i>" +
            "</button><button class='btn btn-danger btn-xs btn-opportunityTable-delete' data-toggle='modal' href='#modal_opportunity_delete'><i class='fa fa-trash-o '>  Sil</i></button>"}
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

            $(row).find('.btn-opportunityTable-update').on('click',function(){
                showguncelle(data);
            });

            $(row).on('dblclick',function(){
                showguncelle(data);
            });

            $(row).find('.btn-opportunityTable-delete').on('click',function(){

                $('#modal_opp_delete_body').html(data['name'] + '   isimli satış fırsatını silmek istediğinizden eminmisiniz?');
                $('#btn_modal_opp_delete').on('click',function(){

                    $.ajax({
                        url : window.location + '/delete',
                        type: 'POST',
                        data: {'id':data['id'],'_token':my_token},

                        success:function(data){
                            row.remove();
                        }

                    });
                    $('#modal_opportunity_delete').modal('hide');

                });
            });



        }

    } );
}

function insertEstimatedCostDataToListe(dataset,id) {

    $('#opportunity_estimatedCost_table-11').DataTable( {
        data: dataset,
        columns: [
            { title: "Ürün/Hizmet"},
            { title: "Adet"},
            { title: "Birim Fiyat"},
            { title: "Toplam Fiyat"},
            { title: "İndirim Oranı"},
            {title:'İşlemler'}
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
            /*
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

             */


        }

    } );
}

function insertEstimatedPaymentDataToListe(dataset) {

    $('#opportunity_estimatedPayment_table').DataTable( {
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
            { title: "Ay",  },
            { title: "Yıl",  },
            { title: "Bedel",  },
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
            /*
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

             */


        }

    } );
}

function insertActivitiesDataToListe(dataset) {

    $('#opportunity_estimatedCost_table').DataTable( {
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
            { title: "Müşteri",  },
            { title: "Fırsat Adı",  },
            { title: "Durumu",  },
            { title: "Tahmini Dönemi",  },
            { title: "Tahmini Bedeli", },
            { title: "Olasılığı",  },
            { title: "Müşteri Yöneticisi", },
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
            /*
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

             */


        }

    } );
}