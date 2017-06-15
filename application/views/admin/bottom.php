
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/theme-floyd.js'); ?>"></script>
<script>
	$("#modal-normal > .panel-body > button").each(function(){
		var cls = $(this).data('class');
		$(this).click(function(){
			$(".modal-dialog").removeClass('modal-default modal-primary modal-info modal-success modal-warning modal-danger').addClass(cls);
			$(".modal-footer, .modal-header > span").empty();
		});
	});

	$("#modal-header > .panel-body > button").each(function(){
		var cls = $(this).data('class');
		$(this).click(function(){
			$(".modal-dialog").removeClass('modal-default modal-primary modal-info modal-success modal-warning modal-danger').addClass(cls);
			$(".modal-footer, .modal-header > span").empty();
			$(".modal-header > span").removeClass().addClass('text-size-20').append('Modal Title');
		});
	});

	$("#modal-footer > .panel-body > button").each(function(){
		var cls = $(this).data('class');
		$(this).click(function(){
			$(".modal-dialog").removeClass('modal-default modal-primary modal-info modal-success modal-warning modal-danger').addClass(cls);
			$(".modal-footer, .modal-header > span").empty();
			$(".modal-footer").html("<button class='btn btn-default'>ini tombol!</button><button class='btn btn-default'>kembali</button>");
		});
	});
</script>