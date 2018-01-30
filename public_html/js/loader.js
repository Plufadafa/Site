var iframe;
(function() {
	var cp,
		iwmandp,
		ihmandp,
		ihbmandp,
		ihmiddle = 0,
		iwmiddle = 0,
		iheight,
		iwidth,
		mapSize,
		iadheight,
		multipleMaps,
		colourSchemes = ["grey", "black", "white", "blue", "purple", "green", "yellow", "red"],
		iframeURL;

	var loader = {
		clone: function(obj) {
			if (null === obj || "object" !== typeof obj) {
				return obj;
			}
			var copy = obj.constructor();
			for (var attr in obj) {
				if (obj.hasOwnProperty(attr)) {
					copy[attr] = obj[attr];
				}
			}
			return copy;
		},
		stringify: function(obj) {
			if (null === obj || "object" !== typeof obj) {
				return obj;
			}
			var copy = '';
			for (var attr in obj) {
				if (obj.hasOwnProperty(attr)) {
					copy += attr + ':' + obj[attr] + '~';
				}
			}
			return copy;
		},
		unstringify: function(str) {
			if (null === str || "string" !== typeof str) {
				return str;
			}
			var obj = {},
				arrElems;
			if (str !== "") {
				arrElems = str.split('~');
				for (var i = 0, iMax = arrElems.length; i < iMax; i++) {
					var thisElem = arrElems[i].split(':');
					try {
						obj[thisElem[0]] = thisElem[1];
					} catch (err) {
						loader.conlog([arrElems[i], err]);
					}
				}
			}
			return obj;
		},
		getQueryString: function(key, default_) {
			// gets any query string
			if (default_ === null) {
				default_ = "";
			}
			key = key.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
			var regex = new RegExp("[\\?&]" + key + "=([^&#]*)");
			var qs = regex.exec(window.location.href);
			if (qs === null) {
				return default_;
			} else {
				return decodeURIComponent(qs[1]);
			}
		},
		checkColourScheme: function(colour) {
			for (var i = 0, iMax = colourSchemes.length; i < iMax; i++) {
				if (colour === colourSchemes[i]) {
					return i;
				}
			}
			return -1;
		},
		checkGridParams: function(param, gridParams) {
			var index = -1;
			for (var i = 0, iMax = gridParams.length; i < iMax; i++) {
				if (param === gridParams[i]) {
					index = i;
					break;
				}
			}
			return index;
		},
		conlog: function(msg) {
			if (typeof console !== "undefined") {
				console.log(msg);
			}
		}

	};

	// New object containing all parameters passed into loader.js and component.js, either from moWWidgetParams if using new version or 
	// individual variables as in widgets created pre December 2012
	var moWWParam = {},
		tempParamStr = loader.getQueryString('moWWidgetParams');
	if (typeof tempParamStr === "string") {
		moWWParam = loader.unstringify(tempParamStr);
	}
	if (typeof moWWidgetParams !== 'undefined') {
		if (typeof moWWidgetParams === "string") {
			moWWParam = loader.unstringify(moWWidgetParams);
		}
		if (typeof moWWidgetParams === "object") {
			moWWParam = loader.clone(moWWidgetParams);
		}
		if (typeof moWWParam.moStartupLanguage === 'undefined') {
			moWWParam.moStartupLanguage = 'en';
		}
		if (typeof moWWParam.moListStyle === 'undefined') {
			moWWParam.moListStyle = 'vertical';
		}
		if (typeof moWWParam.moMapsRequired === 'undefined') {
			moWWParam.moMapsRequired = '';
		}

		if (typeof moWWParam.moGridParams === 'undefined') {
			moWWParam.moGridParams = ["weather", "temperature", "wind", "feelslike"];
		} else {
			if (typeof moWWParam.moGridParams === 'string') {
				moWWParam.moGridParams = moWWParam.moGridParams.split(',');
			}
			if (moWWParam.moGridParams.length === 0 || moWWParam.moGridParams[0] === "") {
				moWWParam.moGridParams = ["weather", "temperature", "wind", "feelslike"];
			}
		}

		if (loader.checkGridParams("weather", moWWParam.moGridParams) === -1) {
			if (moWWParam.moGridParams.length > 0) {
				var lastitem = moWWParam.moGridParams.pop();
			}
			moWWParam.moGridParams = ["weather"].concat(moWWParam.moGridParams);
		}

	} else {
		// handle old style parameters being passed in in the query string
		var moGridParams = ['weather', 'temperature'];
		if (typeof moAllowUserLocation !== 'undefined') {
			moWWParam.moAllowUserLocation = moAllowUserLocation;
		}
		if (typeof moBackgroundColour !== 'undefined') {
			moWWParam.moBackgroundColour = moBackgroundColour;
		}
		if (typeof moColourScheme !== 'undefined') {
			moWWParam.moColourScheme = moColourScheme;
		}
		if (typeof moDays !== 'undefined') {
			moWWParam.moDays = moDays;
		}
		if (typeof moDomain !== 'undefined') {
			moWWParam.moDomain = moDomain;
		}
		if (typeof moFSSI !== 'undefined') {
			moWWParam.moFSSI = moFSSI;
		}
		if (typeof moListStyle !== 'undefined') {
			moWWParam.moListStyle = moListStyle;
		} else {
			moWWParam.moListStyle = 'vertical';
		}
		if (typeof moMapDisplay !== 'undefined') {
			moWWParam.moMapDisplay = moMapDisplay;
		}
		if (typeof moMapsRequired !== 'undefined') {
			moWWParam.moMapsRequired = moMapsRequired;
		}

		if (typeof moShowWind !== 'undefined') {
			if (moShowWind === true || moShowWind === 'true') {
				moGridParams.push('wind');
			}
		}
		if (typeof moShowFeelsLike !== 'undefined') {
			if (moShowFeelsLike === true || moShowFeelsLike === 'true') {
				moGridParams.push('feelslike');
			}
		}
		if (typeof moShowUV !== 'undefined') {
			if (moShowUV === true || moShowUV === 'true') {
				moGridParams.push('uv');
			}
		}
		if (typeof moSpecificHeight !== 'undefined') {
			moWWParam.moSpecificHeight = moSpecificHeight;
		}
		if (typeof moSpecificWidth !== 'undefined') {
			moWWParam.moSpecificWidth = moSpecificWidth;
		}
		if (typeof moSpeedUnits !== 'undefined') {
			moWWParam.moSpeedUnits = moSpeedUnits;
		}
		if (typeof moStartupLanguage !== 'undefined') {
			moWWParam.moStartupLanguage = moStartupLanguage;
		}
		if (typeof moTemperatureUnits !== 'undefined') {
			moWWParam.moTemperatureUnits = moTemperatureUnits;
		}
		if (typeof moTextColour !== 'undefined') {
			moWWParam.moTextColour = moTextColour;
		}
		// must have a minimum of 2 weather types
		if (moGridParams.length < 2) {
			moGridParams.push('temperature');
		}
		moWWParam.moGridParams = moGridParams;
	}
	// moWWParam should contain enough elements to build a widget, check that this is so
	try {
		if (typeof(moWWParam.moListStyle) === "undefined" || typeof(moWWParam.moDays) === "undefined" || typeof(moWWParam.moColourScheme) === "undefined" || typeof(moWWParam.moFSSI) === "undefined" || typeof(moWWParam.moDomain) === "undefined" || typeof(moWWParam.moMapDisplay) === "undefined" || typeof(moWWParam.moMapsRequired) === "undefined" || typeof(moWWParam.moTemperatureUnits) === "undefined" || typeof(moWWParam.moSpeedUnits) === "undefined") { //|| typeof (moWWParam.moShowWind) === "undefined"
			throw ("Parameters missing in loader");
		}
		if (moWWParam.moListStyle !== "horizontal" && moWWParam.moListStyle !== "vertical") {
			throw ("Invalid orientation in loader");
		}
		moWWParam.moDays = parseInt(moWWParam.moDays);
		if (typeof(moWWParam.moDays) !== "number" || Math.floor(moWWParam.moDays) !== moWWParam.moDays || moWWParam.moDays < 1 || moWWParam.moDays > 7) {
			throw ("Invalid days in loader");
		}
		// handle backward compatibility
		if (moWWParam.moColourScheme === "default") {
			moWWParam.moColourScheme = "grey";
		}
		if (loader.checkColourScheme(moWWParam.moColourScheme) < 0) {
			throw ("Invalid colour scheme in loader");
		}
		moWWParam.moFSSI = parseInt(moWWParam.moFSSI);
		if (typeof(moWWParam.moFSSI) !== "number" || Math.floor(moWWParam.moFSSI) !== moWWParam.moFSSI || moWWParam.moFSSI < 1) {
			throw ("Invalid FSSI in loader");
		}
		if (moWWParam.moMapDisplay !== "side" && moWWParam.moMapDisplay !== "bottom" && moWWParam.moMapDisplay !== "none") {
			throw ("Invalid map display position in loader");
		}
		if (typeof(moWWParam.moMapsRequired) !== "string") {
			throw ("Invalid map list in loader");
		}
		// substitute LayerCache names for WCCache names to ensure backward compatibility
		if (moWWParam.moMapsRequired.length) {
			var newMapNames = [],
				mapNames = moWWParam.moMapsRequired.split(',');
			for (var i in mapNames) {
				if (mapNames.hasOwnProperty(i)) {
					var thisMapName = mapNames[i];
					switch (thisMapName) {
						case 'Precip Rate LR':
							newMapNames.push('Rainfall');
							break;
						case 'Pressure MSL':
							newMapNames.push('Pressure');
							break;
						case 'Temperature LR':
							newMapNames.push('Temperature');
							break;
					}
				}
			}
			if (newMapNames.length > 0) {
				moWWParam.moMapsRequired = newMapNames.valueOf();
			}
		}
		if (moWWParam.moTemperatureUnits !== "C" && moWWParam.moTemperatureUnits !== "F") {
			throw ("Invalid temperature units in loader");
		}
		if (moWWParam.moSpeedUnits !== "M" && moWWParam.moSpeedUnits !== "K" && moWWParam.moSpeedUnits !== "N") {
			throw ("Invalid speed units in loader");
		}
		if (typeof(moWWParam.moShowFeelsLike) === "undefined") {
			moWWParam.moShowFeelsLike = "false";
		}
		if (moWWParam.moShowFeelsLike !== "true" && moWWParam.moShowFeelsLike !== "false") {
			throw ("Invalid feels-like display flag in loader");
		}
		if (typeof(moWWParam.moAllowUserLocation) === "undefined") {
			moWWParam.moAllowUserLocation = "false";
		}
		if (moWWParam.moAllowUserLocation !== "true" && moWWParam.moAllowUserLocation !== "false") {
			throw ("Invalid user location flag in loader");
		}
		if ((typeof(moWWParam.moStartupLanguage) === "undefined") || (moWWParam.moStartupLanguage !== "en" && moWWParam.moStartupLanguage !== "cy")) {
			moWWParam.moStartupLanguage = "en";
		}
		if (typeof(moWWParam.moBackgroundColour) === "undefined") {
			moWWParam.moBackgroundColour = "black";
		}
		if (typeof(moWWParam.moTextColour) === "undefined") {
			moWWParam.moTextColour = "white";
		}
		// prevent alternative colours being passed in through open parameters
		if (moWWParam.moBackgroundColour.toLowerCase() !== 'black' && moWWParam.moBackgroundColour.toLowerCase() !== '#000000' && moWWParam.moBackgroundColour.toLowerCase() !== '#000' &&
			moWWParam.moBackgroundColour.toLowerCase() !== 'white' && moWWParam.moBackgroundColour.toLowerCase() !== '#ffffff' && moWWParam.moBackgroundColour.toLowerCase() !== '#fff') {
			moWWParam.moBackgroundColour = 'black';
		}
		if (moWWParam.moBackgroundColour.toLowerCase() === 'black' || moWWParam.moBackgroundColour.toLowerCase() === '#000000' || moWWParam.moBackgroundColour.toLowerCase() === '#000') {
			moWWParam.moTextColour = "white";
		} else {
			moWWParam.moTextColour = "black";
		}

		if (moWWParam.moStartupLanguage.length > 4) {
			throw ("Invalid language code in loader");
		}

		//Checking to make sure that ifthe height and width values are zero they are set to a numeric value 
		if (typeof(moWWParam.moSpecificHeight) === "undefined" || typeof(moWWParam.moSpecificWidth) === "undefined") {
			moWWParam.moSpecificHeight = 0;
			moWWParam.moSpecificWidth = 0;
		}

		if (typeof moWWParam.moSpecificHeight !== 'undefined' && typeof moWWParam.moSpecificWidth !== 'undefined') {
			if (parseInt(moWWParam.moSpecificHeight) !== 0 && parseInt(moWWParam.moSpecificWidth) !== 0) {
				iheight = moWWParam.moSpecificHeight;
				iwidth = moWWParam.moSpecificWidth;
			} else {
				var wrapperWidth, wrapperHeight,
					contentDiff = 35 * (moWWParam.moDays  - 5),
					wrapper = document.getElementById("mainWrapper");
				switch (moWWParam.moMapDisplay) {
					case "bottom":
						wrapperWidth = 288;
						wrapperHeight = 529 + contentDiff;
						break;
					case "side":
						wrapperWidth = 467;
						wrapperHeight = 332;
						break;
					default:
						wrapperWidth = 288;
						wrapperHeight = 332 + contentDiff;
				}
				iwidth = (wrapper !== null ? (wrapper.width !== null ? wrapper.width : wrapperWidth) : wrapperWidth);
				iheight = (wrapper !== null ? (wrapper.height !== null ? wrapper.height : wrapperHeight) : wrapperHeight);
				/*
				jQuery not to be used in loader as may interact badly with other frameworks
				if ( moWWParam.moMapDisplay === "bottom" ) {
					iwidth = ( typeof $ !== 'undefined' ? ( $("#mainWrapper").width() === null ? 288 : $("#mainWrapper").width() ) : 288 );		// 252
					iheight = ( typeof $ !== 'undefined' ? ( $("#mainWrapper").height() === null ? 529 : $("#mainWrapper").height() ) : 529 );	// 348
				} else if ( moWWParam.moMapDisplay === "side" ) {
					iwidth = ( typeof $ !== 'undefined' ? ( $("#mainWrapper").width() === null ? 467 : $("#mainWrapper").width() ) : 467 );		// 252
					iheight = ( typeof $ !== 'undefined' ? ( $("#mainWrapper").height() === null ? 332 : $("#mainWrapper").height() ) : 332 );	// 348		
				} else {
					iwidth = ( typeof $ !== 'undefined' ? ( $("#mainWrapper").width() === null ? 288 : $("#mainWrapper").width() ) : 288 );		// 252
					iheight = ( typeof $ !== 'undefined' ? ( $("#mainWrapper").height() === null ? 332 : $("#mainWrapper").height() ) : 332 );	// 348		
				}
				*/
			}
		}

		if (typeof moCP === 'string') {
			cp = moCP;
		} else {
			cp = top.document.location.href || "iframe"; //If in an Iframe, user should set moCP as we can't access "top.document."
		}
		moWWParam.cp = encodeURIComponent(cp);
		moWWParam.externalHost = top.document.location.hostname;
		var iframeParams = loader.stringify(moWWParam);
		iframeURL = "//" + moWWParam.moDomain + "/public/pws/components/yoursite/component.html#cp=" + encodeURIComponent(cp) + "&h=" + iheight + "&w=" + iwidth + "&moWWParam=" + encodeURIComponent(iframeParams);

	} catch (error) {
		iheight = 300;
		iwidth = 250;
		if (typeof moCP === 'string') {
			cp = moCP;
		} else {
			cp = top.document.location.href || "iframe"; //If in an Iframe, user should set moCP as we can't access "top.document."
		}
		iframeURL = "//" + moWWParam.moDomain + "/public/pws/components/yoursite/error.html#cp=" + encodeURIComponent(cp) + "&h=" + iheight + "&w=" + iwidth;

		// provide clue as to problem to be reported to support
		loader.conlog("Weather widget loader error: " + error);
	}

	var ins_0 = document.createElement('ins');
	ins_0.style.border = "medium none ";
	ins_0.style.margin = "auto";
	ins_0.style.padding = "0pt";
	ins_0.style.display = "block";
	ins_0.style.height = iheight + "px";
	ins_0.style.position = "relative";
	ins_0.style.visibility = "visible";
	ins_0.style.width = iwidth + "px";

	var ins_1 = document.createElement('ins');
	ins_1.style.border = "medium none ";
	ins_1.style.margin = "0pt";
	ins_1.style.padding = "0pt";
	ins_1.style.display = "block";
	ins_1.style.height = iheight + "px";
	ins_1.style.position = "relative";
	ins_1.style.visibility = "visible";
	ins_1.style.width = iwidth + "px";

	var iframe_mowxpane = document.createElement('iframe');
	iframe_mowxpane.width = iwidth;
	iframe_mowxpane.style.margin = 0;
	iframe_mowxpane.style.overflow = "hidden"; //iframe_mowxpane.scrolling = "no"; // obsolete - use CSS

	iframe_mowxpane.src = iframeURL;
	iframe_mowxpane.name = "mowxpane";
	iframe_mowxpane.style.left = "0pt";
	iframe_mowxpane.style.position = "absolute";
	iframe_mowxpane.style.top = "0pt";
	iframe_mowxpane.height = iheight;
	iframe_mowxpane.style.backgroundColor = "transparent"; //iframe_mowxpane.allowtransparency = "true"; // obsolete - use CSS
	iframe_mowxpane.marginWidth = 0;
	iframe_mowxpane.style.border = "0px none";

	iframe_mowxpane.id = "mowxpane";
	iframe_mowxpane.marginHeight = 0;
	iframe_mowxpane.title = "Met Office weather widget";
	// for IE8
	if (iframe_mowxpane.getAttribute("frameBorder")) {
		iframe_mowxpane.frameBorder = 0;
	}
	if (iframe_mowxpane.getAttribute("scrolling")) {
		iframe_mowxpane.scrolling = "no";
	}

	ins_1.appendChild(iframe_mowxpane);

	ins_0.appendChild(ins_1);

	// nasty hack required for config page
	iframe = ins_0.outerHTML;
	if (typeof moNoScript === "undefined") {
		var thisScript = document.currentScript || document.scripts[document.scripts.length - 1];
		thisScript.parentNode.insertBefore(ins_0, thisScript.nextSibling);
	}
})();