$(document).ready(function(){

/*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 	$('#header_pc').hide();
	$('#header_mobil').show();
	$('#blocs_mobil').show();
	$('#blocs_pc').hide();
}
else {
	$('#header_pc').show();
	$('#header_mobil').hide();
	$('#blocs_mobil').hide();
	$('#blocs_pc').show();
}
	

*/
/*if (navigator.userAgent.match(/(android|iphone|ipad|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) {
    if ( ((screen.width  >= 480) && (screen.height >= 800)) || ((screen.width  >= 800) && (screen.height >= 480)) || navigator.userAgent.match(/ipad/gi) ) {
        alert('tablette');
    } else {
        alert('mobile'); 
    }
} else {
    alert('bureau');
}*/
if (navigator.userAgent.match(/(android|iphone|ipad|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) {
    if ( ((screen.width  >= 480) && (screen.height >= 800)) || ((screen.width  >= 800) && (screen.height >= 480)) || navigator.userAgent.match(/ipad/gi) ) {
	    $('#header_pc').hide();
		$('#header_mobil').show();
		$('#blocs_mobil').show();
		$('#blocs_pc').hide();
    } else {
        $('#header_pc').hide();
		$('#header_mobil').show();
		$('#blocs_mobil').show();
		$('#blocs_pc').hide();
    }
} else {
	    $('#header_pc').show();
		$('#header_mobil').hide();
		$('#blocs_mobil').hide();
		$('#blocs_pc').show();
}
});
