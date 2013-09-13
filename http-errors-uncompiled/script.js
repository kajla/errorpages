var languages = ['en', 'de', 'hu', 'ru'];

function switchLanguage(language) {
	if (languages.indexOf(language) !== false) {
		document.documentElement.className = 'locale-' + language;
		document.title = document.getElementById('title-' + language).innerHTML;
	}
}

function getLanguageEventHandler(language) {
	return function (e) {
		var event;
		if (!e) {
			event = window.event;
		} else {
			event = e;
		}

		event.stopPropagation();
		event.preventDefault();

		switchLanguage(language);
	}
}

function showFlags() {
	if (document.getElementById('locale-flags')) {
		document.getElementById('locale-flags').style.display='block';
		for (var i=0; i<languages.length;i++) {
			var handler = getLanguageEventHandler(languages[i]);
			var element = document.getElementById('set-locale-' + languages[i]);

			if (element.addEventListener) {
				element.addEventListener('click', handler, false);
			} else if (element.attachEvent) {
				element.attachEvent('onclick', handler);
			}
		}
	}
}

if (navigator.language) {
	var locale = navigator.language.split('-')[0];
	switchLanguage(locale);
	showFlags()
}
