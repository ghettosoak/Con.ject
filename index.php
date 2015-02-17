<!doctype html>
<html lang="en" ng-app="conjecture">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>[conject.]</title>

    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/master.css" />
</head>

<body id="ng-app">
	<div 
		id="master" 
		ng-controller="MainCtrl"	
		data-ng-init="init()"	
		ng-mousemove="shadeTuner($event)"
		ng-mouseup="shadeTunerSwitch($event)"
		ng-class="{resizedText: tooMuchText}"
	>

		<div class="language_marker strange_from" ng-click="" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : vert }">
			<span ng-bind="tongueUser.strange"></span>
		</div>
		<div class="language_marker strange_to"   ng-click="" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : vert }">
			<span ng-bind="tongueUser.mother"></span>
		</div>
		<div class="language_marker mother_from"  ng-click="" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : antivert }">
			<span ng-bind="tongueUser.mother"></span>
		</div>
		<div class="language_marker mother_to"    ng-click="" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : antivert }">
			<span ng-bind="tongueUser.strange"></span>
		</div>

		<div class="language strange_from"
			ng-style="{ 
				'height' : vert
			}">
			
			<div 
				class="interact"
				back
			>
				<div class="block" ng-repeat="block in strange.from track by $index">
					<span 
						class="closer"
						ng-click="closeBlock($event, $index, 'strange')"
					></span>
					<textarea 
						class="strange_from_textarea" 
						ng-model="block.content"
						ng-keydown="from($event, $index, 'strange')"
						ng-keyup="from($event, $index, 'strange')"
						init-focus
						stopit>
					</textarea>
					<div class="copy"><span class="delicate">{{ block.content }}</span></div>
				</div>
			</div>

			<div class="shade"
				ng-class="{pardon: shadeTunerToggle}">
					
				<div class="expand">
					<div class="block" ng-repeat="block in strange.from track by $index">
						<div class="shadow">{{ block.content }}</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="language strange_to"
			ng-style="{ 
				'height' : vert
			}">

			<div 
				class="interact"
				ground
			>
				<div class="block" 
					ng-click="block.selected = true"
					ng-repeat="block in strange.to track by $index" 
					ng-class="{
						loading : block.loading,
						selected: block.selected
					}"
				>
					<span 
						class="closer"
						ng-click="closeBlock($event, $index, 'strange')"
					></span>
					<div class="loading"></div>
					
					<a href=""
						class="actualBlock" 
						clip-copy="getTextToCopyBlock(block)" 
						ng-focus="block.selected = true;" 
						ng-blur="block.selected = false;"
						ng-keydown="to($event, $index, 'strange')"
						ng-keyup="to($event, $index, 'strange')"
						ng-click="toCopy($event)"></a>

					<span class="word" 
						ng-repeat="content in block.content"
					>
						<span 
							symmetry
							class="actual display"
							ng-click="content.selected = true"
							ng-hide="content.selected === true"
						>
							{{content.display}}
						</span>
						<span 
							class="actual copier"
							clip-copy="getTextToCopyWord(content.display)"
							ng-show="content.selected === true"
							ng-click="content.selected = false"
						>
							{{content.display}}
						</span>
						<ul>
							<li 
								class="symmetrical"
								alignment
								ng-repeat="value in content.values track by $index"
								ng-click="symmetrical(value.word, $parent.$index, $parent.$parent.$index, 'strange', $event)"
								ng-class="{chosen : value.chosen}"
							>
								{{value.word}}
							</li>
						</ul>
					</span>
				</div>
			</div>

			<div class="shade"
				ng-class="{pardon: shadeTunerToggle}">
				<div class="expand">
					<div class="block" ng-repeat="block in strange.to track by $index">
						<div class="shadow">
							<span class="word" 
								ng-repeat="(key, content) in block.content track by $index"
							>
								{{content.display}}
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="language mother_from"
			ng-style="{ 
				'height' : antivert
			}">		

			<div 
				class="interact"
				back
			>
				<div class="block" ng-repeat="block in mother.from track by $index">
					<textarea 
						class="mother_from_textarea" 
						ng-model="block.content"
						ng-keydown="from($event, $index, 'mother')"
						ng-keyup="from($event, $index, 'mother')"
						init-focus
						stopEvent>
					</textarea>
					<div class="copy"><span class="delicate">{{ block }}</span></div>
				</div>
			</div>	

			<div class="shade"
				ng-class="{pardon: shadeTunerToggle}">

				<div class="expand">
					<div class="block" ng-repeat="block in mother.from track by $index">
						<div class="shadow">{{ block.content }}</div>
					</div>
				</div>
			</div>

		</div>

		<div class="language mother_to"
			ng-style="{ 
				'height' : antivert
			}">

			<div 
				class="interact"
				ground
			>
				<div class="block" 
					initFocus
					ng-repeat="block in mother.to track by $index" 
					ng-class="{
						loading : block.loading,
						selected: block.selected
					}"
				>
					<div class="loading"></div>

					<a href=""
						class="actualBlock" 
						clip-copy="getTextToCopyBlock(block)" 
						ng-focus="block.selected = true;" 
						ng-blur="block.selected = false;"
						ng-keydown="to($event, $index, 'mother')"
						ng-keyup="to($event, $index, 'mother')"></a>

					<span class="word" 
						ng-repeat="content in block.content"
					>
						<span 
							symmetry
							class="actual display"
							ng-click="content.selected = true"
							ng-hide="content.selected === true"
						>
							{{content.display}}
						</span>
						<span 
							class="actual copier"
							clip-copy="getTextToCopyWord(content.display)"
							ng-show="content.selected === true"
							ng-click="content.selected = false"
						>
							{{content.display}}
						</span>

						<ul>
							<li 
								class="symmetrical"
								alignment
								ng-repeat="value in content.values track by $index"
								ng-click="symmetrical(value.word, $parent.$index, $parent.$parent.$index, 'mother', $event)"
								ng-class="{chosen : value.chosen}"
							>
								{{value.word}}
							</li>
						</ul>
					</span>
				</div>
			</div>

			<div class="shade"
				ng-class="{pardon: shadeTunerToggle}">
				<div class="expand">
					<div class="block" ng-repeat="block in mother.to track by $index">
						<div class="shadow">
							<span class="word" 
								ng-repeat="(key, content) in block.content track by $index"
							>
								{{content.display}}
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="quadrat"
			ng-class="{ic: shadeTunerToggle}"
			ng-mousedown="shadeTunerSwitch($event)"
			ng-style="{ 
				'top' : vert,
				'left' : horiz
			}">
			<div class="spin">
				<div class="one"></div>
				<div class="two"></div>
				<div class="three"></div>
				<div class="four"></div>
				<div class="unlock"></div>
			</div>
		</div>

		<div class="loadover"></div>

		<div 
			class="layover"
			ng-class="laidover">
			<div class="layover_interior">
			
				<div class="about">
					<h1><span><span ng-click="layoverClick('about')">About</span></span></h1>
					<div class="layover_content">
						<div class="layover_content_interior">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>
				</div>
				<div class="help">
					<h1><span><span ng-click="layoverClick('help')">How to use</span></span></h1>
					<div class="layover_content">
						<div class="layover_content_interior">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>
				</div>
				<div class="hello">
					<h1><span>[CON.JECT]</span></h1>
				</div>
				<div class="langselect_from">
					<h1>
						<span>
							<span ng-click="layoverClick('langselect_from')">
								Familiar Tongue (<span class="lang-{{tongueUser.strange}}" ng-bind="tongueUser.strange"></span>)
							</span>
						</span>
					</h1>

					<div class="layover_content unturned">
						<div class="layover_content_interior">
							<li
								ng-repeat="(key, data) in tongueAvailable"
								ng-click="tongueUser.strange = key"
							><span><span>{{data.display}}</span></span></li>
						</div>
					</div>
				</div>
				<div class="langselect_to">
					<h1>
						<span>
							<span ng-click="layoverClick('langselect_to')">
								Foreign Tongue (<span ng-bind="tongueUser.mother"></span>)
							</span>
						</span>
					</h1>

					<div class="layover_content unturned">
						<div class="layover_content_interior">
							<li
								ng-repeat="(key, data) in tongueAvailable"
								ng-click="tongueUser.mother = key"
							><span><span>{{data.display}}</span></span></li>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

<script type="text/javascript" src="js/master-m.js"></script>

</body>

</html>