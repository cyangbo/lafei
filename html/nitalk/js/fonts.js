window.Fonticons||(window.Fonticons={}),function(e,n){function t(e,t){var i,o="IE",a=n.createElement("B"),s=n.documentElement;return e&&(o+=" "+e,t&&(o=t+" "+o)),a.innerHTML="<!--[if "+o+']><b id="fitest"></b><![endif]-->',s.appendChild(a),i=!!n.getElementById("fitest"),s.removeChild(a),i}function i(){for(var e=[/.*/],i=n.location.hostname,o=0;o<e.length;o++)if(e[o].test(i)){var a=n.createElement("link"),s=t(8,"lte")?"ce6e96a5-sd":"ce6e96a5";a.href=""+"/nitalk/fonts/fonts.css",a.media="all",a.rel="stylesheet",n.getElementsByTagName("head")[0].appendChild(a);break}}e.Fonticons.load=i}(this,document),window.Fonticons.load();
