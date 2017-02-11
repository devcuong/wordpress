// Load dữ liệu của thành phố khi load page
$(document).on("pageload",function(){
	var hostFile = "http://dothi24h.abc/wp-content/themes/thachpham/file/";
	var fullUrlData = hostFile + "tinh_thanh_pho/" + "tinh_thanh_pho.txt";
	var tpSelect = $( ".wpuf_thanh_pho_1506" );
	tpSelect.empty();
	
	  jQuery.get(fullUrlData, function(data) {
			var obj = JSON.parse(data);
			for(i = 0; i < obj.length ; i++){
				tpSelect.append(new Option(obj[i].name, obj[i].meta));
			}
		});	
	});

$(document).ready(function() {
	
	var hostFile = "http://dothi24h.abc/wp-content/themes/thachpham/file/";
	
	var fullUrlData = hostFile + "tinh_thanh_pho/" + "tinh_thanh_pho.txt";
	var tpSelect = $( ".wpuf_thanh_pho_1506" );
	tpSelect.empty();
	
	  jQuery.get(fullUrlData, function(data) {
			var obj = JSON.parse(data);
			for(i = 0; i < obj.length ; i++){
				tpSelect.append(new Option(obj[i].name, obj[i].meta));
			}
		});	
	
	// Hien thi quan huyen khi chon selection thanh pho
	$('.wpuf_thanh_pho_1506').on('change', function() {
		  var qhSelect = $( ".wpuf_quan_huyen_1506" );
		  qhSelect.empty();
		  var x = this.value;
		  
		  // Trường hợp chọn thành phố có text là "Chọn Thành Phố"
		  if(x == ""){
				qhSelect.append(new Option("-- Chọn Quận Huyện --", ""));
		  }
		  var urlData = hostFile+"/quan_huyen_theo_thanh_pho/";
		  var fullUrlData = "";
		  if( x == "ho_chi_minh" ){
				fullUrlData = urlData+'ho_chi_minh.txt';
			}
		  
		  jQuery.get(fullUrlData, function(data) {
				var obj = JSON.parse(data);
				for(i = 0; i < obj.length ; i++){
					qhSelect.append(new Option(obj[i].name, obj[i].meta));
				}
			});	
		})
		
		// Hien thi phuong xa khi chon selection quan huyen
			$('.wpuf_quan_huyen_1506').on('change', function() {
		  var tp = $('.wpuf_thanh_pho_1506').val();
		  var qh = this.value;
		  var pxSelect = $( ".wpuf_phuong_xa_1506" );
		  pxSelect.empty();
		  
		  // Trường hợp chọn quận huyện có text là "Chọn Quận Huyện"
		  if(qh == ""){
				pxSelect.append(new Option("-- Chọn Phường Xã --", ""));
		  }
		  var fullUrlData = "";
		  
		  fullUrlData = hostFile + tp + "/" + qh + ".txt"; 
		  
		  jQuery.get(fullUrlData, function(data) {
				var obj = JSON.parse(data);
				for(i = 0; i < obj.length ; i++){
					pxSelect.append(new Option(obj[i].name, obj[i].meta));
				}
			});	
		})
		
		// Hien thi ten duong khi chon selection phuong xa
		$('.wpuf_phuong_xa_1506').on('change', function() {
		  var tp = $('.wpuf_thanh_pho_1506').val();
		  var qh = $('.wpuf_quan_huyen_1506').val();
		  var px = this.value;
		  var dpSelect = $( ".wpuf_duong_pho_1506" );
		  dpSelect.empty();
		  
		  // Trường hợp chọn phường xã có text là "Chọn Phường Xã"
		  if(qh == ""){
			  dpSelect.append(new Option("-- Chọn Đường/Phố --", ""));
		  }
		  
		  var fullUrlData = "";
		  
		  fullUrlData = hostFile + tp + "/" + qh + "/" + px + ".txt"; 
		  
		  jQuery.get(fullUrlData, function(data) {
				var obj = JSON.parse(data);
				for(i = 0; i < obj.length ; i++){
					dpSelect.append(new Option(obj[i].name, obj[i].meta));
				}
			});	
		})
});