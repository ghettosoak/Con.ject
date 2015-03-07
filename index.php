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

		<div class="language_marker strange_from" ng-click="layoverClick('lay open open_langselect_from')" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : vert }">
			<span ng-bind="tongueUser.strange"></span>
		</div>
		<div class="language_marker strange_to"   ng-click="layoverClick('lay open open_langselect_to')" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : vert }">
			<span ng-bind="tongueUser.mother"></span>
		</div>
		<div class="language_marker mother_from"  ng-click="layoverClick('lay open open_langselect_from')" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : antivert }">
			<span ng-bind="tongueUser.mother"></span>
		</div>
		<div class="language_marker mother_to"    ng-click="layoverClick('lay open open_langselect_to')" ng-class="{pardon: shadeTunerToggle}" ng-style="{ 'height' : antivert }">
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
				<div class="block" 
					ng-repeat="block in strange.from track by $index"
					ng-mouseenter="strange.to[$index].hovered = true"
					ng-mouseleave="strange.to[$index].hovered = false"
					ng-class="{
						hovered:  strange.to[$index].hovered
					}"
				>
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
					ng-mouseenter="block.hovered = true"
					ng-mouseleave="block.hovered = false"
					ng-class="{
						loading : block.loading,
						selected: block.selected,
						hovered:  block.hovered
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
							ng-mouseover="synonymous(content.display, $index, $parent.$index, 'strange')"
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
			ng-style="{ 
				'top' : vert,
				'left' : horiz
			}">
			<div class="spin">
				<div class="unlock"
					ng-click="layoverClick('lay')"
				></div>
				<div class="quadrant one"   ng-mousedown="shadeTunerSwitch($event)" ></div>
				<div class="quadrant two"   ng-mousedown="shadeTunerSwitch($event)" ></div>
				<div class="quadrant three" ng-mousedown="shadeTunerSwitch($event)" ></div>
				<div class="quadrant four"  ng-mousedown="shadeTunerSwitch($event)" ></div>
			</div>
		</div>

		<div class="helper helping helping_{{helperCount}}"
			ng-class="laidover"
		>

			<div class="helper_simulator">
				<div class="helper_strange_from">
					<div class="step step2">
						<span class="letter">h</span>
						<span class="letter">a</span>
						<span class="letter">l</span>
						<span class="letter">l</span>
						<span class="letter">o</span>
						<span class="letter">&nbsp;</span>
						<span class="letter">w</span>
						<span class="letter">e</span>
						<span class="letter">l</span>
						<span class="letter">t</span>
						<span class="letter">!</span>
					</div>
				</div>
				<div class="helper_strange_to">
					<div class="step step2">
						<div class="loading"></div>
						&nbsp;
					</div>

					<div class="step step3">
						<span class="word">hello world!</span>
					</div>					
				</div>
				<div class="helper_mother_from">
					
				</div>
				<div class="helper_mother_to">
					
				</div>
			</div>

			<div class="helper_closer"
				ng-click="layoverClick('')"
			>
				<p class="close_1">got</p>
				<p class="close_2">it!</p>
			</div>

			<!-- how about just a layover with mouseover-able bubbles instead of all of this animation nonsense? I think it will make the experience a little easier. :D -->

			<!-- <div class="helper_closer"
				ng-click="layoverClick('')"
			>
				<p class="close_1">got</p>
				<p class="close_2">it!</p>
			</div> -->

			<!-- <div class="helper_text">
				<div class="helper_text_repeat" ng-click="helperRepeat()">
					<span>&nbsp;</span>
				</div>

				<div class="helper_text_left" ng-click="helperMove('left')">
					<div class="top"></div>
					<div class="bottom"></div>
				</div>
				<div class="helper_text_right" ng-click="helperMove('right')">
					<div class="top"></div>
					<div class="bottom"></div>
				</div>

				<div class="helper_text_dots">
					<div class="dot d1"></div>
					<div class="dot d2"></div>
					<div class="dot d3"></div>
					<div class="dot d4"></div>
					<div class="dot d5"></div>
					<div class="dot d6"></div>
					<div class="dot d7"></div>
					<div class="dot d8"></div>
					<div class="dot d9"></div>
					<div class="dot d10"></div>
					<div class="dot d11"></div>
					<div class="dot d12"></div>
					<div class="dot d13"></div>
					<div class="dot d14"></div>
				</div>

				<div class="helper_text_body">
					
					<div class="helper_text_exterior helper_text_1">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Hi! Welcome to con.ject, the beautiful translator for folks who do lots of micro-translations. </p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_2">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>The left side of the app is for text input. Press</p> 
								<p>
									<span class="buttons windows"><span>ctrl</span> + <span>return</span></span>
									<span class="buttons mac"><span>cmd</span> + <span>return</span></span>
								</p>
								<p>to set the translator elves to task.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_3">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Once the translator elves have finished their work, the result will show up on the right side. Press</p>
								<p><span class="buttons b1"><span>TAB</span></span> </p>
								<p>to select it, and </p>
								<p>
									<span class="buttons b2 windows"><span>ctrl</span> + <span>C</span></span>
									<span class="buttons b2 mac"><span>cmd</span> + <span>C</span></span>
								</p>
								<p>to copy it.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_4">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>If you're pasting in text, the elves instinctually know to get to work straight away – no need to press anything. </p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_5">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>You can navigate through results with</p>
								<p>
									<span class="buttons b1"><span>&#8593;</span> & <span>&#8595;</span></span>
								</p>
								<p>and return to the corresponding text box with </p>
								<p>
									<span class="buttons b2"><span>shift</span> + <span>tab</span></span>
								</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_6">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Jump between language directions with</p>
								<p>
									<span class="buttons windows"><span>ctrl</span> + <span>&#8593;</span> / <span>&#8595;</span></span>
									<span class="buttons mac"><span>cmd</span> + <span>&#8593;</span> / <span>&#8595;</span></span>
								</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_7">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Not the word you were looking for? Click the translated text to get a list of synonyms. It'll be replaced inline!</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_8">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Copy individual words directly to the clipboard by double clicking the word.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_9">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Selecting entire blocks of text is super simple. Just click its background twice, and you're done.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_10">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Clear entire blocks with the handy half-cross in the middle.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_11">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Quickly change languages by clicking on the reference tabs at the edge.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_12">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Need a more space in one direction than the other? Resize things with the cube in the middle.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_13">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>Go to the main menu by clicking on the circle inside the cube.</p>
							</div>
						</div>
					</div>
					<div class="helper_text_exterior helper_text_14">
						<div class="helper_text_stuffing">
							<div class="helper_text_interior">
								<p>That's it! Happy translating!</p>
							</div>
						</div>
					</div>
				</div>


			</div> -->
		</div>

		<div class="loadover" ng-class="laidover">
			<div class="LO_1  LO_odd  "></div> <div class="LO_2  LO_even "></div> <div class="LO_3  LO_odd  "></div> <div class="LO_4  LO_even "></div> <div class="LO_5  LO_odd  "></div> <div class="LO_6  LO_even "></div> <div class="LO_7  LO_odd  "></div> <div class="LO_8  LO_even "></div> <div class="LO_9  LO_odd  "></div> <div class="LO_10 LO_even "></div> <div class="LO_11 LO_odd  "></div> <div class="LO_12 LO_even "></div> <div class="LO_13 LO_odd  "></div> <div class="LO_14 LO_even "></div> <div class="LO_15 LO_odd  "></div> <div class="LO_16 LO_even "></div> <div class="LO_17 LO_odd  "></div> <div class="LO_18 LO_even "></div> <div class="LO_19 LO_odd  "></div> <div class="LO_20 LO_even "></div> <div class="LO_21 LO_odd  "></div> <div class="LO_22 LO_even "></div> <div class="LO_23 LO_odd  "></div> <div class="LO_24 LO_even "></div> <div class="LO_25 LO_odd  "></div> <div class="LO_26 LO_even "></div> <div class="LO_27 LO_odd  "></div> <div class="LO_28 LO_even "></div> <div class="LO_29 LO_odd  "></div> <div class="LO_30 LO_even "></div> <div class="LO_31 LO_odd  "></div> <div class="LO_32 LO_even "></div> <div class="LO_33 LO_odd  "></div> <div class="LO_34 LO_even "></div> <div class="LO_35 LO_odd  "></div> <div class="LO_36 LO_even "></div> <div class="LO_37 LO_odd  "></div> <div class="LO_38 LO_even "></div> <div class="LO_39 LO_odd  "></div> <div class="LO_40 LO_even "></div> <div class="LO_41 LO_odd  "></div> <div class="LO_42 LO_even "></div> <div class="LO_43 LO_odd  "></div> <div class="LO_44 LO_even "></div> <div class="LO_45 LO_odd  "></div> <div class="LO_46 LO_even "></div> <div class="LO_47 LO_odd  "></div> <div class="LO_48 LO_even "></div> <div class="LO_49 LO_odd  "></div> <div class="LO_50 LO_even "></div>
		</div>

		<div 
			class="layover"
			ng-class="laidover">
			<div class="closer" ng-click="layoverClick('lay')"><span></span></div>
			<div class="layover_interior">
			
				<div class="about">
					<h1><span><span ng-click="layoverClick('lay open open_about')">About</span></span></h1>
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
					<h1><span><span ng-click="layoverClick('helping'); helpInit();">How to use</span></span></h1>
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
					<h1 class="logo"><span><span ng-click="layoverClick('')">[CON.JECT]</span></span></h1>
					<h1 class="pep"><span><span ng-click="layoverClick('')">Let's go!</span></span></h1>
				</div>
				<div class="langselect_from">
					<h1>
						<span>
							<span ng-click="layoverClick('lay open open_langselect_from')">
								Familiar Tongue (<span class="lang-{{tongueUser.strange}}" ng-bind="tongueUser.strange"></span>)
							</span>
						</span>
					</h1>

					<div class="layover_content unturned">
						<div class="layover_content_interior">
							<li
								ng-repeat="(key, data) in tongueAvailable"
								ng-click="tongueUser.strange = key"
							><span><span>{{data.display}} <span>({{data.translate}})</span></span></span></li>
						</div>
					</div>
				</div>
				<div class="langselect_to">
					<h1>
						<span>
							<span ng-click="layoverClick('lay open open_langselect_to')">
								Foreign Tongue (<span ng-bind="tongueUser.mother"></span>)
							</span>
						</span>
					</h1>

					<div class="layover_content unturned">
						<div class="layover_content_interior">
							<li
								ng-repeat="(key, data) in tongueAvailable"
								ng-click="tongueUser.mother = key"
							><span><span>{{data.display}} <span>({{data.translate}})</span></span></span></li>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

<script type="text/javascript" src="js/master-m.js"></script>

</body>

</html>