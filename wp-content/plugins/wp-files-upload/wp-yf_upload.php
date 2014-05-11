<?php

/*

Plugin Name: wp-files-upload

Plugin URI: http://www.pakelab.com/WP-fileupload-plugin.html

Description: 此插件用于WordPress后台发布文章页面，可直接上传文件到YunFile网盘（非IE浏览器可以选择上传到千脑网盘）并返回外链地址.

Version: 1.0

Author: 帕克实验室

Author URI: http://www.pakelab.com

*/





function wp_qnupload_init(){
  
$username = get_option("wp_qiannao_user");
    if($username == ""){
	update_option("wp_qiannao_user","zhtyuan99");
	}

	$qn_username = get_option("wp_yf_username");

    if($qn_username == ""){

		update_option("wp_yf_username","zhtyuan99");

	}

	

	echo '<br/><div id="qn_upload_div" class="meta-box-sortables ui-sortable" style="position: relative;"><br/><div class="postbox">';

	echo '<div class="handlediv" title="Click to toggle"><br />';

	echo '</div>';

	echo '<h3 class="hndle"><span>WP网盘插件</span></h3>';

	echo '<div class="inside">
			<div id="batUpload2" style="display:;"> 

					<div id="noflash_div" class="content" style="background-color: #FFFF66; border: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display:none;">批量文件上传需要Flash9及以上版本，请安装或者升级您的Flash插件。请访问： <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank">Adobe网站</a> 获取最新的Flash插件。  

					</div> 

					<div style="width: 90%;" >

						<div align=left style ="display:none;">

							<strong>请选择您要上传的文件</strong><br>

						</div>

						<table border=0 >

							<tr align=left>

								<td>

								 <div  id ="upload_btntd" style="margin-left: 0px;"> 

									<span id="spanButtonPlaceHolder" style="width: 90px"> </span> 

								 </div>

								</td>

								<td width="65%"><div style="height: 5px;"></div>

									&nbsp;&nbsp;<a id="btnCancel" href="javascript:qnupload.cancelQueue();">停止上传</a>&nbsp;&nbsp; <a target="_blank" href="http://qiannao.com/tomos/ui/qnupload.jsp?id='. get_option("wp_qiannao_user") . '">千脑网盘上传通道</a>							</td>

								<td align=right width="30%"><div style="height: 5px;"></div>

									<span id="divStatus"></span>

								</td>

							</tr>

						</table>

						<div class="fieldset flash" id="fsUploadProgress" style="width: 450px; margin-left: 0px;" >

						</div>

						<div>

							提示：批量上传需要标准浏览器和默认安全性支持，如无法显示选择文件按钮，请使用非IE浏览器上传通道。 

						</div>

					</div>



					<link href="http://www.yunfile.com/upload/css/default.css" rel="stylesheet" type="text/css" />

					<script type="text/javascript" src="http://www.yunfile.com/upload/js/qnupload.js" charset=gbk></script>

					<script type="text/javascript">

						function buildCodeForBBS(editor_id, filename, url, url_utf8){

							if("wordpress"==editor_id){

								buildCodeForWp(filename, url);

							}else{

								buildCodeForOther(editor_id, filename, url, url_utf8);

							}

						}



						function buildCodeForWp(filename, url){

							document.getElementById("content").value += "<a href="+url+" target=\"_blank\">下载地址:"+filename+"</a>";	

						}

						function props(value){

							return value;

						}

						var qn_userid = "'. get_option("wp_yf_username") .'";

						var bbs_userid = "$windid"; 

						var editor_id = "wordpress"; 

						uploadSettings.button_text =  "<span class=\"theFont\">Yunfile通道</span>"; 

						uploadSettings.button_image_url = "http://www.yunfile.com/upload/images/uploadbutton.png";

						var jsessionid = "4564898788";

						var mainlink = "http://www.yunfile.com/";

						var sitename = "forumName";

						var qn_action = "saveByGuest";

						init_qnupload(true);

					</script>

					</div>	

	';

	
	echo '</div></div>	</div>
	</div>';

	echo '<script>document.getElementById("postdivrich").appendChild(document.getElementById("qn_upload_div"));</script>';

        }

		

function wp_qnupload_options(){

	$message='YunFile网盘用户名更新成功';

	if($_POST['update_yunfile_option']){

		$wp_qiannao_user_saved = get_option("wp_yf_username");

		$wp_qiannao_user = $_POST['wp_yunfile_user_option'];

		if ($wp_qiannao_user_saved != $wp_qiannao_user)

			if(!update_option("wp_yf_username",$wp_qiannao_user)){

				$message='YunFile分享网盘用户名更新失败';

			}else{

				$message='YunFile分享网盘用户名更新成功';

			}

		echo '<div class="updated"><strong><p>'. $message . '</p></strong></div>';

	}

$message='更新成功';
	if($_POST['update_qiannao_option']){
		$wp_qiannao_user_saved = get_option("wp_qiannao_user");
		$wp_qiannao_user = $_POST['wp_qiannao_user_option'];
		if ($wp_qiannao_user_saved != $wp_qiannao_user)
			if(!update_option("wp_qiannao_user",$wp_qiannao_user))
				$message='更新失败';
		
		echo '<div class="updated"><strong><p>'. $message . '</p></strong></div>';
	}

?>

<div class=wrap>

	<form method="post" action="">

		<h2>网盘上传插件For WordPress </h2>

		<br>

		<fieldset name="wp_basic_options"  class="options">

		<table>

			<tr>

                <td valign="top" width ="150" align="left">输入YunFile网盘用户名:</td>

				<td><input type="text" width ="150px" name="wp_yunfile_user_option" value="<?php echo get_option("wp_yf_username");  ?>" /></td>

                <td width ="250px" ><a style ="text-decoration: none;margin-left:15px" href ="http://www.yunfile.com/user/insert/zhtyuan99.html" target ="_blank">注册属于我自己的YunFile网盘帐号？</a></td>

			</tr>

           <tr>

                <td  colspan="3" valign="top"  align="center">&nbsp;</td>

		  </tr>

		</table>			

	  </fieldset>

		<p class="submit"><input type="submit" name="update_yunfile_option" value="更新设置 &raquo;" /></p>


		<fieldset name="wp_basic_options"  class="options">
		<table>
			<tr>
                <td valign="top" align="right">&nbsp;输入千脑网盘用户名:&nbsp;&nbsp;</td>
				　<td><input type="text" name="wp_qiannao_user_option" value="<?php echo get_option("wp_qiannao_user");  ?>" /></td> 
<td width ="250px" ><a style ="text-decoration: none;margin-left:15px" href ="http://www.qiannao.com/tomos/ui/register.htm?rcmuserID=zhtyuan99" target ="_blank">注册属于我自己的千脑网盘帐号？</a></td>


			</tr>
		</table>			
		</fieldset>
		<p class="submit"><input type="submit" name="update_qiannao_option" value="更新设置 &raquo;" /></p>
 
 </form>

</div>



<pre>你可以选择使用现在这个公用账号，或者你可以自己注册一个网盘账号</pre>

<p>

<p>

<PRE>现在就去试一下吧  <a style ="text-decoration: none;margin-left:15px" href ="/wp-admin/post-new.php" target ="_blank">新建文章</a></pre>

<?php

}





function wp_qn_upload_options_admin(){

	if (function_exists('add_options_page')) { 

		add_options_page('wp files upload', 'WP 网盘插件', 3,  basename(__FILE__), 'wp_qnupload_options');

	}

}



add_action('admin_menu', 'wp_qn_upload_options_admin');		

add_action('dbx_post_sidebar','wp_qnupload_init');

?>
