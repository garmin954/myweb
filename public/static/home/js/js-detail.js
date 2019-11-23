$(function () {

    /*右侧定位*/
    var $bodyAsk = $(".hot-product-items");
    var $bodyAskH = $bodyAsk.offset().top;
    var $footerTop = $(".footer").offset().top;
    var $beng = $(".detail-content-border").offset().top;
    $(window).scroll(function () {
        var $scroH = $(this).scrollTop();
        if ($scroH >= $bodyAskH) {
            if ($scroH >= ($footerTop - 520)) {
                $bodyAsk.css({
                    "position": "absolute",
                    "top": ($footerTop - $beng - 440),
					
                })
            } else {
                $bodyAsk.css({
                    "position": "fixed",
                    "top": 0,
					
                })
            }

        } else if ($scroH < $bodyAskH) {
            $bodyAsk.css({
                "position": "absolute",
                "top": 0
            })
        }
    });

    /*详情页列表滚动定位*/

    var $navWrapBottom = $(".navs-wrap");
    var $navWrapBottomH = $navWrapBottom.offset().top;
    var $left = $(".navs-wrap").offset().left;
    $(window).scroll(function () {
        var $scroH = $(this).scrollTop();
        if ($scroH >= $navWrapBottomH) {
            $navWrapBottom.css({
                "position": "fixed",
                "top": 0,

            })
        } else {
            $navWrapBottom.css({
                "position": "absolute",
                "top": 0,

            })
        }
    });

    /*list样式改变 + 锚点动画*/
    var $list = $(".navs-wrap li");
    var $listA = $(".navs-wrap li>a");
    var lastindex = 0
    $list.on('click', function () {
        $($list[lastindex]).removeClass('inner-detail-tabs-sel')
        var index = $(this).index();
        $(this).addClass('inner-detail-tabs-sel')
        lastindex = index

        $('html, body').animate({
            scrollTop: $($.attr($listA[index], 'href')).offset().top - 40

        }, 500);
        return false
    })
    
    // 详情页无缝滑屏

    $(document).ready(function () {
        $.jqtab = function (tabtit, tab_conbox, shijian) {
            //$(tab_conbox).find("li").hide();
            $(tabtit).find("li:first").addClass("thistab").show();
            $(tab_conbox).find("li:first").show();
            $(tabtit).find("li:first").addClass("tab").show();
            $(tabtit).find("li").bind(shijian, function () {
                $(this).addClass("thistab").siblings("li").removeClass("thistab")
                var activeindex = $(tabtit).find("li").index(this);
                $(tab_conbox).children().eq(activeindex).show().siblings().hide();
                return false;
            });
        };
        /*调用方法如下：*/
        $.jqtab("#tabs-up", "#tab_conbox-up", "click");

        // 计算UL的宽度
        var li_width = $(".intor_con .sm_img_wrap ul li").outerWidth(true);
        var li_leng = $(".intor_con .sm_img_wrap ul li").length;
        var old_ul = $(".intor_con .sm_img_wrap ul")
        old_ul.css("width", (li_width * li_leng))
        var lf = parseInt($("#tabs-up").css("left"));
        $(".next-btn").click(function () {
            if (lf > -(li_width * (li_leng - 5))) {
                lf -= li_width;
                $("#tabs-up").animate({
                    left: lf
                });
            }
        });
        $(".prev-btn").click(function () {
            if (lf < 0) {
                lf += li_width;
                $("#tabs-up").animate({
                    left: lf
                });
            }
        });
    });
});