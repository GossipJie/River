<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($name); ?>-<?php echo ($site_seo_title); ?></title>
 <meta name="author" content="imd-1402-周洁" />
  <meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
  <meta name="description" content="<?php echo ($site_seo_description); ?>" />
<link href="/themes/riverPPT/Public/css/base.css" type="text/css" rel="stylesheet" />
<link href="/themes/riverPPT/Public/css/banner.css" type="text/css" rel="stylesheet" />
<link href="/themes/riverPPT/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="/themes/riverPPT/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="/themes/riverPPT/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<link href="/themes/riverPPT/Public/css/jcountdown/jcountdown.css" rel="stylesheet" type="text/css">
<?php $about_page_id = 2; $about_page_pid = 2; $term_ggb_id = 10 ; $term_dhzc_id =7 ; $about_news_id=1; $about_news_pid=3; $about_gflt_id = 4; $news_center_id = 1; $huiwu_id = 4; ?>

</head>
<body>
<div class="header">
           <div class="inner">
                       <div class="dh_logo">
                           <a href="http://www.changjiangcp.com" title="" target="_blank"><img src="/themes/riverPPT/Public/images/dh_logo.png" alt=""></a>
                       </div>
                       <div class="dh_lang" >                          
                           <a    href="index.php?l=zh-cn" title="">中文</a>
                           /
                           <a  href="index.php?l=en-us" title="">ENGLISH</a>
                       </div>
                        <div class="nav">
	                        <?php $navs = sp_get_menu_tree(1); $i=1; ?>
                            <ul>
                            	 <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $urlx= $i==1?$vo['href']:$vo['href']."&pid=".$vo['id']; if($i!=1): ?>
                            	 	<span>|</span>
                            	 	<?php endif;$i++; ?>
                                    <li><a href="<?php echo ($urlx); ?>"><?php echo ($vo["label"]); ?></a>
                                    	 <?php $leve2=$vo["child"] ?>
                                    	 <?php if(count($leve2)>0): ?>
                                    	 <ul class="sub">
	                                    	 <?php if(is_array($leve2)): foreach($leve2 as $key=>$to): $urlxx= $to['href']."&pid=".$vo['id']."&oid=".$to['id']; ?>
	                                                <li><a href="<?php echo ($urlxx); ?>"><?php echo ($to["label"]); ?></a></li><?php endforeach; endif; ?>
                                           </ul>
                                           <?php endif ?>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
            </div>
            <Div class="clear"></Div>
</div>
<div id="banner">
			<?php $home_slides=sp_getslide("cat_cn"); $i=1; ?>
            <ul class="pics">
            	<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li class="b<?php echo ($i++); ?>" style="background-image: url(<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>);"><a target="_blank" href="<?php echo ($vo["slide_url"]); ?>"></a></li><?php endforeach; endif; ?>
            </ul>
            <div class="btns">
                <a class="prev" href="javascript:void(0);"><span class="off"></span><span class="on"></span></a>
                <a class="next" href="javascript:void(0);"><span class="off"></span><span class="on"></span></a>
            </div>
            <div class="g-wrap">
                <ul class="idxs">
                    <li></li><li></li><li></li><li></li>
                </ul>
            </div>
        </div>

<div class="inner">
    <div class="dh_col_3 pape_left">
         
        
        <?php $nav_ojs = $navs[$huiwu_id]; ?>
 <div class="dh_right_bg dh_mb">
    <div class="dh_right_t">
        <a href="<?php echo ($nav_ojs["href"]); ?>&pid=<?php echo ($nav_ojs["id"]); ?>"  title="<?php echo ($nav_ojs["label"]); ?>"><?php echo ($nav_ojs["label"]); ?></a>
    </div>
    <?php $nav_ojsx = $navs[$huiwu_id]; $nav_ojs_1ist=$nav_ojsx['child']; ?>
<?php if(is_array($nav_ojs_1ist)): $i = 0; $__LIST__ = $nav_ojs_1ist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="dh_sev1" href="<?php echo ($v["href"]); ?>&pid=<?php echo ($nav_ojsx["id"]); ?>&oid=<?php echo ($v["id"]); ?>" title="<?php echo ($v["label"]); ?>">
	     <i class="fa  <?php echo ($v["icon"]); ?>"></i><?php echo ($v["label"]); ?>
	</a><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="clear"></div>
