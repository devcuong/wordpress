$(document).ready(function() {
	
	var hostFile = "http://dothi24h.abc/wp-content/themes/thachpham/file/";
	// Hien thi khi chon selection thanh pho
	$('.wpuf_thanh_pho_1506').on('change', function() {
		  var x = this.value;
		  var qhSelect = $( ".wpuf_quan_huyen_1506" );
		  qhSelect.empty();
		  var urlData = hostFile+"/quan-theo-thanh-pho/";
		  var fullUrlData = "";
		  if( x == "ho_chi_minh" ){
				fullUrlData = urlData+'ho_chi_minh.txt';
			}
		  
		  jQuery.get(fullUrlData, function(data) {
				var obj = JSON.parse(data);
				for(i = 0; i < obj.length ; i++){
					var opt = document.createElement('option');
					opt.value = obj[i].meta;
					opt.innerHTML = obj[i].name;
					qhSelect.append(new Option(obj[i].name, obj[i].meta));
				}
			});	
		})
		
		// Hien thi khi chon selection quan huyen
			$('.wpuf_quan_huyen_1506').on('change', function() {
		  var tp = $('.wpuf_thanh_pho_1506').val();
		  var qh = this.value;
		  var pxSelect = $( ".wpuf_phuong_xa_1506" );
		  pxSelect.empty();
		  var fullUrlData = "";
		  
		  fullUrlData = hostFile + tp + "/" + qh + ".txt"; 
		  
		  jQuery.get(fullUrlData, function(data) {
				var obj = JSON.parse(data);
				for(i = 0; i < obj.length ; i++){
					var opt = document.createElement('option');
					opt.value = obj[i].meta;
					opt.innerHTML = obj[i].name;
					pxSelect.append(new Option(obj[i].name, obj[i].meta));
				}
			});	
		})
});