<?php

namespace App\Http\Controllers;

use App\VKModel;
use Illuminate\Http\Request;

class VKController extends Controller
{
    public function index()
    {
	    $VKM = new VKModel();
	    $url = $VKM->getAuth();
	    if ($url){
	    	$data = array(
	    	    'title' => 'VKWT | Главная страница',
		        'url'   => $url
		    );
	    	return view('pages.login',$data);
	    }
    }

    public function FriendList($id)
    {
    	$VKM = new VKModel();
	    if ($VKM->isAuth()){
		    $data = array(
			    'title' => 'Список друзей',
			    'FriendList' => $VKM->getFriendList($id),
			    'Owner' => $VKM->getIntro($id)
		    );
		    return view('pages.friends',$data);
	    } else {
		    $url = $VKM->getAuth();
		    if ($url){
			    $data = array(
				    'title' => 'VKWT | Главная страница',
				    'url'   => $url
			    );
			    return view('pages.login',$data);
		    }
	    }
    }

    public function getUser($id)
    {
	    $VKM = new VKModel();

	    if ($VKM->isAuth()){
	    	$data = array(
	    		'title' => 'Пользователь',
	    		'postsStatistics' => $VKM->getWallStats($id),
			    'Owner' => $VKM->getIntro($id),
			    'topWall' => $VKM->getTopRatedWall($id),
			    'firstWall' => $VKM->getFirstWall($id)
		    );
	    	return view('pages.user',$data);
	    } else {
		    $url = $VKM->getAuth();
		    if ($url){
			    $data = array(
				    'title' => 'VKWT | Главная страница',
				    'url'   => $url
			    );
			    return view('pages.login',$data);
		    }
	    }
    }
}