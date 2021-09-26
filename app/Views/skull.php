
<!-- DEBUG-VIEW START 4 APPPATH\Views\mazer\layout-vertical-navbar.php -->
<!-- DEBUG-VIEW START 3 APPPATH\Views\mazer\layouts\vertical-navbar.php -->
<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript"  id="debugbar_loader" data-time="1630314564" src="https://localhost/index.php?debugbar"></script><script type="text/javascript"  id="debugbar_dynamic_script"></script><style type="text/css"  id="debugbar_dynamic_style"></style><script class="kint-rich-script">void 0===window.kintShared&&(window.kintShared=function(){"use strict";var e={dedupe:function(e,n){return[].forEach.call(document.querySelectorAll(e),function(e){n&&n.ownerDocument.contains(n)||(n=e),e!==n&&e.parentNode.removeChild(e)}),n},runOnce:function(e){"complete"===document.readyState?e():window.addEventListener("load",e)}};return window.addEventListener("click",function(e){if(e.target.classList.contains("kint-ide-link")){var n=new XMLHttpRequest;n.open("GET",e.target.href),n.send(null),e.preventDefault()}}),e}());
void 0===window.kintRich&&(window.kintRich=function(){"use strict";var n={selectText:function(e){var t=window.getSelection(),a=document.createRange();a.selectNodeContents(e),t.removeAllRanges(),t.addRange(a)},each:function(e,t){Array.prototype.slice.call(document.querySelectorAll(e),0).forEach(t)},hasClass:function(e,t){return!!e.classList&&(void 0===t&&(t="kint-show"),e.classList.contains(t))},addClass:function(e,t){void 0===t&&(t="kint-show"),e.classList.add(t)},removeClass:function(e,t){return void 0===t&&(t="kint-show"),e.classList.remove(t),e},toggle:function(e,t){var a=n.getChildren(e);a&&(void 0===t&&(t=n.hasClass(e)),t?n.removeClass(e):n.addClass(e),1===a.childNodes.length&&(a=a.childNodes[0].childNodes[0])&&n.hasClass(a,"kint-parent")&&n.toggle(a,t))},toggleChildren:function(e,t){var a=n.getChildren(e);if(a){var r=a.getElementsByClassName("kint-parent"),o=r.length;for(void 0===t&&(t=!n.hasClass(e));o--;)n.toggle(r[o],t)}},toggleAll:function(e){for(var t=document.getElementsByClassName("kint-parent"),a=t.length,r=!n.hasClass(e.parentNode);a--;)n.toggle(t[a],r)},switchTab:function(e){var t,a=e.previousSibling,r=0;for(n.removeClass(e.parentNode.getElementsByClassName("kint-active-tab")[0],"kint-active-tab"),n.addClass(e,"kint-active-tab");a;)1===a.nodeType&&r++,a=a.previousSibling;t=e.parentNode.nextSibling.childNodes;for(var o=0;o<t.length;o++)o===r?(t[o].style.display="block",1===t[o].childNodes.length&&(a=t[o].childNodes[0].childNodes[0])&&n.hasClass(a,"kint-parent")&&n.toggle(a,!1)):t[o].style.display="none"},mktag:function(e){return"<"+e+">"},openInNewWindow:function(e){var t=window.open();t&&(t.document.open(),t.document.write(n.mktag("html")+n.mktag("head")+n.mktag("title")+"Kint ("+(new Date).toISOString()+")"+n.mktag("/title")+n.mktag('meta charset="utf-8"')+document.getElementsByClassName("kint-rich-script")[0].outerHTML+document.getElementsByClassName("kint-rich-style")[0].outerHTML+n.mktag("/head")+n.mktag("body")+'<input style="width: 100%" placeholder="Take some notes!"><div class="kint-rich">'+e.parentNode.outerHTML+"</div>"+n.mktag("/body")),t.document.close())},sortTable:function(e,a){var t=e.tBodies[0];[].slice.call(e.tBodies[0].rows).sort(function(e,t){if(e=e.cells[a].textContent.trim().toLocaleLowerCase(),t=t.cells[a].textContent.trim().toLocaleLowerCase(),isNaN(e)||isNaN(t)){if(isNaN(e)&&!isNaN(t))return 1;if(isNaN(t)&&!isNaN(e))return-1}else e=parseFloat(e),t=parseFloat(t);return e<t?-1:t<e?1:0}).forEach(function(e){t.appendChild(e)})},showAccessPath:function(e){for(var t=e.childNodes,a=0;a<t.length;a++)if(n.hasClass(t[a],"access-path"))return void(n.hasClass(t[a],"kint-show")?n.removeClass(t[a]):(n.addClass(t[a]),n.selectText(t[a])))},showSearchBox:function(e){var t=e.querySelector(".kint-search");t&&(n.hasClass(t)?(n.removeClass(t),n.removeClass(e.parentNode,"kint-search-root")):(n.addClass(e),n.addClass(t),t.focus(),t.select(),n.search(t)))},search:function(e){var t=e.parentNode.parentNode;if(e.value.length){var a=n.findMatches(t,e.value);n.highlightMatches(t,a)}else n.removeClass(t,"kint-search-root")},findMatches:function(e,t){for(var a=null,r=0;r<e.children.length;r++)if("DD"===e.children[r].tagName){a=e.children[r];break}if(!a)return[];var o=a.querySelectorAll("dfn"),s=[];return t=t.toLowerCase(),[].forEach.call(o,function(e){-1!=e.innerText.toLowerCase().indexOf(t)&&s.push(e)}),s},highlightMatches:function(e,t){var a=e.querySelectorAll(".kint-search-match");[].forEach.call(a,function(e){n.removeClass(e,"kint-search-match")}),n.addClass(e,"kint-search-root");for(var r=0;r<t.length;r++){for(var o=t[r];o!=e;){if("DL"===o.tagName)n.addClass(o,"kint-search-match");else if("LI"===o.tagName){if(o.parentNode.previousElementSibling.classList.contains("kint-tabs")){var s=[].slice.call(o.parentNode.children).indexOf(o);n.addClass([].slice.call(o.parentNode.previousElementSibling.children)[s],"kint-search-match")}o=o.parentNode}o=o.parentNode}n.addClass(t[r],"kint-search-match")}},getParentByClass:function(e,t){for(void 0===t&&(t="kint-rich");(e=e.parentNode)&&!n.hasClass(e,t););return e},getParentHeader:function(e,t){for(var a=e.nodeName.toLowerCase();"dd"!==a&&"dt"!==a&&n.getParentByClass(e);)a=(e=e.parentNode).nodeName.toLowerCase();return n.getParentByClass(e)?("dd"===a&&t&&(e=e.previousElementSibling),e&&"dt"===e.nodeName.toLowerCase()&&n.hasClass(e,"kint-parent")?e:void 0):null},getChildren:function(e){for(;(e=e.nextElementSibling)&&"dd"!==e.nodeName.toLowerCase(););return e},initLoad:function(){n.style=window.kintShared.dedupe("style.kint-rich-style",n.style),n.script=window.kintShared.dedupe("script.kint-rich-script",n.script),n.folder=window.kintShared.dedupe(".kint-rich.kint-folder",n.folder);var e=document.querySelectorAll("input.kint-search");if([].forEach.call(e,function(a){function e(e){if(window.clearTimeout(r),a.value!==t){var t=a.value;r=window.setTimeout(function(){n.search(a)},500)}}var r=null;a.removeEventListener("keyup",e),a.addEventListener("keyup",e)}),n.folder){var t=n.folder.querySelector("dd");[].forEach.call(document.querySelectorAll(".kint-rich.kint-file"),function(e){e.parentNode!==n.folder&&t.appendChild(e)}),document.body.appendChild(n.folder),n.addClass(n.folder)}},keyboardNav:{targets:[],target:0,active:!1,fetchTargets:function(){n.keyboardNav.targets=[],n.each(".kint-rich nav, .kint-tabs>li:not(.kint-active-tab)",function(e){0===e.offsetWidth&&0===e.offsetHeight||n.keyboardNav.targets.push(e)})},sync:function(e){var t=document.querySelector(".kint-focused");if(t&&n.removeClass(t,"kint-focused"),n.keyboardNav.active){var a=n.keyboardNav.targets[n.keyboardNav.target];n.addClass(a,"kint-focused"),e||n.keyboardNav.scroll(a)}},scroll:function(e){var t=function(e){return e.offsetTop+(e.offsetParent?t(e.offsetParent):0)},a=t(e);if(n.folder){var r=n.folder.querySelector("dd.kint-folder");r.scrollTo(0,a-r.clientHeight/2)}else window.scrollTo(0,a-window.innerHeight/2)},moveCursor:function(e){for(n.keyboardNav.target+=e;n.keyboardNav.target<0;)n.keyboardNav.target+=n.keyboardNav.targets.length;for(;n.keyboardNav.target>=n.keyboardNav.targets.length;)n.keyboardNav.target-=n.keyboardNav.targets.length;n.keyboardNav.sync()},setCursor:function(e){n.keyboardNav.fetchTargets();for(var t=0;t<n.keyboardNav.targets.length;t++)if(e===n.keyboardNav.targets[t])return n.keyboardNav.target=t,!0;return!1}},mouseNav:{lastClickTarget:null,lastClickTimer:null,lastClickCount:0,renewLastClick:function(){window.clearTimeout(n.mouseNav.lastClickTimer),n.mouseNav.lastClickTimer=window.setTimeout(function(){n.mouseNav.lastClickTarget=null,n.mouseNav.lastClickTimer=null,n.mouseNav.lastClickCount=0},250)}},style:null,script:null,folder:null};return window.addEventListener("click",function(e){var t=e.target,a=t.nodeName.toLowerCase();if(n.mouseNav.lastClickTarget&&n.mouseNav.lastClickTimer&&n.mouseNav.lastClickCount)return t=n.mouseNav.lastClickTarget,void(1===n.mouseNav.lastClickCount?(n.toggleChildren(t.parentNode),n.keyboardNav.setCursor(t),n.keyboardNav.sync(!0),n.mouseNav.lastClickCount++,n.mouseNav.renewLastClick()):(n.toggleAll(t),n.keyboardNav.setCursor(t),n.keyboardNav.sync(!0),n.keyboardNav.scroll(t),window.clearTimeout(n.mouseNav.lastClickTimer),n.mouseNav.lastClickTarget=null,n.mouseNav.lastClickTarget=null,n.mouseNav.lastClickCount=0));if(n.getParentByClass(t)){if("dfn"===a)n.selectText(t);else if("th"===a)return void(e.ctrlKey||n.sortTable(t.parentNode.parentNode.parentNode,t.cellIndex));if((t=n.getParentHeader(t))&&(n.keyboardNav.setCursor(t.querySelector("nav")),n.keyboardNav.sync(!0)),t=e.target,"li"===a&&"kint-tabs"===t.parentNode.className)"kint-active-tab"!==t.className&&n.switchTab(t),(t=n.getParentHeader(t,!0))&&(n.keyboardNav.setCursor(t.querySelector("nav")),n.keyboardNav.sync(!0));else if("nav"===a)"footer"===t.parentNode.nodeName.toLowerCase()?(n.keyboardNav.setCursor(t),n.keyboardNav.sync(!0),t=t.parentNode,n.hasClass(t)?n.removeClass(t):n.addClass(t)):(n.toggle(t.parentNode),n.keyboardNav.fetchTargets(),n.mouseNav.lastClickCount=1,n.mouseNav.lastClickTarget=t,n.mouseNav.renewLastClick());else if(n.hasClass(t,"kint-popup-trigger")){var r=t.parentNode;if("footer"===r.nodeName.toLowerCase())r=r.previousSibling;else for(;r&&!n.hasClass(r,"kint-parent");)r=r.parentNode;n.openInNewWindow(r)}else n.hasClass(t,"kint-access-path-trigger")?n.showAccessPath(t.parentNode):n.hasClass(t,"kint-search-trigger")?n.showSearchBox(t.parentNode):n.hasClass(t,"kint-search")||("pre"===a&&3===e.detail?n.selectText(t):n.getParentByClass(t,"kint-source")&&3===e.detail?n.selectText(n.getParentByClass(t,"kint-source")):n.hasClass(t,"access-path")?n.selectText(t):"a"!==a&&(t=n.getParentHeader(t))&&(n.toggle(t),n.keyboardNav.fetchTargets()))}},!0),window.addEventListener("keydown",function(e){if(e.target===document.body&&!e.altKey&&!e.ctrlKey){if(68===e.keyCode){if(n.keyboardNav.active)n.keyboardNav.active=!1;else if(n.keyboardNav.active=!0,n.keyboardNav.fetchTargets(),0===n.keyboardNav.targets.length)return void(n.keyboardNav.active=!1);return n.keyboardNav.sync(),void e.preventDefault()}if(n.keyboardNav.active){if(9===e.keyCode)return n.keyboardNav.moveCursor(e.shiftKey?-1:1),void e.preventDefault();if(38===e.keyCode||75===e.keyCode)return n.keyboardNav.moveCursor(-1),void e.preventDefault();if(40===e.keyCode||74===e.keyCode)return n.keyboardNav.moveCursor(1),void e.preventDefault();var t=n.keyboardNav.targets[n.keyboardNav.target];if("li"===t.nodeName.toLowerCase()){if(32===e.keyCode||13===e.keyCode)return n.switchTab(t),n.keyboardNav.fetchTargets(),n.keyboardNav.sync(),void e.preventDefault();if(39===e.keyCode||76===e.keyCode)return n.keyboardNav.moveCursor(1),void e.preventDefault();if(37===e.keyCode||72===e.keyCode)return n.keyboardNav.moveCursor(-1),void e.preventDefault()}if(t=t.parentNode,65===e.keyCode)return n.showAccessPath(t),void e.preventDefault();if("footer"===t.nodeName.toLowerCase()&&n.hasClass(t.parentNode,"kint-rich"))32===e.keyCode||13===e.keyCode?(n.hasClass(t)?n.removeClass(t):n.addClass(t),e.preventDefault()):37===e.keyCode||72===e.keyCode?(n.removeClass(t),e.preventDefault()):39!==e.keyCode&&76!==e.keyCode||(n.addClass(t),e.preventDefault());else{if(32===e.keyCode||13===e.keyCode)return n.toggle(t),n.keyboardNav.fetchTargets(),void e.preventDefault();if(39===e.keyCode||76===e.keyCode||37===e.keyCode||72===e.keyCode){var a=37===e.keyCode||72===e.keyCode;if(n.hasClass(t))n.toggleChildren(t,a),n.toggle(t,a);else{if(a){var r=n.getParentHeader(t.parentNode.parentNode,!0);r&&(t=r,n.keyboardNav.setCursor(t.querySelector("nav")),n.keyboardNav.sync())}n.toggle(t,a)}return n.keyboardNav.fetchTargets(),void e.preventDefault()}}}}},!0),n}()),window.kintShared.runOnce(window.kintRich.initLoad);
void 0===window.kintMicrotimeInitialized&&(window.kintMicrotimeInitialized=1,window.addEventListener("load",function(){"use strict";var c={},i=Array.prototype.slice.call(document.querySelectorAll("[data-kint-microtime-group]"),0);i.forEach(function(i){if(i.querySelector(".kint-microtime-lap")){var t=i.getAttribute("data-kint-microtime-group"),e=parseFloat(i.querySelector(".kint-microtime-lap").innerHTML),r=parseFloat(i.querySelector(".kint-microtime-avg").innerHTML);void 0===c[t]&&(c[t]={}),(void 0===c[t].min||c[t].min>e)&&(c[t].min=e),(void 0===c[t].max||c[t].max<e)&&(c[t].max=e),c[t].avg=r}}),i.forEach(function(i){var t=i.querySelector(".kint-microtime-lap");if(null!==t){var e=parseFloat(t.textContent),r=i.dataset.kintMicrotimeGroup,o=c[r].avg,n=c[r].max,a=c[r].min;e===(i.querySelector(".kint-microtime-avg").textContent=o)&&e===a&&e===n||(t.style.background=o<e?"hsl("+(40-40*((e-o)/(n-o)))+", 100%, 65%)":"hsl("+(40+80*(o===a?0:(o-e)/(o-a)))+", 100%, 65%)")}})}));
</script><style class="kint-rich-style">.kint-rich{font-size:13px;overflow-x:auto;white-space:nowrap;background:rgba(255,255,255,0.9)}.kint-rich.kint-folder{position:fixed;bottom:0;left:0;right:0;z-index:999999;width:100%;margin:0;display:none}.kint-rich.kint-folder.kint-show{display:block}.kint-rich.kint-folder dd.kint-folder{max-height:calc(100vh - 100px);padding-right:8px;overflow-y:scroll}.kint-rich::selection,.kint-rich::-moz-selection,.kint-rich::-webkit-selection{background:#aaa;color:#1d1e1e}.kint-rich .kint-focused{box-shadow:0 0 3px 2px red}.kint-rich,.kint-rich::before,.kint-rich::after,.kint-rich *,.kint-rich *::before,.kint-rich *::after{box-sizing:border-box;border-radius:0;color:#1d1e1e;float:none !important;font-family:Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;line-height:15px;margin:0;padding:0;text-align:left}.kint-rich{margin:8px 0}.kint-rich dt,.kint-rich dl{width:auto}.kint-rich dt,.kint-rich div.access-path{background:#f8f8f8;border:1px solid #d7d7d7;color:#1d1e1e;display:block;font-weight:bold;list-style:none outside none;overflow:auto;padding:4px}.kint-rich dt:hover,.kint-rich div.access-path:hover{border-color:#aaa}.kint-rich>dl dl{padding:0 0 0 12px}.kint-rich dt.kint-parent>nav,.kint-rich>footer>nav{background:url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMCAxNTAiPjxwYXRoIGQ9Ik02IDdoMThsLTkgMTV6bTAgMzBoMThsLTkgMTV6bTAgNDVoMThsLTktMTV6bTAgMzBoMThsLTktMTV6bTAgMTJsMTggMThtLTE4IDBsMTgtMTgiIGZpbGw9IiM1NTUiLz48cGF0aCBkPSJNNiAxMjZsMTggMThtLTE4IDBsMTgtMTgiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlPSIjNTU1Ii8+PC9zdmc+") no-repeat scroll 0 0/15px 75px transparent;cursor:pointer;display:inline-block;height:15px;width:15px;margin-right:3px;vertical-align:middle}.kint-rich dt.kint-parent:hover>nav,.kint-rich>footer>nav:hover{background-position:0 25%}.kint-rich dt.kint-parent.kint-show>nav,.kint-rich>footer.kint-show>nav{background-position:0 50%}.kint-rich dt.kint-parent.kint-show:hover>nav,.kint-rich>footer.kint-show>nav:hover{background-position:0 75%}.kint-rich dt.kint-parent.kint-locked>nav{background-position:0 100%}.kint-rich dt.kint-parent+dd{display:none;border-left:1px dashed #d7d7d7}.kint-rich dt.kint-parent.kint-show+dd{display:block}.kint-rich var,.kint-rich var a{color:#06f;font-style:normal}.kint-rich dt:hover var,.kint-rich dt:hover var a{color:red}.kint-rich dfn{font-style:normal;font-family:monospace;color:#1d1e1e}.kint-rich pre{color:#1d1e1e;margin:0 0 0 12px;padding:5px;overflow-y:hidden;border-top:0;border:1px solid #d7d7d7;background:#f8f8f8;display:block;word-break:normal}.kint-rich .kint-popup-trigger,.kint-rich .kint-access-path-trigger,.kint-rich .kint-search-trigger{background:rgba(29,30,30,0.8);border-radius:3px;height:16px;font-size:16px;margin-left:5px;font-weight:bold;width:16px;text-align:center;float:right !important;cursor:pointer;color:#f8f8f8;position:relative;overflow:hidden;line-height:17.6px}.kint-rich .kint-popup-trigger:hover,.kint-rich .kint-access-path-trigger:hover,.kint-rich .kint-search-trigger:hover{color:#1d1e1e;background:#f8f8f8}.kint-rich dt.kint-parent>.kint-popup-trigger{line-height:19.2px}.kint-rich .kint-search-trigger{font-size:20px}.kint-rich input.kint-search{display:none;border:1px solid #d7d7d7;border-top-width:0;border-bottom-width:0;padding:4px;float:right !important;margin:-4px 0;color:#1d1e1e;background:#f8f8f8;height:24px;width:160px;position:relative;z-index:100}.kint-rich input.kint-search.kint-show{display:block}.kint-rich .kint-search-root ul.kint-tabs>li:not(.kint-search-match){background:#f8f8f8;opacity:0.5}.kint-rich .kint-search-root dl:not(.kint-search-match){opacity:0.5}.kint-rich .kint-search-root dl:not(.kint-search-match)>dt{background:#f8f8f8}.kint-rich .kint-search-root dl:not(.kint-search-match) dl,.kint-rich .kint-search-root dl:not(.kint-search-match) ul.kint-tabs>li:not(.kint-search-match){opacity:1}.kint-rich div.access-path{background:#f8f8f8;display:none;margin-top:5px;padding:4px;white-space:pre}.kint-rich div.access-path.kint-show{display:block}.kint-rich footer{padding:0 3px 3px;font-size:9px;background:transparent}.kint-rich footer>.kint-popup-trigger{background:transparent;color:#1d1e1e}.kint-rich footer nav{height:10px;width:10px;background-size:10px 50px}.kint-rich footer>ol{display:none;margin-left:32px}.kint-rich footer.kint-show>ol{display:block}.kint-rich a{color:#1d1e1e;text-shadow:none;text-decoration:underline}.kint-rich a:hover{color:#1d1e1e;border-bottom:1px dotted #1d1e1e}.kint-rich ul{list-style:none;padding-left:12px}.kint-rich ul:not(.kint-tabs) li{border-left:1px dashed #d7d7d7}.kint-rich ul:not(.kint-tabs) li>dl{border-left:none}.kint-rich ul.kint-tabs{margin:0 0 0 12px;padding-left:0;background:#f8f8f8;border:1px solid #d7d7d7;border-top:0}.kint-rich ul.kint-tabs>li{background:#f8f8f8;border:1px solid #d7d7d7;cursor:pointer;display:inline-block;height:24px;margin:2px;padding:0 12px;vertical-align:top}.kint-rich ul.kint-tabs>li:hover,.kint-rich ul.kint-tabs>li.kint-active-tab:hover{border-color:#aaa;color:red}.kint-rich ul.kint-tabs>li.kint-active-tab{background:#f8f8f8;border-top:0;margin-top:-1px;height:27px;line-height:24px}.kint-rich ul.kint-tabs>li:not(.kint-active-tab){line-height:20px}.kint-rich ul.kint-tabs li+li{margin-left:0}.kint-rich ul:not(.kint-tabs)>li:not(:first-child){display:none}.kint-rich dt:hover+dd>ul>li.kint-active-tab{border-color:#aaa;color:red}.kint-rich dt>.kint-color-preview{width:16px;height:16px;display:inline-block;vertical-align:middle;margin-left:10px;border:1px solid #d7d7d7;background-color:#ccc;background-image:url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2 2"><path fill="%23FFF" d="M0 0h1v2h1V1H0z"/></svg>');background-size:100%}.kint-rich dt>.kint-color-preview:hover{border-color:#aaa}.kint-rich dt>.kint-color-preview>div{width:100%;height:100%}.kint-rich table{border-collapse:collapse;empty-cells:show;border-spacing:0}.kint-rich table *{font-size:12px}.kint-rich table dt{background:none;padding:2px}.kint-rich table dt .kint-parent{min-width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.kint-rich table td,.kint-rich table th{border:1px solid #d7d7d7;padding:2px;vertical-align:center}.kint-rich table th{cursor:alias}.kint-rich table td:first-child,.kint-rich table th{font-weight:bold;background:#f8f8f8;color:#1d1e1e}.kint-rich table td{background:#f8f8f8;white-space:pre}.kint-rich table td>dl{padding:0}.kint-rich table pre{border-top:0;border-right:0}.kint-rich table thead th:first-child{background:none;border:0}.kint-rich table tr:hover>td{box-shadow:0 0 1px 0 #aaa inset}.kint-rich table tr:hover var{color:red}.kint-rich table ul.kint-tabs li.kint-active-tab{height:20px;line-height:17px}.kint-rich pre.kint-source{margin-left:-1px}.kint-rich pre.kint-source[data-kint-filename]:before{display:block;content:attr(data-kint-filename);margin-bottom:4px;padding-bottom:4px;border-bottom:1px solid #f8f8f8}.kint-rich pre.kint-source>div:before{display:inline-block;content:counter(kint-l);counter-increment:kint-l;border-right:1px solid #aaa;padding-right:8px;margin-right:8px}.kint-rich pre.kint-source>div.kint-highlight{background:#f8f8f8}.kint-rich .kint-microtime-lap{text-shadow:-1px 0 #aaa,0 1px #aaa,1px 0 #aaa,0 -1px #aaa;color:#f8f8f8;font-weight:bold}.kint-rich .kint-focused{box-shadow:0 0 3px 2px red}.kint-rich dt{font-weight:normal}.kint-rich dt.kint-parent{margin-top:4px}.kint-rich dl dl{margin-top:4px;padding-left:25px;border-left:none}.kint-rich>dl>dt{background:#f8f8f8}.kint-rich ul{margin:0;padding-left:0}.kint-rich ul:not(.kint-tabs)>li{border-left:0}.kint-rich ul.kint-tabs{background:#f8f8f8;border:1px solid #d7d7d7;border-width:0 1px 1px 1px;padding:4px 0 0 12px;margin-left:-1px;margin-top:-1px}.kint-rich ul.kint-tabs li,.kint-rich ul.kint-tabs li+li{margin:0 0 0 4px}.kint-rich ul.kint-tabs li{border-bottom-width:0;height:25px}.kint-rich ul.kint-tabs li:first-child{margin-left:0}.kint-rich ul.kint-tabs li.kint-active-tab{border-top:1px solid #d7d7d7;background:#fff;font-weight:bold;padding-top:0;border-bottom:1px solid #fff !important;margin-bottom:-1px}.kint-rich ul.kint-tabs li.kint-active-tab:hover{border-bottom:1px solid #fff}.kint-rich ul>li>pre{border:1px solid #d7d7d7}.kint-rich dt:hover+dd>ul{border-color:#aaa}.kint-rich pre{background:#fff;margin-top:4px;margin-left:25px}.kint-rich .kint-source{margin-left:-1px}.kint-rich .kint-source .kint-highlight{background:#cfc}.kint-rich .kint-parent.kint-show>.kint-search{border-bottom-width:1px}.kint-rich table td{background:#fff}.kint-rich table td>dl{padding:0;margin:0}.kint-rich table td>dl>dt.kint-parent{margin:0}.kint-rich table td:first-child,.kint-rich table td,.kint-rich table th{padding:2px 4px}.kint-rich table dd,.kint-rich table dt{background:#fff}.kint-rich table tr:hover>td{box-shadow:none;background:#cfc}
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- DEBUG-VIEW START 1 APPPATH\Views\mazer\layouts\sidebar.php -->

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  ">
                    <a href="/mazer" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/components/alert">Alert</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/badge">Badge</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/breadcrumb">Breadcrumb</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/button">Button</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/card">Card</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/carousel">Carousel</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/dropdown">Dropdown</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/list-group">List Group</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/modal">Modal</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/navs">Navs</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/pagination">Pagination</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/progress">Progress</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/spinner">Spinner</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/components/tooltip">Tooltip</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Extra Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/extra/components/avatar">Avatar</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/extra/components/sweet-alert">Sweet Alert</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/extra/components/toastify">Toastify</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/extra/components/rating">Rating</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/extra/components/divider">Divider</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item active has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="submenu active">
                        <li class="submenu-item ">
                            <a href="/mazer/layouts/default">Default Layout</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/layouts/1-column">1 Column</a>
                        </li>
                        <li class="submenu-item active">
                            <a href="/mazer/layouts/vertical-navbar">Vertical with Navbar</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/layouts/horizontal">Horizontal Menu</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Forms &amp; Tables</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Form Elements</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/forms/input">Input</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/input-group">Input Group</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/select">Select</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/radio">Radio</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/checkbox">Checkbox</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/textarea">Textarea</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item ">
                    <a href="/mazer/forms/layout" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Form Layout</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-pen-fill"></i>
                        <span>Form Editor</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/forms/editor/quill">Quill</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/editor/ckeditor">CKEditor</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/editor/summernote">Summernote</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/forms/editor/tinymce">TinyMCE</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item ">
                    <a href="/mazer/table" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Table</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="/mazer/datatable" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Datatable</span>
                    </a>
                </li>

                <li class="sidebar-title">Extra UI</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link '>
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Widgets</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/ui/widgets/chatbox">Chatbox</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/ui/widgets/pricing">Pricing</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/ui/widgets/to-do-list">To-do List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-egg-fill"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/ui/icons/bootstrap-icons">Bootstrap Icons </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/ui/icons/fontawesome">Fontawesome</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/ui/icons/dripicons">Dripicons</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/ui/charts/chartjs">ChartJS</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/ui/charts/apexcharts">Apexcharts</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item ">
                    <a href="/mazer/ui/file-uploader" class='sidebar-link'>
                        <i class="bi bi-cloud-arrow-up-fill"></i>
                        <span>File Uploader</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-map-fill"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/ui/maps/google-map">Google Map</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/ui/maps/jsvector-map">JS Vector Map</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Pages</li>

                <li class="sidebar-item  ">
                    <a href="/mazer/applications/email" class='sidebar-link'>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email Application</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="/mazer/applications/chat" class='sidebar-link'>
                        <i class="bi bi-chat-dots-fill"></i>
                        <span>Chat Application</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="/mazer/applications/gallery" class='sidebar-link'>
                        <i class="bi bi-image-fill"></i>
                        <span>Photo Gallery</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="/mazer/applications/checkout" class='sidebar-link'>
                        <i class="bi bi-basket-fill"></i>
                        <span>Checkout Page</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/applications/auth/login">Login</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/applications/auth/register">Register</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/applications/auth/forgot-password">Forgot Password</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-x-octagon-fill"></i>
                        <span>Errors</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="/mazer/applications/errors/403">403</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/applications/errors/404">404</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/mazer/applications/errors/500">500</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Raise Support</li>

                <li class="sidebar-item  ">
                    <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                        <i class="bi bi-life-preserver"></i>
                        <span>Documentation</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                        <i class="bi bi-puzzle"></i>
                        <span>Contribute</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<!-- DEBUG-VIEW ENDED 1 APPPATH\Views\mazer\layouts\sidebar.php -->
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Vertical Layout with Navbar</h3>
                        <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Example Content</h4>
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quas omnis laudantium tempore
                        exercitationem, expedita aspernatur sed officia asperiores unde tempora maxime odio reprehenderit
                        distinctio incidunt! Vel aspernatur dicta consequatur!
                    </div>
                </div>
            </section>
        </div>
                
                <!-- DEBUG-VIEW START 2 APPPATH\Views\mazer\layouts\footer.php -->
<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://ahmadsaugi.com">A. Saugi</a></p>
        </div>
    </div>
</footer>

<!-- DEBUG-VIEW ENDED 2 APPPATH\Views\mazer\layouts\footer.php -->
            </div>
        </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/main.js"></script>
</body>

</html>

<!-- DEBUG-VIEW ENDED 3 APPPATH\Views\mazer\layouts\vertical-navbar.php -->

<!-- DEBUG-VIEW ENDED 4 APPPATH\Views\mazer\layout-vertical-navbar.php -->
