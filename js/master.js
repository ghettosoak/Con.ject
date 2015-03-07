function randomizr(){
    var d = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = ( d + Math.random() * 16 ) % 16 | 0;
        d = Math.floor( d / 16 );
        return (c == 'x' ? r : ( r & 0x7 | 0x8 ) ).toString(16);
    });
    return uuid;
};

var $window = $(window),
	map = [],
	strange,
	mother;

$window.load(function(){
	if (

		( window.navigator.platform === 'Mac68K') ||
		( window.navigator.platform === 'MacPPC') ||
		( window.navigator.platform === 'MacIntel')
	){
		$('html').addClass('cmd');
	}
});

var app = angular.module('conjecture', ['ngClipboard'])

.config(
	['ngClipProvider', 
		function(ngClipProvider) {
		    ngClipProvider.setPath("js/vendor/ZeroClipboard.swf");
		}
	]
)

.controller('MainCtrl', function($window, $scope, $http, $interval, $timeout) {

	// 	                                                                        
	// 	88b           d88   ,ad8888ba,   88888888ba,   88888888888 88           
	// 	888b         d888  d8"'    `"8b  88      `"8b  88          88           
	// 	88`8b       d8'88 d8'        `8b 88        `8b 88          88           
	// 	88 `8b     d8' 88 88          88 88         88 88aaaaa     88           
	// 	88  `8b   d8'  88 88          88 88         88 88"""""     88           
	// 	88   `8b d8'   88 Y8,        ,8P 88         8P 88          88           
	// 	88    `888'    88  Y8a.    .a8P  88      .a8P  88          88           
	// 	88     `8'     88   `"Y8888Y"'   88888888Y"'   88888888888 88888888888  
	// 	                                                                        
	// 	                                                                        

	// LIVE
	// strange = $scope.strange = {from: [{content:' '}],to:[{loading: false,content:' '}]}
	// mother = $scope.mother = {from: [{content:' '}],to:[{loading: false,content:' '}]}

	// TEST
	// strange = $scope.strange = {
	// 	from: [
	// 		{content:'hallo das ist ein bisschen text'},
	// 		{content:'hallo das ist ein bisschen text'}
	// 	],
	// 	to:[
	// 		{
	// 			loading: false,
	// 			selected: false,
	// 			hovered: false,
	// 			content:[
	// 				{
	// 					selected: false,
	// 					display:'hi',
	// 					values:[
	// 						{
	// 							word: 'hi',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'this',
	// 					values:[
	// 						{
	// 							word: 'this',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'is',
	// 					values:[
	// 						{
	// 							word: 'is',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'some',
	// 					values:[
	// 						{
	// 							word: 'some',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'textttt',
	// 					values:[
	// 						{
	// 							word: 'text',
	// 							chosen: true
	// 						},
	// 						{
	// 							word: 'text1',
	// 							chosen: false
	// 						},
	// 						{
	// 							word: 'text2',
	// 							chosen: false
	// 						},
	// 						{
	// 							word: 'text3',
	// 							chosen: false
	// 						}
	// 					]
	// 				},
	// 			]
	// 		},
	// 		{
	// 			loading: false,
	// 			selected: false,
	// 			content:[
	// 				{
	// 					selected: false,
	// 					display:'hi',
	// 					values:[
	// 						{
	// 							word: 'hi',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'this',
	// 					values:[
	// 						{
	// 							word: 'this',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'is',
	// 					values:[
	// 						{
	// 							word: 'is',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'some',
	// 					values:[
	// 						{
	// 							word: 'some',
	// 							chosen: true
	// 						}
	// 					]
	// 				},
	// 				{
	// 					selected: false,
	// 					display:'text',
	// 					values:[
	// 						{
	// 							word: 'text',
	// 							chosen: true
	// 						},
	// 						{
	// 							word: 'text1',
	// 							chosen: false
	// 						},
	// 						{
	// 							word: 'text2',
	// 							chosen: false
	// 						},
	// 						{
	// 							word: 'text3',
	// 							chosen: false
	// 						}
	// 					]
	// 				},
	// 			]
	// 		}
	// 	]
	// }

	// mother = $scope.mother = {from: [{content:'howdy'}],to:[
	// 	{
	// 		loading: false,
	// 		selected: false,
	// 		content:[
	// 			{
	// 				selected: false,
	// 				display:'salut',
	// 				values:[
	// 					{
	// 						word: 'salut',
	// 						chosen: true
	// 					}
	// 				]
	// 			},
	// 			{
	// 				selected: false,
	// 				display:'this',
	// 				values:[
	// 					{
	// 						word: 'this',
	// 						chosen: true
	// 					}
	// 				]
	// 			},
	// 			{
	// 				selected: false,
	// 				display:'is',
	// 				values:[
	// 					{
	// 						word: 'is',
	// 						chosen: true
	// 					}
	// 				]
	// 			},
	// 			{
	// 				selected: false,
	// 				display:'some',
	// 				values:[
	// 					{
	// 						word: 'some',
	// 						chosen: true
	// 					}
	// 				]
	// 			},
	// 			{
	// 				selected: false,
	// 				display:'text',
	// 				values:[
	// 					{
	// 						word: 'text',
	// 						chosen: true
	// 					},
	// 					{
	// 						word: 'text1',
	// 						chosen: false
	// 					},
	// 					{
	// 						word: 'text2',
	// 						chosen: false
	// 					},
	// 					{
	// 						word: 'text3',
	// 						chosen: false
	// 					}
	// 				]
	// 			},
	// 		]
	// 	},
	// ]}

	$scope.tongueAvailable = {
		'it' :{ display: 'Italian',    translate: 'it', thesaurus:'it_IT' },
		'fr' :{ display: 'French',     translate: 'fr', thesaurus:'fr_FR' },
		'de' :{ display: 'German',     translate: 'de', thesaurus:'de_DE' },
		'en' :{ display: 'English',    translate: 'en', thesaurus:'en_US' },
		'el' :{ display: 'Greek',      translate: 'el', thesaurus:'el_GR' },
		'es' :{ display: 'Spanish',    translate: 'es', thesaurus:'es_ES' },
		'no' :{ display: 'Norwegian',  translate: 'no', thesaurus:'no_NO' },
		'pt' :{ display: 'Portuguese', translate: 'pt', thesaurus:'pt_PT' },
		'ro' :{ display: 'Romanian',   translate: 'ro', thesaurus:'ro_RO' },
		'ru' :{ display: 'Russian',    translate: 'ru', thesaurus:'ru_RU' },
		'sk' :{ display: 'Slovakian',  translate: 'sk', thesaurus:'sk_SK' },
	}

	$scope.tongueUser = {
		strange: 'de',
		mother: 'en'
	};

	$scope.setup = false;

	$scope.init = function(){
		$timeout(function(){
			$scope.setup = true;
			$('.strange_from').find('.block').first().find('textarea').focus()
		}, 400)
	}

	$scope.tooMuchText = false;
 
	

	// 	                                                     
	// 	  ,ad8888ba,   ,ad8888ba,   88888888ba 8b        d8  
	// 	 d8"'    `"8b d8"'    `"8b  88      "8b Y8,    ,8P   
	// 	d8'          d8'        `8b 88      ,8P  Y8,  ,8P    
	// 	88           88          88 88aaaaaa8P'   "8aa8"     
	// 	88           88          88 88""""""'      `88'      
	// 	Y8,          Y8,        ,8P 88              88       
	// 	 Y8a.    .a8P Y8a.    .a8P  88              88       
	// 	  `"Y8888Y"'   `"Y8888Y"'   88              88       
	// 	                                                     
	// 	                                                     

	$scope.getTextToCopyBlock = function(block){
		var returnal = '';
		for (var i = 0; i < block.content.length; i++){
			returnal += block.content[i].display + ' ';
		}
		return returnal;
	}

	$scope.getTextToCopyWord = function(word){		
		return word;
	}

	// 	                                                                                                                     
	// 	888888888888 88888888ba         db        888b      88  ad88888ba  88                 db   888888888888 88888888888  
	// 	     88      88      "8b       d88b       8888b     88 d8"     "8b 88                d88b       88      88           
	// 	     88      88      ,8P      d8'`8b      88 `8b    88 Y8,         88               d8'`8b      88      88           
	// 	     88      88aaaaaa8P'     d8'  `8b     88  `8b   88 `Y8aaaaa,   88              d8'  `8b     88      88aaaaa      
	// 	     88      88""""88'      d8YaaaaY8b    88   `8b  88   `"""""8b, 88             d8YaaaaY8b    88      88"""""      
	// 	     88      88    `8b     d8""""""""8b   88    `8b 88         `8b 88            d8""""""""8b   88      88           
	// 	     88      88     `8b   d8'        `8b  88     `8888 Y8a     a8P 88           d8'        `8b  88      88           
	// 	     88      88      `8b d8'          `8b 88      `888  "Y88888P"  88888888888 d8'          `8b 88      88888888888  
	// 	                                                                                                                     
	// 	                                                                                                                     

	$scope.translate = function(query, target, language){
		if (query !== ''){

			if (language === 'strange'){
				// direction = 'de|en';
				direction = 
					$scope.tongueAvailable[ $scope.tongueUser.strange ].translate + 
					'|' + 
					$scope.tongueAvailable[ $scope.tongueUser.mother ].translate;
			}
			else{
				// direction = 'en|de';
				direction = 
					$scope.tongueAvailable[ $scope.tongueUser.strange ].translate + 
					'|' + 
					$scope.tongueAvailable[ $scope.tongueUser.mother ].translate;
			}

			$scope[language].to[target].loading = true;

			$.ajax({
				type: 'GET',
				url: 'http://api.mymemory.translated.net/get?q=' + query + '&langpair=' + direction
			}).done( function(response, status){
				var incoming = response.responseData.translatedText.split(' ');

				$scope[language].to[target].content = [];

				for (var i in incoming){
					$scope[language].to[target].content.push(
						{
							selected: false,
							display: incoming[i],
							values: [
								{ 
									word: incoming[i], 
									chosen: true 
								}
							]
						}
					);
				}

				$scope[language].to[target].loading = false;

				$scope.$apply();
			});
		}
	}

	// 	                                                                                                                   
	// 	888888888888 88        88 88888888888 ad88888ba        db       88        88 88888888ba  88        88  ad88888ba   
	// 	     88      88        88 88         d8"     "8b      d88b      88        88 88      "8b 88        88 d8"     "8b  
	// 	     88      88        88 88         Y8,             d8'`8b     88        88 88      ,8P 88        88 Y8,          
	// 	     88      88aaaaaaaa88 88aaaaa    `Y8aaaaa,      d8'  `8b    88        88 88aaaaaa8P' 88        88 `Y8aaaaa,    
	// 	     88      88""""""""88 88"""""      `"""""8b,   d8YaaaaY8b   88        88 88""""88'   88        88   `"""""8b,  
	// 	     88      88        88 88                 `8b  d8""""""""8b  88        88 88    `8b   88        88         `8b  
	// 	     88      88        88 88         Y8a     a8P d8'        `8b Y8a.    .a8P 88     `8b  Y8a.    .a8P Y8a     a8P  
	// 	     88      88        88 88888888888 "Y88888P" d8'          `8b `"Y8888Y"'  88      `8b  `"Y8888Y"'   "Y88888P"   
	// 	                                                                                                                   
	// 	                                                                                                                                                                                                                

	$scope.synonymous = function(query, word, target, language){

		console.log(query)
		console.log(word)
		console.log(target)
		console.log(language)

		if (language === 'strange') theLang = 'mother';
			else theLang = 'strange';

		$.ajax({
			type: 'GET',
			dataType: 'jsonp', 
			url: 'http://thesaurus.altervista.org/thesaurus/v1?word=' + query + 
				 '&language=' + $scope.tongueAvailable[ $scope.tongueUser[ theLang ] ].thesaurus + 
				 '&key=lUigdQQMwGstukSQhYCI&output=json'

		}).done( function(response, status){

			console.log(response)

			var reactions = response.response[0].list.synonyms.split('|')

			console.log(reactions)

			for (var j = 0; j < reactions.length; j++){
				$scope[language].to[target].content[word].values.push( {
					word: reactions[j], 
					chosen: false
				} );
			}

			$scope.$apply();
		}).fail( function(jqXHR, textStatus, errorThrown){
			console.log(jqXHR)
			console.log(textStatus)
			console.log(errorThrown)
		});

	}

	$scope.symmetrical = function(value, contentTarget, languageTarget, language, $event){

		for (var i = 0; i < $scope[language].to[languageTarget].content[contentTarget].values.length; i++){
			$scope[language].to[languageTarget].content[contentTarget].values[i].chosen = false;

			if ($scope[language].to[languageTarget].content[contentTarget].values[i].word === value)
				$scope[language].to[languageTarget].content[contentTarget].values[i].chosen = true;
		}

		var punct = $scope[language].to[languageTarget].content[contentTarget].display
			.match(/[\!\@\#\$\%\^\&\*\(\)\_\-\+\=\[\]\{\}\|\\\<\>\,\.\?\/\~\`]/);

		if (
			(punct != null) && 
			!value.match(/[\!\@\#\$\%\^\&\*\(\)\_\-\+\=\[\]\{\}\|\\\<\>\,\.\?\/\~\`]/)
		){
			value += punct;
		}

		$scope[language].to[languageTarget].content[contentTarget].display = value;

	}

	// 	                                                                                                                                    
	// 	 ad88888ba  88        88        db        88888888ba,   88888888888 888888888888 88        88 888b      88 88888888888 88888888ba   
	// 	d8"     "8b 88        88       d88b       88      `"8b  88               88      88        88 8888b     88 88          88      "8b  
	// 	Y8,         88        88      d8'`8b      88        `8b 88               88      88        88 88 `8b    88 88          88      ,8P  
	// 	`Y8aaaaa,   88aaaaaaaa88     d8'  `8b     88         88 88aaaaa          88      88        88 88  `8b   88 88aaaaa     88aaaaaa8P'  
	// 	  `"""""8b, 88""""""""88    d8YaaaaY8b    88         88 88"""""          88      88        88 88   `8b  88 88"""""     88""""88'    
	// 	        `8b 88        88   d8""""""""8b   88         8P 88               88      88        88 88    `8b 88 88          88    `8b    
	// 	Y8a     a8P 88        88  d8'        `8b  88      .a8P  88               88      Y8a.    .a8P 88     `8888 88          88     `8b   
	// 	 "Y88888P"  88        88 d8'          `8b 88888888Y"'   88888888888      88       `"Y8888Y"'  88      `888 88888888888 88      `8b  
	// 	                                                                                                                                    
	// 	      

	$scope.antivert = $scope.vert = (window.innerHeight / 2).toFixed(1);
	$scope.antihoriz = $scope.horiz = (window.innerWidth / 2).toFixed(1);

	$scope.shadeTunerToggle = false;
	$scope.shadeDrag = {};

	$scope.shadeTunerSwitch = function(e){
		if (e.type === 'mousedown'){
			$scope.shadeTunerToggle = true;
			$scope.shadeDrag['vert'] = e.screenY;
			$scope.shadeDrag['horiz'] = e.screenX;
		}else{ // MOUSEUP
			$scope.shadeTunerToggle = false;
		}
	}

	$scope.shadeTuner = function(e){
		if ($scope.shadeTunerToggle){

			$scope.vert = e.clientY;

			$scope.antivert = window.innerHeight - e.clientY;
		}
	}

	$scope.shadeOverlayer = function(){

	}

	// 	                                                                                          
	// 	88                 db   8b        d8 ,ad8888ba,  8b           d8 88888888888 88888888ba   
	// 	88                d88b   Y8,    ,8P d8"'    `"8b `8b         d8' 88          88      "8b  
	// 	88               d8'`8b   Y8,  ,8P d8'        `8b `8b       d8'  88          88      ,8P  
	// 	88              d8'  `8b   "8aa8"  88          88  `8b     d8'   88aaaaa     88aaaaaa8P'  
	// 	88             d8YaaaaY8b   `88'   88          88   `8b   d8'    88"""""     88""""88'    
	// 	88            d8""""""""8b   88    Y8,        ,8P    `8b d8'     88          88    `8b    
	// 	88           d8'        `8b  88     Y8a.    .a8P      `888'      88          88     `8b   
	// 	88888888888 d8'          `8b 88      `"Y8888Y"'        `8'       88888888888 88      `8b  
	// 	                                                                                          
	// 	  

	$scope.layoverClick = function(target){
		$scope.laidover = target;
	}

	//                                                                            
	//  88        88 88888888888 88          88888888ba  88888888888 88888888ba   
	//  88        88 88          88          88      "8b 88          88      "8b  
	//  88        88 88          88          88      ,8P 88          88      ,8P  
	//  88aaaaaaaa88 88aaaaa     88          88aaaaaa8P' 88aaaaa     88aaaaaa8P'  
	//  88""""""""88 88"""""     88          88""""""'   88"""""     88""""88'    
	//  88        88 88          88          88          88          88    `8b    
	//  88        88 88          88          88          88          88     `8b   
	//  88        88 88888888888 88888888888 88          88888888888 88      `8b  
	//                                                                            

	$scope.helperCount = 1;

	$scope.helperMove = function(direction){

		if (direction === 'left' && $scope.helperCount > 0 )
			$scope.helperCount--;
		else if (direction === 'right' && $scope.helperCount < 14 )
			$scope.helperCount++; 

	}

	$scope.helperRepeat = function(){
		console.log('REPEAT')
		var localCount = $scope.helperCount;
		$scope.helperCount = null;

		$timeout(function(){
			$scope.helperCount = localCount;
		}, 10);
	}

	$scope.helpInit = function(){
		console.log('yeah!')
	}

	// 	                                                                                                                                                                 
	// 	88888888ba  88          ,ad8888ba,     ,ad8888ba,  88      a8P       ,ad8888ba,   ,ad8888ba,   888b      88 888888888888 88888888ba    ,ad8888ba,   88           
	// 	88      "8b 88         d8"'    `"8b   d8"'    `"8b 88    ,88'       d8"'    `"8b d8"'    `"8b  8888b     88      88      88      "8b  d8"'    `"8b  88           
	// 	88      ,8P 88        d8'        `8b d8'           88  ,88"        d8'          d8'        `8b 88 `8b    88      88      88      ,8P d8'        `8b 88           
	// 	88aaaaaa8P' 88        88          88 88            88,d88'         88           88          88 88  `8b   88      88      88aaaaaa8P' 88          88 88           
	// 	88""""""8b, 88        88          88 88            8888"88,        88           88          88 88   `8b  88      88      88""""88'   88          88 88           
	// 	88      `8b 88        Y8,        ,8P Y8,           88P   Y8b       Y8,          Y8,        ,8P 88    `8b 88      88      88    `8b   Y8,        ,8P 88           
	// 	88      a8P 88         Y8a.    .a8P   Y8a.    .a8P 88     "88,      Y8a.    .a8P Y8a.    .a8P  88     `8888      88      88     `8b   Y8a.    .a8P  88           
	// 	88888888P"  88888888888 `"Y8888Y"'     `"Y8888Y"'  88       Y8b      `"Y8888Y"'   `"Y8888Y"'   88      `888      88      88      `8b   `"Y8888Y"'   88888888888  
	// 	                                                                                                                                                                 
	// 	                                                                                                                                                                 

	$scope.addBlock = function(e, i, t){
		$timeout(function(){ 
			$scope[t].from 
				.splice(i + 1, 0, 
				{
					content:''
				}
			);

			$scope[t].to
				.splice(i + 1, 0, 
				{
					loading:false, 
					selected: false, 
					hovered: false, 
					content:[]
				}
			);

			$scope.$apply();
		});
	}

	$scope.closeBlock = function(e, i, t){
		$scope[t].from.splice(i, 1);
		$scope[t].to.splice(i, 1);
	}

	$scope.sizeCheck = _.debounce(function(query_d, target_d, language_d){ 
		$scope.sizeCheck_direct();
	}, 1000);

	$scope.sizeCheck_direct = function(query_d, target_d, language_d){

		var $strange_from = $('.strange_from'),
			$strange_from_height = 0;

			$strange_to = $('.strange_to');
			$strange_to_height = 0;

		$strange_from.find('.block').each(function(e){
			$strange_from_height += $(this).outerHeight(true);

			$scope.tooMuchText = ($strange_from_height > $scope.vert) ? true : false;

			$scope.$apply();
		});

		$strange_to.find('.block').each(function(e){
			$strange_to_height += $(this).outerHeight(true);

			$scope.tooMuchText = ($strange_to_height > $scope.vert) ? true : false;

			$scope.$apply();
		});

	}

	// 	                                                          
	// 	88888888888 88888888ba    ,ad8888ba,   88b           d88  
	// 	88          88      "8b  d8"'    `"8b  888b         d888  
	// 	88          88      ,8P d8'        `8b 88`8b       d8'88  
	// 	88aaaaa     88aaaaaa8P' 88          88 88 `8b     d8' 88  
	// 	88"""""     88""""88'   88          88 88  `8b   d8'  88  
	// 	88          88    `8b   Y8,        ,8P 88   `8b d8'   88  
	// 	88          88     `8b   Y8a.    .a8P  88    `888'    88  
	// 	88          88      `8b   `"Y8888Y"'   88     `8'     88  
	// 	                                                          
	// 	                                                          

	$scope.from = function(e, i, t){
		var that = e;
		map[that.keyCode] = that.type == 'keydown';

		// console.log(i)

		// GET CARET
		var currentCaret = $(that.target)[0].selectionStart;
		var theValue = that.target.value;

		var $theSizer = $(that.target).siblings('.copy');

		$theSizer.html(
			'<span class="delicate">' +
			theValue.substring(0, currentCaret) + 
			'<span class="hiddenCaret"></span>' + 
			theValue.substring(currentCaret, theValue.length) +
			'</span>'
		);

		if (  // COMMAND / CTRL + ENTER
				// (map[13] && map[17]) ||
				// (map[13] && map [16] && map[91])
				(map[13] && map[91])
		){
			$scope.translate($scope[t].from[i].content, i, t);

			clearMap();
		}

		// ENTER
		else if (map[13]){ 
			that.preventDefault();

			$scope.addBlock(e, i, t);

			clearMap();
		}

		// CMD + DEL
		else if (map[91] && map[8]){ 
			that.preventDefault();

			$(that.target).parent().prev('.block').find('textarea').focus();

			$scope[t].from.splice(i, 1);
			$scope[t].to.splice(i, 1);

			clearMap();

			if ($scope[t].from.length === 0) $scope.addBlock(e, i, t);
		}

		// DELETE
		else if (map[8]){ 
			if (
				(that.target.value == '') && 
				($scope[t].from.length > 1) // make sure we're not deleting the last bit!
			){ 
				that.preventDefault();
				console.log(that.target)

				$(that.target).parent().prev('.block').find('textarea').focus();

				$scope[t].from.splice(i, 1);
				$scope[t].to.splice(i, 1);

				clearMap();

				if ($scope[t].from.length === 0) $scope.addBlock(e, i, t);
			}
		}

		// TAB / CMD + RIGHT
		else if (
			(map[9]) || 
			(map[91] && map[39]) 
		){ // TAB
			that.preventDefault();

			$('.' + t + '_to .interact').find('.block').eq(i).find('.actualBlock').focus()
			clearMap();
		}

		// CMD + DOWN / CTRL + DOWN
		else if (
			(map[91] && map [40]) || 
			(map[17] && map [40]) 
		){
			$('.mother_from .interact').find('.block').last().find('textarea').focus();
			clearMap();
		}

		// CMD + UP / CTRL + UP
		else if (
			(map[91] && map [38]) || 
			(map[17] && map [38]) 
		){
			$('.strange_from .interact').find('.block').last().find('textarea').focus();
			clearMap();
		}

		// PASTE
		else if (
			(map[17] && map[86]) || 
			(map[91] && map[86])
		){
	    	$timeout(function(){
				$scope.translate_direct_test($scope[t].from[i].content, i, t);
				clearMap();
	    	}, 200)
		}

		// UP ARROW
		else if (map[38]){ 

			$timeout(function(){ 

				if (
					( $theSizer.find('.hiddenCaret').position().top < 14 ) &&
					( $(that.target).parent().prev('.block').length > 0 )
				){
					that.preventDefault();

					var $prevTA = $(that.target).parent().prev('.block').find('textarea');
					
					var prevTACount = $prevTA.val().length;

					$prevTA.focus()[0]
					.setSelectionRange(10000, 10000);

					clearMap();
				}

			})

		}

		// DOWN ARROW
		else if (map[40]){ 

			$timeout(function(){ 

				if ($theSizer.find('.hiddenCaret').position().top >= ($theSizer.height() - 30)){
					that.preventDefault();

					var $nextTA = $(that.target).parent().next('.block').find('textarea');
					var nextTACount = $nextTA.val().length;

					$nextTA.focus()[0]
					.setSelectionRange(nextTACount-currentCaret, nextTACount-currentCaret);

					clearMap();
				}

			});
		}

		$scope.sizeCheck();

		function clearMap(){
			map = [];
			$timeout(function(){
				$scope.$apply();
			});
		}
	}

	// 	                           
	// 	888888888888 ,ad8888ba,    
	// 	     88     d8"'    `"8b   
	// 	     88    d8'        `8b  
	// 	     88    88          88  
	// 	     88    88          88  
	// 	     88    Y8,        ,8P  
	// 	     88     Y8a.    .a8P   
	// 	     88      `"Y8888Y"'    
	// 	                           
	// 	                           

	$scope.to = function(e, i, t){
		var that = e;
		map[that.keyCode] = that.type == 'keydown';

		// CMD + DOWN / CTRL + DOWN
		if (
			(map[91] && map [40]) || 
			(map[17] && map [40]) 
		){
			$('.mother_to .interact').find('.block').first().find('.actualBlock').focus();
			clearMap();
		}

		// CMD + UP / CTRL + UP
		else if (
			(map[91] && map [38]) || 
			(map[17] && map [38]) 
		){
			$('.strange_to .interact').find('.block').last().find('.actualBlock').focus();
			clearMap();
		}

		// UP ARROW
		else if (map[38]){ 
        	$timeout(function(){
				if ( $(that.target).parent().prev('.block').length > 0 )
					$(that.target).parent().prev('.block').find('.actualBlock').focus();
				else
					$('.strange_to .interact').find('.block').last().find('.actualBlock').focus();

				clearMap();
			})
		}

		// DOWN ARROW
		else if (map[40]){ 
        	$timeout(function(){
				if ( $(that.target).parent().next('.block').length > 0 )
					$(that.target).parent().next('.block').find('.actualBlock').focus();
				else
					$('.mother_to .interact').find('.block').first().find('.actualBlock').focus();

				clearMap();
			})
		}

		// CMD + DEL / DEL
		else if (
			(map[91] && map[8]) ||  
			(map[8]) 				
		){
			that.preventDefault();

			$(that.target).parent().prev('.block').find('textarea').focus();

			$scope[t].from.splice(i, 1);
			$scope[t].to.splice(i, 1);

			clearMap();

			if ($scope[t].from.length === 0){
				$scope.addBlock(e, i, t);
				$('.' + t + '_from').find('.block').last().find('textarea').focus();
			}
		}

		// SHIFT + TAB / LEFT ARROW
		else if (
			(map[9] && map[16]) ||  
			(map[37]) 				
		){
			that.preventDefault();
			$('.' + t + '_from .interact').find('.block').eq(i).find('textarea').focus();
			clearMap();
		}

		function clearMap(){
			map = [];
			$scope.$apply();
		}

	}
})

.directive('initFocus', [ '$timeout', 
	function($timeout) {
	    return {
	        restrict: 'A', 
	        link: function(scope, element, attrs) {
	        	$timeout(function(){
	            	scope.$parent.setup && element.focus();
	        	})
	        }
	    };
	}
])

.directive('symmetry', [ '$timeout', 
	function($timeout) {
	    return {
	        restrict: 'A', 
	        link: function(scope, element, attrs) {
	        	var $elem = $(element);
        	    $elem.on('click', function (e) {
        	    	e.stopPropagation();
    	    		$elem.parent().addClass('open')
        	    		.siblings().removeClass('open')
        	    });
	        }
	    };
	}
])

.directive('back', [ '$timeout', 
	function($timeout) {
	    return {
	        restrict: 'A', 
	        link: function(scope, element, attrs) {
	        	var $elem = $(element);
        	    $elem.on('click', function (e) {
        	    	$elem.find('.block').last().find('textarea').focus();
        	    });
	        }
	    };
	}
])

.directive('ground', [ '$timeout', 
	function($timeout) {
	    return {
	        restrict: 'A', 
	        link: function(scope, element, attrs) {
	        	var $elem = $(element);

        	    $elem.on('click', function (e) {
        	    	$('.word').removeClass('open')
        	    	// $('.block').removeClass('selected')
        	    });
	        }
	    };
	}
])

.directive('stopit', function () {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
            element.bind('click', function (e) {
                e.stopPropagation();
            });
        }
    };
})







