<?php







if ( ! function_exists('commansetting'))

{

	function commansetting($tag)

	{

		$ci = get_instance();

		$ci->load->model('model_setting');

		$webdata = $ci->model_setting->getwebsiteinfo();

		return $webdata->$tag;

	}

}





if ( ! function_exists('subtoppagemenu'))

{

	function subtoppagemenu($pid)

	{

		$menudata="";

		$ci = get_instance();

		$ci->load->model('model_page');

		$menuquery = $ci->model_page->getsubpages($pid);

		if($menuquery){

			$menudata.="<ul>";

			foreach($menuquery as $menurow){

				$menudata.="<li><a href='".$menurow->linkname."'> ".$menurow->name." </a></li>";

			}

			$menudata.="</ul>";

		}

		return $menudata;

	}

}





if ( ! function_exists('toppagemenu'))

{

	function toppagemenu($pid)

	{

		$menudata="";

		$ci = get_instance();

		$ci->load->model('model_page');

		$menuquery = $ci->model_page->getsubpages($pid);

		if($menuquery){

			foreach($menuquery as $menurow){

				$menudata.="<li><a href='".$menurow->linkname."'> ".$menurow->name." </a>";

				$menudata.=subtoppagemenu($menurow->id);

				$menudata.="</li>";

			}

		}

		return $menudata;

	}

}









if ( ! function_exists('subcategorytopmenu'))

{

	function subcategorytopmenu($pid)

	{

		$menudata="";

		$ci = get_instance();

		$ci->load->model('model_category');

		$menuquery = $ci->model_category->getcategories($pid);

		if($menuquery){

			$menudata.=" <div class='sub-menu'><ul>";

			foreach($menuquery as $menurow){

				$menudata.="<li><a class='' href='".$menurow->linkname."'> ".$menurow->name." </a></li>";

			}

			$menudata.="<li><a class='' href='".base_url('forms')."'> Forms </a></li>";

			$menudata.="</ul></div>";

		}

		return $menudata;

	}

}





if ( ! function_exists('categorytopmenu'))

{

	function categorytopmenu($pid)

	{

		$menudata="";

		$ci = get_instance();

		$ci->load->model('model_category');

		$menuquery = $ci->model_category->getcategories($pid);

		if($menuquery){

			foreach($menuquery as $menurow){

				$menudata.="<li class='arrow_down'><a href='".$menurow->linkname."'>".$menurow->name."  </a>";

				$menudata.=subcategorytopmenu($menurow->id);

				$menudata.="</li>";

			}

		}

		return $menudata;

	}

}









if ( ! function_exists('leftcategorytopmenu'))

{

	function leftcategorytopmenu($pid)

	{

		$menudata="";

		$ci = get_instance();

		$ci->load->model('model_category');

		$menuquery = $ci->model_category->getcategories($pid);

		if($menuquery){

			foreach($menuquery as $menurow){

				if($menurow->externallink){

				$menudata.=" <li ><a href='".$menurow->externallink."' target='_blank' ><i class='fa fa-angle-right'></i>&nbsp;&nbsp;&nbsp;&nbsp;".$menurow->name."</a>";
				}
				else{

				$menudata.=" <li ><a href='".$menurow->linkname."' ><i class='fa fa-angle-right'></i>&nbsp;&nbsp;&nbsp;&nbsp;".$menurow->name."</a>";
				}


				$menudata.="</li>";

			}

		}

		return $menudata;

	}

}





if ( ! function_exists('accordioncategorymenu'))

{

	function accordioncategorymenu($pid)

	{

		$menudata="";

		$ci = get_instance();

		$ci->load->model('model_category');

		$menuquery = $ci->model_category->getaccordioncategories($pid);

		if($menuquery){

			foreach($menuquery as $menurow){

				$menudata.=" <button class='accordion'>".$menurow->name."<span></span></button>";

				$submenuquery = $ci->model_category->getcategories($menurow->id);

				if($submenuquery){

					$menudata.='<div class="panel">';

  					$menudata.='<ul class="row">';

					foreach($submenuquery as $submenurow){

						$menudata.='<li><a href="'.$submenurow->linkname.'">'.$submenurow->name.'</a></li>';

					}

					$menudata.='</ul>';

  					$menudata.='</div>';

				}



			}

		}

		return $menudata;

	}

}