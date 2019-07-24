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
            var liArrL = [];
            var liArrR = [];
            for (var i = 0; i < data.length; i++) {
                if (data[i].hot == 1) {
                    $('#newsListLeft .top-news a').html(data[10].title + "：" + data[10].abstract);
                    $('#newsListRight .top-news a').html(data[11].title + "：" + data[11].abstract);
                }
                if (i < 6) {
                    liArrL.push('<li><span class="cate">[玄幻]</span><a href="">' + data[i].title + ":" + data[i].abstract + '</a></li>');
                } else {
                    liArrR.push('<li><span class="cate">[玄幻]</span><a href="">' + data[i].title + ":" + data[i].abstract + '</a></li>');
                }
            }
            $('#newsListLeft ul').html(liArrL.join(''));
            $('#newsListRight ul').html(liArrR.join(''));
        }
    });
});