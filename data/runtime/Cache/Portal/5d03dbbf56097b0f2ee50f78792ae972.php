<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($site_name); ?>-<?php echo ($site_seo_title); ?></title>
 <meta name="author" content="imd-1402-周洁" />
  <meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
  <meta name="description" content="<?php echo ($site_seo_description); ?>" />
<link href="/themes/riverPPT_en-us/Public/css/base.css" type="text/css" rel="stylesheet" />
<link href="/themes/riverPPT_en-us/Public/css/banner.css" type="text/css" rel="stylesheet" />
<link href="/themes/riverPPT_en-us/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="/themes/riverPPT_en-us/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="/themes/riverPPT_en-us/Public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<link href="/themes/riverPPT_en-us/Public/css/jcountdown/jcountdown.css" rel="stylesheet" type="text/css">
<?php $about_page_id = 7; $about_page_pid = 7; $term_ggb_id = 17 ; $term_dhzc_id =18 ; $about_news_id=13; $about_news_pid=8; $about_gflt_id = 16; $news_center_id = 13; $huiwu_id = 9; ?>


</head>
<body>
<div class="header">
           <div class="inner">
                       <div class="dh_logo">
                           <a href="http://www.changjiangcp.com" title="" target="_blank"><img src="/themes/riverPPT_en-us/Public/images/dh_logo.png" alt=""></a>
                       </div>
                       <div class="dh_lang" >                          
                           <a    href="index.php?l=zh-cn" title="">中文</a>
                           /
                           <a  href="index.php?l=en-us" title="">ENGLISH</a>
                       </div>
                        <div class="nav">
	                        <?php $navs = sp_get_menu_tree(7); $i=1; ?>
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
    <div class="dh_col_1">
    	<?php $pagex = sp_sql_page($about_page_id); ?>
        <div class="dh_about">
                <div class="dh_col_1_tit"><a class="index_title" href="<?php echo leuu('portal/page/index',array('id'=>$about_page_id,'pid'=>$about_page_pid ));?>"><?php echo ($pagex["post_title"]); ?></a></div>
                <div class="dh_col_1_m">
                	<?php $smeta1=json_decode($pagex['smeta'],true); ?>
                    <a  href="<?php echo leuu('portal/page/index',array('id'=>$about_page_id,'pid'=>$about_page_pid ));?>">
                    	<img src="<?php echo sp_get_asset_upload_path($smeta1['thumb']);?>" style='float: left; width:291px;padding-top:5px; padding-right:7px;' alt=""/>
                    </a>
           			<a  href="<?php echo leuu('portal/page/index',array('id'=>$about_page_id,'pid'=>$about_page_pid ));?>"><?php echo msubstr($pagex['post_excerpt'],0,196);?></a>
                </div>
        </div>
        <div class="dh_news">
        		<?php $p1 = sp_get_term($about_gflt_id); ?>
                <div class="dh_col_1_tit"><a class="index_title" href="<?php echo leuu('list/index',array('id'=>$p1['term_id']));?>"><?php echo ($p1["name"]); ?></a></div>
              <ul class="dh_right2">
              	<?php $lastnews=sp_sql_posts("cid:$about_gflt_id;field:post_title,post_date,post_excerpt,tid,smeta;order:listorder asc;limit:6;"); ?>
	            <?php if(is_array($lastnews)): foreach($lastnews as $key=>$vo): ?><li><a href="<?php echo leuu('article/index',array('id'=>$vo['tid'],'cid'=>$vo['term_id']));?>" title=" <?php echo ($vo["post_title"]); ?>">
	                <?php echo ($vo["post_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <div class="dh_col_2">
        <div class="dh_new2">
                <div class="dh_col_2_tit">
                	<?php $p2 = sp_get_term($about_news_id); ?>
                    <span class="index_title"><?php echo ($p2["name"]); ?></span>
                    <a href="<?php echo leuu('list/index',array('id'=>$p2['term_id'],'pid'=>$about_news_pid));?>">more &gt;</a>
                </div>
                <?php $listnews=sp_sql_posts("cid:$news_center_id;field:post_title,post_modified,post_excerpt,tid,smeta;order:listorder desc,post_modified desc;limit:1;"); ?>
		        <?php if(is_array($listnews)): $i = 0; $__LIST__ = array_slice($listnews,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="dh_news2_f">
						<?php $t = explode(' ',$vo['post_modified']); $l =explode('-',$t[0]); ?>
		                <div class="news2_f_l"><a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid'],'pid'=>$about_news_pid));?>"><span><?php echo ($l[2]); ?></span><?php echo ($l[0]); ?>-<?php echo ($l[1]); ?></a></div>
		                <a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid'],'pid'=>$about_news_pid));?>" title="<?php echo ($vo['post_title']); ?>"><?php echo ($vo['post_title']); ?></a>
		               
	                </div>
	                <div style="text-align:center;">
	                 	<?php $smeta=json_decode($vo['smeta'],true); ?>
					     <a href="<?php echo leuu('portal/article/index',array('id'=>$vo['tid'],'pid'=>$about_news_pid));?>">
			              	<img style="margin-top:5px;" width=320 height="180" src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>"/>
			             </a> 		
			       </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        
        <div class="dh_new3">
                <div class="dh_col_2_tit">
                	<?php $p3 = sp_get_term($term_dhzc_id); ?>
                    <span class="index_title"><?php echo ($p3["name"]); ?></span>
                    <a href="<?php echo leuu('list/index',array('id'=>$p3['term_id']));?>">more &gt;</a>
                </div>
                
                <?php $mlist=sp_sql_posts("cid:$term_dhzc_id;order:listorder desc,post_date DESC;limit:6"); ?>
             <ul>
             	<?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta=json_decode($vo['smeta'],true); ?>
                <li>
                    <a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>" title="<?php echo ($vo["post_keywords"]); ?>"><img width="73" height="66" src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>"/></a><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>" title="<?php echo ($vo["post_title"]); ?>"><?php echo ($vo["post_title"]); ?></a>
                    <span><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>" title="<?php echo ($vo["post_keywords"]); ?>"><?php echo msubstr($vo['post_keywords'],0,50);?></a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            
        </div>
        
        
    </div>
    <div class="dh_col_3">
        <div class="dh_right_bg">
            <div class="dh_right_t">
            	<?php $p4 = sp_get_term($term_ggb_id); ?>
                <a class="index_title" href="<?php echo leuu('list/index',array('id'=>$p4['term_id']));?>" title="<?php echo ($p4["name"]); ?>"><?php echo ($p4["name"]); ?></a>
            </div>
            <?php $gg=sp_sql_posts("cid:$term_ggb_id;field:tid,post_title;"); ?>
            <ul>
				<?php if(is_array($gg)): $i = 0; $__LIST__ = $gg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><i class="fa fa-angle-double-right"></i><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>" title="<?php echo ($vo["post_title"]); ?>"><?php echo ($vo["post_title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="clear"></div>
        </div>
        <?php $nav_ojs = $navs[$huiwu_id]; ?>
        <div class="dh_right_bg dh_mb">
           <div class="dh_right_t">
                <a href="<?php echo ($nav_ojs["href"]); ?>&pid=<?php echo ($nav_ojs["id"]); ?>" class="index_title" title="<?php echo ($nav_ojs["label"]); ?>"><?php echo ($nav_ojs["label"]); ?></a>
            </div>
            <?php $nav_ojsx = $navs[$huiwu_id]; $nav_ojs_1ist=$nav_ojsx['child']; ?>
<?php if(is_array($nav_ojs_1ist)): $i = 0; $__LIST__ = $nav_ojs_1ist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="dh_sev1" href="<?php echo ($v["href"]); ?>&pid=<?php echo ($nav_ojsx["id"]); ?>&oid=<?php echo ($v["id"]); ?>" title="<?php echo ($v["label"]); ?>">
	     <i class="fa  <?php echo ($v["icon"]); ?>"></i><?php echo ($v["label"]); ?>
	</a><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="clear"></div>
		</div>
    </div>
</div>

    <div class="clear"></div>
	<div class="inner">
	 
      <div class="dh_link">
       	<?php $links=sp_getlinks();$i=1; ?>
      	<span><a href="javascript:void(0);" title="International Museums and Cultural Institutions">International Museums and Cultural Institutions</a>：</span>		
        <div class="lyl_link">
			<?php if(is_array($links)): foreach($links as $key=>$vo): $l = explode("|",$vo['link_name']); ?>
                  <?php if($i!=1): ?><span>|</span><?php endif;$i++; ?>
                  <a href="<?php echo ($vo["link_url"]); ?>" target="_blank"><?php echo ($l[1]); ?></a><?php endforeach; endif; ?> 
        </div>
      </div>
</div>
<div class="footer">
	<div class="foot_nav">
		 <ul>
	         <li>Sponsored By: The People’s Municipal Government of Wuhan, Changjiang Water Resources Commission of the Ministry of Water Resources, Wuhan University
</li>
	        </ul>
	     <ul>
	         <li>Organized By: The Cultural Affairs Bureau of Wuhan, The Foreign Affairs Office of Wuhan Municipal Government, The Changjiang Civilization Museum
</li>
	     </ul>
	     <ul>
	         <li>Supported By：Chinese People's Association for Friendship with Foreign Countries, UCLG ASPAC, Chinese Museums Association
</li>
	        </ul>
	     <ul>
	         <li>Co-organized By: Behring Global Educational Foundation, The Yangtze River Basin Museums Alliance, China Council for the Promotion of International Trade Wuhan Sub-council, Changjiang Daily Group
</li>
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