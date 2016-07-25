<?php
namespace Home\Controller;
use Home\API\UserAPI;
use Think\Controller;
class TempController extends Controller {
        public function test()
        {
            $this->theme("5000")->display();
        }
    }