
function loadPlace(group = 0, elm1 = 'select[name="place_from"]', elm2 = 'select[name="place_to[]"]') {
    $.ajax({
        url: routeLoadPlace,
        type: 'GET',
        data: {group: group},
        success: function(data){
            var html1 = '<option value="">Chọn nơi khởi hành</option>';
            var html2 = '';
            $.each(data.data.place_from, function(index, item){
                html1 += '<option value="'+item.id+'">'+item.title+'</option>';
            });
            $.each(data.data.place_to, function(index, item){
                html2 += '<option value="'+item.id+'">'+item.title+'</option>';
            });
            $(elm1).html(html1);
            $(elm2).html(html2);
        },
        error: function(){
            $.toast({
                heading: 'Thất bại',
                text: "Vui lòng tải lại trang",
                position: 'top-right',
                icon: 'error', 
                hideAfter: 10000
            });
        }
    });
}

$(document).on('change', 'select[name="group_id"]', function(e){
    loadPlace($(this).val());
});