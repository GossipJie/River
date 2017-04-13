<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<?php $fieldnames=array("1"=>"专任教师基本情况","2"=>"教学成果奖","3"=>"精品课程","4"=>"授予学位数","5"=>"出版专著","6"=>"国际级科研项目"); ?>
<body ng-app="demo">
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('school/index');?>">学校列表</a></li>
			<li ><a href="<?php echo U('school/add');?>">添加信息</a></li>
			<li class="active"><a href="#"><?php echo ($schoolname); ?>--<?php echo ($fieldnames[$fieldname]); ?></a></li>
		</ul>
		
			<table class="table table-hover table-bordered table-list" ng-controller="showCtrl">
				<thead>
					<tr>
						<th width="16">学位类别</th>
						<th width="50">2012年</th>
						<th width="50">2013年</th>
						<th width="50">2014年</th>
						<th width="50">2015年</th>
					 
					</tr>
				</thead>
				<tbody>
					 
					<tr ng-repeat="vo in fv">
						<td ng-bind="vo.XWLB"></td>
						<td ng-bind="vo.YIER"></td>
						<td ng-bind="vo.YISAN"></td>
						<td ng-bind="vo.YISI"></td>
						<td ng-bind="vo.YIWU"></td>
						
					</tr>
				 
				</tbody>
				
			</table>
			<div class="table-actions">
				<a class="btn" href="<?php echo U('school/index');?>"><?php echo L('BACK');?>列表</a>
				<a class="btn" href="<?php echo U('school/add');?>">继续<?php echo L('ADD');?></a>
			</div>
	</div>
	
	<script src="/public/js/common.js"></script>
	<script src="/public/js/angular-1.5.8/angular.min.js"></script>
	<script type="text/javascript">
	var fv = {};
	fv = <?php echo ($r); ?>;
	  
	angular.module("demo",[]).controller("showCtrl",['$scope',function($scope){
		$scope.fv = fv.rows;
	}]);
	
	 
			
	</script> 
	 
</body>
</html>