jQuery(document).ready(function($) {
	 var example = $('.sf-menu').superfish({
            //add options here if required
            delay:       100,
            speed:       'fast',
            autoArrows:  false  
        }); 
      $('.header-menu-con').slicknav({
            prependTo: '#slick-mobile-menu',
            allowParentLinks: true,
            label: ''
        }); 
$('#slider .owl-carousel').owlCarousel({
    loop:true,
	items: 1,
	autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
})

function tabs(tabTit,on,tabCon,event){
        $(tabTit).children().on(event,function(){
            $(this).addClass(on).siblings().removeClass(on);
            var index = $(tabTit).children().index(this);
            $(tabCon).children().eq(index).show().siblings().hide();
        });
    };
    tabs(".section2-nav ul","on",".section2-wrap",'mouseover'); 


$('.cp-list .owl-carousel').owlCarousel({
    loop:true,
    margin:20,
	autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,

        },
        1000:{
            items:4,

            loop:false
        }
    }
})
$('.news-img .owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:4,
        }
    }
})

	$('.product-con img,.entry-content img').parent("a").addClass("fancybox").attr("data-fancybox-group","gallery");
	// $('.fancybox').fancybox();
$(window).scroll(function(){
            if($(window).scrollTop()>200){
                $('.rtbar').show();
            }else{
                $('.rtbar').hide();
            }
        })
        $('.rtbar li').eq(0).hover(function(){
            $(this).animate({left:-116},300);
           // console.log(0)
        },function(){
            $(this).animate({left:0},300);
        });
		 $('.rtbar li').eq(1).hover(function(){
            $(this).animate({left:-70},300);
        },function(){
            $(this).animate({left:0},300);
        });
		 $('.rtbar li').eq(2).hover(function(){
            $(this).animate({left:-70},300);
        },function(){
            $(this).animate({left:0},300);
        });
	$('body').on('click', '.gotop', function() {
        $('html,body').stop(1).animate({ scrollTop: '0' }, 300);
        return false
    });
});

