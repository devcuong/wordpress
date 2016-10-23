<script>
function changeThanhPho() {
	var x = document.getElementById("selThanhPho").value;
	var qhSelect = document.getElementById('selQuanHuyen');
	var urlData = "http://localhost:8080/wordpress/wp-content/themes/thachpham/file/";
	var fullUrlData = "";
	if( x == "ho_chi_minh" ){
		fullUrlData = urlData+'ho_chi_minh.txt';
	} else if (x == "ha_noi"){
		fullUrlData = urlData+'ha_noi.txt';
	} else if (x == "binh_duong"){
		fullUrlData = urlData+'binh_duong.txt';
	} else if (x == "da_nang"){
		fullUrlData = urlData+'da_nang.txt';
	} else if (x == "hai_phong"){
		fullUrlData = urlData+'hai_phong.txt';
	}else if (x == "long_an"){
		fullUrlData = urlData+'long_an.txt';
	}else if (x == "ba_ria_vung_tau"){
		fullUrlData = urlData+'ba_ria_vung_tau.txt';
	}else if (x == "an_giang"){
		fullUrlData = urlData+'an_giang.txt';
	}else if (x == "bac_giang"){
		fullUrlData = urlData+'bac_giang.txt';
	}else if (x == "bac_can"){
		fullUrlData = urlData+'bac_kan.txt';
	}
	
	// Ham xoa quan huyen
	removeQuanHuyen();
	
	jQuery.get(fullUrlData, function(data) {
			var obj = JSON.parse(data);
			for(i = 0; i < obj.length ; i++){
				var opt = document.createElement('option');
				opt.value = obj[i].meta;
				opt.innerHTML = obj[i].name;
				qhSelect.appendChild(opt);
			}
		});	
}

// Ham xoa quan huyen
function removeQuanHuyen(){
	var select = document.getElementById("selQuanHuyen");
	var length = select.options.length;
	for (i = 0; i < length;) {
	  select.options[i] = null;
	  length = select.options.length;
}
}	

</script>
<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <h3><?php _e( 'Advanced Search', 'thachpham' ); ?></h3>

    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced">

    <label for="name" class=""><?php _e( 'Name: ', 'thachpham' ); ?></label><br>
    <input type="text" value="" placeholder="<?php _e( 'Type the Car Name', 'thachpham' ); ?>" name="name" id="name" /><br>
	<!-- Chon Loai Nha Dat -->
	<label for="model" class=""><?php _e( 'Chọn Loại Nhà Đất: ', 'thachpham' ); ?></label><br>
    <select name="tp" id="selLoaiNhaDat" >
        <option value=""><?php _e( '--Chọn Thành Phố--', 'thachpham' ); ?></option>
    </select>
	<!-- Chon Thanh Pho -->
    <label for="model" class=""><?php _e( 'Chọn Thành Phố: ', 'thachpham' ); ?></label><br>
    <select name="tp" id="selThanhPho" onchange="changeThanhPho()" >
        <option value=""><?php _e( '--Chọn Thành Phố--', 'thachpham' ); ?></option>
    </select>
	<!-- Chon Quan Huyen -->
	<label for="model" class=""><?php _e( 'Chọn Quận Huyện: ', 'thachpham' ); ?></label><br>
    <select name="qh" id="selQuanHuyen">
        <option value=""><?php _e( '--Chọn Quận Huyện--', 'thachpham' ); ?></option>
    </select>
	
	
    <input type="submit" id="searchsubmit" value="Search" />
</form>