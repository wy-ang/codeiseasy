$(function () {
    $.ajax({
        url: '../../index/index/categoryList',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            var data = res.data;
            var liArr = [];
            for (var i = 0; i < data.length; i++) {
                liArr.push('<li><a href="/" class="cate' + data[i].id + '" id=' + data[i].id + ' title=' + data[i].title + '>' + data[i].title + '</a></li>');
            }
            liArr.push('<li><a href="/" class="cate-all"  title="全部作品">全部作品</a></li>');
            $('#dataGroupdom').html(liArr.join(''));
        }
    });
    $('#globalSearch').click(function () {

    });
    $.ajax({
        url: '../../index/index/articleList',
        type: 'get',
        dataType: 'json',
        success: function (res) {
            var data = res.data;
            var liArr = [];
            for (var i = 0; i < data.length; i++) {
                liArr.push('<li><em class="top' + data[i].top + ' list_icon">' + data[i].top + '</em><span class="cate">[玄幻]</span><a href="../../index/article/view?id=' + data[i].id + '" id=' + data[i].id + '>' + data[i].title + '</a></li>');
            }
            $('#newsList').html(liArr.join(''));
        }
    });
});