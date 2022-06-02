jQuery(function () {
	$('.select2').select2({
<<<<<<< HEAD
		placeholder: 'Select',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});

	$('.campusSelect2').select2({
		placeholder: 'Select Campus',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.sessionSelect2').select2({
		placeholder: 'Select Session',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.classSelect2').select2({
		placeholder: 'Select Class',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.sectionSelect2').select2({
		placeholder: 'Select Section',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.genderSelect2').select2({
		placeholder: 'Select Gender',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.categorySelect2').select2({
		placeholder: 'Select Category',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.bloodSelect2').select2({
		placeholder: 'Select Blood Group',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.houseSelect2').select2({
		placeholder: 'Select School House',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.currentSelect2').select2({
		placeholder: 'Select Current Area',
		searchInputPlaceholder: 'Search',
		width: '100%'
	});
	$('.permenantSelect2').select2({
		placeholder: 'Select Permenant Area',
=======
		placeholder: 'Choose one',
>>>>>>> 006a8d57bfecdb2a0392125c7eb641346cd1130d
		searchInputPlaceholder: 'Search',
		width: '100%'
	});

	$('.select2-no-search').select2({
		minimumResultsForSearch: Infinity,
		placeholder: 'All categories',
		width: '100%'
	});

	function formatState(state) {
		if (!state.id) { return state.text; }
		var $state = $(
			'<span><img src="../../assets/plugins/flag-icon-css/flags/4x3/' + state.element.value.toLowerCase() +
			'.svg" class="img-flag" /> ' +
			state.text + '</span>'
		);
		return $state;
	};

	$(".select2-flag-search").select2({
		templateResult: formatState,
		templateSelection: formatState,
		escapeMarkup: function (m) { return m; }
	});

	$('.select2').on('click', () => {
		let selectField = document.querySelectorAll('.select2-search__field')
		selectField.forEach((element, index) => {
			element.focus();
		})
	});

});
