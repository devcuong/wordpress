<script>
function changeThanhPho() {
	var x = document.getElementById("selThanhPho").value;
	var qhSelect = document.getElementById('selQuanHuyen');
	var urlData = "http://dothi24h.abc/wp-content/themes/thachpham/file/";
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
$(document).ready(function(){
    $("#lblSearch").click(function(){
        if($(this).html() == "Tìm nâng cao"){
        	$(this).html("Bỏ tìm");
            $("#searchArea").css("overflow","scroll");
            $("#searchArea").css("overflow-x","hidden");
            // 
            $("#ward-select-real").css("display","block");
            $("#street-select-real").css("display","block");
            $("#room-select-real").css("display","block");
            $("#direction-select-real").css("display","block");
            $("#project-select-real").css("display","block");
        }else{
        	$(this).text("Tìm nâng cao");
            $("#searchArea").css("overflow","hidden");
            $("#searchArea").css("overflow-x","hidden");
            // 
            $("#ward-select-real").css("display","none");
            $("#street-select-real").css("display","none");
            $("#room-select-real").css("display","none");
            $("#direction-select-real").css("display","none");
            $("#project-select-real").css("display","none");   
        }
    });
});
</script>
<form method="get" id="advanced-searchform" role="search"
	action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
	<div id="searchArea" style="overflow: hidden;" >
	<input type="hidden" name="search" value="advanced">
	<div class="keyword" id="DivKeySearch">
		<input type="text" value=""
			placeholder="<?php _e( 'Nhập từ khóa muốn tìm', 'thachpham' ); ?>"
			name="name" id="name" /><br>
	</div>
	<div class="search-or"></div>
	<!-- Chon Loai Nha Dat -->
	<div id="adtype-select-real" class="advanced-selection" style="display: block;">
	<select name="lt" id="selLoaiTin" class="selSearch">
		<option value=""><?php _e( '--Chọn Loại Tin Đăng--', 'thachpham' ); ?></option>
	</select>
	</div>
	<div id="category-select-real" class="advanced-selection" style="display: block;">
	<select name="ld" id="selLoaiNhaDat" class="selSearch">
		<option value=""><?php _e( '--Chọn Loại Nhà Đất--', 'thachpham' ); ?></option>
		<option value="ban_can_ho_chung_cu"><?php _e( 'Bán căn hộ chung cư', 'thachpham' ); ?></option>
		<option value="ban_nha_rieng"><?php _e( 'Bán nhà riêng', 'thachpham' ); ?></option>
		<option value="ban_nha_biet_thu_lien_ke"><?php _e( 'Bán nhà biệt thự. liền kề', 'thachpham' ); ?></option>
		<option value="ban_nha_mat_pho"><?php _e( 'Bán nhà mặt phố', 'thachpham' ); ?></option>
		<option value="ban_dat_nen_du_an"><?php _e( 'Bán đất nền dự án', 'thachpham' ); ?></option>
		<option value="ban_dat"><?php _e( 'Bán đất', 'thachpham' ); ?></option>
		<option value="ban_trang_trai_khu_nghi_duong"><?php _e( 'Bán trang trại khu nghỉ dưỡng', 'thachpham' ); ?></option>
		<option value="ban_kho_nha_xuong"><?php _e( 'Bán kho, nhà xưởng', 'thachpham' ); ?></option>
		<option value="ban_bat_dong_san_khac"><?php _e( 'Bán các loại bất động sản khác', 'thachpham' ); ?></option>
	</select>
	</div>
	<!-- Chon Thanh Pho -->
	<div id="city-select-real" class="advanced-selection" style="display: block;">
	<select name="tp" id="selThanhPho" onchange="changeThanhPho()" class="selSearch">
		<option value=""><?php _e( '--Chọn Thành Phố--', 'thachpham' ); ?></option>
	</select>
	</div>
	<!-- Chon Quan Huyen -->
    <div id="district-select-real" class="advanced-selection" style="display: block;">
	<select name="qh" id="selQuanHuyen" class="selSearch">
		<option value=""><?php _e( '--Chọn Quận Huyện--', 'thachpham' ); ?></option>
	</select>
    </div>
	<!-- Chon Dien Tich -->
	<div id="area-select-real" class="advanced-selection" style="display: block;">
	<select name="dt" id="selDienTich" class="selSearch">
		<option value=""><?php _e( '--Chọn Diện Tích--', 'thachpham' ); ?></option>
		<option value="chua_xac_dinh"><?php _e( 'Chưa xác định', 'thachpham' ); ?></option>
		<option value="nho_hon_30_m2"><?php _e( '<= 30 m2', 'thachpham' ); ?></option>
		<option value="30_toi_50_m2"><?php _e( '30 - 50 m2', 'thachpham' ); ?></option>
		<option value="50_toi_80_m2"><?php _e( '50 - 80 m2', 'thachpham' ); ?></option>
		<option value="80_toi_100_m2"><?php _e( '80 - 100 m2', 'thachpham' ); ?></option>
		<option value="100_toi_150_m2"><?php _e( '100 - 150 m2', 'thachpham' ); ?></option>
		<option value="150_toi_200_m2"><?php _e( '150 - 200 m2', 'thachpham' ); ?></option>
		<option value="200_toi_250_m2"><?php _e( '200 - 250 m2', 'thachpham' ); ?></option>
		<option value="250_toi_300_m2"><?php _e( '250 - 300 m2', 'thachpham' ); ?></option>
		<option value="300_toi_500_m2"><?php _e( '300 - 500 m2', 'thachpham' ); ?></option>
		<option value="lon_hon_500_m2"><?php _e( '>= 500 m2', 'thachpham' ); ?></option>
	</select>
	</div>
	<!-- Chon Muc Gia -->
	<div id="price-select-real" class="advanced-selection" style="display: block;">
	<select name="gd" id="selGiaNhaDat" class="selSearch">
		<option value=""><?php _e( '--Chọn Mức Giá--', 'thachpham' ); ?></option>
		<option value="gia_thoa_thuan"><?php _e( 'Thỏa thuận', 'thachpham' ); ?></option>
		<option value="nho_hon_500_trieu"><?php _e( '< 500 triệu', 'thachpham' ); ?></option>
		<option value="tu_500_toi_800_trieu"><?php _e( '500 - 800 triệu', 'thachpham' ); ?></option>
		<option value="tu_800_trieu_toi_1_ty"><?php _e( '800 triệu - 1 tỷ', 'thachpham' ); ?></option>
		<option value="tu_1_toi_2_ty"><?php _e( '1 - 2 tỷ', 'thachpham' ); ?></option>
		<option value="tu_2_toi_3_ty"><?php _e( '2 - 3 tỷ', 'thachpham' ); ?></option>
		<option value="tu_3_toi_5_ty"><?php _e( '3 - 5 tỷ', 'thachpham' ); ?></option>
		<option value="tu_5_toi_7_ty"><?php _e( '5 - 7 tỷ', 'thachpham' ); ?></option>
		<option value="tu_7_toi_10_ty"><?php _e( '7 - 10 tỷ', 'thachpham' ); ?></option>
		<option value="tu_10_toi_20_ty"><?php _e( '10 - 20 tỷ', 'thachpham' ); ?></option>
		<option value="tu_20_toi_30_ty"><?php _e( '20 - 30 tỷ', 'thachpham' ); ?></option>
		<option value="lon_hon_30_ty"><?php _e( '> 30 tỷ', 'thachpham' ); ?></option>
	</select>
	</div>
	<div id="ward-select-real" class="advanced-selection" style="display: none;"> 
		<select name="px" id="selPhuongXa" class="selSearch" >
			<option value=""><?php _e( '--Chọn Phường Xã--', 'thachpham' ); ?></option>
		</select>
	</div>
	<div id="street-select-real" class="advanced-selection" style="display: none;"> 
		<select name="dp" id="selDuongPho" class="selSearch" >
			<option value=""><?php _e( '--Chọn Đường Phố--', 'thachpham' ); ?></option>
		</select>
	</div>
	<div id="room-select-real" class="advanced-selection" style="display: none;"> 
		<select name="sp" id="selSoPhong" class="selSearch" >
			<option value=""><?php _e( '--Chọn Số Phòng--', 'thachpham' ); ?></option>
		</select>
	</div>
	<div id="direction-select-real" class="advanced-selection" style="display: none;"> 
		<select name="hn" id="selHuongNha" class="selSearch" >
			<option value=""><?php _e( '--Chọn Hướng Nhà--', 'thachpham' ); ?></option>
		</select>
	</div>
	<div id="project-select-real" class="advanced-selection" style="display: none;"> 
		<select name="da" id="selDuAn" class="selSearch" >
			<option value=""><?php _e( '--Chọn Dự Án--', 'thachpham' ); ?></option>
		</select>
	</div>
	</div>
	<div class="timkiems">
	   <a id="lblSearch">Tìm nâng cao</a>
	   <input type="submit" id="searchsubmit" value="Tìm kiếm" />
	</div>
</form>