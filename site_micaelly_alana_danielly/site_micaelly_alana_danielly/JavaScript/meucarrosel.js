	 document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.carousel');
		var instances = M.Carousel.init(elems, "fullWidth: true");
	  });

	  // Or with jQuery

	  $(document).ready(function(){
		$('.carousel').carousel();
	  });
		  