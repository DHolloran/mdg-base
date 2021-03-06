jQuery((function($) {
	$(window).load(function(){
		var file_frame;

		/**
		* Attach Image
		*/
		// Uploading files
		$('.mdg-meta-upload .upload-link').on('click', function( e ) {
			var metaWrap  = $(e.currentTarget).parent('.mdg-meta-upload'),
					metaField = metaWrap.find('input[type="text"]')
			;

			e.preventDefault();

			// Create the media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: 'Upload a file',
				button: {
					text: 'Upload File'
				},
				multiple: false
			});

			file_frame.on( 'select', function() {
				var fileFrameJSON = file_frame.state().get('selection').toJSON(),
						fileUrl = fileFrameJSON[0].url
				;
				metaField.val(fileUrl);

				var ajaxParams = {
					action  : 'mdg_meta_upload_thumb',
					fileSrc : fileUrl
				};
				$.getJSON(ajaxurl, ajaxParams, function(json) {
					console.log(json);
						var thumbElem = metaWrap.find('.meta-upload-thumb');
						thumbElem.prev('br').remove();
						thumbElem.remove();
						metaWrap.append(json);
				});
			});

			// Finally, open the modal
			file_frame.open();
		});

	}); // $(window).load()
})(jQuery));