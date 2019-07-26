layui.use(['carousel', 'form'], function () {
    var carousel = layui.carousel;
    var form = layui.form;
    form.render('select');
    // 轮播
    carousel.render({
        elem: '#test1',
        width: '100%',
        height: '305px',
        arrow: 'hover'
    });

    //搜索
    $('#globalSearch').click(function () {

    });

    // 排行榜
    $.ajax({
        url: '../../index/index/rankList',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            var data = res.data;
            var liArr = [];
            for (var i = 0; i < data.length; i++) {
                liArr.push('<li><em class="top' + data[i].top + ' list_icon">' + data[i].top + '</em><span class="cate">[玄幻]</span><a href="../../article/article/view?id=' + data[i].id + '" id=' + data[i].id + '>' + data[i].title + '</a></li>');
            }
            $('#newsList').html(liArr.join(''));
        }
    });

    $.ajax({
        url: '../../article/article/articleCategoryList',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            var data = res.data;
            for (var i = 0; i < data.length; i++) {
                for (var j = 0; j < data[i].length; j++) {
                    $("#item" + data[i][j].id).append('<li><a href="../../article/article/view?id=' + data[i][j].id + '">'+ data[i][j].title +'</a></li>')
                }
            }
        }
    });
});