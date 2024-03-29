// 既存のJavaScript
$(document).ready(function () {
    // ナビゲーションリンクのスムーズスクロール
    $('#g-navi li a').click(function () {
        var elmHash = $(this).attr('href');
        var pos = $(elmHash).offset().top - 0;
        $('body,html').animate({ scrollTop: pos }, 1000);
        return false;
    });
});

// 画面が読み込まれたら＆リサイズされたら
$(window).on('load resize', function () {
    var windowWidth = window.innerWidth;
    var elements = $('nav'); // position: sticky;を指定している要素
    if (windowWidth >= 768) {
        /* 768px以上にIE用のJSをきかせる */
        Stickyfill.add(elements);
    } else {
        Stickyfill.remove(elements);
    }
});
