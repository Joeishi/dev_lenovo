<?php

	/**
	 * [resizeimage description]
	 * @param  [type]  $src [description]
	 * @param  integer $w   [description]
	 * @param  integer $h   [description]
	 * @param  integer $zc  [description]
	 * @return [type]       [description]
	 */
	function resizeimage($src, $w = 100, $h = 100, $zc = 1)
	{
		$url_path = BASE_URL.("thumbnail/farms/w/$w/h/$h/zc/$zc/src/$src");
		return $url_path;
	}

	/**
	 * [getController description]
	 * @param  string $dir [description]
	 * @return [type]      [description]
	 */
	function getController($dir='')
	{
		$result=array();
		if ($handle = opendir($dir)) {
		    //echo "Directory handle: $handle\n";
		    //echo "Entries:\n";

		    /* This is the correct way to loop over the directory. */
		    while (false !== ($entry = readdir($handle))) {
		        $entry=str_replace(".php", "", $entry);
		        if($entry!="." && $entry !=".."){
		        	$result[]=$entry;
		        }
		        
		    }

		    /* This is the WRONG way to loop over the directory. */
		    while ($entry = readdir($handle)) {
		    	$entry=str_replace(".php", "", $entry);
		        if($entry!="." && $entry !=".."){
		        	$result[]=$entry;
		        }
		    }

		    closedir($handle);
		}
		asort($result);
		return $result;
	}

	/**
	 * [alert description]
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	function alert($value='')
	{
		echo '<pre>';
		print_r($value);
		echo '</pre>';
	}
	/**
	 * [base_admin_url description]
	 * @param  string $url [description]
	 * @return [type]      [description]
	 */
	function base_admin_url($url = '')
	{
		return base_url('admin/' . $url);
	}
	/**
	 * [assets_template_url description]
	 * @param  string $url [description]
	 * @return [type]      [description]
	 */
	function assets_template_url($url = '')
	{
		return base_url('assets/themes/' . $url);
	}

	/**
	 * [checklogin description]
	 * @return [type] [description]
	 */
    function checklogin()
    {
        $CI =& get_instance();
        $CI->load->model('admin/auth_model', 'auth');
        $login_data = $CI->auth->get();
        if ($login_data['loged_in'] != 1) {
            redirect(base_admin_url('?access-denied'));
        }
        
    }
    /**
     * [user_info description]
     * @return [type] [description]
     */
    function user_info()
    {
        $CI =& get_instance();
        $CI->load->model('admin/auth_model', 'auth');
        $login_data = $CI->auth->get();
        
        return $login_data;
        
    }
    /**
     * [member_info description]
     * @return [type] [description]
     */
    function member_info()
    {
        $CI =& get_instance();
        $CI->load->model('admin/auth_model', 'auth');
        $login_data = $CI->auth->get_member();
        
        return $login_data;
        
    }


	function fontawesome()
	{
	    $font_data = array(
	        'icon-adjust',
	        'icon-anchor',
	        'icon-archive',
	        'icon-asterisk',
	        'icon-ban-circle',
	        'icon-bar-chart',
	        'icon-barcode',
	        'icon-beaker',
	        'icon-beer',
	        'icon-bell',
	        'icon-bell-alt',
	        'icon-bolt',
	        'icon-book',
	        'icon-bookmark',
	        'icon-bookmark-empty',
	        'icon-briefcase',
	        'icon-bug',
	        'icon-building',
	        'icon-bullhorn',
	        'icon-bullseye',
	        'icon-calendar',
	        'icon-calendar-empty',
	        'icon-camera',
	        'icon-camera-retro',
	        'icon-certificate',
	        'icon-check',
	        'icon-check-empty',
	        'icon-check-minus',
	        'icon-check-sign',
	        'icon-circle',
	        'icon-circle-blank',
	        'icon-cloud',
	        'icon-cloud-download',
	        'icon-cloud-upload',
	        'icon-code',
	        'icon-code-fork',
	        'icon-coffee',
	        'icon-cog',
	        'icon-cogs',
	        'icon-collapse',
	        'icon-collapse-alt',
	        'icon-collapse-top',
	        'icon-comment',
	        'icon-comment-alt',
	        'icon-comments',
	        'icon-comments-alt',
	        'icon-compass',
	        'icon-credit-card',
	        'icon-crop',
	        'icon-dashboard',
	        'icon-desktop',
	        'icon-download',
	        'icon-download-alt',
	        'icon-edit',
	        'icon-edit-sign',
	        'icon-ellipsis-horizontal',
	        'icon-ellipsis-vertical',
	        'icon-envelope',
	        'icon-envelope-alt',
	        'icon-eraser',
	        'icon-exchange',
	        'icon-exclamation',
	        'icon-exclamation-sign',
	        'icon-expand',
	        'icon-expand-alt',
	        'icon-external-link',
	        'icon-external-link-sign',
	        'icon-eye-close',
	        'icon-eye-open',
	        'icon-facetime-video',
	        'icon-female',
	        'icon-fighter-jet',
	        'icon-film',
	        'icon-filter',
	        'icon-fire',
	        'icon-fire-extinguisher',
	        'icon-flag',
	        'icon-flag-alt',
	        'icon-flag-checkered',
	        'icon-folder-close',
	        'icon-folder-close-alt',
	        'icon-folder-open',
	        'icon-folder-open-alt',
	        'icon-food',
	        'icon-frown',
	        'icon-gamepad',
	        'icon-gear (alias)',
	        'icon-gears (alias)',
	        'icon-gift',
	        'icon-glass',
	        'icon-globe',
	        'icon-group',
	        'icon-hdd',
	        'icon-headphones',
	        'icon-heart',
	        'icon-heart-empty',
	        'icon-home',
	        'icon-inbox',
	        'icon-info',
	        'icon-info-sign',
	        'icon-key',
	        'icon-keyboard',
	        'icon-laptop',
	        'icon-leaf',
	        'icon-legal',
	        'icon-lemon',
	        'icon-level-down',
	        'icon-level-up',
	        'icon-lightbulb',
	        'icon-location-arrow',
	        'icon-lock',
	        'icon-magic',
	        'icon-magnet',
	        'icon-mail-forward (alias)',
	        'icon-mail-reply (alias)',
	        'icon-mail-reply-all',
	        'icon-male',
	        'icon-map-marker',
	        'icon-meh',
	        'icon-microphone',
	        'icon-microphone-off',
	        'icon-minus',
	        'icon-minus-sign',
	        'icon-minus-sign-alt',
	        'icon-mobile-phone',
	        'icon-money',
	        'icon-moon',
	        'icon-move',
	        'icon-music',
	        'icon-off',
	        'icon-ok',
	        'icon-ok-circle',
	        'icon-ok-sign',
	        'icon-pencil',
	        'icon-phone',
	        'icon-phone-sign',
	        'icon-picture',
	        'icon-plane',
	        'icon-plus',
	        'icon-plus-sign',
	        'icon-plus-sign-alt',
	        'icon-power-off (alias)',
	        'icon-print',
	        'icon-pushpin',
	        'icon-puzzle-piece',
	        'icon-qrcode',
	        'icon-question',
	        'icon-question-sign',
	        'icon-quote-left',
	        'icon-quote-right',
	        'icon-random',
	        'icon-refresh',
	        'icon-remove',
	        'icon-remove-circle',
	        'icon-remove-sign',
	        'icon-reorder',
	        'icon-reply',
	        'icon-reply-all',
	        'icon-resize-horizontal',
	        'icon-resize-vertical',
	        'icon-retweet',
	        'icon-road',
	        'icon-rocket',
	        'icon-rss',
	        'icon-rss-sign',
	        'icon-screenshot',
	        'icon-search',
	        'icon-share',
	        'icon-share-alt',
	        'icon-share-sign',
	        'icon-shield',
	        'icon-shopping-cart',
	        'icon-sign-blank',
	        'icon-signal',
	        'icon-signin',
	        'icon-signout',
	        'icon-sitemap',
	        'icon-smile',
	        'icon-sort',
	        'icon-sort-by-alphabet',
	        'icon-sort-by-alphabet-alt',
	        'icon-sort-by-attributes',
	        'icon-sort-by-attributes-alt',
	        'icon-sort-by-order',
	        'icon-sort-by-order-alt',
	        'icon-sort-down',
	        'icon-sort-up',
	        'icon-spinner',
	        'icon-star',
	        'icon-star-empty',
	        'icon-star-half',
	        'icon-star-half-empty',
	        'icon-star-half-full (alias)',
	        'icon-subscript',
	        'icon-suitcase',
	        'icon-sun',
	        'icon-superscript',
	        'icon-tablet',
	        'icon-tag',
	        'icon-tags',
	        'icon-tasks',
	        'icon-terminal',
	        'icon-thumbs-down',
	        'icon-thumbs-down-alt',
	        'icon-thumbs-up',
	        'icon-thumbs-up-alt',
	        'icon-ticket',
	        'icon-time',
	        'icon-tint',
	        'icon-trash',
	        'icon-trophy',
	        'icon-truck',
	        'icon-umbrella',
	        'icon-unchecked (alias)',
	        'icon-unlock',
	        'icon-unlock-alt',
	        'icon-upload',
	        'icon-upload-alt',
	        'icon-user',
	        'icon-volume-down',
	        'icon-volume-off',
	        'icon-volume-up',
	        'icon-warning-sign',
	        'icon-wrench',
	        'icon-zoom-in',
	        'icon-zoom-out',
	        'icon-bitcoin (alias)',
	        'icon-btc',
	        'icon-cny',
	        'icon-dollar (alias)',
	        'icon-eur',
	        'icon-euro (alias)',
	        'icon-gbp',
	        'icon-inr',
	        'icon-jpy',
	        'icon-krw',
	        'icon-renminbi (alias)',
	        'icon-rupee (alias)',
	        'icon-usd',
	        'icon-won (alias)',
	        'icon-yen (alias)',
	        'icon-align-center',
	        'icon-align-justify',
	        'icon-align-left',
	        'icon-align-right',
	        'icon-bold',
	        'icon-columns',
	        'icon-copy',
	        'icon-cut',
	        'icon-eraser',
	        'icon-file',
	        'icon-file-alt',
	        'icon-file-text',
	        'icon-file-text-alt',
	        'icon-font',
	        'icon-indent-left',
	        'icon-indent-right',
	        'icon-italic',
	        'icon-link',
	        'icon-list',
	        'icon-list-alt',
	        'icon-list-ol',
	        'icon-list-ul',
	        'icon-paper-clip',
	        'icon-paperclip (alias)',
	        'icon-paste',
	        'icon-repeat',
	        'icon-rotate-left (alias)',
	        'icon-rotate-right (alias)',
	        'icon-save',
	        'icon-strikethrough',
	        'icon-table',
	        'icon-text-height',
	        'icon-text-width',
	        'icon-th',
	        'icon-th-large',
	        'icon-th-list',
	        'icon-underline',
	        'icon-undo',
	        'icon-unlink',
	        'icon-angle-down',
	        'icon-angle-left',
	        'icon-angle-right',
	        'icon-angle-up',
	        'icon-arrow-down',
	        'icon-arrow-left',
	        'icon-arrow-right',
	        'icon-arrow-up',
	        'icon-caret-down',
	        'icon-caret-left',
	        'icon-caret-right',
	        'icon-caret-up',
	        'icon-chevron-down',
	        'icon-chevron-left',
	        'icon-chevron-right',
	        'icon-chevron-sign-down',
	        'icon-chevron-sign-left',
	        'icon-chevron-sign-right',
	        'icon-chevron-sign-up',
	        'icon-chevron-up',
	        'icon-circle-arrow-down',
	        'icon-circle-arrow-left',
	        'icon-circle-arrow-right',
	        'icon-circle-arrow-up',
	        'icon-double-angle-down',
	        'icon-double-angle-left',
	        'icon-double-angle-right',
	        'icon-double-angle-up',
	        'icon-hand-down',
	        'icon-hand-left',
	        'icon-hand-right',
	        'icon-hand-up',
	        'icon-long-arrow-down',
	        'icon-long-arrow-left',
	        'icon-long-arrow-right',
	        'icon-long-arrow-up',
	        'icon-backward',
	        'icon-eject',
	        'icon-fast-backward',
	        'icon-fast-forward',
	        'icon-forward',
	        'icon-fullscreen',
	        'icon-pause',
	        'icon-play',
	        'icon-play-circle',
	        'icon-play-sign',
	        'icon-resize-full',
	        'icon-resize-small',
	        'icon-step-backward',
	        'icon-step-forward',
	        'icon-stop',
	        'icon-youtube-play',
	        'icon-adn',
	        'icon-android',
	        'icon-apple',
	        'icon-bitbucket',
	        'icon-bitbucket-sign',
	        'icon-bitcoin (alias)',
	        'icon-btc',
	        'icon-css3',
	        'icon-dribbble',
	        'icon-dropbox',
	        'icon-facebook',
	        'icon-facebook-sign',
	        'icon-flickr',
	        'icon-foursquare',
	        'icon-github',
	        'icon-github-alt',
	        'icon-github-sign',
	        'icon-gittip',
	        'icon-google-plus',
	        'icon-google-plus-sign',
	        'icon-html5',
	        'icon-instagram',
	        'icon-linkedin',
	        'icon-linkedin-sign',
	        'icon-linux',
	        'icon-maxcdn',
	        'icon-pinterest',
	        'icon-pinterest-sign',
	        'icon-renren',
	        'icon-skype',
	        'icon-stackexchange',
	        'icon-trello',
	        'icon-tumblr',
	        'icon-tumblr-sign',
	        'icon-twitter',
	        'icon-twitter-sign',
	        'icon-vk',
	        'icon-weibo',
	        'icon-windows',
	        'icon-xing',
	        'icon-xing-sign',
	        'icon-youtube',
	        'icon-youtube-play',
	        'icon-youtube-sign',
	        'icon-ambulance',
	        'icon-h-sign',
	        'icon-hospital',
	        'icon-medkit',
	        'icon-plus-sign-alt',
	        'icon-stethoscope',
	        'icon-user-md'
	    );
	    
	    return $font_data;
	}
