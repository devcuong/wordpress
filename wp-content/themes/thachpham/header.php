<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" />
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv='cache-control' content='no-cache'>
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
    <?php wp_head(); ?>
	<script type="text/javascript">
	function loadTrang(){
	var tpMeta = ["ho_chi_minh", "ha_noi", "binh_duong", "da_nang", "hai_phong", "long_an", "ba_ria_vung_tau", "an_giang","bac_giang", 
			"bac_can", "bac_lieu", "bac_ninh", "ben_tre", "binh_dinh", "binh_phuoc", "binh_thuan", "ca_mau", "can_tho", "cao_bang", "dak_lak", "dak_nong",
			"dien_bien", "dong_nai", "dong_thap", "gia_lai", "ha_giang", "ha_nam", "ha_tinh", "hai_duong", "hau_giang", "hoa_binh", "hung_yen", "khanh_hoa",
			"kien_giang", "kon_tum", "lai_chau", "lam_dong", "lang_son", "lao_cai", "nam_dinh", "nghe_an", "ninh_binh", "phu_tho", "phu_yen", "quang_binh",
			"quang_binh", "quang_nam", "quang_ngai", "quang_ninh", "quang_tri", "soc_trang", "son_la", "tay_ninh", "thai_binh", "thai_nguyen", "thanh_hoa",
			"thua_thien_hue", "tien_giang", "tra_vinh", "tuyen_quang", "vinh_long", "yen_bai"];
	var tpValue = ["Hồ Chí Minh", "Hà Nội", "Bình Dương", "Đà Nẵng", "Hải Phòng", "Long An", "Bà Rịa Vũng Tàu", "An Giang", "Bắc Giang",
		"Bắc Cạn", "Bạc Liêu", "Bắc Ninh", "Bên Tre", "Bình Định", "Bình Phước", "Bình Thuận", "Cà Mau", "Cần Thơ", "Cao Bằng", "Đắk Lắk", "Đắk Nông", 
		"Điện Biên", "Đồng Nai", "Gia Lai", "Hà Giang", "Hà Nam", "Hà Tĩnh", "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang",
		"Kon Tum", "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Phú Yên", "Quảng Bình",
		"Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế",
		"Tiền Giang", "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái"];
	
	var tpSelect = document.getElementById('selThanhPho');
	
	// Load thanh pho vao select co id la selThanhPho 
	for (var i = 0; i<tpMeta.length ; i++){
		var opt = document.createElement('option');
		opt.value = tpMeta[i];
		opt.innerHTML = tpValue[i];
		tpSelect.appendChild(opt);
	}
	}
	</script>
</head>
<body <?php body_class(); ?> onload="loadTrang()" >
  <div id="wr_header" class="header">  
	<div class="header-register" id="headerregister">
		<div class="action">
			
			
			<div class="logon">
				<a href="/dang-nhap.htm" rel="nofollow" title="Đăng nhập">
					<span>Đăng nhập</span>
				</a>
			</div>
			<div class="register">
				<a href="/dang-ky.htm" rel="nofollow" title="Đăng ký">
					<span>Đăng ký</span>
				</a>
			</div>

			
		</div>
	</div>
	  <div class="header-logo">
	  <div class="hdcontent">
           <div class="content-logo"> <?php thachpham_header(); ?></div>
        
            <div class="MultiBanner1 content-banner" id="Banner_bxh">
                <a href="http://banxehoi.com" target="_blank" rel="nofollow">
                    <img src="http://dothi.net/Images/banner/banner-bxh-151230-b1-728x90.gif"></a>
            </div>
        </div>
	 
	  </div>
</div>
 <div class="adv-menu"><div class="menu-content"><?php thachpham_menu('primary-menu'); ?>
</div></div>

		   	<div class="search">
		   	<div class="search-tab">
                <div class="search-tab-content">
                    <div class="tab-sell tab-active" id="divSell">
                        <h1>bất động sản bán</h1>
                    </div>
                    <div class="tab-rent" id="divRent">
                        <h2>bất động sản cho thuê</h2>
                    </div>
                     <div class="clear"></div>
                </div>
            </div>
			<div class="search-content" >
				<?php get_search_form(); ?>
			</div>		
			</div>
    <div id="container">
			
