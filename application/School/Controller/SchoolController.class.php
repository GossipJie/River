<?php
namespace School\Controller;
use Common\Controller\AdminbaseController;
class SchoolController extends AdminbaseController{
	
	protected $school_model;
	 
	
	function _initialize() {
		parent::_initialize();
		$this->school_model = D('school');
	}
	
	function index(){
		$school=$this->school_model->select();
		$this->assign("school",$school);
		$this->display("index");
	}
	
	function add(){
		 
		$this->display();
	}
	
	function add_post(){
		if(IS_POST){
			if ($this->school_model->create()) {
				if ($id=$this->school_model->add()) {
				   //echo $this->school_model->getLastSql();
				   //exit;
				  // var_dump($this->school_model);
					$this->success("添加成功！", U("school/show",array("id"=>$id)));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->school_model->getError());
			}
		
		}
	}
	function show(){
	    $sid = I("get.id");
	    $record = $this->school_model->where("id=$sid")->find();
	    $this->assign($record);
	  //var_dump(json_decode(html_entity_decode($record['fieldvalue']))->rows) ;
	    $this->assign("r",html_entity_decode($record['fieldvalue']));
	    $this->display("show".$record['fieldname']);
	}
	
	function edit(){
		$id=I("get.id");
		$link=$this->link_model->where("link_id=$id")->find();
		$this->assign($link);
		$this->assign("targets",$this->targets);
		$this->display();
	}
	
	function edit_post(){
		if (IS_POST) {
			if ($this->link_model->create()) {
				if ($this->link_model->save()!==false) {
					$this->success("保存成功！");
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->link_model->getError());
			}
		}
	}
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->link_model);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	//删除
	function delete(){
		if(isset($_POST['ids'])){
			
		}else{
			$id = intval(I("get.id"));
			if ($this->link_model->delete($id)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	
	}
	
	/**
	 * 显示/隐藏
	 */
	function toggle(){
		if(isset($_POST['ids']) && $_GET["display"]){
			$ids = implode(",", $_POST['ids']);
			$data['link_status']=1;
			if ($this->link_model->where("link_id in ($ids)")->save($data)!==false) {
				$this->success("显示成功！");
			} else {
				$this->error("显示失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["hide"]){
			$ids = implode(",", $_POST['ids']);
			$data['link_status']=0;
			if ($this->link_model->where("link_id in ($ids)")->save($data)!==false) {
				$this->success("隐藏成功！");
			} else {
				$this->error("隐藏失败！");
			}
		}
	}
	
	
}