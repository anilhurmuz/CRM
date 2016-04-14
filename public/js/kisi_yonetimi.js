
<!--    -->


function li_update_close(id){
    //previousObj = $("#li_update_account-"+id).prev('li');
    $('#div_kisi_güncelle-'+id+ ", #li_kisi_güncelle-"+id).remove();
    delete window.openTabs[id];
    //if(window.openTabs) {previousObj.find('a').click();}
    //else {$('#listele','a').click(); alert('tablar bitti.');}
    $('#li_kisi_listele a').click();

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

function kisi_searc_toogle(buton){

    if(buton.id == 'btn_kisi_search_name')
        $("div#search_kisi_name").toggle(100);
    else if(buton.id == 'btn_kisi_search_surname')
        $("div#search_kisi_surname").toggle(100);
    else if(buton.id == 'btn_kisi_search_account')
        $("div#search_kisi_account").toggle(100);
    else if(buton.id == 'btn_kisi_search_status')
        $("div#search_kisi_status").toggle(100);
    else if(buton.id == 'btn_kisi_search_title')
        $("div#search_kisi_title").toggle(100);
    else if(buton.id == 'btn_kisi_search_phone1')
        $("div#search_kisi_phone1").toggle(100);
    else if(buton.id == 'btn_kisi_search_phone2')
        $("div#search_kisi_phone2").toggle(100);
    else if(buton.id == 'btn_kisi_search_facebook')
        $("div#search_kisi_facebook").toggle(100);
    else if(buton.id == 'btn_kisi_search_twitter')
        $("div#search_kisi_twitter").toggle(100);
    else if(buton.id == 'btn_islem_contact_linkedin')
        $("div#search_kisi_linkedin").toggle(100);
    else if(buton.id == 'btn_islem_bulletin')
        $("div#search_kisi_bulletin").toggle(100);



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
            $('.contId').val(id);
            //brings the Guncelle tab.
            createGuncelleTab(rowData['id'],rowData['name'],'dynamicTabContent','dynamicTabList',data);
            //fills the Guncelle form.
            $('#div_kisi_güncelle-' + id + ' .contId').val(rowData.id);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_contact_name').val(rowData.name);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_contact_surname').val(rowData.surname);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_contact_account').val(rowData.account);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_account_contact_status').val(rowData.status);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_account_contact_title').val(rowData.title);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_info_phone1').val(rowData.phone1);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_info_phone2').val(rowData.phone2);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_info_facebook').val(rowData.facebook);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_info_twitter').val(rowData.twitter);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_info_linkedin').val(rowData.linkedin);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_contact_bulletin').val(rowData.bulletin);
            $('#div_kisi_güncelle-' + id + ' #kisi_ekle_info_description').val(rowData.description);
        },
        error: function () {
            alert('ajax error!');
        }
    });






}

function insertDataToListe(dataset) {

    $('#kisi_listele_tablo').DataTable( {
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
                showguncelle(data);
            });

            $(row).on('dblclick',function(){
                showguncelle(data);
            });

            $(row).find('.btn-tablo-sil').on('click',function(){
                if(confirm(data['name']+" isimli kullanıcı silmek istediğinizden emin misiniz?")){
                    $.ajax({
                        url : window.location + '/delete',
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




$(function () {
    $("#kisi_listele_name").autocomplete ({
        source: window.location + '/autocompleteName',
        minLength: 1
    });

    $("#kisi_listele_surname").autocomplete ({
       source: window.location + '/autocompleteSurname'
    });
});

function getContactInfo(dataSet) {

       $('#kisi-update-table').DataTable({
           data: dataSet,
           columnDefs: [
               {
                   targets: [0],
                   visible: false,
                   searchable: false
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