</div>
        
        
        
    </div>
    <?php $p1 = sp_get_term($cat_id); ?>
    <div class="dh_col_4">
        <div class="pape_title">
            
              		<span><?php echo ($p1["name"]); ?></span>
                       <ol class="breadcrumb" >
                        <li><a href="/">首页</a></li>
                        <li><a href="<?php echo leuu('list/index',array('id'=>$p1['term_id']));?>"><?php echo ($p1["name"]); ?></a></li>
                        
                       
                      </ol>
               </div>
               
               	<?php $lists = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",10); ?>
                <ul class="item1_news_list">
                	<?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><i class="fa fa-sign-out"></i><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a><span><?php echo ($vo["post_date"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
                	
            		<Div class="clear"></Div>
                </ul>
                
	           	<div class="met_pager">
					<ul>
					<?php echo ($lists["page"]); ?>
					</ul>
				</div>
		    </div>
            <Div class="clear"></Div>
        
    </div>
</div>

    <div class="clear"></div>
	<div class="inner">
	 
      <div class="dh_link">
       	<?php $links=sp_getlinks();$i=1; ?>
      	<span><a href="javascript:void(0);" title="guo'ji">参会国际文博单位 </a>：</span>		
        <div class="lyl_link">
			<?php if(is_array($links)): foreach($links as $key=>$vo): $l = explode("|",$vo['link_name']); ?>
                  <?php if($i!=1): ?><span>|</span><?php endif;$i++; ?>
                  <a href="<?php echo ($vo["link_url"]); ?>" target="_blank"><?php echo ($l[0]); ?></a><?php endforeach; endif; ?> 
        </div>
      </div>
</div>
<div class="footer">
	<div class="foot_nav">
		 <ul>
	         <li>主办单位：武汉市人民政府、长江水利委员会、武汉大学</li>
	         <span>|</span>
	         <li>承办单位：武汉市文化局、武汉市外办、长江文明馆</li>
	     </ul>
	     <ul>
	         <li>支持单位：中国人民对外友好协会、世界城市和地方政府组织亚太区（UCLG ASPAC）、中国博物馆协会</li>
	         <span>|</span>
	         <li>协办单位：美国环球健康与教育基金会、长江流域博物馆合作联盟、中国国际贸易促进委员会武汉分会、长江日报报业集团</li>
	     </ul>
	</div>
	<div class="foot_text">
	  <?php echo ($site_copyright); ?>         
	</div>
</div>
	
<script type="text/javascript">
   $(function(){
	   var win = $(window);

       var banner = $('#banner'),
           pic_c  = banner.find('.pics'),
           pics   = pic_c.children(),
           idx_c  = banner.find('.idxs'),
           idxs   = idx_c.children(),
           btns   = banner.find('.btns a'),
           prev   = btns.filter('.prev'),
           next   = btns.filter('.next'),

           len    = pics.length,
           idx    = 0,
           prev_i = -1,
           max_i  = len - 1,
           curr_p = pics.eq(idx),
           curr_i = idxs.eq(idx),
           delay  = 5000,
           timeout = -1;

       win.on('load', function() {
           idx_recu(0, 1500/len, function() {
               setTimeout(function() {
                   curr_i.addClass('on');
                   auto();
               }, 300);
               idxs.hover(hover);
           });
           banner.hover(function() {
               // prev.stop().fadeIn(300);
               // next.stop().fadeIn(300);
               btns.addClass('on');
           }, function() {
               btns.removeClass('on');
               // prev.stop().fadeOut(300);
               // next.stop().fadeOut(300);
           });
           prev.on('click', function() {fade(idx===0? idx=max_i:--idx)});
           next.on('click', function() {fade(idx===max_i? idx=0:++idx)});
       });

       function fade(idx) {
           clearTimeout(timeout);
           prev_i = idx;
           curr_p.stop(false,true).fadeOut(300);
           curr_p = pics.eq(idx).stop(false,true).fadeIn(300);
           curr_i.removeClass('on');
           curr_i = idxs.eq(idx).addClass('on');
           auto();
       }
       function hover(){
           idx = $(this).index();
           if (idx === prev_i) return;
           fade(idx);
       }
       function idx_recu(idx, delay, func) {
           temp = idxs.eq(idx);
           if (temp.length) {
               temp.css('margin-top',0).fadeIn(500);
               setTimeout(function() {
                   idx_recu(idx+1, delay, func);
               }, delay);
           } else {
               func();
               return;
           }
       }
       function auto() {
           timeout = setTimeout(function() {
               fade(idx===max_i? idx=0: ++idx);
           }, delay);
       }
  
    $('.nav li').hover(function(){
    $(this).find('.sub').slideToggle("slow");
    });
});
    </script>
</body>
</html>