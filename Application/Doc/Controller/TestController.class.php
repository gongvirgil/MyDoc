<?php
namespace Doc\Controller;
use Think\Controller;

class TestController extends Controller {


	public function a(){
		import("Vendor.Virgil.Doc");
        $Doc = new \Doc();
        $Doc->buildDoc();
	}
	public function b(){

	}

}